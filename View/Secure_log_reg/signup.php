<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Interface</title>
    <link rel="stylesheet" href="/web-tech-project/view/Secure_log_reg/styles.css">
</head>
<body>
    <form id="auth" action="/web-tech-project/Controller/secure_log_reg.php?action=signup" method="post">
        <fieldset>
            <legend>Create Your Account</legend>
            <table>
                <tr>
                    <td colspan="2">
                        <h2>Join Us Today</h2>
                        <p>Already have an account? <a href="/web-tech-project/Controller/secure_log_reg.php?action=login">Login here</a></p>
                    </td>
                </tr>
                <tr>
                    <td><label for="first-name">First Name:</label></td>
                    <td>
                        <input type="text" id="first-name" name="first_name" required 
                               value="<?php echo htmlspecialchars($data['first_name'] ?? ''); ?>">
                        <p id="first-name-msg" class="error-msg">
                            <?php echo $data['first_name_error'] ?? ''; ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="last-name">Last Name:</label></td>
                    <td>
                        <input type="text" id="last-name" name="last_name" required 
                               value="<?php echo htmlspecialchars($data['last_name'] ?? ''); ?>">
                        <p id="last-name-msg" class="error-msg">
                            <?php echo $data['last_name_error'] ?? ''; ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td>
                        <input type="email" id="email" name="email" required 
                               value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>">
                        <p id="email-msg" class="error-msg">
                            <?php echo $data['email_error'] ?? ''; ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="address">Address:</label></td>
                    <td>
                        <input type="text" id="address" name="address" 
                               value="<?php echo htmlspecialchars($data['address'] ?? ''); ?>">
                        <p id="address-msg" class="error-msg">
                            <?php echo $data['address_error'] ?? ''; ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td>
                        <input type="password" id="password" name="password" required >
                        <p id="password-msg" class="error-msg">
                            <?php echo $data['password_error'] ?? ''; ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="confirm-password">Confirm Password:</label></td>
                    <td>
                        <input type="password" id="confirm-password" name="confirm_password" required>
                        <p id="confirm-msg" class="error-msg">
                            <?php echo $data['confirm_password_error'] ?? ''; ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Create Account">
                        <?php if (isset($data['success']) && $data['success']): ?>
                            <p id="validation-msg" style='color:green;'>Account created successfully! Redirecting to login page...</p>
                            <script>
                                setTimeout(function() {
                                    window.location.href = "/web-tech-project/Controller/secure_log_reg.php?action=login";
                                }, 3000); 
                            </script>
                        <?php endif; ?>
                        <?php if (isset($data['general_error'])): ?>
                            <p id="error-msg" style='color:red;'><?php echo $data['general_error']; ?></p>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>