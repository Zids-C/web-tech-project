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
                <a href="edit_profile.html" class="btn">Edit Profile</a>
                <a href="change_password.html" class="btn secondary">Change Password</a>
            </div>
        </div>

        <div class="profile-content">
            <div class="avatar-section">
                <div class="avatar-container">
                    <img src="default_avatar.jpg" alt="Profile Picture" id="profile-avatar">
                    <a href="change_avatar.html" class="avatar-edit">Change Photo</a>
                </div>
            </div>

            <div class="profile-details">
                <div class="detail-row">
                    <span class="detail-label">Full Name:</span>
                    <span class="detail-value" id="profile-name">Osman</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value" id="profile-email">user@example.com</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">User ID:</span>
                    <span class="detail-value" id="profile-id">22-48675-3</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Member Since:</span>
                    <span class="detail-value" id="profile-join-date">January 2023</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>