<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: /web-tech-project/View/Secure_log_reg/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Settings</title>
    <link rel="stylesheet" href="notification_styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="settings-container">
        <div class="settings-header">
            <h1><i class="fas fa-cog"></i> Notification Settings</h1>
            <a href="notification_center.php" class="btn back-btn">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>

        <div class="settings-content">
            <div class="settings-section">
                <h2>Notification Preferences</h2>
                <div class="preference-item">
                    <div class="preference-info">
                        <h3>Email Notifications</h3>
                        <p>Receive notifications via email</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="preference-item">
                    <div class="preference-info">
                        <h3>Push Notifications</h3>
                        <p>Receive notifications on your device</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="preference-item">
                    <div class="preference-info">
                        <h3>In-App Notifications</h3>
                        <p>Show notifications within the application</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <div class="settings-section">
                <h2>Notification Types</h2>
                <div class="preference-item">
                    <div class="preference-info">
                        <h3>New Messages</h3>
                        <p>When you receive new messages</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="preference-item">
                    <div class="preference-info">
                        <h3>New Followers</h3>
                        <p>When someone follows you</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="preference-item">
                    <div class="preference-info">
                        <h3>Comments</h3>
                        <p>When someone comments on your posts</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="preference-item">
                    <div class="preference-info">
                        <h3>Reminders</h3>
                        <p>Event and schedule reminders</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="settings-footer">
            <button class="btn save-btn">Save Changes</button>
            <button class="btn secondary reset-btn">Reset to Defaults</button>
        </div>
    </div>

    <script>
        // Save settings functionality
        document.querySelector('.save-btn').addEventListener('click', function() {
            alert('Notification settings saved successfully!');
            window.location.href = 'notification_center.php';
        });

        // Reset to defaults
        document.querySelector('.reset-btn').addEventListener('click', function() {
            document.querySelectorAll('.switch input').forEach(checkbox => {
                checkbox.checked = true;
            });
        });
    </script>
</body>
</html>