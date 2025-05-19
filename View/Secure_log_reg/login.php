<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Interface</title>
    <link rel="stylesheet" href="/web-tech-project/view/Secure_log_reg/styles.css">
</head>
<body tabindex="-1">
    <form id="auth" action="../Controller/secure_log_reg.php?action=login" method="post">
        <fieldset>
            <legend>Event Booking</legend>
            <table>
                <tr>
                    <td colspan="2">
                        <h2>Login to Your Account</h2>
                        <p>Don't have an account? <a href="/web-tech-project/controller/secure_log_reg.php?action=signup">Sign up</a> or <a href="../Controller/secure_log_reg.php?action=reset-password">reset password</a></p>
                    </td>
                </tr>
                <tr>
                    <td><label for="login-email">Email:</label></td>
                    <td>
                        <input type="email" id="login-email" name="email" required 
                               value="<?php echo htmlspecialchars($data['email'] ?? $data['remember_email'] ?? ''); ?>">
                        <p id="email-msg" class="error-msg">
                            <?php echo $data['email_error'] ?? ''; ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="login-password">Password:</label></td>
                    <td>
                        <input type="password" id="login-password" name="password" required>
                        <p id="password-msg" class="error-msg">
                            <?php echo $data['password_error'] ?? ''; ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="remember-me">
                            <input type="checkbox" id="remember" name="remember" <?php echo isset($data['remember']) && $data['remember'] ? 'checked' : ''; ?>>
                            <label for="remember">Remember me</label>
                        </div>
                        <input type="submit" value="Login">
                        <p><a href="../Controller/secure_log_reg.php?action=forgot-password">Forgot Password?</a></p>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>