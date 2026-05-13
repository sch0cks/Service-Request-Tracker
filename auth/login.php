<?php

session_start();
include('../config/db.php');

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM Users WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    die("User not found");
}

if (hash('sha256', $password) !== $user['password']) {
    die("Incorrect password");
}


$_SESSION['user_id'] = $user['user_id'];
$_SESSION['name'] = $user['name'];
$_SESSION['role'] = $user['role'];

header("Location: ../dashboard/dashboard.php");
exit();

?>