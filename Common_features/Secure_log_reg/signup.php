<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Interface</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form id="auth" action="signup.php" method="post">
        <fieldset>
            <legend>Create Your Account</legend>
            <table>
                <tr>
                    <td colspan="2">
                        <h2>Join Us Today</h2>
                        <p>Already have an account? <a href="login.php">Login here</a></p>
                    </td>
                </tr>
                <tr>
                    <td><label for="first-name">First Name:</label></td>
                    <td>
                        <input type="text" id="first-name" name="first_name" required value="<?php echo isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : ''; ?>">
                        <p id="first-name-msg" class="error-msg">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['first_name'])) {
                                echo "First name is required!";
                            }
                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="last-name">Last Name:</label></td>
                    <td>
                        <input type="text" id="last-name" name="last_name" required value="<?php echo isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name']) : ''; ?>">
                        <p id="last-name-msg" class="error-msg">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['last_name'])) {
                                echo "Last name is required!";
                            }
                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="address">Address:</label></td>
                    <td>
                        <input type="text" id="address" name="address" required value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>">
                        <p id="address-msg" class="error-msg">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['address'])) {
                                echo "Address is required!";
                            }
                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="occupation">Occupation:</label></td>
                    <td>
                        <input type="text" id="occupation" name="occupation" value="<?php echo isset($_POST['occupation']) ? htmlspecialchars($_POST['occupation']) : ''; ?>">
                        <p id="occupation-msg" class="error-msg"></p>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td>
                        <input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                        <p id="email-msg" class="error-msg">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if (empty($_POST['email'])) {
                                    echo "Email can't be empty!";
                                } elseif (strpos($_POST['email'], ' ') !== false) {
                                    echo "Email can't contain spaces!";
                                } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                    echo "Please enter a valid email address";
                                }
                            }
                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td>
                        <input type="password" id="password" name="password" required>
                        <p id="password-msg" class="error-msg">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if (empty($_POST['password'])) {
                                    echo "Password cannot be empty!";
                                } elseif (strlen($_POST['password']) < 8) {
                                    echo "Password must be at least 8 characters!";
                                }
                            }
                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="confirm-password">Confirm Password:</label></td>
                    <td>
                        <input type="password" id="confirm-password" name="confirm_password" required>
                        <p id="confirm-password-msg" class="error-msg">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if ($_POST['password'] !== $_POST['confirm_password']) {
                                    echo "Passwords don't match!";
                                }
                            }
                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Create Account">
                        <p id="validation-msg" class="error-msg">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $valid = true;
                                
                                // Check all required fields
                                $required = ['first_name', 'last_name', 'address', 'email', 'password', 'confirm_password'];
                                foreach ($required as $field) {
                                    if (empty($_POST[$field])) {
                                        $valid = false;
                                        break;
                                    }
                                }
                                
                                // Additional validations
                                if ($valid && strpos($_POST['email'], ' ') !== false) $valid = false;
                                if ($valid && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $valid = false;
                                if ($valid && strlen($_POST['password']) < 8) $valid = false;
                                if ($valid && $_POST['password'] !== $_POST['confirm_password']) $valid = false;
                                
                                if ($valid) {
                                    echo "<span style='color:green;'>Account created successfully!</span>";
                                    // Here you would typically save the data to a database
                                }
                            }
                            ?>
                        </p>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>