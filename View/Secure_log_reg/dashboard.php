<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: Secure_log_reg/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="/web-tech-project/view/Secure_log_reg/styles.css">
</head>
<body>
    <div class="form-container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_email']); ?>!</h1>
        <p>You have successfully logged in.</p>
        
        <!-- File Upload Form -->
        <form action="home.php" method="post" enctype="multipart/form-data">
            <h2>Upload a File</h2>
            <input type="file" name="fileToUpload" required>
            <input type="submit" value="Upload File" name="submit">
        </form>
        
        <a href="login.php">Logout</a>
    </div>
</body>
</html>