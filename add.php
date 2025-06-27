<?php
include 'session.php';
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $insert = mysqli_query($conn, "INSERT INTO students (name, email, phone) VALUES ('$name', '$email', '$phone')");

    if ($insert) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Failed to add student.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">

<h2>Add Student</h2>

<form method="POST" class="mb-3">
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Add Student</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
</form>

<?php if (isset($error)) echo "<div class='text-danger'>$error</div>"; ?>

</div>
</body>
</html>
