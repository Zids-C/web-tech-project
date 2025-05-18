<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Interface</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form id="auth" action="login.php" method="post">
        <fieldset>
            <legend>Event Booking</legend>
            <table>
                <tr>
                    <td colspan="2">
                        <h2>Login to Your Account</h2>
                        <p>Don't have an account? <a href="signup.php">Sign up</a> or <a href="res_pass.php">reset password</a></p>
                    </td>
                </tr>
                <tr>
                    <td><label for="login-email">Email:</label></td>
                    <td>
                        <input type="email" id="login-email" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                        <p id="email-msg" class="error-msg">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if (empty($_POST['email'])) {
                                    echo "Email can't be empty!";
                                } elseif (strpos($_POST['email'], ' ') !== false) {
                                    echo "Email can't contain spaces!";
                                } elseif (substr_count($_POST['email'], '@') != 1) {
                                    echo "Email must contain @!";
                                } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                    echo "Please enter a valid email address";
                                }
                            }
                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="login-password">Password:</label></td>
                    <td>
                        <input type="password" id="login-password" name="password" required>
                        <p id="password-msg" class="error-msg">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if (empty($_POST['password'])) {
                                    echo "Password cannot be empty!";
                                } elseif (strlen($_POST['password']) < 6) {
                                    echo "Password must be at least 6 characters!";
                                }
                            }
                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Login">
                        <p><a href="fr_pass.php">Forgot Password?</a></p>
                        <p id="validation-msg" class="error-msg">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $email = $_POST['email'] ?? '';
                                $password = $_POST['password'] ?? '';
                                
                                if (!empty($email) && !empty($password) && 
                                    strpos($email, ' ') === false && 
                                    substr_count($email, '@') == 1 && 
                                    filter_var($email, FILTER_VALIDATE_EMAIL) && 
                                    strlen($password) >= 6) {
                                    
                                    echo "<span style='color:green;'>Login successful!</span>";
                                    $_SESSION['user_email'] = $email;
                                    header("Location: home.php"); 
                                    exit();
                                    
                                }
                            }
                            ?>
                        </p>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>

    <style>
        .error-msg {
            margin: 0;
            font-size: 0.8em;
            height: 1em;
            color: red;
        }
    </style>
</body>
</html>