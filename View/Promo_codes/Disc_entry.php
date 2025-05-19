<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discount Entry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="venue-container">
        <div class="nav-bar">
            <a href="Disc_entry.php" class="nav-link active">Apply Code</a>
            <a href="Code_gen.php" class="nav-link">Generate Code</a>
            <a href="Red_analytics.php" class="nav-link">Analytics</a>
        </div>
        
        <h1>Apply Promo Code</h1>
        
        <div class="promo-container">
            <div class="promo-section">
                <h2>Enter Promo Code</h2>
                <p>Apply a discount code during checkout to save on your purchase.</p>
                
                <div class="promo-input">
                    <input type="text" id="promoCode" placeholder="Enter promo code">
                    <button class="promo-btn" id="applyCode">Apply</button>
                </div>
                
                <div class="promo-success" id="promoSuccess">
                    <h3>Code Applied Successfully!</h3>
                    <p>Your <strong>20% discount</strong> has been applied to your order.</p>
                </div>
            </div>
            
            <div class="promo-section">
                <h2>Available Discounts</h2>
                <div class="code-list">
                    <div class="code-item">
                        <div class="code-details">
                            <strong>SUMMER20</strong> - 20% off all tickets
                        </div>
                        <button class="copy-btn" onclick="copyCode('SUMMER20')">Copy</button>
                    </div>
                    <div class="code-item">
                        <div class="code-details">
                            <strong>EARLYBIRD</strong> - 15% off until June 30
                        </div>
                        <button class="copy-btn" onclick="copyCode('EARLYBIRD')">Copy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('applyCode').addEventListener('click', function() {
            const code = document.getElementById('promoCode').value;
            if (!code) {
                alert('Please enter a promo code');
                return;
            }
            
            // Simulate code validation
            this.disabled = true;
            this.textContent = 'Applying...';
            
            setTimeout(() => {
                document.getElementById('promoSuccess').classList.add('active');
                this.textContent = 'Applied!';
            }, 1000);
        });
        
        function copyCode(code) {
            navigator.clipboard.writeText(code);
            alert(`Code ${code} copied to clipboard!`);
        }
    </script>
</body>
</html>