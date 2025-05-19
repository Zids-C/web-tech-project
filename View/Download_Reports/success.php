<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['export_data']['delivery_method'] = $_POST['delivery-method'];
    
    if ($_POST['delivery-method'] === 'scheduled') {
        $_SESSION['export_data']['schedule_frequency'] = $_POST['schedule-frequency'];
        $_SESSION['export_data']['schedule_email'] = $_POST['schedule-email'];
        if ($_POST['schedule-frequency'] === 'custom') {
            $_SESSION['export_data']['cron_expression'] = $_POST['cron-expression'];
        }
    }
}

// Process the export here (would connect to your backend in real implementation)
$exportData = $_SESSION['export_data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Successful</title>
    <link rel="stylesheet" href="export-styles.css">
</head>
<body>
    <div class="export-container">
        <div class="wizard-success">
            <div class="success-icon">✅</div>
            <h2>Export Successful!</h2>
            <p id="success-details">
                <?php 
                if ($exportData['delivery_method'] === 'download') {
                    echo 'Your data export is ready for download.';
                } elseif ($exportData['delivery_method'] === 'email') {
                    echo 'Your data export will be sent to your email shortly.';
                } elseif ($exportData['delivery_method'] === 'scheduled') {
                    echo "Your {$exportData['schedule_frequency']} export has been scheduled successfully.";
                }
                ?>
            </p>
            <div class="download-actions">
                <?php if ($exportData['delivery_method'] === 'download'): ?>
                    <button class="btn btn-download" id="download-btn">Download Now</button>
                <?php endif; ?>
                <a href="data-selection.php" class="btn btn-secondary">New Export</a>
            </div>
        </div>
    </div>

    <script src="../../Controller/export-script.js"></script>
    <script>
        document.getElementById('download-btn')?.addEventListener('click', function() {
            alert(`Downloading <?= strtoupper($exportData['format']) ?> export of <?= $exportData['source'] ?> from <?= $exportData['start_date'] ?> to <?= $exportData['end_date'] ?>`);
        });
    </script>
</body>
</html>