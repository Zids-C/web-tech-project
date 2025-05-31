document.addEventListener('DOMContentLoaded', function() {
    // Forgot password form validation
    const forgotPasswordForm = document.getElementById('forgotPasswordForm');
    if (forgotPasswordForm) {
        forgotPasswordForm.addEventListener('submit', function(e) {
            const emailInput = document.getElementById('email');
            const email = emailInput ? emailInput.value.trim() : '';
            let isValid = true;
            
            
            clearError('email-error');
            
            // Email validation
            if (!email) {
                displayError('email-error', 'Email address is required');
                isValid = false;
            } else {
                
                const atIndex = email.indexOf('@');
                const dotIndex = email.lastIndexOf('.');
                
                if (atIndex < 1 || 
                    dotIndex <= atIndex + 1 || 
                    dotIndex === email.length - 1 || 
                    email.indexOf(' ') !== -1 || 
                    email.indexOf('..') !== -1) { 
                    displayError('email-error', 'Please enter a valid email address');
                    isValid = false;
                }
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    }
    
    // Reset password form validation
    const passwordResetForm = document.getElementById('passwordResetForm');
    if (passwordResetForm) {
        passwordResetForm.addEventListener('submit', function(e) {
            const newPassword = document.getElementById('new-password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            let isValid = true;
            
            // Clear previous errors
            clearError('password-error');
            clearError('confirm-error');
            
            // Password validation
            if (!newPassword) {
                displayError('password-error', 'Password is required');
                isValid = false;
            } else if (newPassword.length < 8) {
                displayError('password-error', 'Password must be at least 8 characters');
                isValid = false;
            }
            
            // Confirm password validation
            if (!confirmPassword) {
                displayError('confirm-error', 'Please confirm your password');
                isValid = false;
            } else if (newPassword !== confirmPassword) {
                displayError('confirm-error', 'Passwords do not match');
                isValid = false;
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    }
    
    // validation
    const verifyCodeForm = document.getElementById('verifyCodeForm');
    if (verifyCodeForm) {
        verifyCodeForm.addEventListener('submit', function(e) {
            const verificationCode = document.getElementById('verification_code').value;
            let isValid = true;
            
            
            clearError('verification-error');
            
            // Verification code validation
            if (!verificationCode) {
                displayError('verification-error', 'Verification code is required');
                isValid = false;
            } else if (verificationCode.length !== 6) {
                displayError('verification-error', 'Code must be 6 digits');
                isValid = false;
            } else {
                // Check  digits
                for (let i = 0; i < verificationCode.length; i++) {
                    const char = verificationCode[i];
                    if (char < '0' || char > '9') {
                        displayError('verification-error', 'Code must contain only digits');
                        isValid = false;
                        break;
                    }
                }
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    }
    
    // Helper function to display error messages
    function displayError(elementId, message) {
        const errorElement = document.getElementById(elementId);
        if (errorElement) {
            errorElement.textContent = message;
            errorElement.style.display = 'block';
        }
    }
    
    // Helper function to clear error messages
    function clearError(elementId) {
        const errorElement = document.getElementById(elementId);
        if (errorElement) {
            errorElement.textContent = '';
            errorElement.style.display = 'none';
        }
    }
});