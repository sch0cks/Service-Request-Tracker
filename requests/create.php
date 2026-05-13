<?php
session_start();
include('../config/db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $department = $_POST['department'];
    $priority = $_POST['priority'];

    mysqli_query($conn, "
        INSERT INTO ServiceRequests 
        (user_id, department_id, priority_id, status_id, title, description)
        VALUES
        ('$user_id', '$department', '$priority', 1, '$title', '$description')
    ");

    header("Location: list.php");
    exit();
}

include('../layout/sidebar.php');
?>

<h2>Create Request</h2>

<form method="POST" class="dark-panel">

    <input type="text" name="title" class="form-control mb-2" placeholder="Title" required>

    <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>

    <select name="department" class="form-control mb-2">
        <option value="1">IT</option>
        <option value="2">Maintenance</option>
        <option value="3">Customer Service</option>
    </select>

    <select name="priority" class="form-control mb-3">
        <option value="1">Low</option>
        <option value="2">Medium</option>
        <option value="3">High</option>
    </select>

    <button class="btn btn-primary">Submit</button>

</form>

<?php include('../layout/footer.php'); ?>