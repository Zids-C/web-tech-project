<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="/web-tech-project/view/Secure_log_reg/styles.css">
</head>
<body>
    <div class="forgot-password-container">
        <form id="forgotPasswordForm" action="fr_pass.php" method="post">
            <div class="form-header">
                <h1>Forgot Password?</h1>
                <p>Enter your email address below and we'll send you a link to reset your password.</p>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="your@email.com" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                <p id="email-error" class="error-message">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (empty($_POST['email'])) {
                            echo "Email address is required";
                        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                            echo "Please enter a valid email address";
                        }
                    }
                    ?>
                </p>
            </div>
            
            <button type="submit" class="submit-btn">Send Reset Link</button>
            
            <div class="form-footer">
                <p>Remember your password? <a href="/web-tech-project/Controller/secure_log_reg.php?action=login">Sign in</a></p>
                <p>Don't have an account? <a href="/web-tech-project/Controller/secure_log_reg.php?action=signup">Sign up</a></p>
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