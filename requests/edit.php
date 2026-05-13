<?php
session_start();
include('../config/db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $status = $_POST['status'];

    mysqli_query($conn, "
        UPDATE ServiceRequests
        SET status_id='$status'
        WHERE request_id=$id
    ");

    header("Location: list.php");
    exit();
}

include('../layout/sidebar.php');
?>

<h2>Update Status</h2>

<form method="POST" class="dark-panel">

    <select name="status" class="form-control mb-3">
        <option value="1">Open</option>
        <option value="2">Closed</option>
        <option value="3">Pending</option>
    </select>

    <button class="btn btn-success">Update</button>

</form>

<?php include('../layout/footer.php'); ?>