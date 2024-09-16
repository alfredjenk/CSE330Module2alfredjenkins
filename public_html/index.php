<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
$uploadDir = __DIR__ . '/uploads/' . $username . '/';

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0700, true); // Ensure user-specific directories are created with appropriate permissions
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $targetFile = $uploadDir . basename($file['name']);

    if ($file['error'] === UPLOAD_ERR_OK && move_uploaded_file($file['tmp_name'], $targetFile)) {
        echo "File uploaded successfully.";
    } else {
        echo "Failed to upload file.";
    }
}

$files = array_diff(scandir($uploadDir), array('.', '..'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File List</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($username); ?></h1>
    <a href="logout.php">Logout</a>
    
    <h2>Upload File</h2>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <input type="submit" value="Upload">
    </form>
    
    <h2>Uploaded Files</h2>
    <ul>
        <?php foreach ($files as $file): ?>
            <li>
                <a href="view.php?file=<?php echo urlencode($file); ?>"><?php echo htmlspecialchars($file); ?></a> 
                <a href="delete.php?file=<?php echo urlencode($file); ?>" onclick="return confirm('Are you sure?')">[Delete]</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
