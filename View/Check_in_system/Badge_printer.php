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
    <title>Badge Printer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="venue-container">
        <div class="nav-bar">
            <a href="QR_scan.php" class="nav-link">QR Scanner</a>
            <a href="Atn_lookup.php" class="nav-link">Attendee Lookup</a>
            <a href="Badge_printer.php" class="nav-link active">Badge Printer</a>
            <a href="/web-tech-project/View/Admin_panel/cont_mod.php" class="nav-link">Admin panel</a>
        </div>
        
        <h1>Print On-Site Badges</h1>
        
        <div class="checkin-container">
            <div class="checkin-section">
                <h2>Badge Preview</h2>
                <p>Print badges for checked-in attendees.</p>
                
                <div class="badge-preview">
                    <h3>Sarah Johnson</h3>
                    <p>VIP Pass</p>
                    <div style="margin: 15px 0;">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=EVT-2023-5876" alt="QR Code">
                    </div>
                    <p>Event: Summer Music Festival</p>
                    <p>June 15, 2023</p>
                </div>
                
                <div class="badge-actions">
                    <button class="print-btn" id="printBadge">Print Badge</button>
                    <button class="print-btn" style="background-color: #4CAF50;" id="checkinBadge">Check In</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('printBadge').addEventListener('click', function() {
            // In a real app, this would connect to a printer
            alert('Sending badge to printer...');
        });
        
        document.getElementById('checkinBadge').addEventListener('click', function() {
            // In a real app, this would mark attendee as checked in
            alert('Attendee checked in successfully!');
        });
    </script>
</body>
</html>