<?php

$search = $_POST['search'];

$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'MCU';

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from ClintonValley where $column like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["trap_line"] . "  " . $row["trap_name"] . "  " . $row["tunnel_types"] .
            $row["internal_baffels"] . "  " . $row["trap_types"] . "  " . $row["trap_types2"] . "  " . $row["lid_securitys"] . "  " .
            $row["box_condition"] . "  " . $row["note"] . "  " . $row["date_reported"] . "<br>";
    }
} else {
    echo "0 records";
}

$conn->close();

?>