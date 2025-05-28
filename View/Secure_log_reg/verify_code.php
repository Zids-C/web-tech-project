<?php
require_once __DIR__ . "/../../Controller/pass_reset_con.php";
$data = pass_reset_con::handleVerifyCode();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Reset Code</title>
    <link rel="stylesheet" href="/web-tech-project/view/Secure_log_reg/styles.css">
</head>
<body>
    <div class="forgot-password-container">
        <form id="verifyCodeForm" action="" method="post">
            <div class="form-header">
                <h1>Verify Reset Code</h1>
                <p>We've sent a 6-digit code to <?= htmlspecialchars($data['email'] ?? '') ?></p>
            </div>
            
            <?php if (isset($data['error'])): ?>
                <div class="error-message"><?= htmlspecialchars($data['error']) ?></div>
            <?php endif; ?>
            
            <div class="form-group">
                <label for="verification_code">Verification Code</label>
                <input type="text" id="verification_code" name="verification_code" required
                       placeholder="123456" maxlength="6" pattern="\d{6}"
                       title="6-digit code">
            </div>
            
            <button type="submit" class="submit-btn">Verify Code</button>
            
            <div class="form-footer">
                <p>Didn't receive code? <a href="fr_pass.php?email=<?= urlencode($data['email'] ?? '') ?>">Resend</a></p>
                <p>Remember your password? <a href="/web-tech-project/Controller/secure_log_reg.php?action=login">Sign in</a></p>
            </div>
        </form>
    </div>
</body>
</html>