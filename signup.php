<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$address = $_POST['address'];
$nid = $_POST['nid'];
$organ = $_POST['organ'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, age, address, nid, organ, password)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssissss", $name, $email, $age, $address, $nid, $organ, $password);

if ($stmt->execute()) {
  echo "Registered successfully.";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
