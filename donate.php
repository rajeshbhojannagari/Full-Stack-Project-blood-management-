<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $blood_type = $_POST['blood_type'];
    $quantity = $_POST['quantity'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $sql = "INSERT INTO blood_donations (name, blood_type, quantity, latitude, longitude) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssidd", $name, $blood_type, $quantity, $latitude, $longitude);
    if ($stmt->execute()) {
        echo "Donation recorded successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>