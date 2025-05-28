<?php
require_once __DIR__ . "/../../Controller/pass_reset_con.php";
$data = pass_reset_con::handleForgotPassword();
?>

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
        <form id="forgotPasswordForm" action="" method="post">
            <div class="form-header">
                <h1>Forgot Password?</h1>
                <p>Enter your email address below to receive a reset code.</p>
            </div>
            
            <?php if (isset($data['error'])): ?>
                <div class="error-message"><?= htmlspecialchars($data['error']) ?></div>
            <?php endif; ?>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required 
                       placeholder="your@email.com" 
                       value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
            </div>
            
            <button type="submit" class="submit-btn">Send Reset Code</button>
            
            <?php if (isset($data['success']) && isset($data['redirect_url'])): ?>
                <script>
                    alert('Your password reset code is: <?php echo $data['code']; ?>\n\nThis code will expire in 1 hour.');
                    window.location.href = '<?php echo $data['redirect_url']; ?>';
                </script>
            <?php endif; ?>
            
            <div class="form-footer">
                <p>Remember your password? <a href="/web-tech-project/Controller/secure_log_reg.php?action=login">Sign in</a></p>
            </div>
        </form>
    </div>
</body>
</html>