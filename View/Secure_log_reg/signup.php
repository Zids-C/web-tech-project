<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Interface</title>
    <link rel="stylesheet" href="/web-tech-project/view/Secure_log_reg/styles.css">
</head>
<body>
    <form id="auth" action="../Controller/secure_log_reg.php?action=signup" method="post">
        <fieldset>
            <legend>Create Your Account</legend>
            <table>
                <tr>
                    <td colspan="2">
                        <h2>Join Us Today</h2>
                        <p>Already have an account? <a href="../Controller/secure_log_reg.php?action=login">Login here</a></p>
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
                <!-- Other form fields similarly updated -->
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Create Account">
                        <?php if (isset($data['success']) && $data['success']): ?>
                            <p id="validation-msg" style='color:green;'>Account created successfully!</p>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>