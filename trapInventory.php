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

        fgets($file);
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {


            $area = "";
            if (isset($column[1])) {
                $area = mysqli_real_escape_string($conn, $column[1]);
            }
            $line = "";
            if (isset($column[2])) {
                $line = mysqli_real_escape_string($conn, $column[2]);
            }
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
            $end = "";
            if (isset($column[6])) {
                $end = mysqli_real_escape_string($conn, $column[6]);
            }
            $internalBaffle = "";
            if (isset($column[7])) {
                $internalBaffle = mysqli_real_escape_string($conn, $column[7]);
            }
            $killTrap = "";
            if (isset($column[8])) {
                $killTrap = mysqli_real_escape_string($conn, $column[8]);
            }
            $lidSecurity = "";
            if (isset($column[9])) {
                $lidSecurity = mysqli_real_escape_string($conn, $column[9]);
            }
            $rebar = "";
            if (isset($column[10])) {
                $rebar = mysqli_real_escape_string($conn, $column[10]);
            }
            $pinkTri = "";
            if (isset($column[11])) {
                $pinkTri = mysqli_real_escape_string($conn, $column[11]);
            }
            $boxCondi = "";
            if (isset($column[12])) {
                $boxCondi = mysqli_real_escape_string($conn, $column[12]);
            }
            $photo = "";
            if (isset($column[13])) {
                $photo = mysqli_real_escape_string($conn, $column[13]);
            }
            $datereported = "";
            if (isset($column[14])) {
                $datereported = mysqli_real_escape_string($conn, $column[14]);
            }
            $maintain = "";
            if (isset($column[15])) {
                $maintain = mysqli_real_escape_string($conn, $column[15]);
            }



            // check the date for latest hut updated ['date_last']
            // $dateResult = $db->select("SELECT date_last FROM updateTime");
            // $dateHutUpdated = $dateResult[0]['date_last'];

            //echo ($dateHutUpdated);
            //echo strtotime($datereported);

            //if(strtotime($datereported) > strtotime($dateHutUpdated) {


            // check if trap_name existed
            $existedTraps = $db->select("SELECT code FROM trapInventory");
            //count the row of the existing
            if ($existedTraps != null) {
                $trapcount = count($db->select("SELECT code FROM trapInventory"));
            }
            $inOrUp = "insert";

            if ($existedTraps != null) {
                for ($i = 0; $i < $trapcount; $i++) {
                    // ($code == $existedTraps[$i]['code'])
                    if (strcasecmp($code, $existedTraps[$i]['code']) == 0) {
                        if ($area == null) {
                            $inOrUp = "updateNOarea";
                        } else {
                            $inOrUp = "update";
                        }
                    }
                }
            }
            switch ($inOrUp) {
                case "update": {
                        $sqlUpdate = "UPDATE trapInventory SET  area = ?,line = ?,
                boxLength = ?, entrance = ?, end = ?, internalBaffle = ?, killTrap = ?, 
                lidSecurity = ?, rebar = ?, pinkTri = ?, boxCondi = ?, photo = ?, datereported = ?,
                maintain = ? where code = ?";
                        $paramType = "sssssssssssssss";
                        $paramArray = array(

                            $area,
                            $line,
                            $boxLength,
                            $entrance,
                            $end,
                            $internalBaffle,
                            $killTrap,
                            $lidSecurity,
                            $rebar,
                            $pinkTri,
                            $boxCondi,
                            $photo,
                            $datereported,
                            $maintain,
                            $code
                        );
                        $insertId = $db->update($sqlUpdate, $paramType, $paramArray);
                    }
                    break;
                case "updateNOarea": {
                        $sqlUpdate = "UPDATE trapInventory SET  
                boxLength = ?, entrance = ?, end = ?, internalBaffle = ?, killTrap = ?, 
                lidSecurity = ?, rebar = ?, pinkTri = ?, boxCondi = ?, photo = ?, datereported = ?,
                maintain = ? where code = ?";
                        $paramType = "sssssssssssss";
                        $paramArray = array(
                            $boxLength,
                            $entrance,
                            $end,
                            $internalBaffle,
                            $killTrap,
                            $lidSecurity,
                            $rebar,
                            $pinkTri,
                            $boxCondi,
                            $photo,
                            $datereported,
                            $maintain,
                            $code
                        );
                        $insertId = $db->update($sqlUpdate, $paramType, $paramArray);
                    }
                    break;
                case "insert": {

                        $sqlInsert = "INSERT into trapInventory (area, line, code, boxLength, entrance,
                        end, internalBaffle, killTrap, lidSecurity, rebar, pinkTri, boxCondi, photo,
                        datereported, maintain)
                   values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                        $paramType = "sssssssssssssss";
                        $paramArray = array(
                            $area,
                            $line,
                            $code,
                            $boxLength,
                            $entrance,
                            $end,
                            $internalBaffle,
                            $killTrap,
                            $lidSecurity,
                            $rebar,
                            $pinkTri,
                            $boxCondi,
                            $photo,
                            $datereported,
                            $maintain

                        );
                        $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
                    }
                    break;
            }
            // $updateTimeTable = "UPDATE updateTime SET date_last = $datereported';
            // $insertTime = $db->update($sqlInsert, $paramType, $paramArray);
            //}

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
    <!-- <script type="text/javascript" src="html2csv.js" ></script> -->
