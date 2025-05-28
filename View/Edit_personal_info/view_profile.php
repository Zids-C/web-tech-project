<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: Secure_log_reg/login.php");
    exit();
}

// Initialize session variables if not set
if (!isset($_SESSION['full_name'])) $_SESSION['full_name'] = 'Osman';
if (!isset($_SESSION['user_email'])) $_SESSION['email'] = 'user@example.com';
if (!isset($_SESSION['avatar'])) $_SESSION['avatar'] = 'default_avatar.jpg';
if (!isset($_SESSION['user_id'])) $_SESSION['user_id'] = '22-48675-3';
if (!isset($_SESSION['join_date'])) $_SESSION['join_date'] = 'January 2023';
if (!isset($_SESSION['bio'])) $_SESSION['bio'] = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="profile_styles.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <h1>My Profile</h1>
            <div class="profile-actions">
                <a href="edit_profile.php" class="btn">Edit Profile</a>
                <a href="change_password.php" class="btn secondary">Change Password</a>
            </div>
        </div>

        <div class="profile-content">
            <div class="avatar-section">
                <div class="avatar-container">
                    <img src="<?php echo $_SESSION['avatar']; ?>" alt="Profile Picture" id="profile-avatar">
                    <a href="change_avatar.php" class="avatar-edit">Change Photo</a>
                </div>
            </div>

            <div class="profile-details">
                <div class="detail-row">
                    <span class="detail-label">Full Name:</span>
                    <span class="detail-value" id="profile-name"><?php echo htmlspecialchars($_SESSION['full_name']); ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value" id="profile-email"><?php echo htmlspecialchars($_SESSION['user_email']); ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">User ID:</span>
                    <span class="detail-value" id="profile-id"><?php echo htmlspecialchars($_SESSION['user_id']); ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Member Since:</span>
                    <span class="detail-value" id="profile-join-date"><?php echo htmlspecialchars($_SESSION['join_date']); ?></span>
                </div>
                <br>
                <br>
                <a href="../Secure_log_reg/dashboard.php" class="btn">Dashboard</a>
                <?php if (!empty($_SESSION['bio'])): ?>
                <div class="detail-row">
                    <span class="detail-label">Bio:</span>
                    <span class="detail-value" id="profile-bio"><?php echo htmlspecialchars($_SESSION['bio']); ?></span>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>