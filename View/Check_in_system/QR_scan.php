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
    <title>QR Scanner</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="venue-container">
        <div class="nav-bar">
            <a href="QR_scan.php" class="nav-link active">QR Scanner</a>
            <a href="Atn_lookup.php" class="nav-link">Attendee Lookup</a>
            <a href="Badge_printer.php" class="nav-link">Badge Printer</a>
        </div>
        
        <h1>Event Check-in</h1>
        
        <div class="checkin-container">
            <div class="checkin-section">
                <h2>Scan Ticket QR Code</h2>
                <p>Position the QR code within the frame to scan.</p>
                
                <div class="qr-scanner" id="qrScanner">
                    <div class="qr-placeholder">
                        QR Scanner Area
                    </div>
                    <video class="qr-video" id="qrVideo" style="display: none;"></video>
                </div>
                
                <button class="scan-btn" id="startScan">Start Scanner</button>
                
                <div class="checkin-success" id="checkinSuccess">
                    <h3>Check-in Successful!</h3>
                    <p>Sarah Johnson has been checked in for the event.</p>
                    <p>Ticket Type: <strong>VIP Pass</strong></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('startScan').addEventListener('click', function() {
            // In a real app, this would activate the camera and QR scanning
            this.disabled = true;
            this.textContent = 'Scanning...';
            
            setTimeout(() => {
                document.getElementById('checkinSuccess').classList.add('active');
                this.textContent = 'Scan Complete';
            }, 2000);
        });
    </script>
</body>
</html>