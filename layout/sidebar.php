<?php
if (!isset($_SESSION)) {
    session_start();
}

$current = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Service Tracker</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #0f172a; 
            color: #e5e7eb;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            background: #1f1f1f;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .sidebar a {
            display: block;
            color: #ffffff;
            padding: 12px 18px;
            margin: 6px 12px;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: #dd46003d;
            color: white;
        }

        .active-link {
            background: #dd4600;
            color: white;
        }

        .content {
            margin-left: 240px;
            padding: 25px;
            background: #111111;
            min-height: 100vh;
            color: #e5e7eb;
        }

        .topbar {
            background: #1f1f1f;
            padding: 12px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            color: white;
            box-shadow: 0 2px 6px rgba(0,0,0,0.3);
        }

        .card {
            background: #1f1f1f;
            color: white;
            border: 1px solid #505050;
            border-radius: 12px;
        }

        .table-wrapper {
            background: #111827;
            padding: 15px;
            border-radius: 12px;
            border: 1px solid #1f2937;
        }

        .table {
            color: #e5e7eb !important;
            background: transparent !important;
            margin-bottom: 0;
        }

        .table thead th {
            background: #0a0a0a !important;
            color: white !important;
            border-bottom: 1px solid #374151 !important;
        }

        .table tbody tr {
            background: transparent !important;
            color: #e5e7eb !important;
        }

        .table-hover tbody tr:hover {
            background: #1f2937 !important;
            color: white !important;
        }

        .table td, .table th {
            border-color: #1f2937 !important;
        }

        .table-striped > tbody > tr:nth-of-type(odd) {
            background: transparent !important;
        }
        
        .text-muted {
            color: white !important;
        }

        .dark-panel {
            background: #1f1f1f;
            color: #e5e7eb;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #505050;
        }
    </style>
</head>

<body>

<div class="sidebar">
    <h4>Service Request Tracker</h4>

    <a href="../dashboard/dashboard.php"
       class="<?= $current == 'dashboard.php' ? 'active-link' : '' ?>">
        Dashboard
    </a>

    <a href="../requests/list.php"
       class="<?= $current == 'list.php' ? 'active-link' : '' ?>">
        Requests
    </a>

    <a href="../requests/create.php"
       class="<?= $current == 'create.php' ? 'active-link' : '' ?>">
        Create Request
    </a>

    <a href="../reports/reports.php"
       class="<?= $current == 'reports.php' ? 'active-link' : '' ?>">
        Reports
    </a>

    <a href="../auth/logout.php">
        Logout
    </a>
</div>

<div class="content">

    <div class="topbar">
        Welcome, <b>
        <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest'; ?>
        </b>
    </div>