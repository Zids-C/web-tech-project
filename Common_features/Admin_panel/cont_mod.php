<!-- content-moderation.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Content Moderation</title>
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
                    <li><a href="user_mng.html">User Management</a></li>
                    <li class="active"><a href="con_mod.html">Content Moderation</a></li>
                    <li><a href="sys_set.html">System Settings</a></li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Content Moderation</h1>
                <div class="user-actions">
                    <div class="user-profile">
                        <img src="https://via.placeholder.com/40" alt="Admin User">
                        <span>Admin</span>
                    </div>
                </div>
            </div>

            <div class="alert alert-warning">
                There are 3 posts awaiting moderation and 2 reported comments.
            </div>

            <div class="tabs">
                <div class="tab active" data-tab="posts">Posts</div>
                <div class="tab" data-tab="comments">Comments</div>
                <div class="tab" data-tab="reports">Reports</div>
            </div>

            <div class="tab-content active" id="posts">
                <div class="card">
                    <div class="card-header">
                        <h2>Posts Awaiting Moderation</h2>
                    </div>

                    <div class="search-filter">
                        <input type="text" class="form-control" placeholder="Search posts...">
                        <select class="form-control">
                            <option>Filter by Category</option>
                            <option>News</option>
                            <option>Tutorials</option>
                            <option>Updates</option>
                        </select>
                        <button class="btn btn-primary">Apply</button>
                    </div>

                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th width="50px"><input type="checkbox"></th>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Submitted</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>501</td>
                                    <td>Getting Started with React</td>
                                    <td>john_doe</td>
                                    <td>Tutorials</td>
                                    <td><span class="status-badge status-pending">Pending</span></td>
                                    <td>2023-06-15</td>
                                    <td>
                                        <button class="btn btn-sm btn-success">Approve</button>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>502</td>
                                    <td>System Maintenance Announcement</td>
                                    <td>admin</td>
                                    <td>Updates</td>
                                    <td><span class="status-badge status-pending">Pending</span></td>
                                    <td>2023-06-14</td>
                                    <td>
                                        <button class="btn btn-sm btn-success">Approve</button>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="comments">
                <div class="card">
                    <div class="card-header">
                        <h2>Comments Moderation</h2>
                    </div>

                    <div class="search-filter">
                        <input type="text" class="form-control" placeholder="Search comments...">
                        <button class="btn btn-primary">Apply</button>
                    </div>

                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th width="50px"><input type="checkbox"></th>
                                    <th>ID</th>
                                    <th>Content</th>
                                    <th>Author</th>
                                    <th>Post</th>
                                    <th>Status</th>
                                    <th>Submitted</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>201</td>
                                    <td>This is a great tutorial, thanks!</td>
                                    <td>user123</td>
                                    <td>Getting Started with React</td>
                                    <td><span class="status-badge status-active">Approved</span></td>
                                    <td>2023-06-15</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>202</td>
                                    <td>I found a typo in section 3...</td>
                                    <td>editor_user</td>
                                    <td>Advanced CSS Techniques</td>
                                    <td><span class="status-badge status-active">Approved</span></td>
                                    <td>2023-06-14</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="reports">
                <div class="card">
                    <div class="card-header">
                        <h2>Reported Content</h2>
                    </div>

                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th width="50px"><input type="checkbox"></th>
                                    <th>ID</th>
                                    <th>Content Type</th>
                                    <th>Content</th>
                                    <th>Report Reason</th>
                                    <th>Reported By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>301</td>
                                    <td>Comment</td>
                                    <td>This is spam content...</td>
                                    <td>Spam</td>
                                    <td>user456</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">View</button>
                                        <button class="btn btn-sm btn-danger">Remove</button>
                                        <button class="btn btn-sm btn-success">Dismiss</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>302</td>
                                    <td>Post</td>
                                    <td>Controversial opinion piece</td>
                                    <td>Inappropriate</td>
                                    <td>moderator1</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">View</button>
                                        <button class="btn btn-sm btn-danger">Remove</button>
                                        <button class="btn btn-sm btn-success">Dismiss</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple tab switching functionality
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs and contents
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                
                // Add active class to clicked tab and corresponding content
                tab.classList.add('active');
                const tabId = tab.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });
    </script>
</body>
</html>