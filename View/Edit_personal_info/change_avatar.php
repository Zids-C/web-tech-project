<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: /web-tech-project/View/Secure_log_reg/login.php");
    exit();
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
    $targetDir = "uploads/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    
    $fileName = uniqid() . '_' . basename($_FILES['avatar']['name']);
    $targetFile = $targetDir . $fileName;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    // Check if image file is a actual image
    $check = getimagesize($_FILES['avatar']['tmp_name']);
    if ($check === false) {
        die("File is not an image.");
    }
    
    // Check file size (max 2MB)
    if ($_FILES['avatar']['size'] > 2000000) {
        die("Sorry, your file is too large.");
    }
    
    // Allow certain file formats
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }
    
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFile)) {
        $_SESSION['avatar'] = $targetFile;
        header("Location: view_profile.php");
        exit();
    } else {
        die("Sorry, there was an error uploading your file.");
    }
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

        <form method="POST" action="change_avatar.php" enctype="multipart/form-data" class="avatar-upload-container">
            <div class="upload-instructions">
                <p>Upload a new profile picture. We recommend using a square image for best results.</p>
            </div>

            <div class="image-editor">
                <div class="image-preview-container">
                    <img id="image-preview" src="<?php echo isset($_SESSION['avatar']) ? $_SESSION['avatar'] : 'default_avatar.jpg'; ?>" alt="Preview">
                </div>

                <div class="upload-controls">
                    <input type="file" id="file-input" name="avatar" accept="image/*" style="display: none;" required>
                    <button type="button" id="choose-btn" class="btn">Choose Image</button>
                    <button type="submit" id="save-avatar" class="btn primary">Save as Profile Picture</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script>
        document.getElementById('choose-btn').addEventListener('click', function() {
            document.getElementById('file-input').click();
        });

        document.getElementById('file-input').addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('image-preview').src = event.target.result;
                };
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    </script>
</body>
</html>