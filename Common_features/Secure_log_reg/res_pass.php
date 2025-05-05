<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="password-reset-container">
        <form id="passwordResetForm" action="res_pass.php" method="post">
            <div class="form-header">
                <h1>Reset Your Password</h1>
                <p>Enter your email and we'll send you a link to reset your password</p>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="Enter your registered email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                <p id="email-error" class="error-message">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (empty($_POST['email'])) {
                            echo "Email is required";
                        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                            echo "Please enter a valid email address";
                        }
                    }
                    ?>
                </p>
            </div>
            
            <button type="submit" class="submit-btn">Send Reset Link</button>
            
            <div class="form-footer">
                <p>Remember your password? <a href="login.php">Login here</a></p>
            </div>
            
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                echo '<script>alert("Password reset link has been sent to your email!");</script>';
                // In a real application, you would send the reset link here
            }
            ?>
        </form>
    </div>
</body>
</html>