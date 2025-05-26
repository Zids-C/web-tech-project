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
    <title>Change Profile Picture</title>
    <link rel="stylesheet" href="profile_styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <h1>Change Profile Picture</h1>
            <div class="profile-actions">
                <a href="view_profile.php" class="btn secondary">Cancel</a>
            </div>
        </div>

        <div class="avatar-upload-container">
            <div class="upload-instructions">
                <p>Upload a new profile picture. We recommend using a square image for best results.</p>
            </div>

            <div class="image-editor">
                <div class="image-preview-container">
                    <img id="image-preview" src="default_avatar.jpg" alt="Preview">
                </div>

                <div class="upload-controls">
                    <input type="file" id="file-input" accept="image/*" style="display: none;">
                    <button id="choose-btn" class="btn">Choose Image</button>
                    <button id="crop-btn" class="btn primary" disabled>Apply Crop</button>
                </div>
            </div>

            <div class="form-actions">
                <button id="save-avatar" class="btn" disabled>Save as Profile Picture</button>
                <a href="view_profile.php" class="btn secondary">Cancel</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script>
        // JavaScript for image cropping functionality would go here
        // This would handle file selection, cropping, and saving
    </script>
</body>
</html>