</head>

<style>
    body {
        font-family: Arial;
        /* width: 95%; */
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
        border: 1px solid #333;
        color: #000;
        background-color: #ddd;
        font-size: 0.9em;
        width: 100px;
        border-radius: 2px;
        cursor: pointer;
    }

    .btn-area {
        background: #333;
        border: #EF8D21 1px solid;
        color: white;
        font-size: 1.1em;
        width: 200px;
        border-radius: 2px;
        cursor: pointer;
        padding: 0.5em;
    }

    .outer-scontainer table {
        border-collapse: collapse;
        /* width: 180%; */
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

    #header-fixed {
        position: fixed;
        top: 0px;
        display: none;
        background-color: white;
    }

    td,
    th {
        word-wrap: break-word;
    }

    a.export,
    a.export:visited {
        display: inline-block;
        text-decoration: none;
        background: #EF8D21;
        border: #CC6600 1px solid;
        color: black;

        padding: 8px;
        margin-left: 300px;
    }

    .searchExport {
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
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
    <h2>MCU Traps inventory</h2>

    <div id="response" class="<?php if (!empty($type)) {
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
                    <!-- link to export -->
                    <a href="#" id="xx" class="export">Export to CSV</a>
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

            <form class="form-horizontal" action="" method="POST">
                Search<input type="text" name="search">
                Column: <select name="column">
                    <option value="area">area</option>
                    <option value="line">line</option>
                    <option value="code">code</option>
                    <option value="boxLength">boxLength</option>
                    <option value="entrance">entrance</option>
                    <option value="end">end</option>
                    <option value="internalBaffle">internalBaffle</option>
                    <option value="killTrap">killTrap</option>
                    <option value="lidSecurity">lidSecurity</option>
                    <option value="rebar">rebar</option>
                    <option value="pinkTri">pink Triangle</option>
                    <option value="boxCondi">box Condition</option>
                    <option value="photo">photo</option>
                    <option value="datereported">datereported</option>
                    <option value="maintain">maintainance</option>

                </select>
                <button type="submit" id="btnsearch" name="btnsearch" class="btn-search">Search</button>
                <button type="submit" value="" id="btnreset" name="btnreset" class="btn-submit">See All</button>
            </form>



            <!-- export to csv btn-->
            <!-- <input class= "btn-export" value="Export as CSV" type="button" onclick="$('#userTable').table2CSV({header:['area','line','code',
                'boxLength','entrance','end','internalBaffle','killTrap','lidSecurity','rebar','pinkTri','boxCondi',
                'photo','datereported','maintain']})"> -->




        </div>
        <?php

        if (isset($_POST['search'])) {
            $sqlSelect = "SELECT * FROM trapInventory where $column like '%$search%'";
        } else {
            $sqlSelect = "SELECT * FROM trapInventory";
        }

        if (isset($_POST['area1'])) {
            $sqlSelect = "SELECT * FROM trapInventory where area = 'Murchies'";
        } else if (isset($_POST['area2'])) {
            $sqlSelect = "SELECT * FROM trapInventory where area = 'Clinton'";
        } else if (isset($_POST['area3'])) {
            $sqlSelect = "SELECT * FROM trapInventory where area = 'Arthur'";
        }




        $result = $db->select($sqlSelect);

        if (!empty($result)) {

        ?>
            <table id='userTable'>
                <thead>
                    <tr>
                        <th>Area</th>
                        <th>Line</th>
                        <th>Code</th>
                        <th>Box Length</th>
                        <th>Entrance</th>
                        <th>End</th>
                        <th>InternalBaffle</th>
                        <th>KillTrap</th>
                        <th>LidSecurity</th>
                        <th>Rebar</th>
                        <th>Pink Triangles</th>
                        <th>Box Condition</th>
                        <th>Photo</th>
                        <th>Date Reported</th>
                        <th>Maintainance Needs</th>

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
                            <td><?php echo $row['end']; ?></td>
                            <td><?php echo $row['internalBaffle']; ?></td>
                            <td><?php echo $row['killTrap']; ?></td>
                            <td><?php echo $row['lidSecurity']; ?></td>
                            <td><?php echo $row['rebar']; ?></td>
                            <td><?php echo $row['pinkTri']; ?></td>
                            <td><?php echo $row['boxCondi']; ?></td>
                            <td><a href="<?php echo $row['photo']; ?>"><?php echo $row['photo']; ?></a></td>
                            <td><?php echo $row['datereported']; ?></td>
                            <td><?php echo $row['maintain']; ?></td>

                        </tr>
                    <?php
                }

                    ?>
                    </tbody>
            </table>
            <!-- <table id="header-fixed"></table>
            <script>
                var tableOffset = $("#userTable").offset().top;
                var $header = $("#userTable > thead").clone();
                var $fixedHeader = $("#header-fixed").append($header);


                $(window).bind("scroll", function() {
                    var offset = $(this).scrollTop();
                    var offsethr = $(this).scrollLeft()

                    if (offset >= tableOffset && $fixedHeader.is(":hidden")) {
                        $fixedHeader.show();
                    } else if (offset < tableOffset) {
                        $fixedHeader.hide();
                    }
                });
            </script> -->

            <!-- script to export csv from a link-->
            <script>
                $(document).ready(function() {

                    function exportTableToCSV($table, filename) {

                        var $rows = $table.find('tr:has(td),tr:has(th)'),

                            // Temporary delimiter characters unlikely to be typed by keyboard
                            // This is to avoid accidentally splitting the actual contents
                            tmpColDelim = String.fromCharCode(11), // vertical tab character
                            tmpRowDelim = String.fromCharCode(0), // null character

                            // actual delimiter characters for CSV format
                            colDelim = '","',
                            rowDelim = '"\r\n"',

                            // Grab text from table into CSV formatted string
                            csv = '"' + $rows.map(function(i, row) {
                                var $row = $(row),
                                    $cols = $row.find('td,th');

                                return $cols.map(function(j, col) {
                                    var $col = $(col),
                                        text = $col.text();

                                    return text.replace(/"/g, '""'); // escape double quotes

                                }).get().join(tmpColDelim);

                            }).get().join(tmpRowDelim)
                            .split(tmpRowDelim).join(rowDelim)
                            .split(tmpColDelim).join(colDelim) + '"',



                            // Data URI
                            csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

                        console.log(csv);

                        if (window.navigator.msSaveBlob) { // IE 10+
                            //alert('IE' + csv);
                            window.navigator.msSaveOrOpenBlob(new Blob([csv], {
                                type: "text/plain;charset=utf-8;"
                            }), "csvname.csv")
                        } else {
                            $(this).attr({
                                'download': filename,
                                'href': csvData,
                                'target': '_blank'
                            });
                        }
                    }

                    // This must be a hyperlink
                    $("#xx").on('click', function(event) {

                        exportTableToCSV.apply(this, [$('#userTable'), 'export.csv']);

                        // IF CSV, don't do event.preventDefault() or return false
                        // We actually need this to be a typical hyperlink
                    });

                });
            </script>

        <?php


        }

        ?>
    </div>
    <!-- import table filter js -->
    <script src="tablefilter/tablefilter.js"></script>


    <!-- starter filter -->
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
            col_11: 'select',
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
                'string', 'string'
            ],
            col_widths: [
                '100px', '100px', '100px',
                '100px', '100px', '100px',
                '100px', '100px', '100px', '100px',
                '100px', '70px', '260px',
                '100px', '250px'
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