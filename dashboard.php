<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rtbms";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>RTBMS Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4 fw-bold">RTBMS Dashboard</h1>
    <h3 class="mt-4 mb-3 fw-bold">Blood Donations</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Blood Type</th>
                <th>Quantity</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Donated At</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM blood_donations ORDER BY id DESC";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . (isset($row['name']) ? $row['name'] : '') . "</td>
                        <td>" . (isset($row['blood_type']) ? $row['blood_type'] : '') . "</td>
                        <td>" . (isset($row['quantity']) ? $row['quantity'] : '') . "</td>
                        <td>" . (isset($row['latitude']) ? $row['latitude'] : '') . "</td>
                        <td>" . (isset($row['longitude']) ? $row['longitude'] : '') . "</td>
                        <td>" . (isset($row['donated_at']) ? $row['donated_at'] : '') . "</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No donations found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <h3 class="mt-5 mb-3 fw-bold">Blood Requests</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Blood Type</th>
                <th>Quantity</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Requested At</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM blood_requests ORDER BY id DESC";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . (isset($row['name']) ? $row['name'] : '') . "</td>
                        <td>" . (isset($row['blood_type']) ? $row['blood_type'] : '') . "</td>
                        <td>" . (isset($row['quantity_requested']) ? $row['quantity_requested'] : '') . "</td>
                        <td>" . (isset($row['latitude']) ? $row['latitude'] : '') . "</td>
                        <td>" . (isset($row['longitude']) ? $row['longitude'] : '') . "</td>
                        <td>" . (isset($row['requested_at']) ? $row['requested_at'] : '') . "</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No requests found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
