<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Export Wizard</title>
    <link rel="stylesheet" href="export-styles.css">
</head>
<body>
    <div class="export-container">
        <div class="export-header">
            <h1><span class="export-icon">📊</span> Data Export</h1>
            <p class="subtitle">Download reports as PDF/CSV</p>
        </div>

        <div class="export-wizard">
            <!-- Step 1: Data Selection -->
            <div class="wizard-step active" id="step1">
                <h2>1. Select Data Range</h2>
                <div class="form-group">
                    <label for="export-source">Data Source</label>
                    <select id="export-source" class="form-control">
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
                        <input type="date" id="start-date" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="end-date">To</label>
                        <input type="date" id="end-date" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="data-filters">Filters (optional)</label>
                    <select id="data-filters" class="form-control" multiple>
                        <option value="active">Active records only</option>
                        <option value="verified">Verified data only</option>
                        <option value="complete">Complete records only</option>
                    </select>
                    <small class="hint">Hold Ctrl/Cmd to select multiple filters</small>
                </div>

                <div class="wizard-actions">
                    <button class="btn btn-next" onclick="nextStep(1)">Next</button>
                </div>
            </div>

            <!-- Step 2: Format Options -->
            <div class="wizard-step" id="step2">
                <h2>2. Choose Export Format</h2>
                <div class="format-options">
                    <div class="format-card" onclick="selectFormat('csv')">
                        <div class="format-icon">📋</div>
                        <h3>CSV</h3>
                        <p>Comma-separated values (Excel compatible)</p>
                        <div class="format-details">
                            <label>
                                <input type="radio" name="export-format" value="csv" checked>
                                <span class="radio-custom"></span>
                            </label>
                        </div>
                    </div>

                    <div class="format-card" onclick="selectFormat('pdf')">
                        <div class="format-icon">📄</div>
                        <h3>PDF</h3>
                        <p>Portable Document Format (print ready)</p>
                        <div class="format-details">
                            <label>
                                <input type="radio" name="export-format" value="pdf">
                                <span class="radio-custom"></span>
                            </label>
                        </div>
                    </div>

                    <div class="format-card" onclick="selectFormat('json')">
                        <div class="format-icon">🔷</div>
                        <h3>JSON</h3>
                        <p>JavaScript Object Notation (developer friendly)</p>
                        <div class="format-details">
                            <label>
                                <input type="radio" name="export-format" value="json">
                                <span class="radio-custom"></span>
                            </label>
                        </div>
                    </div>

                    <div class="format-card" onclick="selectFormat('excel')">
                        <div class="format-icon">📊</div>
                        <h3>Excel</h3>
                        <p>Native Excel format (.xlsx)</p>
                        <div class="format-details">
                            <label>
                                <input type="radio" name="export-format" value="excel">
                                <span class="radio-custom"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="format-options-advanced">
                    <div class="form-group">
                        <label for="delimiter">CSV Delimiter</label>
                        <select id="delimiter" class="form-control">
                            <option value=",">Comma ( , )</option>
                            <option value=";">Semicolon ( ; )</option>
                            <option value="tab">Tab</option>
                            <option value="|">Pipe ( | )</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pdf-orientation">PDF Orientation</label>
                        <select id="pdf-orientation" class="form-control">
                            <option value="portrait">Portrait</option>
                            <option value="landscape">Landscape</option>
                        </select>
                    </div>
                </div>

                <div class="wizard-actions">
                    <button class="btn btn-prev" onclick="prevStep(2)">Previous</button>
                    <button class="btn btn-next" onclick="nextStep(2)">Next</button>
                </div>
            </div>

            <!-- Step 3: Delivery Options -->
            <div class="wizard-step" id="step3">
                <h2>3. Delivery Method</h2>
                
                <div class="delivery-options">
                    <div class="delivery-card active" onclick="selectDelivery('download')">
                        <div class="delivery-icon">⬇️</div>
                        <h3>Download Now</h3>
                        <p>Generate and download immediately</p>
                        <div class="delivery-details">
                            <label>
                                <input type="radio" name="delivery-method" value="download" checked>
                                <span class="radio-custom"></span>
                            </label>
                        </div>
                    </div>

                    <div class="delivery-card" onclick="selectDelivery('email')">
                        <div class="delivery-icon">✉️</div>
                        <h3>Email Me</h3>
                        <p>Send export file to my email</p>
                        <div class="delivery-details">
                            <label>
                                <input type="radio" name="delivery-method" value="email">
                                <span class="radio-custom"></span>
                            </label>
                        </div>
                    </div>

                    <div class="delivery-card" onclick="selectDelivery('scheduled')">
                        <div class="delivery-icon">🕒</div>
                        <h3>Scheduled Export</h3>
                        <p>Set up recurring exports</p>
                        <div class="delivery-details">
                            <label>
                                <input type="radio" name="delivery-method" value="scheduled">
                                <span class="radio-custom"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="scheduling-options" id="scheduling-options" style="display: none;">
                    <div class="form-group">
                        <label for="schedule-frequency">Frequency</label>
                        <select id="schedule-frequency" class="form-control">
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>

                    <div class="form-group" id="custom-schedule" style="display: none;">
                        <label for="cron-expression">Custom Schedule (Cron Expression)</label>
                        <input type="text" id="cron-expression" class="form-control" placeholder="0 0 * * *">
                        <small class="hint">Example: 0 0 * * * for daily at midnight</small>
                    </div>

                    <div class="form-group">
                        <label for="schedule-email">Notification Email</label>
                        <input type="email" id="schedule-email" class="form-control" placeholder="your@email.com">
                    </div>
                </div>

                <div class="wizard-actions">
                    <button class="btn btn-prev" onclick="prevStep(3)">Previous</button>
                    <button class="btn btn-submit" onclick="submitExport()">Generate Export</button>
                </div>
            </div>

            <!-- Success Message -->
            <div class="wizard-success" id="success-message" style="display: none;">
                <div class="success-icon">✅</div>
                <h2>Export Successful!</h2>
                <p id="success-details">Your data export has been generated successfully.</p>
                <div class="download-actions">
                    <button class="btn btn-download" id="download-btn">Download Now</button>
                    <button class="btn btn-secondary" onclick="startNewExport()">New Export</button>
                </div>
            </div>
        </div>
    </div>

    <script src="export-script.js"></script>
</body>
</html>