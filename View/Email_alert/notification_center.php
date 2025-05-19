<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Center</title>
    <link rel="stylesheet" href="notification_styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="notification-container">
        <div class="notification-header">
            <h1><i class="fas fa-bell"></i> Notifications <span class="badge">3</span></h1>
            <div class="header-actions">
                <a href="notification_settings.php" class="btn settings-btn">
                    <i class="fas fa-cog" ></i> Settings
                </a>
                <button class="btn mark-all-read">Mark All as Read</button>
            </div>
        </div>

        <div class="notification-list">
            <div class="notification-item unread">
                <div class="notification-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="notification-content">
                    <h3>New follower</h3>
                    <p>JohnDoe started following you</p>
                    <span class="notification-time">2 minutes ago</span>
                </div>
                <div class="notification-actions">
                    <button class="btn-icon"><i class="fas fa-times"></i></button>
                </div>
            </div>

            <div class="notification-item unread">
                <div class="notification-icon">
                    <i class="fas fa-comment"></i>
                </div>
                <div class="notification-content">
                    <h3>New comment</h3>
                    <p>JaneSmith commented on your post</p>
                    <span class="notification-time">1 hour ago</span>
                </div>
                <div class="notification-actions">
                    <button class="btn-icon"><i class="fas fa-times"></i></button>
                </div>
            </div>

            <div class="notification-item">
                <div class="notification-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="notification-content">
                    <h3>Message received</h3>
                    <p>You have a new message from Support</p>
                    <span class="notification-time">3 hours ago</span>
                </div>
                <div class="notification-actions">
                    <button class="btn-icon"><i class="fas fa-times"></i></button>
                </div>
            </div>

            <div class="notification-item">
                <div class="notification-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="notification-content">
                    <h3>Event reminder</h3>
                    <p>Team meeting starts in 30 minutes</p>
                    <span class="notification-time">Yesterday</span>
                </div>
                <div class="notification-actions">
                    <button class="btn-icon"><i class="fas fa-times"></i></button>
                </div>
            </div>
        </div>

        <div class="notification-footer">
            <button class="btn load-more">Load More</button>
        </div>
    </div>

    <script>
        // Mark all as read functionality
        document.querySelector('.mark-all-read').addEventListener('click', function() {
            document.querySelectorAll('.notification-item').forEach(item => {
                item.classList.remove('unread');
            });
            document.querySelector('.badge').textContent = '0';
        });

        // Individual notification dismiss
        document.querySelectorAll('.btn-icon').forEach(btn => {
            btn.addEventListener('click', function() {
                const notification = this.closest('.notification-item');
                if (notification.classList.contains('unread')) {
                    const badge = document.querySelector('.badge');
                    badge.textContent = parseInt(badge.textContent) - 1;
                }
                notification.remove();
            });
        });
    </script>
</body>
</html>