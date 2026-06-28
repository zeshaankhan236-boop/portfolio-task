<?php
include 'config.php';
session_start();
if(!isset($_SESSION['user_id'])){
    header('Location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .sidebar {
            min-height: 100vh;
            background: #212529;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px;
        }

        .sidebar a:hover {
            background: #343a40;
        }

        .welcome-card {
            background: linear-gradient(135deg, #0d6efd, #4f9cff);
            color: white;
            border-radius: 15px;
            padding: 25px;
        }

        .stat-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 sidebar p-3">
            <h4 class="text-white text-center mb-4">Dashboard</h4>

            <a href="#">Home</a>
            <a href="#">Profile</a>
            <a href="#">Reports</a>
            <a href="#">Settings</a>
            <a href="login.php">Logout</a>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 p-4">

            <!-- Welcome Section -->
            <div class="welcome-card mb-4">
                <h2><?php
                    echo  $_SESSION['user_name'];
                  ?>
                     👋</h2>
                 
                <p class="mb-0">
                    Have a great day! Here's a quick overview of your dashboard.
                </p>
            </div>

            <!-- Stats -->
            <div class="row g-3">

                <div class="col-md-4">
                    <div class="card stat-card p-3">
                        <h6>Total Users</h6>
                        <h3>1,250</h3>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card stat-card p-3">
                        <h6>Orders</h6>
                        <h3>320</h3>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card stat-card p-3">
                        <h6>Revenue</h6>
                        <h3>$8,450</h3>
                    </div>
                </div>

            </div>

            <!-- Recent Activity -->
            <div class="card mt-4 stat-card">
                <div class="card-header">
                    Recent Activity
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">New user registered</li>
                        <li class="list-group-item">Order #1024 completed</li>
                        <li class="list-group-item">Profile updated</li>
                        <li class="list-group-item">Monthly report generated</li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</div>

</body>
</html>