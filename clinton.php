<?php

use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
//get the keyword and column name from the second form
$search = $_POST['search'];
$column = $_POST['column'];
// $reset = $_POST['reset'];


if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {

        $file = fopen($fileName, "r");

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

            $trap_line = "";
            if (isset($column[0])) {
                $trap_line = mysqli_real_escape_string($conn, $column[0]);
            }
            $trap_name = "";
            if (isset($column[1])) {
                $trap_name = mysqli_real_escape_string($conn, $column[1]);
            }
            $tunnel_types = "";
            if (isset($column[2])) {
                $tunnel_types = mysqli_real_escape_string($conn, $column[2]);
            }
            $internal_baffels = "";
            if (isset($column[3])) {
                $internal_baffels = mysqli_real_escape_string($conn, $column[3]);
            }
            $trap_types = "";
            if (isset($column[4])) {
                $trap_types = mysqli_real_escape_string($conn, $column[4]);
            }
            $trap_types2 = "";
            if (isset($column[5])) {
                $trap_types2 = mysqli_real_escape_string($conn, $column[5]);
            }
            $lid_securitys = "";
            if (isset($column[6])) {
                $lid_securitys = mysqli_real_escape_string($conn, $column[6]);
            }
            $box_condition = "";
            if (isset($column[7])) {
                $box_condition = mysqli_real_escape_string($conn, $column[7]);
            }
            $note = "";
            if (isset($column[8])) {
                $note = mysqli_real_escape_string($conn, $column[8]);
            }
            $date_reported = "";
            if (isset($column[9])) {
                $date_reported = mysqli_real_escape_string($conn, $column[9]);
            }

            

            if($trap_name != null){$sqlUpdate = "UPDATE ClintonValley SET trap_line = ?,tunnel_types= ?,internal_baffels= ?,
            trap_types = ?,trap_types2 = ?,lid_securitys= ?,box_condition= ?,note=?,date_reported= ? Where trap_name = ?";
            $paramType = "ssssssssss";
            $paramArray = array(
                $trap_line,
                $tunnel_types,
                $internal_baffels,
                $trap_types,
                $trap_types2,
                $lid_securitys,
                $box_condition,
                $note,
                $date_reported,
                $trap_name
            );
            $insertId = $db->update($sqlUpdate, $paramType, $paramArray);
        } else {
            $sqlInsert = "INSERT into ClintonValley (trap_line,trap_name,tunnel_types,internal_baffels,
            trap_types,trap_types2,lid_securitys,box_condition,note,date_reported)
                   values (?,?,?,?,?,?,?,?,?,?)";
            $paramType = "ssssssssss";
            $paramArray = array(
                $trap_line,
                $trap_name,
                $tunnel_types,
                $internal_baffels,
                $trap_types,
                $trap_types2,
                $lid_securitys,
                $box_condition,
                $note,
                $date_reported
            );
            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
        }


            if (!empty($insertId)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
                
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <script src="jquery-3.2.1.min.js"></script>
    <!-- import table filter js -->
    <script src="/tablefilter/tablefilter.js"></script>
</head>

    <style>
        body {
            font-family: Arial;
            width: 95%;
        }

        .outer-scontainer {
            background: #F0F0F0;
            border: #e0dfdf 1px solid;
            padding: 20px;
            border-radius: 2px;
        }

        .input-row {
            margin-top: 0px;
            margin-bottom: 20px;
        }

        .btn-submit {
            background: white;
            border: #EF8D21 1px solid;
            color: #333;
            font-size: 0.9em;
            width: 100px;
            border-radius: 2px;
            cursor: pointer;
        }

        .btn-search {
            background: #EF8D21;
            border: #CC6600 1px solid;
            color: black;
            font-size: 0.9em;
            width: 100px;
            border-radius: 2px;
            cursor: pointer;
        }

        .outer-scontainer table {
            border-collapse: collapse;
            width: 100%;
        }

        .outer-scontainer th {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        .outer-scontainer td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        #response {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 2px;
            display: none;
        }

        .success {
            background: #c7efd9;
            border: #bbe2cd 1px solid;
        }

        .error {
            background: #fbcfcf;
            border: #f3c6c7 1px solid;
        }

        div#response.display-block {
            display: block;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#frmCSVImport").on("submit", function() {

                $("#response").attr("class", "");
                $("#response").html("");
                var fileType = ".csv";
                var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
                if (!regex.test($("#file").val().toLowerCase())) {
                    $("#response").addClass("error");
                    $("#response").addClass("display-block");
                    $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
                    return false;
                }
                return true;
            });
        });
    </script>

    

