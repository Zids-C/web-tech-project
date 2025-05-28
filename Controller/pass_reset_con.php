<?php
error_reporting(0);
session_start();
class pass_reset_con {
    public static function handleForgotPassword() {
        $data = [];
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            
            if (empty($email)) {
                $data['error'] = 'Email address is required';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['error'] = 'Please enter a valid email address';
            } else {
                $data = self::generateAndSendCode($email);
                if (isset($data['success'])) {
                    // Store email in session for verification
                    $_SESSION['reset_email'] = $email;
                    $data['redirect_url'] = '/web-tech-project/View/Secure_log_reg/verify_code.php';
                }
            }
        }
        
        return $data;
    }
    
    private static function generateAndSendCode($email) {
        // Generate 6-digit code
        $reset_code = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        
        // Store in session
        $_SESSION['reset_code'] = $reset_code;
        $_SESSION['code_expiry'] = time() + 3600; // 1 hour expiry
        
        return [
            'success' => true, 
            'email' => $email, 
            'code' => $reset_code,
            'message' => 'Reset code generated'
        ];
    }
    
    public static function handleVerifyCode() {
        $data = [];
        
        // Get email from session
        $data['email'] = $_SESSION['reset_email'] ?? '';
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $submittedCode = $_POST['verification_code'] ?? '';
            
            if (empty($submittedCode)) {
                $data['error'] = 'Please enter the verification code';
            } elseif (!isset($_SESSION['reset_code']) || $submittedCode != $_SESSION['reset_code']) {
                $data['error'] = 'Invalid verification code. Please try again.';
            } else {
                // Code is valid
                $_SESSION['code_verified'] = true;
                header('Location: /web-tech-project/View/Secure_log_reg/res_pass.php');
                exit();
            }
        }
        
        return $data;
    }
    
    public static function clearResetSession() {
        unset($_SESSION['reset_code']);
        unset($_SESSION['reset_email']);
        unset($_SESSION['code_expiry']);
        unset($_SESSION['code_verified']);
    }
}
?>