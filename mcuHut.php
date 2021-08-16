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


            $hut_name = "";
            if (isset($column[1])) {
                $hut_name = mysqli_real_escape_string($conn, $column[1]);
            }
            $hut_loc = "";
            if (isset($column[2])) {
                $hut_loc = mysqli_real_escape_string($conn, $column[2]);
            }
            $gasBottle = "";
            if (isset($column[3])) {
                $gasBottle = mysqli_real_escape_string($conn, $column[3]);
            }
            $gasBottle2 = "";
            if (isset($column[4])) {
                $gasBottle2 = mysqli_real_escape_string($conn, $column[4]);
            }
            $sleepingBag = "";
            if (isset($column[5])) {
                $sleepingBag = mysqli_real_escape_string($conn, $column[5]);
            }
            $sbAmount = "";
            if (isset($column[6])) {
                $sbAmount = mysqli_real_escape_string($conn, $column[6]);
            }
           
            $needWash = "";
            if (isset($column[7])) {
                $needWash = mysqli_real_escape_string($conn, $column[7]);
            }
            $howManyNeed = "";
            if (isset($column[8])) {
                $howManyNeed = mysqli_real_escape_string($conn, $column[8]);
            }
            $spareBox = "";
            if (isset($column[9])) {
                $spareBox = mysqli_real_escape_string($conn, $column[9]);
            }
            $whatNeed = "";
            if (isset($column[10])) {
                $whatNeed = mysqli_real_escape_string($conn, $column[10]);
            }
            $gearBehind = "";
            if (isset($column[11])) {
                $gearBehind = mysqli_real_escape_string($conn, $column[11]);
            }
            $listGear = "";
            if (isset($column[12])) {
                $listGear = mysqli_real_escape_string($conn, $column[12]);
            }
            $flyOut = "";
            if (isset($column[13])) {
                $flyOut = mysqli_real_escape_string($conn, $column[13]);
            }
            $listFlyOut = "";
            if (isset($column[14])) {
                $listFlyOut = mysqli_real_escape_string($conn, $column[14]);
            }
            $needAnything = "";
            if (isset($column[15])) {
                $needAnything = mysqli_real_escape_string($conn, $column[15]);
            }
            $needList = "";
            if (isset($column[16])) {
                $needList = mysqli_real_escape_string($conn, $column[16]);
            }
            $needOther = "";
            if (isset($column[17])) {
                $needOther = mysqli_real_escape_string($conn, $column[17]);
            }
            $kitchenItem = "";
            if (isset($column[18])) {
                $kitchenItem = mysqli_real_escape_string($conn, $column[18]);
            }
            $otherKitchen = "";
            if (isset($column[19])) {
                $otherKitchen = mysqli_real_escape_string($conn, $column[19]);
            }
            $foodItem = "";
            if (isset($column[20])) {
                $foodItem = mysqli_real_escape_string($conn, $column[20]);
            }
            $otherFood = "";
            if (isset($column[21])) {
                $otherFood = mysqli_real_escape_string($conn, $column[21]);
            }
            $fireWood = "";
            if (isset($column[22])) {
                $fireWood = mysqli_real_escape_string($conn, $column[22]);
            }
            $listfire = "";
            if (isset($column[23])) {
                $listfire = mysqli_real_escape_string($conn, $column[23]);
            }
            $note = "";
            if (isset($column[24])) {
                $note = mysqli_real_escape_string($conn, $column[24]);
            }
            $photo = "";
            if (isset($column[25])) {
                $photo = mysqli_real_escape_string($conn, $column[25]);
            }
            $datereported = "";
            if (isset($column[26])) {
                $note = mysqli_real_escape_string($conn, $column[26]);
            }
            $volName = "";
            if (isset($column[27])) {
                $volName = mysqli_real_escape_string($conn, $column[27]);
            }

            // check the date for latest hut updated ['date_last']
            // $dateResult = $db->select("SELECT date_last FROM updateTime");
            // $dateHutUpdated = $dateResult[0]['date_last'];

            //echo ($dateHutUpdated);
            //echo strtotime($datereported);

            //if(strtotime($datereported) > strtotime($dateHutUpdated) {


            // check if hut_name existed
            $existedHuts = $db->select("SELECT hut_name FROM hutInventory where lower(hut_name) = 'lower($hut_name)'");
            //count the row of the existing
            //$hutcount = count($db->select("SELECT hut_name FROM hutInventory"));
            if ($existedHuts != null) {
                $inOrUp = "update";
            } else {
                $inOrUp = "insert";
            }

            // if ($existedHuts != null) {
            //     for ($i = 0; $i < $hutcount; $i++) {
            //         //($hut_name == $existedHuts[$i]['hut_name'])
            //         if (strcasecmp($hut_name, $existedHuts[$i]['hut_name']) == 0) {
            //             $inOrUp = "update";
            //             // return $inOrUp;
            //         }
            //     }
            // }
            switch ($inOrUp) {
                case "update": {
                        $sqlUpdate = "UPDATE hutInventory SET  gasBottle = ?,sleepingBag = ?,needWash = ?, 
                howManyNeed = ?, spareBox = ?, whatNeed = ?, gearBehind = ?, listGear = ?, 
                flyOut = ?, listFlyOut = ?, needAnything = ?, needList = ?, fireWood = ?, listfire = ?,
                photo = ?, note = ?, datereported =? where hut_name = ?";
                        $paramType = "ssssssssssssssssss";
                        $paramArray = array(

                            $gasBottle,
                            $sleepingBag,
                            $needWash,
                            $howManyNeed,
                            $spareBox,
                            $whatNeed,
                            $gearBehind,
                            $listGear,
                            $flyOut,
                            $listFlyOut,
                            $needAnything,
                            $needList,
                            $fireWood,
                            $listfire,
                            $photo,
                            $note,
                            $datereported,
                            $hut_name
                        );
                        $insertId = $db->update($sqlUpdate, $paramType, $paramArray);
                    }
                    break;
                case "insert": {
                        $sqlInsert = "INSERT into hutInventory (hut_name, hut_loc, gasBottle, gasBottle2,sleepingBag, sbAmount, needWash,
                howManyNeed, spareBox, whatNeed, gearBehind, listGear, flyOut, listFlyOut, needAnything,
                needList, needOther, kitchenItem, otherKitchen, foodItem, otherFood, fireWood, listfire, note, photo,datereported, volName)
                   values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                        $paramType = "ssssssssssssssssss";
                        $paramArray = array(
                            $hut_name,
                            $gasBottle,
                            $sleepingBag,
                            $needWash,
                            $howManyNeed,
                            $spareBox,
                            $whatNeed,
                            $gearBehind,
                            $listGear,
                            $flyOut,
                            $listFlyOut,
                            $needAnything,
                            $needList,
                            $fireWood,
                            $listfire,
                            $photo,
                            $note,
                            $datereported
                        );
                        $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
                    }
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
            border: 1px solid #333;
            color: #000;
            background-color: #ddd;
            font-size: 0.9em;
            width: 100px;
            border-radius: 2px;
            cursor: pointer;
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
            /* margin-left: 300px; */
        }

        .searchExportEmail {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
        }

        .searchExportEmail p {
            margin: 5px;
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
    <h2>MCU huts inventory</h2>



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

            <form class="form-horizontal" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                <div class="input-row">
                    <label class="control-label">Choose CSV
                        File</label> <input type="file" name="file" id="file" accept=".csv">
                    <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
                    <br />

                </div>
            </form>


            <div class="searchExportEmail">
                <form class="form-horizontal" action="" method="POST">
                    Search<input type="text" name="search">
                    Column: <select name="column">
                        <option value="hut_name">Hut Name</option>
                        <option value="gasBottle">Gas Bottle Left</option>
                        <option value="sleepingBag">Sleeping bag(s)</option>
                        <option value="needWash">Need Wash?</option>
                        <option value="howManyNeed">How many?</option>
                        <option value="spareBox">Spare Box</option>
                        <option value="whatNeed">What is needed?</option>
                        <option value="gearBehind">Gear Behind?</option>
                        <option value="listGear">List of Gears</option>
                        <option value="flyOut">Anything to flyout?</option>
                        <option value="listFlyOut">List of flyouts</option>
                        <option value="needAnything">Need anything?</option>
                        <option value="needList">List what is needed</option>
                        <option value="fireWood">Any Firewood?</option>
                        <option value="listfire">List Firestuffs</option>
                        <option value="photo">Photo</option>
                        <option value="note">Note</option>
                    </select>
                    <button type="submit" id="btnsearch" name="btnsearch" class="btn-search">Search</button>
                    <button type="submit" value="" id="btnreset" name="btnreset" class="btn-submit">See All</button>
                </form>
                <div>
                    <!-- link to download -->
                    <a href="#" class="export" onclick="download_table_as_csv('userTable');">Download as CSV</a>
                </div>

                <!-- form to enter email -->
                <form method="post">
                    <p>Email Inventory To</p>
                    <input type="text" name="email">
                    <input type="text" hidden name="csv">
                    <input type="submit" name="submitEmail" value="Send">
                </form>
            </div>

        </div>

        <!-- send email -->
        <?php
        if (isset($_REQUEST['submitEmail'])) {

            $to = $_POST['email'];
            //'yourmailid@gmail.com'
            $subject = "MCU hut inventory";
            // Get HTML contents from file
            //$htmlContent = file_get_contents("template.html");


            // Set content-type for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // Additional headers
            // $headers .= 'From: discussdesk<discussdesk@gmail.com>' . "\r\n";
            // $headers .= 'Cc: discussdesk@gmail.com ' . "\r\n";

            // Send email
            if (mail($to, $subject, $htmlContent, $headers)) {
                echo 'Email has sent successfully.';
            } else {

                echo 'Some problem occurred, please try again.';
            }
        }

        ?>

        <?php
        if (isset($_POST['search'])) {
            $sqlSelect = "SELECT * FROM hutInventory where $column like '%$search%'";
        } else {
            $sqlSelect = "SELECT * FROM hutInventory";
        }
        $result = $db->select($sqlSelect);

        if (!empty($result)) {

        ?>
            <table id='userTable'>
                <thead>
                    <tr>
                        <th>Hut name</th>
                        <th>Gas Bottle Left</th>
                        <th>Sleeping Bag</th>
                        <th>Need Wash?</th>
                        <th>How Many Need</th>
                        <th>Spare Box</th>
                        <th>What is Needed?</th>
                        <th>Gear Behind?</th>
                        <th>Gear List</th>
                        <th>Need Fly Out</th>
                        <th>Fly Out List</th>
                        <th>Need Anything?</th>
                        <th>Need List</th>
                        <th>Need FireWood?</th>
                        <th>Fire stuffs list</th>
                        <th>Photo</th>
                        <th>Note</th>
                        <th>Date</th>


                    </tr>
                </thead>
                <?php

                foreach ($result as $row) {
                ?>

                    <tbody>
                        <tr>
                            <td><?php echo $row['hut_name']; ?></td>
                            <td><?php echo $row['gasBottle']; ?></td>
                            <td><?php echo $row['sleepingBag']; ?></td>
                            <td><?php echo $row['needWash']; ?></td>
                            <td><?php echo $row['howManyNeed']; ?></td>
                            <td><?php echo $row['spareBox']; ?></td>
                            <td><?php echo $row['whatNeed']; ?></td>
                            <td><?php echo $row['gearBehind']; ?></td>
                            <td><?php echo $row['listGear']; ?></td>
                            <td><?php echo $row['flyOut']; ?></td>
                            <td><?php echo $row['listFlyOut']; ?></td>
                            <td><?php echo $row['needList']; ?></td>
                            <td><?php echo $row['fireWood']; ?></td>
                            <td><?php echo $row['listfire']; ?></td>
                            <td><?php echo $row['listGear']; ?></td>
                            <td><a href="<?php echo $row['photo']; ?>"><?php echo $row['photo']; ?></a></td>
                            <td><?php echo $row['note']; ?></td>
                            <td><?php echo $row['datereported']; ?></td>

                        </tr>
                    <?php
                }

                    ?>
                    </tbody>
            </table>
            <table id="header-fixed"></table>
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
            // col_5: 'select',
            // col_6: 'select',
            // col_7: 'select',
            // col_8: 'select',
            // col_9: 'select',
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
                'string', 'string'
            ],
            col_widths: [
                '100px', '100px', '100px',
                '100px', '100px', '100px',
                '100px', '100px', '100px', '100px',
                '100px', '100px', '100px',
                '100px', '100px', '260px',
                '100px', '100px'
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