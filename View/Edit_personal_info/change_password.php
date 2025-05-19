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

        <form id="changePasswordForm" class="profile-form">
            <div class="form-group">
                <label for="currentPassword">Current Password</label>
                <input type="password" id="currentPassword" required>
            </div>

            <div class="form-group">
                <label for="newPassword">New Password</label>
                <input type="password" id="newPassword" required>
                <div class="password-hint">Must be at least 8 characters long</div>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm New Password</label>
                <input type="password" id="confirmPassword" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn">Update Password</button>
                <a href="view_profile.php" class="btn secondary">Cancel</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (newPassword !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }
            
            if (newPassword.length < 8) {
                alert('Password must be at least 8 characters long');
                return;
            }
            
            // In a real app, you would update the password here
            alert('Password changed successfully!');
            window.location.href = 'view_profile.php';
        });
    </script>
</body>
</html>