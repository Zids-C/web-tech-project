<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved Cards</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="venue-container">
        <div class="nav-bar">
            <a href="Checkout_flow.php" class="nav-link">Checkout</a>
            <a href="Saved_cards.php" class="nav-link active">Saved Cards</a>
            <a href="Invoice_gen.php" class="nav-link">Invoice</a>
        </div>
        
        <h1>Saved Payment Methods</h1>
        
        <div class="payment-container">
            <div class="payment-method selected">
                <img src="https://cdn-icons-png.flaticon.com/512/196/196578.png" alt="Visa" class="payment-icon">
                <div class="payment-details">
                    <h3>Visa •••• •••• •••• 4242</h3>
                    <p>Expires 04/25</p>
                </div>
                <span class="delete-card">✕</span>
            </div>
            
            <div class="payment-method">
                <img src="https://cdn-icons-png.flaticon.com/512/196/196578.png" alt="Mastercard" class="payment-icon">
                <div class="payment-details">
                    <h3>Mastercard •••• •••• •••• 5555</h3>
                    <p>Expires 12/24</p>
                </div>
                <span class="delete-card">✕</span>
            </div>
            
            <div class="payment-method">
                <img src="https://cdn-icons-png.flaticon.com/512/179/179457.png" alt="Apple Pay" class="payment-icon">
                <div class="payment-details">
                    <h3>Apple Pay</h3>
                    <p>Connected to your Apple ID</p>
                </div>
                <span class="delete-card">✕</span>
            </div>
            
            <button class="btn-pay" style="margin-top: 30px; background-color: #2196F3;">
                + Add New Payment Method
            </button>
        </div>
    </div>

    <script>
        // Delete card functionality
        const deleteButtons = document.querySelectorAll('.delete-card');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.stopPropagation();
                const card = button.closest('.payment-method');
                if (confirm('Are you sure you want to remove this payment method?')) {
                    card.style.animation = 'fadeOut 0.3s forwards';
                    setTimeout(() => card.remove(), 300);
                }
            });
        });
        
        // Select card functionality
        const savedCards = document.querySelectorAll('.payment-method');
        
        savedCards.forEach(card => {
            card.addEventListener('click', function() {
                if (this.querySelector('.delete-card') === document.activeElement) return;
                
                savedCards.forEach(c => c.classList.remove('selected'));
                this.classList.add('selected');
            });
        });
    </script>
</body>
</html>