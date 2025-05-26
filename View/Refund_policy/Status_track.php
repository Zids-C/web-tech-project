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
    <title>Status Tracker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="venue-container">
        <div class="nav-bar">
            <a href="Terms.php" class="nav-link">Policy</a>
            <a href="Cancel_req.php" class="nav-link">Request</a>
            <a href="Status_track.php" class="nav-link active">Status</a>
        </div>
        
        <h1>Request Status Tracker</h1>
        
        <div class="refund-container">
            <div class="refund-section">
                <h2>Your Refund Request</h2>
                
                <div id="noRequest" style="text-align: center; padding: 20px;">
                    <p>No active refund requests found.</p>
                    <a href="Cancel_req.php" class="btn-pay" style="display: inline-block; width: auto; margin-top: 15px;">
                        Submit a Request
                    </a>
                </div>
                
                <div id="requestDetails" style="display: none;">
                    <div style="background-color: #f5f5f5; padding: 15px; border-radius: 6px; margin-bottom: 20px;">
                        <div style="display: flex; justify-content: space-between;">
                            <strong>Reference ID:</strong>
                            <span id="displayRefId"></span>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-top: 5px;">
                            <strong>Submitted:</strong>
                            <span id="displayDate"></span>
                        </div>
                    </div>
                    
                    <div class="status-tracker">
                        <h3>Processing Status</h3>
                        
                        <div class="status-step">
                            <div class="status-icon active">1</div>
                            <div class="status-details">
                                <strong>Request Received</strong>
                                <div class="status-date" id="receivedDate"></div>
                                <p>We've received your request and will begin processing shortly.</p>
                            </div>
                        </div>
                        
                        <div class="status-step">
                            <div class="status-icon" id="reviewIcon">2</div>
                            <div class="status-details">
                                <strong>Under Review</strong>
                                <div class="status-date" id="reviewDate"></div>
                                <p>Our team is reviewing your request against our refund policy.</p>
                            </div>
                        </div>
                        
                        <div class="status-step">
                            <div class="status-icon" id="processedIcon">3</div>
                            <div class="status-details">
                                <strong>Processed</strong>
                                <div class="status-date" id="processedDate"></div>
                                <p>Your refund has been approved and processed.</p>
                            </div>
                        </div>
                        
                        <div class="status-step">
                            <div class="status-icon" id="completedIcon">4</div>
                            <div class="status-details">
                                <strong>Completed</strong>
                                <div class="status-date" id="completedDate"></div>
                                <p>Funds have been returned to your account.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Load request from sessionStorage
        const request = JSON.parse(sessionStorage.getItem('refundRequest'));
        const noRequestDiv = document.getElementById('noRequest');
        const requestDetailsDiv = document.getElementById('requestDetails');
        
        if (request) {
            noRequestDiv.style.display = 'none';
            requestDetailsDiv.style.display = 'block';
            
            // Display basic info
            document.getElementById('displayRefId').textContent = request.id;
            document.getElementById('displayDate').textContent = request.date;
            document.getElementById('receivedDate').textContent = request.date;
            
            // Simulate processing timeline
            setTimeout(() => {
                const reviewDate = new Date();
                reviewDate.setDate(reviewDate.getDate() + 1);
                document.getElementById('reviewIcon').classList.add('active');
                document.getElementById('reviewDate').textContent = reviewDate.toLocaleString();
                
                setTimeout(() => {
                    const processedDate = new Date();
                    processedDate.setDate(processedDate.getDate() + 2);
                    document.getElementById('processedIcon').classList.add('active');
                    document.getElementById('processedDate').textContent = processedDate.toLocaleString();
                    
                    setTimeout(() => {
                        const completedDate = new Date();
                        completedDate.setDate(completedDate.getDate() + 5);
                        document.getElementById('completedIcon').classList.add('active');
                        document.getElementById('completedDate').textContent = completedDate.toLocaleString();
                    }, 2000);
                }, 2000);
            }, 1000);
        }
    </script>
</body>
</html>