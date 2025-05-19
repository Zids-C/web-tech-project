<?php
session_start();

class AuthController {
    private $model;

    public function __construct() {
        require_once '../model/UserModel.php';
        $this->model = new UserModel();
    }

    // Handle login
    public function login() {
        $remember_email = isset($_COOKIE['remember_email']) ? htmlspecialchars($_COOKIE['remember_email']) : '';
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $remember = isset($_POST['remember']);
            
            // Validate email
            $email_error = '';
            if (empty($email)) {
                $email_error = "Email can't be empty!";
            } elseif (strpos($email, ' ') !== false) {
                $email_error = "Email can't contain spaces!";
            } elseif (substr_count($email, '@') != 1) {
                $email_error = "Email must contain @!";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_error = "Please enter a valid email address";
            }
            
            // Validate password
            $password_error = '';
            if (empty($password)) {
                $password_error = "Password cannot be empty!";
            } elseif (strlen($password) < 6) {
                $password_error = "Password must be at least 6 characters!";
            }
            
            // If validation passes
            if (empty($email_error) && empty($password_error)) {
                // Set cookie if "Remember Me" is checked
                if ($remember) {
                    setcookie('remember_email', $email, time() + (30 * 24 * 60 * 60), '/');
                } else {
                    if (isset($_COOKIE['remember_email'])) {
                        setcookie('remember_email', '', time() - 3600, '/');
                    }
                }
                
                // Authenticate user (would typically check against database)
                if ($this->model->authenticate($email, $password)) {
                    $_SESSION['user_email'] = $email;
                    header("Location: ../view/home.php");
                    exit();
                } else {
                    $password_error = "Invalid email or password";
                }
            }
            
            // Return to view with errors
            return [
                'email' => $email,
                'remember_email' => $remember_email,
                'email_error' => $email_error,
                'password_error' => $password_error,
                'remember' => $remember
            ];
        }
        
        return [
            'remember_email' => $remember_email,
            'remember' => !empty($remember_email)
        ];
    }

    // Handle signup
    public function signup() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'first_name' => $_POST['first_name'] ?? '',
                'last_name' => $_POST['last_name'] ?? '',
                'address' => $_POST['address'] ?? '',
                'occupation' => $_POST['occupation'] ?? '',
                'email' => $_POST['email'] ?? '',
                'password' => $_POST['password'] ?? '',
                'confirm_password' => $_POST['confirm_password'] ?? ''
            ];
            
            // Validate data
            $errors = [];
            $required = ['first_name', 'last_name', 'address', 'email', 'password', 'confirm_password'];
            
            foreach ($required as $field) {
                if (empty($data[$field])) {
                    $errors[$field . '_error'] = ucfirst(str_replace('_', ' ', $field)) . " is required!";
                }
            }
            
            if (!empty($data['email']) && strpos($data['email'], ' ') !== false) {
                $errors['email_error'] = "Email can't contain spaces!";
            }
            
            if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email_error'] = "Please enter a valid email address";
            }
            
            if (!empty($data['password']) && strlen($data['password']) < 8) {
                $errors['password_error'] = "Password must be at least 8 characters!";
            }
            
            if (!empty($data['password']) && $data['password'] !== $data['confirm_password']) {
                $errors['confirm_password_error'] = "Passwords don't match!";
            }
            
            // If validation passes
            if (empty($errors)) {
                if ($this->model->createUser($data)) {
                    return ['success' => true];
                } else {
                    $errors['general_error'] = "Registration failed. Please try again.";
                }
            }
            
            return array_merge($data, $errors);
        }
        
        return [];
    }

    // Handle forgot password
    public function forgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $email_error = '';
            
            if (empty($email)) {
                $email_error = "Email address is required";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_error = "Please enter a valid email address";
            }
            
            if (empty($email_error)) {
                // In a real app, send reset link here
                return ['success' => true, 'email' => $email];
            }
            
            return ['email' => $email, 'email_error' => $email_error];
        }
        
        return [];
    }

    // Handle reset password
    public function resetPassword() {
        return $this->forgotPassword(); // Similar logic for this example
    }
}

// Route requests
$action = $_GET['action'] ?? '';
$controller = new AuthController();

switch ($action) {
    case 'login':
        $data = $controller->login();
        require '../view/Secure_log_reg/login.php';
        break;
    case 'signup':
        $data = $controller->signup();
        require '../view/Secure_log_reg/signup.php';
        break;
    case 'forgot-password':
        $data = $controller->forgotPassword();
        require '../view/Secure_log_reg/fr_pass.php';
        break;
    case 'reset-password':
        $data = $controller->resetPassword();
        require '../view/Secure_log_reg/res_pass.php';
        break;
    default:
        header("Location: ../view/Secure_log_reg/login.php");
        exit();
}