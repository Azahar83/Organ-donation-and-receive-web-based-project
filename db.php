<?php
$host = 'localhost';
$user = 'root';
$password = ''; // change if using password
$db = 'organ_donation';

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
