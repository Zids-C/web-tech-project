<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['export_data']['format'] = $_POST['export-format'];
    $_SESSION['export_data']['delimiter'] = $_POST['delimiter'] ?? ',';
    $_SESSION['export_data']['pdf_orientation'] = $_POST['pdf-orientation'] ?? 'portrait';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Export Wizard - Step 3</title>
    <link rel="stylesheet" href="export-styles.css">
</head>
<body>
    <div class="export-container">
        <div class="export-header">
            <h1><span class="export-icon">📊</span> Data Export</h1>
            <p class="subtitle">Step 3: Delivery method</p>
        </div>

        <form action="success.php" method="post">
            <div class="delivery-options">
                <label class="delivery-card active">
                    <input type="radio" name="delivery-method" value="download" checked class="hidden-radio">
                    <div class="delivery-icon">⬇️</div>
                    <h3>Download Now</h3>
                    <p>Generate and download immediately</p>
                    <div class="delivery-details">
                        <span class="radio-custom"></span>
                    </div>
                </label>

                <label class="delivery-card">
                    <input type="radio" name="delivery-method" value="email" class="hidden-radio">
                    <div class="delivery-icon">✉️</div>
                    <h3>Email Me</h3>
                    <p>Send export file to my email</p>
                    <div class="delivery-details">
                        <span class="radio-custom"></span>
                    </div>
                </label>

                <label class="delivery-card">
                    <input type="radio" name="delivery-method" value="scheduled" class="hidden-radio">
                    <div class="delivery-icon">🕒</div>
                    <h3>Scheduled Export</h3>
                    <p>Set up recurring exports</p>
                    <div class="delivery-details">
                        <span class="radio-custom"></span>
                    </div>
                </label>
            </div>

            <div class="scheduling-options" id="scheduling-options" style="display: none;">
                <div class="form-group">
                    <label for="schedule-frequency">Frequency</label>
                    <select id="schedule-frequency" name="schedule-frequency" class="form-control">
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                        <option value="custom">Custom</option>
                    </select>
                </div>

                <div class="form-group" id="custom-schedule" style="display: none;">
                    <label for="cron-expression">Custom Schedule (Cron Expression)</label>
                    <input type="text" id="cron-expression" name="cron-expression" class="form-control" placeholder="0 0 * * *">
                    <small class="hint">Example: 0 0 * * * for daily at midnight</small>
                </div>

                <div class="form-group">
                    <label for="schedule-email">Notification Email</label>
                    <input type="email" id="schedule-email" name="schedule-email" class="form-control" placeholder="your@email.com">
                </div>
            </div>

            <div class="wizard-actions">
                <a href="format-options.php" class="btn btn-prev">Previous</a>
                <button type="submit" class="btn btn-submit">Generate Export</button>
            </div>
        </form>
    </div>

    <script src="/web-tech-project/Controller/export-script.js"></script>
    <script>
        // Show/hide scheduling options
        document.querySelectorAll('input[name="delivery-method"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const schedulingOptions = document.getElementById('scheduling-options');
                schedulingOptions.style.display = this.value === 'scheduled' ? 'block' : 'none';
            });
        });

        // Show custom schedule field when custom frequency is selected
        document.getElementById('schedule-frequency').addEventListener('change', function() {
            const customSchedule = document.getElementById('custom-schedule');
            customSchedule.style.display = this.value === 'custom' ? 'block' : 'none';
        });
    </script>
</body>
</html>