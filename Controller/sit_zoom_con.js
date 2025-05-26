// Load selected seats from sessionStorage
        let selectedSeats = JSON.parse(sessionStorage.getItem('selectedSeats')) || [];
        
        const seatMap = document.getElementById('seatMap');
        const seatTooltip = document.getElementById('seatTooltip');
        const zoomInBtn = document.getElementById('zoomIn');
        const zoomOutBtn = document.getElementById('zoomOut');
        const resetZoomBtn = document.getElementById('resetZoom');
        const selectedSeatsDisplay = document.getElementById('selectedSeats');
        const totalPriceDisplay = document.getElementById('totalPrice');
        
        let currentScale = 1;
        
        // Generate seats in a grid pattern
        const seatTypes = ['standard', 'vip', 'wheelchair'];
        const seatPrices = [50, 100, 75];
        
        for (let i = 0; i < 50; i++) {
            const seat = document.createElement('div');
            seat.className = 'seat';
            
            const typeIndex = Math.floor(Math.random() * seatTypes.length);
            const type = seatTypes[typeIndex];
            const price = seatPrices[typeIndex];
            
            seat.classList.add(type);
            seat.dataset.price = price;
            seat.dataset.type = type;
            seat.dataset.number = i + 1;
            
            const row = Math.floor(i / 10);
            const col = i % 10;
            const left = 100 + col * 60;
            const top = 50 + row * 60;
            seat.style.left = `${left}px`;
            seat.style.top = `${top}px`;
            
            seat.textContent = i + 1;
            
            // Check if seat is selected
            if (selectedSeats.includes(i + 1)) {
                seat.classList.add('selected');
            }
            
            // Hover for price/features
            seat.addEventListener('mouseover', (e) => {
                seatTooltip.textContent = `Seat ${seat.dataset.number}: $${seat.dataset.price} (${seat.dataset.type})`;
                seatTooltip.style.left = `${e.pageX}px`;
                seatTooltip.style.top = `${e.pageY}px`;
                seatTooltip.style.opacity = '1';
            });
            
            seat.addEventListener('mouseout', () => {
                seatTooltip.style.opacity = '0';
            });
            
            seat.addEventListener('mousemove', (e) => {
                seatTooltip.style.left = `${e.pageX}px`;
                seatTooltip.style.top = `${e.pageY}px`;
            });
            
            // Seat selection
            seat.addEventListener('click', () => {
                const seatNumber = seat.dataset.number;
                const index = selectedSeats.indexOf(seatNumber);
                
                if (index === -1) {
                    selectedSeats.push(seatNumber);
                    seat.classList.add('selected');
                } else {
                    selectedSeats.splice(index, 1);
                    seat.classList.remove('selected');
                }
                
                updateSelectedSeatsDisplay();
                sessionStorage.setItem('selectedSeats', JSON.stringify(selectedSeats));
            });
            
            seatMap.appendChild(seat);
        }
        
        function updateSelectedSeatsDisplay() {
            if (selectedSeats.length === 0) {
                selectedSeatsDisplay.textContent = 'None';
                totalPriceDisplay.textContent = '0';
                return;
            }
            
            selectedSeatsDisplay.textContent = selectedSeats.join(', ');
            
            let total = 0;
            document.querySelectorAll('.seat').forEach(seat => {
                if (selectedSeats.includes(seat.dataset.number)) {
                    total += parseInt(seat.dataset.price);
                }
            });
            
            totalPriceDisplay.textContent = total;
        }
        
        updateSelectedSeatsDisplay();

        document.getElementById('resetSelection')?.addEventListener('click', () => {
        // Clear selected seats from sessionStorage
        sessionStorage.removeItem('selectedSeats');
        selectedSeats = [];
        
        // Update UI
        document.querySelectorAll('.seat.selected').forEach(seat => {
            seat.classList.remove('selected');
        });
        
        updateSelectedSeatsDisplay();
        });
        
        // Zoom functionality
        zoomInBtn.addEventListener('click', () => {
            currentScale *= 1.2;
            seatMap.style.transform = `scale(${currentScale})`;
        });
        
        zoomOutBtn.addEventListener('click', () => {
            currentScale /= 1.2;
            seatMap.style.transform = `scale(${currentScale})`;
        });
        
        resetZoomBtn.addEventListener('click', () => {
            currentScale = 1;
            seatMap.style.transform = 'scale(1)';
        });