<?php
session_start();
require_once '../../Model/UserModel.php';
require_once '../../Model/db.php';

if (!isset($_SESSION['user_email'])) {
    header("Location: /web-tech-project/View/Secure_log_reg/login.php");
    exit();
}

$database = new Database();
$userModel = new UserModel($database);
$error = '';
$success = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentPassword = $_POST['currentPassword'] ?? '';
    $newPassword = $_POST['newPassword'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';
    $email = $_SESSION['user_email'];

    // Validate inputs
    if (empty($currentPassword)) {
        $error = 'Current password is required';
    } elseif (empty($newPassword)) {
        $error = 'New password is required';
    } elseif (strlen($newPassword) < 8) {
        $error = 'Password must be at least 8 characters long';
    } elseif ($newPassword !== $confirmPassword) {
        $error = 'Passwords do not match';
    } else {
        // Verify current password
        $user = $userModel->getUserByEmail($email);
        if ($user && password_verify($currentPassword, $user['password'])) {
            // Update password
            if ($userModel->updatePassword($email, $newPassword)) {
                $success = 'Password changed successfully!';
            } else {
                $error = 'Failed to update password. Please try again.';
            }
        } else {
            $error = 'Current password is incorrect';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="profile_styles.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <h1>Change Password</h1>
            <div class="profile-actions">
                <a href="view_profile.php" class="btn secondary">Back to Profile</a>
            </div>
        </div>

        <?php if ($error): ?>
            <div class="alert error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="alert success"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>

        <form id="changePasswordForm" class="profile-form" method="POST">
            <div class="form-group">
                <label for="currentPassword">Current Password</label>
                <input type="password" id="currentPassword" name="currentPassword" required>
            </div>

            <div class="form-group">
                <label for="newPassword">New Password</label>
                <input type="password" id="newPassword" name="newPassword" required>
                <div class="password-hint">Must be at least 8 characters long</div>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm New Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn">Update Password</button>
                <a href="view_profile.php" class="btn secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>