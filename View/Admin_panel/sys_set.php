<!-- system-settings.html -->
 <?php
session_start();
if (!isset($_SESSION['user_email']) || !isset($_SESSION['admin'])) {
    header("Location: /web-tech-project/View/Secure_log_reg/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - System Settings</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar Navigation -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Admin Panel</h2>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="user_mng.php">User Management</a></li>
                    <li><a href="cont_mod.php">Content Moderation</a></li>
                    <li class="active"><a href="sys_set.php">System Settings</a></li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>System Settings</h1>
                <div class="user-actions">
                    <button class="btn btn-sm btn-danger" 
                        onclick="window.location.href='/web-tech-project/Controller/logout.php'">
                        Logout
                    </button>
                </div>
            </div>

            <div class="alert alert-success">
                System is running normally. Last backup: 2023-06-15 02:00
            </div>

            <div class="grid-container">
                <div class="grid-item">
                    <h3>General Settings</h3>
                    <form>
                        <div class="form-group">
                            <label for="site-name">Site Name</label>
                            <input type="text" id="site-name" class="form-control" value="My Admin Panel">
                        </div>
                        <div class="form-group">
                            <label for="site-url">Site URL</label>
                            <input type="url" id="site-url" class="form-control" value="https://admin.example.com">
                        </div>
                        <div class="form-group">
                            <label for="timezone">Timezone</label>
                            <select id="timezone" class="form-control">
                                <option>UTC</option>
                                <option selected>UTC+1 (London)</option>
                                <option>UTC+2 (Paris)</option>
                                <option>UTC-5 (New York)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>

                <div class="grid-item">
                    <h3>Security Settings</h3>
                    <form>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" checked> Enable Two-Factor Authentication
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" checked> Require Strong Passwords
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox"> Enable Login Notifications
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Failed Login Attempts Limit</label>
                            <input type="number" class="form-control" value="5" min="1">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>

                <div class="grid-item">
                    <h3>Email Settings</h3>
                    <form>
                        <div class="form-group">
                            <label for="email-from">From Email</label>
                            <input type="email" id="email-from" class="form-control" value="noreply@example.com">
                        </div>
                        <div class="form-group">
                            <label for="email-from-name">From Name</label>
                            <input type="text" id="email-from-name" class="form-control" value="Admin Panel">
                        </div>
                        <div class="form-group">
                            <label for="email-protocol">Email Protocol</label>
                            <select id="email-protocol" class="form-control">
                                <option>SMTP</option>
                                <option selected>Sendmail</option>
                                <option>Mail</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>

                <div class="grid-item">
                    <h3>Maintenance Mode</h3>
                    <form>
                        <div class="form-group">
                            <label class="toggle-switch">
                                <input type="checkbox">
                                <span class="toggle-slider"></span>
                            </label>
                            <span>Enable Maintenance Mode</span>
                        </div>
                        <div class="form-group">
                            <label for="maintenance-message">Maintenance Message</label>
                            <textarea id="maintenance-message" class="form-control" rows="3">We're currently performing maintenance. Please check back soon.</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>

                <div class="grid-item">
                    <h3>Backup Settings</h3>
                    <form>
                        <div class="form-group">
                            <label>Auto Backup</label>
                            <select class="form-control">
                                <option>Disabled</option>
                                <option selected>Daily</option>
                                <option>Weekly</option>
                                <option>Monthly</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Backup Retention</label>
                            <input type="number" class="form-control" value="7" min="1">
                            <small class="text-muted">Number of backups to keep</small>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Backup Now</button>
                            <button class="btn btn-success">Restore Backup</button>
                        </div>
                    </form>
                </div>

                <div class="grid-item">
                    <h3>Advanced Configuration</h3>
                    <form>
                        <div class="form-group">
                            <label for="cache-config">Cache Configuration</label>
                            <select id="cache-config" class="form-control">
                                <option selected>File System</option>
                                <option>Database</option>
                                <option>Redis</option>
                                <option>Memcached</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" checked> Enable Debug Mode
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="log-level">Log Level</label>
                            <select id="log-level" class="form-control">
                                <option>Error</option>
                                <option selected>Warning</option>
                                <option>Info</option>
                                <option>Debug</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Save Changes</button>
                            <button class="btn btn-danger">Clear Cache</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>