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
    <title>Interactive Venue Map</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="venue-container">
        <!-- NAVIGATION BAR -->
        <div class="nav-bar">
            <a href="Inter_v_map.php" class="nav-link active">Venue Map</a>
            <a href="Seat_zoom.php" class="nav-link">Seat Zoom</a>
            <a href="Ac_filter.php" class="nav-link">Accessibility</a>
        </div>
        
        <!-- STATUS BAR -->
        <div class="status-bar">
            <span>Selected seats: <span class="selected-seats" id="selectedSeats">None</span></span>
            <span>Total: $<span id="totalPrice">0</span></span>
            <button class="Payment-btn" id="resetSelection">Reset Selection</button>
            <button class="Payment-btn" 
                    onclick="window.location.href='/web-tech-project/View/Promo_codes/Disc_entry.php'">
                    Pay now
            </button>
        </div>
        
        <h1>Interactive Venue Map</h1>
        <p>Drag to rotate venue view</p>
        
        <div class="seat-map" id="seatMap">
            <div class="seat-tooltip" id="seatTooltip"></div>
        </div>
        <button class="filter-btn" 
                    onclick="window.location.href='../Secure_log_reg/dashboard.php'">
                    Dashboard
        </button>
    </div>

    <script src="/web-tech-project/Controller/inter_v_map_con.js"></script>
</body>
</html>