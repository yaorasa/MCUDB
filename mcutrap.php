<?php

use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
//get the keyword and column name from the second form
$search = $_POST['search'];
$column = $_POST['column'];


if (isset($_POST["import"])) {

    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {

        $file = fopen($fileName, "r");
        //condition to look at the file name -- > variable
        // if ($_FILES['file']['name'] = "Traps_maintenance - Sheet1")
        if (str_contains($_FILES['file']['name'], "Traps_maintenance")) {
            fgets($file);
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

                $areaM = "";
                if (isset($column[1])) {
                    $areaM = mysqli_real_escape_string($conn, $column[1]);
                }
                $otherareaM = "";
                if (isset($column[2])) {
                    $otherareaM = mysqli_real_escape_string($conn, $column[2]);
                }
                $code = "";
                if (isset($column[3])) {
                    $code = mysqli_real_escape_string($conn, $column[3]);
                }
                $rebar1Need = "";
                if (isset($column[4])) {
                    $rebar1Need = mysqli_real_escape_string($conn, $column[4]);
                }
                $rebar2Need = "";
                if (isset($column[5])) {
                    $rebar2Need = mysqli_real_escape_string($conn, $column[5]);
                }
                $relevelNeed = "";
                if (isset($column[6])) {
                    $relevelNeed = mysqli_real_escape_string($conn, $column[6]);
                }
                $relocationNeed = "";
                if (isset($column[7])) {
                    $relocationNeed = mysqli_real_escape_string($conn, $column[7]);
                }
                $newlidNeed = "";
                if (isset($column[8])) {
                    $newlidNeed = mysqli_real_escape_string($conn, $column[8]);
                }
                $pinkTriNeed = "";
                if (isset($column[9])) {
                    $pinkTriNeed = mysqli_real_escape_string($conn, $column[9]);
                }
                $marketPole = "";
                if (isset($column[10])) {
                    $marketPole = mysqli_real_escape_string($conn, $column[10]);
                }
                $calibrate = "";
                if (isset($column[11])) {
                    $calibrate = mysqli_real_escape_string($conn, $column[11]);
                }
                $notesM = "";
                if (isset($column[12])) {
                    $notesM = mysqli_real_escape_string($conn, $column[12]);
                }
                $dateMaintain = "";
                if (isset($column[13])) {
                    $dateMaintain = mysqli_real_escape_string($conn, $column[13]);
                }
                $trapperName = "";
                if (isset($column[14])) {
                    $trapperName = mysqli_real_escape_string($conn, $column[14]);
                }

                // check if the input trap ID and trap area are already inside the database
                $existedTraps = $db->select("SELECT code FROM mcuTrap where lower(code) = lower(trim('$code'))");
                // $existedArea = $db->select("SELECT area FROM mcuTrap where lower(trim(area)) = lower(trim('$areaM'))");

                if ($existedTraps != null) {
                    $inOrUpM = "update";
                    //  if ($existedArea == null && $area != null) {
                    //     $inOrUp = "updateNewArea";
                    // }
                } else if ($areaM == "Other") { //new area
                    $inOrUpM = "insertNewArea";
                } else if ($areaM != null) { //existing area
                    $inOrUpM = "insertwArea";
                }
                switch ($inOrUpM) {
                    case "insertwArea": {

                            $sqlInsert = "INSERT into mcuTrap (area, code, rebar1Need, rebar2Need,
                        relevelNeed, relocationNeed, newlidNeed, pinkTriNeed, marketPole, 
                        calibrate, notesM, dateMaintain, trapperName)
                    values (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                            $paramType = "sssssssssssss";
                            $paramArray = array(
                                $areaM,
                                $code,
                                $rebar1Need,
                                $rebar2Need,
                                $relevelNeed,
                                $relocationNeed,
                                $newlidNeed,
                                $pinkTriNeed,
                                $marketPole,
                                $calibrate,
                                $notesM,
                                $dateMaintain,
                                $trapperName

                            );
                            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
                        }
                        break;

                    case "insertNewArea": {

                            $sqlInsert = "INSERT into mcuTrap (area, code, rebar1Need, rebar2Need,
                    relevelNeed, relocationNeed, newlidNeed, pinkTriNeed, marketPole, 
                    calibrate, notesM, dateMaintain, trapperName)
                    values (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                            $paramType = "sssssssssssss";
                            $paramArray = array(
                                $otherareaM,
                                $code,
                                $rebar1Need,
                                $rebar2Need,
                                $relevelNeed,
                                $relocationNeed,
                                $newlidNeed,
                                $pinkTriNeed,
                                $marketPole,
                                $calibrate,
                                $notesM,
                                $dateMaintain,
                                $trapperName

                            );
                            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
                        }
                        break;

                    case "update": {

                            $sqlInsert = "UPDATE mcuTrap SET rebar1Need=?, rebar2Need=?,
                            relevelNeed=?, relocationNeed=?, newlidNeed=?, pinkTriNeed=?, marketPole=?, 
                            calibrate=?, notesM=?, dateMaintain=?, trapperName=? where code =?";
                            $paramType = "ssssssssssss";

                            $paramArray = array(

                                $rebar1Need,
                                $rebar2Need,
                                $relevelNeed,
                                $relocationNeed,
                                $newlidNeed,
                                $pinkTriNeed,
                                $marketPole,
                                $calibrate,
                                $notesM,
                                $dateMaintain,
                                $trapperName,
                                $code

                            );
                            $insertId = $db->update($sqlInsert, $paramType, $paramArray);
                        }
                        break;
                }
            }
            if (!empty($insertId)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }

            //checking the file upload that is not Maintenance form
        } else {
            fgets($file);
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {


                $area = "";
                if (isset($column[1])) {
                    $area = mysqli_real_escape_string($conn, $column[1]);
                }
                $otherarea = "";
                if (isset($column[2])) {
                    $otherarea = mysqli_real_escape_string($conn, $column[2]);
                }
                // $line = "";
                // if (isset($column[3])) {
                //     $line = mysqli_real_escape_string($conn, $column[3]);
                // }
                $code = "";
                if (isset($column[3])) {
                    $code = mysqli_real_escape_string($conn, $column[3]);
                }
                $boxLength = "";
                if (isset($column[4])) {
                    $boxLength = mysqli_real_escape_string($conn, $column[4]);
                }
                $entrance = "";
                if (isset($column[5])) {
                    $entrance = mysqli_real_escape_string($conn, $column[5]);
                }
                $meshType = "";
                if (isset($column[6])) {
                    $meshType = mysqli_real_escape_string($conn, $column[6]);
                }
                $slideOut = "";
                if (isset($column[7])) {
                    $meshType = mysqli_real_escape_string($conn, $column[7]);
                }
                $end = "";
                if (isset($column[8])) {
                    $end = mysqli_real_escape_string($conn, $column[8]);
                }
                $internalBaffle = "";
                if (isset($column[9])) {
                    $internalBaffle = mysqli_real_escape_string($conn, $column[9]);
                }
                $weight = "";
                if (isset($column[10])) {
                    $weight = mysqli_real_escape_string($conn, $column[10]);
                }
                $design = "";
                if (isset($column[11])) {
                    $design = mysqli_real_escape_string($conn, $column[11]);
                }
                $lidSecurity = "";
                if (isset($column[12])) {
                    $lidSecurity = mysqli_real_escape_string($conn, $column[12]);
                }
                $rebar = "";
                if (isset($column[13])) {
                    $rebar = mysqli_real_escape_string($conn, $column[13]);
                }
                $pinkTri = "";
                if (isset($column[14])) {
                    $pinkTri = mysqli_real_escape_string($conn, $column[14]);
                }
                $boxCondi = "";
                if (isset($column[15])) {
                    $boxCondi = mysqli_real_escape_string($conn, $column[15]);
                }
                $note = "";
                if (isset($column[16])) {
                    $note = mysqli_real_escape_string($conn, $column[16]);
                }
                $photo = "";
                if (isset($column[17])) {
                    $photo = mysqli_real_escape_string($conn, $column[17]);
                }
                $datereported = "";
                if (isset($column[18])) {
                    $datereported = mysqli_real_escape_string($conn, $column[18]);
                }
                $volName = "";
                if (isset($column[19])) {
                    $volName = mysqli_real_escape_string($conn, $column[19]);
                }

                $existedTraps = $db->select("SELECT code FROM mcuTrap where lower(code) = lower(trim('$code'))");
                $existedArea = $db->select("SELECT area FROM mcuTrap where lower(trim(area)) = lower(trim('$area'))");

                if ($existedTraps != null) {
                    $inOrUp = "update";
                    //  if ($existedArea == null && $area != null) {
                    //     $inOrUp = "updateNewArea";
                    // }
                } else if ($existedArea == null) { //new area
                    $inOrUp = "insertNewArea";
                } else if ($area != null) { //existing area
                    $inOrUp = "insertwArea";
                }
                switch ($inOrUp) {
                        // case "updateNewArea": {
                        //         $sqlUpdate = "UPDATE mcuTrap SET  area = ?,
                        // boxLength = ?, entrance = ?, meshType =?, slideout=?, end = ?, internalBaffle = ?, weight = ?, design =?,
                        // lidSecurity = ?, rebar = ?, pinkTri =?  boxCondi = ?, note =?, photo = ?, datereported = ?, 
                        // volName = ? where code = ?";
                        //         $paramType = "ssssssssssssssssss";
                        //         $paramArray = array(

                        //             $otherarea,

                        //             $boxLength,
                        //             $entrance,
                        //             $meshType,
                        //             $slideout,
                        //             $end,
                        //             $internalBaffle,
                        //             $weight,
                        //             $design,
                        //             $lidSecurity,
                        //             $rebar,
                        //             $pinkTri,
                        //             $boxCondi,
                        //             $note,
                        //             $photo,
                        //             $datereported,
                        //             $volName,

                        //             $code
                        //         );
                        //         $insertId = $db->update($sqlUpdate, $paramType, $paramArray);
                        //     }
                        //     break;
                    case "update": {
                            $sqlUpdate = "UPDATE mcuTrap SET  
                boxLength = ?, entrance = ?, meshType =?, slideout=?, end = ?, internalBaffle = ?, weight = ?, design =?,
                lidSecurity = ?, rebar = ?, pinkTri =?,  boxCondi = ?, note =? , photo = ?, datereported = ?,  
                volName = ? where code = ?";
                            $paramType = "sssssssssssssssss";
                            $paramArray = array(

                                $boxLength,
                                $entrance,
                                $meshType,
                                $slideout,
                                $end,
                                $internalBaffle,
                                $weight,
                                $design,
                                $lidSecurity,
                                $rebar,
                                $pinkTri,
                                $boxCondi,
                                $note,
                                $photo,
                                $datereported,
                                $volName,
                                $code
                            );
                            $insertId = $db->update($sqlUpdate, $paramType, $paramArray);
                        }
                        break;
                    case "insertNewArea": {

                            $sqlInsert = "INSERT into mcuTrap (area, code, boxLength, entrance,
                        meshType, slideOut, end, internalBaffle, weight, design, lidSecurity, rebar,pinkTri, boxCondi, 
                        note, photo, datereported, volName)
                   values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                            $paramType = "ssssssssssssssssss";
                            $paramArray = array(
                                $otherarea,
                                $code,
                                $boxLength,
                                $entrance,
                                $meshType,
                                $slideout,
                                $end,
                                $internalBaffle,
                                $weight,
                                $design,
                                $lidSecurity,
                                $rebar,
                                $pinkTri,
                                $boxCondi,
                                $note,
                                $photo,
                                $datereported,
                                $volName

                            );
                            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
                        }
                        break;
                    case "insertwArea": {

                            $sqlInsert = "INSERT into mcuTrap (area, code, boxLength, entrance,
                        meshType, slideOut, end, internalBaffle, weight, design, lidSecurity, rebar,pinkTri, boxCondi, 
                        note, photo, datereported, volName)
                   values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                            $paramType = "ssssssssssssssssss";
                            $paramArray = array(
                                $area,
                                $code,
                                $boxLength,
                                $entrance,
                                $meshType,
                                $slideout,
                                $end,
                                $internalBaffle,
                                $weight,
                                $design,
                                $lidSecurity,
                                $rebar,
                                $pinkTri,
                                $boxCondi,
                                $note,
                                $photo,
                                $datereported,
                                $volName

                            );
                            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
                        }
                        break;
                }
                // $updateTimeTable = "UPDATE updateTime SET date_last = $datereported';
                // $insertTime = $db->update($sqlInsert, $paramType, $paramArray);
                //}
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
<html lang="en">

<head>
    <script src="jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="./mcustyle.css">
    <style>
        
       
    
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

    <!-- export to csv -->
    <script>
        // Quick and simple export target #table_id into a csv
        function download_table_as_csv(userTable, separator = ',') {
            // Select rows from table_id
            var rows = document.querySelectorAll('table#' + userTable + ' tr:not([style*="display: none"])');
            // Construct csv
            var csv = [];
            for (var i = 0; i < rows.length; i++) {
                //check the row is display none >> none CHECK rows.css('display') == 'none'
                // if (rows.find('tr:not([style*="display: none"])')) {

                // } else {
                var row = [],
                    cols = rows[i].querySelectorAll('td, th');
                for (var j = 0; j < cols.length; j++) {
                    // Clean innertext to remove multiple spaces and jumpline (break csv)
                    var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ')
                    // Escape double-quote with double-double-quote (see https://stackoverflow.com/questions/17808511/properly-escape-a-double-quote-in-csv)
                    data = data.replace(/"/g, '""');
                    // Push escaped string
                    row.push('"' + data + '"');
                }
                csv.push(row.join(separator));
                // }
            }
            var csv_string = csv.join('\n');
            // Download it
            var filename = 'export_' + userTable + '_' + new Date().toLocaleDateString() + '.csv';
            var link = document.createElement('a');
            link.style.display = 'none';
            link.setAttribute('target', '_blank');
            link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
            link.setAttribute('download', filename);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

    </script>
</head>


<body>
    <nav class="navbar sticky">
        <a class="navbar-brand" href="http://localhost/MCU/mcuDB/mcutrap.php">
            <div class="logo-image">
                <img src="./img/MCU_logo.jpg" class="img-fluid">
            </div>
        </a>
        <p id="mainNav">MCU Inventory : Traps</p>
        <a href="http://localhost/MCU/mcuDB/mcuhut.php">Huts</a>
        <a href="http://localhost/MCU/mcuDB/mcutrap.php">Traps</a>
        <div class="dropdown">
            <button class="dropbtn">Setup
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="http://localhost/MCU/mcuDB/mcutrapset.php">Setup Traps</a>
            </div>
        </div>
    </nav>

    <!-- <h2>Trap inventory</h2> -->
    
    <div id="response" class="
    <?php if (!empty($type)) {
        echo $type . " display-block";
    } ?>">
        <?php if (!empty($message)) {
            echo $message;
        } ?>
    </div>
    <div class="outer-scontainer">
        <div class="row">

            <form class="form-horizontal" action="" method="post">
                <div class="searchExport">
                    <div class="input-row">
                        <button type="submit" value="Murchies" name="area1" class="btn-area">Murchies Area</button>
                        <button type="submit" value="Clinton" name="area2" class="btn-area">Clinton Area</button>
                        <button type="submit" value="Arthur" name="area3" class="btn-area">Arthur Area</button>
                        <br />
                    </div>

                </div>
            </form>

            <form class="form-horizontal" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                <div class="input-row">
                    <label class="control-label">Choose CSV
                        File</label> <input type="file" name="file" id="file" accept=".csv">
                    <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
                    <br />

                </div>

            </form>
            <div class="searchExport">
                <form class="form-horizontal formsearch" action="" method="POST">
                    Search<input type="text" name="search">
                    Column: <select name="column">
                        <option value="code">code</option>
                        <option value="area">area</option>
                        <option value="line">line</option>
                        <option value="boxLength">boxLength</option>
                        <option value="entrance">front entrance?</option>
                        <option value="end">end type</option>
                        <option value="internalBaffle">internal Baffle</option>
                        <option value="weight">calibration</option>
                        <option value="lidSecurity">lidS ecurity</option>
                        <option value="rebar">rebar</option>
                        <option value="pinkTri">pink Triangle</option>
                        <option value="boxCondi">box Condition</option>
                        <option value="photo">photo</option>
                        <option value="datereported">date reported</option>
                        <option value="note">note</option>

                    </select>
                    <button type="submit" id="btnsearch" name="btnsearch" class="btn-search"><img src="./img/searchWhite.svg"></button>
                    <button type="submit" value="" id="btnreset" name="btnreset" class="btn-submit">See All</button>
                </form>

                <!-- link to download -->
                <a href="#" class="export" onclick="download_table_as_csv('userTable');"><img src="./img/downloadWhite.svg"> CSV</a>
            </div>
        </div>

    </div>
    <?php

    if (isset($_POST['search'])) {
        $sqlSelect = "SELECT * FROM mcuTrap where $column like '%$search%'";
    } else {
        $sqlSelect = "SELECT * FROM mcuTrap";
    }

    if (isset($_POST['area1'])) {
        $sqlSelect = "SELECT * FROM mcuTrap where area = 'Murchies'";
    } else if (isset($_POST['area2'])) {
        $sqlSelect = "SELECT * FROM mcuTrap where area = 'Clinton'";
    } else if (isset($_POST['area3'])) {
        $sqlSelect = "SELECT * FROM mcuTrap where area = 'Arthur'";
    }




    $result = $db->select($sqlSelect);

    if (!empty($result)) {

    ?>
        <table id='userTable' class="TF sticky">
            <thead>
                <tr>
                    <th>Area</th>
                    <th>Line</th>
                    <th>Code</th>
                    <th>Box Length</th>
                    <th>Front Entrance?</th>
                    <th>Plate Mesh</th>
                    <th>Slide Out?</th>
                    <th>End Type</th>
                    <th>InternalBaffle</th>
                    <th>Calibration</th>
                    <th>Design</th>
                    <th>Lid Security</th>
                    <th>Rebar</th>
                    <th>Pink Triangles</th>
                    <th>Box Condition</th>
                    <th>Note</th>
                    <th>Photo</th>
                    <th>Date Reported</th>
                    <th>Volunteer Name</th>
                    <th>Need Rebar1</th>
                    <th>Need Rebar2</th>
                    <th>Need Relevel</th>
                    <th>Need Relocation</th>
                    <th>Need New Lid</th>
                    <th>Need Pink Triangle</th>
                    <th>Need Market Pole</th>
                    <th>Calibration</th>
                    <th>Date Maintained</th>
                    <th>Maintainance Note</th>
                    <th>Trapper name</th>


                </tr>
            </thead>
            <?php

            foreach ($result as $row) {
            ?>

                <tbody>
                    <tr>

                        <td><?php echo $row['area']; ?></td>
                        <td><?php echo $row['line']; ?></td>
                        <td style="text-transform: uppercase;"><?php echo $row['code']; ?></td>
                        <td><?php echo $row['boxLength']; ?></td>
                        <td><?php echo $row['entrance']; ?></td>
                        <td><?php echo $row['meshType']; ?></td>
                        <td><?php echo $row['slideout']; ?></td>
                        <td><?php echo $row['end']; ?></td>
                        <td><?php echo $row['internalBaffle']; ?></td>
                        <td><?php echo $row['weight']; ?></td>
                        <td><?php echo $row['design']; ?></td>
                        <td><?php echo $row['lidSecurity']; ?></td>
                        <td><?php echo $row['rebar']; ?></td>
                        <td><?php echo $row['pinkTri']; ?></td>
                        <td><?php echo $row['boxCondi']; ?></td>
                        <td><?php echo $row['note']; ?></td>
                        <td><a href="<?php echo $row['photo']; ?>"><?php echo $row['photo']; ?></a></td>
                        <td><?php echo $row['datereported']; ?></td>
                        <td><?php echo $row['volName']; ?></td>
                        <td><?php echo $row['rebar1Need']; ?></td>
                        <td><?php echo $row['rebar2Need']; ?></td>
                        <td><?php echo $row['relevelNeed']; ?></td>
                        <td><?php echo $row['relocationNeed']; ?></td>
                        <td><?php echo $row['newlidNeed']; ?></td>
                        <td><?php echo $row['pinkTriNeed']; ?></td>
                        <td><?php echo $row['marketPole']; ?></td>
                        <td><?php echo $row['calibrate']; ?></td>
                        <td><?php echo $row['notesM']; ?></td>
                        <td><?php echo $row['dateMaintain']; ?></td>
                        <td><?php echo $row['trapperName']; ?></td>

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
    <!-- import table filter js -->
    <script src="tablefilter/tablefilter.js"></script>


    <!-- table filter -->
    <script data-config>
        var filtersConfig = {
            base_path: 'tablefilter/',
            col_0: 'select',
            col_1: 'select',
            col_2: 'select',
            col_3: 'select',
            col_4: 'select',
            col_5: 'select',
            col_6: 'select',
            col_7: 'select',
            col_8: 'select',
            col_9: 'select',
            col_10: 'select',
            col_11: 'select',
            col_12: 'select',
            col_13: 'select',
            col_14: 'checklist',
            col_15: 'select',
            // col_16: '',
            col_17: 'select',
            col_18: 'select',
            col_19: 'select',
            col_20: 'select',
            col_21: 'select',
            col_22: 'select',
            col_23: 'select',
            col_24: 'select',
            col_25: 'select',
            col_26: 'select',
            col_27: 'select',
            col_28: 'select',
            col_29: 'select',
            col_30: 'select',
            
            alternate_rows: true,
            rows_counter: true,
            btn_reset: true,
            loader: true,
            status_bar: true,
            mark_active_columns: true,
            highlight_keywords: true,

            col_types: [
                'string', 'string', 'string',
                'string', 'string', 'string',
                'string', 'string', 'string', 'string',
                'string', 'string', 'string',
                'string', 'string', 'string',
                'string', 'string', 'string','string',
                'string', 'string', 'string',
                'string', 'string', 'string',
                'string', 'string', 'string', 'string'
                
            ],
            col_widths: [
                '100px', '100px', '100px',
                '100px', '100px', '100px',
                '100px', '100px', '100px', '100px',
                '100px', '100px', '100px',
                '100px', '100px', '150px',
                '260px', '100px', '100px','100px',
                '100px', '100px', '100px',
                '100px', '100px', '100px',
                '100px', '100px', '100px', '100px'
                

            ],
            extensions: [{
                name: 'sort'
            }]
        };

        var tf = new TableFilter('userTable', filtersConfig);
        tf.init();
    </script>

    <pre></pre>

</body>

</html>