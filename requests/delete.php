<?php
include('../config/db.php');

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM ServiceRequests WHERE request_id=$id");

header("Location: list.php");
exit();
?>