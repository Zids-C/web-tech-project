<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Export Wizard - Step 1</title>
    <link rel="stylesheet" href="export-styles.css">
</head>
<body>
    <div class="export-container">
        <div class="export-header">
            <h1><span class="export-icon">📊</span> Data Export</h1>
            <p class="subtitle">Step 1: Select your data range</p>
        </div>

        <form action="format-options.php" method="post">
            <div class="form-group">
                <label for="export-source">Data Source</label>
                <select id="export-source" name="export-source" class="form-control" required>
                    <option value="users">User Data</option>
                    <option value="transactions">Transaction Records</option>
                    <option value="activity">Activity Logs</option>
                    <option value="products">Product Catalog</option>
                    <option value="custom">Custom Query</option>
                </select>
            </div>

            <div class="date-range-picker">
                <div class="form-group">
                    <label for="start-date">From</label>
                    <input type="date" id="start-date" name="start-date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="end-date">To</label>
                    <input type="date" id="end-date" name="end-date" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label for="data-filters">Filters (optional)</label>
                <select id="data-filters" name="data-filters[]" class="form-control" multiple>
                    <option value="active">Active records only</option>
                    <option value="verified">Verified data only</option>
                    <option value="complete">Complete records only</option>
                </select>
                <small class="hint">Hold Ctrl/Cmd to select multiple filters</small>
            </div>

            <div class="wizard-actions">
                <button type="submit" class="btn btn-next">Next</button>
            </div>
        </form>
    </div>

    <script src="/web-tech-project/Controller/export-script.js"></script>
    <script>
        // Set default dates
        window.onload = function() {
            const today = new Date().toISOString().split('T')[0];
            const thirtyDaysAgo = new Date();
            thirtyDaysAgo.setDate(thirtyDaysAgo.getDate() - 30);
            const thirtyDaysAgoStr = thirtyDaysAgo.toISOString().split('T')[0];
            
            document.getElementById('end-date').value = today;
            document.getElementById('start-date').value = thirtyDaysAgoStr;
        };
    </script>
</body>
</html>