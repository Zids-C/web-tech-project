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
    <title>Invoice Generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="venue-container">
        <div class="nav-bar">
            <a href="Checkout_flow.php" class="nav-link">Checkout</a>
            <a href="Saved_cards.php" class="nav-link">Saved Cards</a>
            <a href="Invoice_gen.php" class="nav-link active">Invoice</a>
        </div>
        
        <h1>Invoice Generator</h1>
        
        <div class="payment-container">
            <h2>Your Order Details</h2>
            
            <div class="invoice">
                <div class="invoice-row">
                    <span>Event:</span>
                    <span>Summer Music Festival 2023</span>
                </div>
                <div class="invoice-row">
                    <span>Date:</span>
                    <span id="invoiceDate">Loading...</span>
                </div>
                <div class="invoice-row">
                    <span>Order Number:</span>
                    <span id="orderNumber">Loading...</span>
                </div>
                
                <hr style="margin: 15px 0; border: none; border-top: 1px solid #eee;">
                
                <div id="seatsList">
                    <!-- Seats will be added here -->
                </div>
                
                <hr style="margin: 15px 0; border: none; border-top: 1px solid #eee;">
                
                <div class="invoice-row">
                    <span>Subtotal:</span>
                    <span id="subtotal">$0</span>
                </div>
                <div class="invoice-row">
                    <span>Service Fee:</span>
                    <span>$5.00</span>
                </div>
                <div class="invoice-total">
                    <span>Total:</span>
                    <span id="totalAmount">$0</span>
                </div>
            </div>
            
            <div style="margin-top: 20px; text-align: center;">
                <button class="btn-pay" id="downloadInvoice" style="background-color: #2196F3;">
                    Download Invoice
                </button>
                <button class="btn-pay" id="emailInvoice" style="background-color: #4CAF50; margin-top: 10px;">
                    Email Invoice
                </button>
            </div>
            
            <div class="ticket-confirmation active" style="margin-top: 30px;">
                <h2>Your E-Tickets</h2>
                <p>The tickets have been sent to your email.</p>
                <p>You can also download them below.</p>
                
                <button class="btn-pay" id="downloadTickets" style="background-color: #ff9800; margin-top: 15px;">
                    Download Tickets
                </button>
            </div>
        </div>
    </div>

    <script>
        // Load transaction data from sessionStorage
        const transaction = JSON.parse(sessionStorage.getItem('lastTransaction')) || {};
        const selectedSeats = transaction.seats || [];
        
        // Update invoice details
        document.getElementById('invoiceDate').textContent = transaction.date || new Date().toLocaleString();
        document.getElementById('orderNumber').textContent = '#' + Math.floor(Math.random() * 1000000);
        
        const seatsList = document.getElementById('seatsList');
        let subtotal = 0;
        
        if (selectedSeats.length > 0) {
            selectedSeats.forEach(seat => {
                const seatRow = document.createElement('div');
                seatRow.className = 'invoice-row';
                seatRow.innerHTML = `<span>Seat ${seat}:</span> <span>$50.00</span>`;
                seatsList.appendChild(seatRow);
                subtotal += 50;
            });
        } else {
            seatsList.innerHTML = '<div class="invoice-row"><span>No seats selected</span></div>';
        }
        
        document.getElementById('subtotal').textContent = '$' + subtotal.toFixed(2);
        document.getElementById('totalAmount').textContent = '$' + (subtotal + 5).toFixed(2);
        
        // Button functionality
        document.getElementById('downloadInvoice').addEventListener('click', () => {
            alert('Invoice download started!');
        });
        
        document.getElementById('emailInvoice').addEventListener('click', () => {
            alert('Invoice sent to your email!');
        });
        
        document.getElementById('downloadTickets').addEventListener('click', () => {
            alert('Tickets downloaded!');
        });
    </script>
</body>
</html>