<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="/web-tech-project/view/Secure_log_reg/styles.css">
</head>
<body>
    <div class="form-container">
        <form id="passwordResetForm" action="/web-tech-project/Controller/secure_log_reg.php?action=reset-password" method="post">
            <div class="form-header">
                <h1>Reset Your Password</h1>
                <p>Enter your email and new password</p>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="Enter your registered email" 
                       value="<?php echo isset($data['email']) ? htmlspecialchars($data['email']) : ''; ?>">
                <p id="email-error" class="error-message">
                    <?php echo $data['email_error'] ?? ''; ?>
                </p>
            </div>
            
            <div class="form-group">
                <label for="new-password">New Password</label>
                <input type="password" id="new-password" name="new_password" required 
                       placeholder="Enter new password (min 8 characters)">
                <p id="password-error" class="error-message">
                    <?php echo $data['password_error'] ?? ''; ?>
                </p>
            </div>
            
            <div class="form-group">
                <label for="confirm-password">Confirm New Password</label>
                <input type="password" id="confirm-password" name="confirm_password" required 
                       placeholder="Confirm your new password">
                <p id="confirm-error" class="error-message">
                    <?php echo $data['confirm_password_error'] ?? ''; ?>
                </p>
            </div>
            
            <button type="submit" class="submit-btn">Reset Password</button>
            
            <div class="form-footer">
                <p>Remember your password? <a href="/web-tech-project/Controller/secure_log_reg.php?action=login">Login here</a></p>
            </div>
            
            <?php if (isset($data['success']) && $data['success']): ?>
                <script>alert('Password has been reset successfully!');</script>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>