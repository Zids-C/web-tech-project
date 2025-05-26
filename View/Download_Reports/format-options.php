<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: /web-tech-project/View/Secure_log_reg/login.php");
    exit();
}
?>
<?php
// Start session and retrieve previous step data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['export_data'] = [
        'source' => $_POST['export-source'],
        'start_date' => $_POST['start-date'],
        'end_date' => $_POST['end-date'],
        'filters' => $_POST['data-filters'] ?? []
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Export Wizard - Step 2</title>
    <link rel="stylesheet" href="export-styles.css">
</head>
<body>
    <div class="export-container">
        <div class="export-header">
            <h1><span class="export-icon">📊</span> Data Export</h1>
            <p class="subtitle">Step 2: Choose export format</p>
        </div>

        <form action="delivery-options.php" method="post">
            <div class="format-options">
                <label class="format-card">
                    <input type="radio" name="export-format" value="csv" checked class="hidden-radio">
                    <div class="format-icon">📋</div>
                    <h3>CSV</h3>
                    <p>Comma-separated values (Excel compatible)</p>
                    <div class="format-details">
                        <span class="radio-custom"></span>
                    </div>
                </label>

                <label class="format-card">
                    <input type="radio" name="export-format" value="pdf" class="hidden-radio">
                    <div class="format-icon">📄</div>
                    <h3>PDF</h3>
                    <p>Portable Document Format (print ready)</p>
                    <div class="format-details">
                        <span class="radio-custom"></span>
                    </div>
                </label>

                <label class="format-card">
                    <input type="radio" name="export-format" value="json" class="hidden-radio">
                    <div class="format-icon">🔷</div>
                    <h3>JSON</h3>
                    <p>JavaScript Object Notation (developer friendly)</p>
                    <div class="format-details">
                        <span class="radio-custom"></span>
                    </div>
                </label>

                <label class="format-card">
                    <input type="radio" name="export-format" value="excel" class="hidden-radio">
                    <div class="format-icon">📊</div>
                    <h3>Excel</h3>
                    <p>Native Excel format (.xlsx)</p>
                    <div class="format-details">
                        <span class="radio-custom"></span>
                    </div>
                </label>
            </div>

            <div class="format-options-advanced">
                <div class="form-group">
                    <label for="delimiter">CSV Delimiter</label>
                    <select id="delimiter" name="delimiter" class="form-control">
                        <option value=",">Comma ( , )</option>
                        <option value=";">Semicolon ( ; )</option>
                        <option value="tab">Tab</option>
                        <option value="|">Pipe ( | )</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="pdf-orientation">PDF Orientation</label>
                    <select id="pdf-orientation" name="pdf-orientation" class="form-control">
                        <option value="portrait">Portrait</option>
                        <option value="landscape">Landscape</option>
                    </select>
                </div>
            </div>

            <div class="wizard-actions">
                <a href="data-selection.php" class="btn btn-prev">Previous</a>
                <button type="submit" class="btn btn-next">Next</button>
            </div>
        </form>
    </div>

    <script src="/web-tech-project/Controller/export-script.js"></script>
</body>
</html>