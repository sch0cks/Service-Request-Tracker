<?php
session_start();
include('../config/db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

include('../layout/sidebar.php');

$query = "
SELECT 
    sr.request_id,
    sr.title,
    u.name,
    d.department_name,
    p.level,
    rs.status_name
FROM ServiceRequests sr
JOIN Users u ON sr.user_id = u.user_id
JOIN Departments d ON sr.department_id = d.department_id
JOIN Priorities p ON sr.priority_id = p.priority_id
JOIN RequestStatus rs ON sr.status_id = rs.status_id
";

$result = mysqli_query($conn, $query);
?>

<h2 class="mb-3">Service Requests</h2>

<a href="create.php" class="btn btn-success mb-3">+ Create Request</a>

<div class="dark-panel table-wrapper">

<table class="table table-hover">
    <thead>
        <tr>
            <th>Title</th>
            <th>User</th>
            <th>Department</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['title'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['department_name'] ?></td>
        <td><?= $row['level'] ?></td>
        <td><?= $row['status_name'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['request_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="delete.php?id=<?= $row['request_id'] ?>" class="btn btn-danger btn-sm">Delete</a>
        </td>
    </tr>
    <?php } ?>

    </tbody>
</table>

</div>

<?php include('../layout/footer.php'); ?>