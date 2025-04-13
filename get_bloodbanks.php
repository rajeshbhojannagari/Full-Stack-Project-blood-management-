<?php
header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rtbms";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode([]);
    exit;
}
$sql = "SELECT name, latitude, longitude, address FROM blood_banks";
$result = $conn->query($sql);
$bloodBanks = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bloodBanks[] = $row;
    }
}
echo json_encode($bloodBanks);
$conn->close();
?>
