<?php
session_start();
include('../config/db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

include('../layout/sidebar.php');
?>

<h2>Reports</h2>

<div class="dark-panel">

<?php
$total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM ServiceRequests"));
?>

<p><b>Total Requests:</b> <?= $total['total'] ?></p>

</div>

<?php include('../layout/footer.php'); ?>