<body>
    <h2>MCU traps in Clinton Valley</h2>
 
    <div id="response" class="<?php if (!empty($type)) {
                                    echo $type . " display-block";
                                } ?>">
        <?php if (!empty($message)) {
            echo $message;
        } ?>
    </div>
    <div class="outer-scontainer">
        <div class="row">

            <form class="form-horizontal" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                <div class="input-row">
                    <label class="col-md-1 control-label">Choose CSV
                        File</label> <input type="file" name="file" id="file" accept=".csv">
                    <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
                    <br />

                </div>

            </form>



            <form class="form-horizontal" action="" method="POST">
                Search<input type="text" name="search">
                Column: <select name="column">
                    <option value="trap_line">Trap Line</option>
                    <option value="trap_name">Trap Name</option>
                    <option value="tunnel_types">Tunnel Type</option>
                    <option value="internal_baffels">Internal Baffles</option>
                    <option value="trap_types">Trap Type</option>
                    <option value="trap_types2">Trap Type2</option>
                    <option value="lid_securitys">Lid Security</option>
                    <option value="box_condition">Box Condition</option>
                    <option value="note">Note</option>
                    <option value="date_reported">Date reported</option>
                </select>
                <button type="submit" id="btnsearch" name="btnsearch" class="btn-search">Search</button>
                <button type="submit" value="" id="btnreset" name="btnreset" class="btn-submit">See All</button>
            </form>

        </div>
        <?php

        // $sqlSelect = "SELECT * FROM ClintonValley where trap_line like '%North%'";

        if (isset($_POST['search'])) {
            $sqlSelect = "SELECT * FROM ClintonValley where $column like '%$search%'";
        } else {
            $sqlSelect = "SELECT * FROM ClintonValley";
        }
        $result = $db->select($sqlSelect);

        if (!empty($result)) {

        ?>
            <table id='userTable'>
                <thead>
                    <tr>
                        <th>Line</th>
                        <th>Trap Name</th>
                        <th>Tunnel Type</th>
                        <th>Internal Baffles</th>
                        <th>Trap Type</th>
                        <th>Trap Type2</th>
                        <th>Lid Security</th>
                        <th>Box Condition</th>
                        <th>Note</th>
                        <th>Date reported</th>

                    </tr>
                </thead>
                <?php

                foreach ($result as $row) {
                ?>

                    <tbody>
                        <tr>
                            <td><?php echo $row['trap_line']; ?></td>
                            <td><?php echo $row['trap_name']; ?></td>
                            <td><?php echo $row['tunnel_types']; ?></td>
                            <td><?php echo $row['internal_baffels']; ?></td>
                            <td><?php echo $row['trap_types']; ?></td>
                            <td><?php echo $row['trap_types2']; ?></td>
                            <td><?php echo $row['lid_securitys']; ?></td>
                            <td><?php echo $row['box_condition']; ?></td>
                            <td><?php echo $row['note']; ?></td>
                            <td><?php echo $row['date_reported']; ?></td>

                        </tr>
                    <?php
                }

                    ?>
                    </tbody>
            </table>

        <?php


        }

        ?>
    </div>
    <!-- script to deal with table filter -->
    <script>
var tf = new TableFilter(document.querySelector('#userTable'), {
    base_path: '/tablefilter'
});
tf.init();
</script>
</body>

</html>