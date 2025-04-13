<?php
include 'config.php'; 
$name = $_POST['name'];
$phone = $_POST['phone'];
$blood_type = $_POST['blood_type'];
$quantity = $_POST['quantity'];
$urgency = $_POST['urgency'];
$place = $_POST['place'] ?? null;
$latitude = $_POST['latitude'] ?? null;
$longitude = $_POST['longitude'] ?? null;
$sql = "SELECT SUM(quantity) AS total_donated FROM blood_donations WHERE blood_type = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $blood_type);
$stmt->execute();
$stmt->bind_result($total_donated);
$stmt->fetch();
$stmt->close();
if ($total_donated >= $quantity) {
    $stmt = $conn->prepare("INSERT INTO blood_requests (name, phone, blood_type, quantity_requested, urgency, place, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssissdd", $name, $phone, $blood_type, $quantity, $urgency, $place, $latitude, $longitude);
    if ($stmt->execute()) {
        echo "Your request has been received. You can collect your blood ASAP.";
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    $stmt = $conn->prepare("INSERT INTO blood_requests (name, phone, blood_type, quantity_requested, urgency, place, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssissdd", $name, $phone, $blood_type, $quantity, $urgency, $place, $latitude, $longitude);

    if ($stmt->execute()) {
        echo "Your request is successful. Blood is currently not available, but we will update you once it is available.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
$conn->close();
?>
