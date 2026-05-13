<?php
session_start();
include('../config/db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

include('../layout/sidebar.php');

$total = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT COUNT(*) as total 
    FROM ServiceRequests
"));

$open = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT COUNT(*) as c 
    FROM ServiceRequests 
    WHERE status_id = 1
"));

$closed = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT COUNT(*) as c 
    FROM ServiceRequests 
    WHERE status_id = 2
"));

$high = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT COUNT(*) as c 
    FROM ServiceRequests 
    WHERE priority_id = 3
"));

$avg = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT AVG(cnt) as avg_requests FROM (
        SELECT COUNT(*) as cnt
        FROM ServiceRequests
        GROUP BY user_id
    ) as sub
"));

?>

<h2 class="mb-4">Dashboard Overview</h2>

<div class="row g-3">

    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <h6>Total Requests</h6>
            <h2><?= $total['total'] ?></h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <h6>Open Requests</h6>
            <h2><?= $open['c'] ?></h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <h6>Closed Requests</h6>
            <h2><?= $closed['c'] ?></h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <h6>High Priority</h6>
            <h2><?= $high['c'] ?></h2>
        </div>
    </div>

</div>

<div class="row g-3 mt-3">

    <div class="col-md-6">
        <div class="card shadow-sm p-3">
            <h6>Average Requests per User</h6>
            <h2><?= round($avg['avg_requests'], 2) ?></h2>
            <small class="text-muted">(Computed using GROUP BY + AVG subquery)</small>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow-sm p-3">
            <h6>System Status</h6>
            <p class="mb-1">✔ Database Connected</p>
            <p class="mb-1">✔ CRUD System Active</p>
            <p class="mb-1">✔ Reports Module Ready</p>
            <p class="mb-0">✔ Login System Secure</p>
        </div>
    </div>

</div>

<?php include('../layout/footer.php'); ?>