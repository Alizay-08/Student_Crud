<?php
include 'session.php';
include 'connection.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM students WHERE id=$id");

header("Location: index.php");
exit();
?>
