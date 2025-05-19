<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendee Lookup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="venue-container">
        <div class="nav-bar">
            <a href="QR_scan.php" class="nav-link">QR Scanner</a>
            <a href="Atn_lookup.php" class="nav-link active">Attendee Lookup</a>
            <a href="Badge_printer.php" class="nav-link">Badge Printer</a>
        </div>
        
        <h1>Attendee Lookup</h1>
        
        <div class="checkin-container">
            <div class="checkin-section">
                <h2>Search Attendees</h2>
                <p>Look up attendees by name, email, or order number.</p>
                
                <div class="attendee-search">
                    <div class="form-group">
                        <input type="text" id="searchInput" placeholder="Enter name, email, or order number" style="width: 100%;">
                    </div>
                    <button class="scan-btn" id="searchBtn">Search</button>
                </div>
                
                <div class="search-results" id="searchResults">
                    <div class="attendee-card" onclick="selectAttendee('user1')">
                        <h3>Sarah Johnson</h3>
                        <p>sarah.johnson@example.com</p>
                        <p>Order #EVT-2023-5876</p>
                    </div>
                    <div class="attendee-card" onclick="selectAttendee('user2')">
                        <h3>Michael Chen</h3>
                        <p>michael.c@example.com</p>
                        <p>Order #EVT-2023-1254</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('searchBtn').addEventListener('click', function() {
            const query = document.getElementById('searchInput').value;
            if (!query) {
                alert('Please enter a search term');
                return;
            }
            
            // In a real app, this would search a database
            this.disabled = true;
            this.textContent = 'Searching...';
            
            setTimeout(() => {
                document.getElementById('searchResults').style.display = 'block';
                this.disabled = false;
                this.textContent = 'Search';
            }, 1000);
        });
        
        function selectAttendee(userId) {
            // In a real app, this would load attendee details
            alert(`Selected attendee ${userId}`);
            sessionStorage.setItem('selectedAttendee', userId);
        }
    </script>
</body>
</html>