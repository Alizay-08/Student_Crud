<?php
include 'session.php';
include 'connection.php';

$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM students");
$row = mysqli_fetch_assoc($result);
$totalStudents = $row['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card p-4">
        <h2>Welcome, <?= $_SESSION['user']; ?>!</h2>
        <p class="lead">This is your admin dashboard.</p>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card bg-primary text-white text-center p-3">
                    <h4>Total Students</h4>
                    <h2><?= $totalStudents; ?></h2>
                </div>
            </div>
            <div class="col-md-8">
                <a href="add.php" class="btn btn-success w-100 my-2">➕ Add New Student</a>
                <a href="index.php" class="btn btn-dark w-100 my-2">📋 View All Students</a>
                <a href="logout.php" class="btn btn-danger w-100 my-2">🚪 Logout</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
