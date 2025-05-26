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
    <title>Checkout Flow</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="venue-container">
        <div class="nav-bar">
            <a href="Checkout_flow.php" class="nav-link active">Checkout</a>
            <a href="Saved_cards.php" class="nav-link">Saved Cards</a>
            <a href="Invoice_gen.php" class="nav-link">Invoice</a>
        </div>
        
        <div class="status-bar">
            <span>Selected seats: <span class="selected-seats" id="selectedSeats">None</span></span>
            <span>Total: $<span id="totalPrice">0</span></span>
        </div>
        
        <h1>Checkout Flow</h1>
        
        <div class="payment-container">
            <h2>Payment Method</h2>
            
            <div class="payment-method selected" id="applePay">
                <img src="https://cdn-icons-png.flaticon.com/512/179/179457.png" alt="Apple Pay" class="payment-icon">
                <div class="payment-details">
                    <h3>Apple Pay</h3>
                    <p>Pay securely with Apple Pay</p>
                </div>
            </div>
            
            <div class="payment-method" id="googlePay">
                <img src="https://cdn-icons-png.flaticon.com/512/2504/2504739.png" alt="Google Pay" class="payment-icon">
                <div class="payment-details">
                    <h3>Google Pay</h3>
                    <p>Pay securely with Google Pay</p>
                </div>
            </div>
            
            <div class="payment-method" id="creditCard">
                <img src="https://cdn-icons-png.flaticon.com/512/196/196578.png" alt="Credit Card" class="payment-icon">
                <div class="payment-details">
                    <h3>Credit/Debit Card</h3>
                    <p>Pay with your credit or debit card</p>
                </div>
            </div>
            
            <div class="payment-form" id="cardForm" style="display: none;">
                <div class="form-group">
                    <label for="cardNumber">Card Number</label>
                    <input type="text" id="cardNumber" placeholder="1234 5678 9012 3456">
                </div>
                
                <div class="form-group">
                    <label for="cardName">Name on Card</label>
                    <input type="text" id="cardName" placeholder="John Doe">
                </div>
                
                <div style="display: flex; gap: 15px;">
                    <div class="form-group" style="flex: 1;">
                        <label for="expiry">Expiry Date</label>
                        <input type="text" id="expiry" placeholder="MM/YY">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" placeholder="123">
                    </div>
                </div>
            </div>
            
            <div class="split-payment">
                <div class="split-toggle" id="splitToggle">
                    <input type="checkbox" id="splitPayment">
                    <label for="splitPayment">Split Payment</label>
                </div>
                
                <div class="split-details" id="splitDetails">
                    <div class="form-group">
                        <label for="splitEmail">Partner Email</label>
                        <input type="email" id="splitEmail" placeholder="partner@example.com">
                    </div>
                    <div class="form-group">
                        <label for="splitAmount">Their Amount ($)</label>
                        <input type="number" id="splitAmount" placeholder="50">
                    </div>
                </div>
            </div>
            
            <button class="btn-pay" id="payButton">Complete Payment</button>
            
            <div class="ticket-confirmation" id="ticketConfirmation">
                <h2>🎉 Tickets Purchased Successfully!</h2>
                <p>Your e-tickets have been sent to your email.</p>
                <p>You can also download them from your account.</p>
            </div>
        </div>
    </div>

    <script src="/web-tech-project/Controller/checkout_con.js"></script>
</body>
</html>