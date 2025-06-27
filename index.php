<?php
include 'session.php';
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">

<h2 class="mb-4">
    Welcome <?= $_SESSION['user']; ?>
    <a href="logout.php" class="btn btn-danger btn-sm float-end">Logout</a>
</h2>

<a href="add.php" class="btn btn-primary mb-3">+ Add New Student</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM students");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['phone']}</td>
            <td>
                <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Delete this student?\");'>Delete</a>
            </td>
        </tr>";
    }
    ?>
    </tbody>
</table>

</div>
</body>
</html>
