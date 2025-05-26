<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: /web-tech-project/View/Secure_log_reg/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="venue-container">
        <div class="nav-bar">
            <a href="Disc_entry.php" class="nav-link">Apply Code</a>
            <a href="Code_gen.php" class="nav-link active">Generate Code</a>
            <a href="Red_analytics.php" class="nav-link">Analytics</a>
            <a href="/web-tech-project/View/Refund_policy/Terms.php" class="nav-link">Refund policy</a>
        </div>
        
        <h1>Promo Code Generator</h1>
        
        <div class="promo-container">
            <div class="promo-section">
                <h2>Create New Discount Code</h2>
                <p>Generate sponsor-specific or promotional discount codes.</p>
                
                <div class="code-generator-form">
                    <div class="form-group">
                        <label for="codeType">Code Type</label>
                        <select id="codeType" class="form-group input">
                            <option value="percentage">Percentage Discount</option>
                            <option value="fixed">Fixed Amount</option>
                            <option value="free">Free Ticket</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="discountValue">Discount Value</label>
                        <input type="text" id="discountValue" placeholder="e.g. 20 for 20% or $20">
                    </div>
                    
                    <div class="form-group">
                        <label for="sponsorName">Sponsor Name (optional)</label>
                        <input type="text" id="sponsorName" placeholder="Associated sponsor">
                    </div>
                    
                    <div class="form-group">
                        <label for="expiryDate">Expiry Date</label>
                        <input type="date" id="expiryDate">
                    </div>
                    
                    <button class="promo-btn" id="generateCode">Generate Code</button>
                    
                    <div class="promo-success" id="generatedCode" style="display: none;">
                        <h3>Your New Promo Code:</h3>
                        <p style="font-size: 24px; font-weight: bold;" id="newCode"></p>
                        <button class="copy-btn" onclick="copyGeneratedCode()">Copy Code</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('generateCode').addEventListener('click', function() {
            const codeType = document.getElementById('codeType').value;
            const value = document.getElementById('discountValue').value;
            
            if (!value) {
                alert('Please enter a discount value');
                return;
            }
            
            // Generate random code
            const prefixes = ['SUMMER', 'FEST', 'EVENT', 'VIP'];
            const prefix = prefixes[Math.floor(Math.random() * prefixes.length)];
            const code = prefix + Math.floor(100 + Math.random() * 900);
            
            document.getElementById('newCode').textContent = code;
            document.getElementById('generatedCode').style.display = 'block';
        });
        
        function copyGeneratedCode() {
            const code = document.getElementById('newCode').textContent;
            navigator.clipboard.writeText(code);
            alert(`Code ${code} copied to clipboard!`);
        }
    </script>
</body>
</html>