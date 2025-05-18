<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="profile_styles.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <h1>Edit Profile</h1>
            <div class="profile-actions">
                <a href="view_profile.html" class="btn secondary">Cancel</a>
            </div>
        </div>

        <form id="editProfileForm" class="profile-form">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" id="fullName" required placeholder="Name">
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" required placeholder="your@email.com">
            </div>

            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea id="bio" rows="4" required placeholder="about yourself"></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn">Save Changes</button>
                <a href="view_profile.html" class="btn secondary">Discard Changes</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('editProfileForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // In a real app, you would save the changes here
            alert('Profile updated successfully!');
            window.location.href = 'view_profile.html';
        });
    </script>
</body>
</html>