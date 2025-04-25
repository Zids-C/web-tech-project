<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancellation Request</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="venue-container">
        <div class="nav-bar">
            <a href="Terms.html" class="nav-link">Policy</a>
            <a href="Cancel_req.html" class="nav-link active">Request</a>
            <a href="Status_track.html" class="nav-link">Status</a>
        </div>
        
        <h1>Cancellation Request</h1>
        
        <div class="refund-container">
            <div class="refund-section">
                <h2>Request Refund</h2>
                <p>Complete the form below to submit your cancellation request. We'll review your request and respond within 2 business days.</p>
                
                <div class="refund-form">
                    <div class="form-group">
                        <label for="orderNumber">Order Number</label>
                        <input type="text" id="orderNumber" placeholder="Enter your order number">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" placeholder="Enter the email used for booking">
                    </div>
                    
                    <div class="form-group">
                        <label for="reason">Reason for Cancellation</label>
                        <select id="reason" class="form-group input">
                            <option value="">Select a reason</option>
                            <option value="change-plans">Change of plans</option>
                            <option value="duplicate">Duplicate purchase</option>
                            <option value="not-interested">No longer interested</option>
                            <option value="other">Other reason</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="details">Additional Details</label>
                        <textarea id="details" class="cancellation-reason" placeholder="Please provide any additional details"></textarea>
                    </div>
                    
                    <button class="refund-btn" id="submitRequest">Submit Request</button>
                    
                    <div class="refund-success" id="refundSuccess">
                        <h2>Request Submitted Successfully!</h2>
                        <p>Your cancellation request has been received. We'll process it within 2 business days.</p>
                        <p>Reference ID: <strong>CR-2023-<span id="refId">0000</span></strong></p>
                        <a href="Status_track.html" class="btn-pay" style="display: inline-block; width: auto; margin-top: 15px;">
                            Track Status
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Generate random reference ID
        function generateRefId() {
            return Math.floor(1000 + Math.random() * 9000);
        }
        
        // Store submission in sessionStorage
        document.getElementById('submitRequest').addEventListener('click', function() {
            const orderNumber = document.getElementById('orderNumber').value;
            const email = document.getElementById('email').value;
            
            if (!orderNumber || !email) {
                alert('Please fill in all required fields');
                return;
            }
            
            // In a real app, this would submit to a server
            this.disabled = true;
            this.textContent = 'Processing...';
            
            setTimeout(() => {
                const refId = generateRefId();
                document.getElementById('refId').textContent = refId;
                document.getElementById('refundSuccess').classList.add('active');
                
                // Save to sessionStorage
                const request = {
                    id: `CR-2023-${refId}`,
                    date: new Date().toLocaleString(),
                    orderNumber: orderNumber,
                    status: 'received'
                };
                sessionStorage.setItem('refundRequest', JSON.stringify(request));
            }, 1500);
        });
    </script>
</body>
</html>