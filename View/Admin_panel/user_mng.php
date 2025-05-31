<!-- user-management.html -->
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
    <title>Admin Panel - User Management</title>
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
                    <li class="active"><a href="user_mng.php">User Management</a></li>
                    <li><a href="cont_mod.php">Content Moderation</a></li>
                    <li><a href="sys_set.php">System Settings</a></li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>User Management</h1>
                <div class="user-actions">
                    <button class="btn btn-sm btn-danger" 
                        onclick="window.location.href='/web-tech-project/Controller/logout.php'">
                        Logout
                    </button>
                </div>
            </div>

            <div class="alert alert-info">
                You have 5 new user registrations pending approval.
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>User List</h2>
                    <button class="btn btn-primary">Add New User</button>
                </div>

                <div class="search-filter">
                    <input type="text" class="form-control" placeholder="Search users...">
                    <select class="form-control">
                        <option>Filter by Status</option>
                        <option>Active</option>
                        <option>Inactive</option>
                        <option>Pending</option>
                    </select>
                    <button class="btn btn-primary">Apply</button>
                </div>

                <div class="bulk-actions">
                    <input type="checkbox" id="select-all">
                    <label for="select-all">Select All</label>
                    <select>
                        <option>Bulk Actions</option>
                        <option>Activate</option>
                        <option>Deactivate</option>
                        <option>Delete</option>
                    </select>
                    <button class="btn btn-primary">Apply</button>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th width="50px"><input type="checkbox"></th>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Last Login</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>101</td>
                                <td>john_doe</td>
                                <td>john@example.com</td>
                                <td>Administrator</td>
                                <td><span class="status-badge status-active">Active</span></td>
                                <td>2023-06-15 14:30</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>102</td>
                                <td>jane_smith</td>
                                <td>jane@example.com</td>
                                <td>Editor</td>
                                <td><span class="status-badge status-active">Active</span></td>
                                <td>2023-06-14 09:15</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>103</td>
                                <td>mike_jones</td>
                                <td>mike@example.com</td>
                                <td>Author</td>
                                <td><span class="status-badge status-pending">Pending</span></td>
                                <td>-</td>
                                <td>
                                    <button class="btn btn-sm btn-success">Approve</button>
                                    <button class="btn btn-sm btn-danger">Reject</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>104</td>
                                <td>sarah_williams</td>
                                <td>sarah@example.com</td>
                                <td>Subscriber</td>
                                <td><span class="status-badge status-inactive">Inactive</span></td>
                                <td>2023-05-20 11:45</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="pagination">
                    <button class="btn">&laquo;</button>
                    <button class="btn btn-primary">1</button>
                    <button class="btn">2</button>
                    <button class="btn">3</button>
                    <button class="btn">&raquo;</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>