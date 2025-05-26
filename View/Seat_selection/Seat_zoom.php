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
    <title>Seat Zoom</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="venue-container">
        <!-- NEW NAVIGATION BAR -->
        <div class="nav-bar">
            <a href="Inter_v_map.php" class="nav-link">Venue Map</a>
            <a href="Seat_zoom.php" class="nav-link active">Seat Zoom</a>
            <a href="Ac_filter.php" class="nav-link">Accessibility</a>
        </div>
        
        <!-- NEW STATUS BAR -->
        <div class="status-bar">
            <span>Selected seats: <span class="selected-seats" id="selectedSeats">None</span></span>
            <span>Total: $<span id="totalPrice">0</span></span>
            <button class="Payment-btn" id="resetSelection">Reset Selection</button>
            <button class="Payment-btn" 
                    onclick="window.location.href='/web-tech-project/View/Promo_codes/Disc_entry.php'">
                    Pay now
            </button>
        </div>
        
        <h1>Seat Zoom</h1>
        <p>Hover seats for price/features</p>
        
        <div class="controls">
            <div class="zoom-controls">
                <button class="zoom-btn" id="zoomIn">Zoom In</button>
                <button class="zoom-btn" id="zoomOut">Zoom Out</button>
                <button class="zoom-btn" id="resetZoom">Reset</button>
            </div>
        </div>
        
        <div class="seat-map" id="seatMap" style="transform-origin: center center; transform: scale(1);">
            <div class="seat-tooltip" id="seatTooltip"></div>
        </div>
    </div>

    <script src="/web-tech-project/Controller/sit_zoom_con.js"></script>
</body>
</html>