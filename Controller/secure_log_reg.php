<?php
session_start();

// Include the model files
require_once '../Model/db.php';
require_once '../Model/UserModel.php';

class AuthController {
    private $userModel;

    public function __construct() {
        // Initialize the database connection and user model
        $database = new Database();
        $this->userModel = new UserModel($database);
    }

    // Handle login
    public function login() {
        $remember_email = $_COOKIE['remember_email'] ?? '';
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $remember = isset($_POST['remember']);
            
            // Validate email
            $email_error = $this->validateEmail($email);
            
            // Validate password
            $password_error = $this->validatePassword($password);
            
            // If validation passes
            if (empty($email_error) && empty($password_error)) {
                // Authenticate user
                $user = $this->userModel->authenticate($email, $password);
                
                if ($user) {
                    // Set cookie if "Remember Me" is checked
                    $this->handleRememberMe($remember, $email);
                    
                    $_SESSION['user_email'] = $email;
                    header("Location: /web-tech-project/View/Secure_log_reg/dashboard.php");
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
            $errors = $this->validateSignupData($data);
            
            // If validation passes
            if (empty($errors)) {
                if ($this->userModel->createUser($data)) {
                    return ['success' => true];
                }
                $errors['general_error'] = "Registration failed. Please try again.";
            }
            
            return array_merge($data, $errors);
        }
        
        return [];
    }

    // Handle forgot password
    public function forgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $email_error = $this->validateEmail($email);
            
            if (empty($email_error)) {
                // Check if email exists
                if ($this->userModel->emailExists($email)) {
                    // In a real app, send reset link here
                    return ['success' => true, 'email' => $email];
                }
                $email_error = "No account found with this email";
            }
            
            return ['email' => $email, 'email_error' => $email_error];
        }
        
        return [];
    }

    // Handle reset password
    public function resetPassword() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'email' => $_POST['email'] ?? '',
                'new_password' => $_POST['new_password'] ?? '',
                'confirm_password' => $_POST['confirm_password'] ?? ''
            ];
            
            // Validate data
            $errors = $this->validateResetData($data);
            
            // If validation passes
            if (empty($errors)) {
                if ($this->userModel->updatePassword($data['email'], $data['new_password'])) {
                    return array_merge($data, ['success' => true]);
                }
                $errors['general_error'] = "Password reset failed. Please try again.";
            }
            
            return array_merge($data, $errors);
        }
        
        return [];
    }

    // ==================== HELPER METHODS ====================
    
    private function validateEmail(string $email): string {
        if (empty($email)) {
            return "Email can't be empty!";
        }
        if (strpos($email, ' ') !== false) {
            return "Email can't contain spaces!";
        }
        if (substr_count($email, '@') != 1) {
            return "Email must contain @!";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Please enter a valid email address";
        }
        return '';
    }

    private function validatePassword(string $password): string {
        if (empty($password)) {
            return "Password cannot be empty!";
        }
        if (strlen($password) < 6) {
            return "Password must be at least 6 characters!";
        }
        return '';
    }

    private function validateSignupData(array $data): array {
        $errors = [];
        $required = ['first_name', 'last_name', 'email', 'password', 'confirm_password'];
        
        foreach ($required as $field) {
            if (empty($data[$field])) {
                $errors[$field . '_error'] = ucfirst(str_replace('_', ' ', $field)) . " is required!";
            }
        }
        
        if (!empty($data['email'])) {
            $emailError = $this->validateEmail($data['email']);
            if ($emailError) {
                $errors['email_error'] = $emailError;
            }
        }
        
        if (!empty($data['password']) && strlen($data['password']) < 8) {
            $errors['password_error'] = "Password must be at least 8 characters!";
        }
        
        if (!empty($data['password']) && $data['password'] !== $data['confirm_password']) {
            $errors['confirm_password_error'] = "Passwords don't match!";
        }
        
        return $errors;
    }

    private function validateResetData(array $data): array {
        $errors = [];
        
        if (empty($data['email'])) {
            $errors['email_error'] = "Email address is required";
        } else {
            $emailError = $this->validateEmail($data['email']);
            if ($emailError) {
                $errors['email_error'] = $emailError;
            }
        }
        
        if (empty($data['new_password'])) {
            $errors['password_error'] = "Password is required";
        } elseif (strlen($data['new_password']) < 8) {
            $errors['password_error'] = "Password must be at least 8 characters";
        }
        
        if (empty($data['confirm_password'])) {
            $errors['confirm_password_error'] = "Please confirm your password";
        } elseif ($data['new_password'] !== $data['confirm_password']) {
            $errors['confirm_password_error'] = "Passwords do not match";
        }
        
        return $errors;
    }

    private function handleRememberMe(bool $remember, string $email): void {
        if ($remember) {
            setcookie('remember_email', $email, time() + (30 * 24 * 60 * 60), '/');
        } elseif (isset($_COOKIE['remember_email'])) {
            setcookie('remember_email', '', time() - 3600, '/');
        }
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
    case 'verify-code':
        $data = $controller->resetPassword();
        require '../view/Secure_log_reg/.php';
        break;
    default:
        header("Location: ../view/Secure_log_reg/login.php");
        exit();
}