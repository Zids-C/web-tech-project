<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: /web-tech-project/View/Secure_log_reg/login.php");
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['full_name'] = $_POST['fullName'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['bio'] = $_POST['bio'];
    header("Location: view_profile.php");
    exit();
}

// Initialize session variables if not set
if (!isset($_SESSION['full_name'])) $_SESSION['full_name'] = 'Osman';
if (!isset($_SESSION['email'])) $_SESSION['email'] = 'user@example.com';
if (!isset($_SESSION['bio'])) $_SESSION['bio'] = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="profile_styles.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <h1>Edit Profile</h1>
            <div class="profile-actions">
                <a href="view_profile.php" class="btn secondary">Cancel</a>
            </div>
        </div>

        <form id="editProfileForm" class="profile-form" method="POST" action="edit_profile.php">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" id="fullName" name="fullName" required placeholder="Name" value="<?php echo htmlspecialchars($_SESSION['full_name']); ?>">
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="your@email.com" value="<?php echo htmlspecialchars($_SESSION['email']); ?>">
            </div>

            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea id="bio" name="bio" rows="4" required placeholder="about yourself"><?php echo htmlspecialchars($_SESSION['bio']); ?></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn">Save Changes</button>
                <a href="view_profile.php" class="btn secondary">Discard Changes</a>
            </div>
        </form>
    </div>
</body>
</html>