<?php
include 'config.php';
$donated = [];
$sql1 = "SELECT blood_type, SUM(quantity) as total_donated FROM blood_donations GROUP BY blood_type";
$result1 = $conn->query($sql1);
while ($row = $result1->fetch_assoc()) {
    $donated[$row['blood_type']] = $row['total_donated'];
}
$requested = [];
$sql2 = "SELECT blood_type, SUM(quantity_requested) as total_requested FROM blood_requests GROUP BY blood_type";
$result2 = $conn->query($sql2);
while ($row = $result2->fetch_assoc()) {
    $requested[$row['blood_type']] = $row['total_requested'];
}
$request_status = [];
$sql3 = "SELECT blood_type, status FROM blood_requests";
$result3 = $conn->query($sql3);
while ($row = $result3->fetch_assoc()) {
    $request_status[$row['blood_type']] = $row['status'];
}
$blood_types = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Blood Stock Status</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
  <h1 class="text-3xl font-bold text-center text-red-700 mb-6">Blood Stock vs Requests</h1>
  <div class="max-w-4xl mx-auto bg-white shadow-lg rounded p-6">
    <table class="w-full text-center border">
      <thead class="bg-red-600 text-white">
        <tr>
          <th class="p-2">Blood Type</th>
          <th class="p-2">Donated Units</th>
          <th class="p-2">Requested Units</th>
          <th class="p-2">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($blood_types as $type): 
          $don = $donated[$type] ?? 0;
          $req = $requested[$type] ?? 0;
          $status = $don >= $req ? "Sufficient" : "Insufficient";
          $statusColor = $don >= $req ? "text-green-600" : "text-red-600 font-bold";
          $request_msg = isset($request_status[$type]) ? $request_status[$type] : "Not Requested Yet";
        ?>
        <tr class="border-b">
          <td class="p-2"><?= htmlspecialchars($type) ?></td>
          <td class="p-2"><?= $don ?> ml</td>
          <td class="p-2"><?= $req ?> ml</td>
          <td class="p-2 <?= $statusColor ?>"><?= $status ?> - <?= $request_msg ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
<?php $conn->close(); ?>