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
            <a href="Checkout_flow.html" class="nav-link active">Checkout</a>
            <a href="Saved_cards.html" class="nav-link">Saved Cards</a>
            <a href="Invoice_gen.html" class="nav-link">Invoice</a>
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

    <script>
        // Load selected seats from sessionStorage
        let selectedSeats = JSON.parse(sessionStorage.getItem('selectedSeats')) || [];
        const selectedSeatsDisplay = document.getElementById('selectedSeats');
        const totalPriceDisplay = document.getElementById('totalPrice');
        
        // Calculate total price
        function updateTotalPrice() {
            let total = 0;
            if (selectedSeats.length > 0) {
                // For demo, we'll assume each seat is $50
                total = selectedSeats.length * 50;
            }
            totalPriceDisplay.textContent = total;
            
            if (selectedSeats.length === 0) {
                selectedSeatsDisplay.textContent = 'None';
            } else {
                selectedSeatsDisplay.textContent = selectedSeats.join(', ');
            }
        }
        
        updateTotalPrice();
        
        // Payment method selection
        const paymentMethods = document.querySelectorAll('.payment-method');
        const cardForm = document.getElementById('cardForm');
        
        paymentMethods.forEach(method => {
            method.addEventListener('click', () => {
                paymentMethods.forEach(m => m.classList.remove('selected'));
                method.classList.add('selected');
                
                if (method.id === 'creditCard') {
                    cardForm.style.display = 'block';
                } else {
                    cardForm.style.display = 'none';
                }
            });
        });
        
        // Split payment toggle
        const splitToggle = document.getElementById('splitToggle');
        const splitDetails = document.getElementById('splitDetails');
        
        splitToggle.addEventListener('click', () => {
            const checkbox = document.getElementById('splitPayment');
            checkbox.checked = !checkbox.checked;
            
            if (checkbox.checked) {
                splitDetails.classList.add('active');
            } else {
                splitDetails.classList.remove('active');
            }
        });
        
        // Payment button
        const payButton = document.getElementById('payButton');
        const ticketConfirmation = document.getElementById('ticketConfirmation');
        
        payButton.addEventListener('click', () => {
            // In a real app, this would process the payment
            payButton.textContent = 'Processing...';
            
            setTimeout(() => {
                ticketConfirmation.classList.add('active');
                payButton.style.display = 'none';
                
                // Save transaction to sessionStorage
                const transaction = {
                    date: new Date().toLocaleString(),
                    seats: selectedSeats,
                    amount: selectedSeats.length * 50,
                    method: document.querySelector('.payment-method.selected h3').textContent
                };
                sessionStorage.setItem('lastTransaction', JSON.stringify(transaction));
            }, 1500);
        });
    </script>
</body>
</html>