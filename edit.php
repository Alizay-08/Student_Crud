<?php
include 'session.php';
include 'connection.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
if (mysqli_num_rows($result) == 0) {
    header("Location: index.php");
    exit();
}

$student = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $update = mysqli_query($conn, "UPDATE students SET name='$name', email='$email', phone='$phone' WHERE id=$id");

    if ($update) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Failed to update student.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">

<h2>Edit Student</h2>

<form method="POST" class="mb-3">
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($student['phone']) ?>" class="form-control">
    </div>
    <button type="submit" class="btn btn-warning">Update Student</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
</form>

<?php if (isset($error)) echo "<div class='text-danger'>$error</div>"; ?>

</div>
</body>
</html>
