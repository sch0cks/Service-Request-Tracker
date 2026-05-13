<?php

$conn = mysqli_connect("localhost", "root", "", "service_tracker");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>