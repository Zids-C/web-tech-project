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
    <title>Dashboard</title>
    <link rel="stylesheet" href="dash_styles.css">
</head>
<body>
    <div class="dashboard-container">
        <header>
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_email']); ?></h1>
            <div class="logout-container">
                <a href="/web-tech-project/Controller/logout.php" class="logout-btn">Logout</a>
            </div>
        </header>

        <div class="modules-grid">

            <!-- Edit Personal Info Module -->
            <div class="module-card">
                <h2>Edit Personal Info</h2>
                <p>Update your account information</p>
                <a href="/web-tech-project/View/Edit_personal_info/view_profile.php" class="module-btn">Edit Info</a>
            </div>

            <!-- Seat Selection Module -->
            <div class="module-card">
                <h2>Seat Selection</h2>
                <p>Choose your preferred seat</p>
                <a href="/web-tech-project/View/Seat_selection/Inter_v_map.php" class="module-btn">Select Seat</a>
            </div>

            <!-- Download Report Module -->
            <div class="module-card">
                <h2>Download Report</h2>
                <p>Generate and download reports</p>
                <a href="/web-tech-project/View/Download_Reports/data-selection.php" class="module-btn">Download</a>
            </div>

        </div>
    </div>
</body>
</html>