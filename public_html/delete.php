<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
$file = $_GET['file'];
$filePath = __DIR__ . '/uploads/' . $username . '/' . basename($file);

if (file_exists($filePath)) {
    if (unlink($filePath)) {
        echo "File deleted successfully.";
    } else {
        echo "Error deleting file.";
    }
} else {
    echo "File does not exist.";
}
?>
