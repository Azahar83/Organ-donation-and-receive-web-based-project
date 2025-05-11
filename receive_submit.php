(with PDF upload)
<?php
include 'db.php';

$name = $_POST['name'];
$age = $_POST['age'];
$blood = $_POST['blood'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$nid = $_POST['nid'];
$appointment = $_POST['appointment'];

$pdf = $_FILES['documentation']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($pdf);

move_uploaded_file($_FILES['documentation']['tmp_name'], $target_file);

$sql = "INSERT INTO receivers (name, age, blood_group, address, mobile, nid, appointment_date, documentation)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sissssss", $name, $age, $blood, $address, $mobile, $nid, $appointment, $target_file);

if ($stmt->execute()) {
  echo "Receiver form submitted.";
} else {
  echo "Error: " . $conn->error;
}
?>
