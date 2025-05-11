<?php
include 'db.php';

$name = $_POST['name'];
$age = $_POST['age'];
$blood = $_POST['blood'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$nid = $_POST['nid'];
$appointment = $_POST['appointment'];

$sql = "INSERT INTO donations (name, age, blood_group, address, mobile, nid, appointment_date)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sisssss", $name, $age, $blood, $address, $mobile, $nid, $appointment);

if ($stmt->execute()) {
  echo "Donation form submitted.";
} else {
  echo "Error: " . $conn->error;
}
?>
