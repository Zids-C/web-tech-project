<?php
session_start();
require_once __DIR__ . "/../../Controller/pass_reset_con.php";

// Verify user has gone through the proper verification flow
if (!isset($_SESSION['code_verified']) || !$_SESSION['code_verified'] || !isset($_SESSION['reset_email'])) {
    header('Location: fr_pass.php');
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    if (empty($new_password)) {
        $data['password_error'] = 'Password is required';
    } elseif (strlen($new_password) < 8) {
        $data['password_error'] = 'Password must be at least 8 characters';
    }
    
    if (empty($confirm_password)) {
        $data['confirm_password_error'] = 'Please confirm your password';
    } elseif ($new_password !== $confirm_password) {
        $data['confirm_password_error'] = 'Passwords do not match';
    }
    
    if (empty($data['password_error']) && empty($data['confirm_password_error'])) {
        // In a real application, you would update the password in the database here
        // For demonstration, we'll just show a success message
        
        $data['success'] = true;
        pass_reset_con::clearResetSession();
    }
}

$email = $_SESSION['reset_email'];
?>
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
        <form id="passwordResetForm" action="" method="post">
            <div class="form-header">
                <h1>Reset Your Password</h1>
                <p>Enter your new password</p>
            </div>
            
            <!-- Hidden email field since we already have it from session -->
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
            
            <div class="form-group">
                <label for="new-password">New Password</label>
                <input type="password" id="new-password" name="new_password" required 
                       placeholder="Enter new password (min 8 characters)"
                       pattern=".{8,}" title="Password must be at least 8 characters">
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
                <script>
                    alert('Password has been reset successfully!');
                    window.location.href = '/web-tech-project/Controller/secure_log_reg.php?action=login';
                </script>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>