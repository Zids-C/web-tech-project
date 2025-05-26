// Load selected seats from sessionStorage
        let selectedSeats = JSON.parse(sessionStorage.getItem('selectedSeats')) || [];
        const selectedSeatsDisplay = document.getElementById('selectedSeats');
        const totalPriceDisplay = document.getElementById('totalPrice');
        
        // Calculate total price
        function updateTotalPrice() {
            let total = 0;
            if (selectedSeats.length > 0) {
                // For demo, we'll assume each seat is $50
                total = selectedSeats.length * 50;
            }
            totalPriceDisplay.textContent = total;
            
            if (selectedSeats.length === 0) {
                selectedSeatsDisplay.textContent = 'None';
            } else {
                selectedSeatsDisplay.textContent = selectedSeats.join(', ');
            }
        }
        
        updateTotalPrice();
        
        // Payment method selection
        const paymentMethods = document.querySelectorAll('.payment-method');
        const cardForm = document.getElementById('cardForm');
        
        paymentMethods.forEach(method => {
            method.addEventListener('click', () => {
                paymentMethods.forEach(m => m.classList.remove('selected'));
                method.classList.add('selected');
                
                if (method.id === 'creditCard') {
                    cardForm.style.display = 'block';
                } else {
                    cardForm.style.display = 'none';
                }
            });
        });
        
        // Split payment toggle
        const splitToggle = document.getElementById('splitToggle');
        const splitDetails = document.getElementById('splitDetails');
        
        splitToggle.addEventListener('click', () => {
            const checkbox = document.getElementById('splitPayment');
            checkbox.checked = !checkbox.checked;
            
            if (checkbox.checked) {
                splitDetails.classList.add('active');
            } else {
                splitDetails.classList.remove('active');
            }
        });
        
        
        // Payment button
        const payButton = document.getElementById('payButton');
        const ticketConfirmation = document.getElementById('ticketConfirmation');
        
        payButton.addEventListener('click', () => {
            // In a real app, this would process the payment
            payButton.textContent = 'Processing...';
            
            setTimeout(() => {
                ticketConfirmation.classList.add('active');
                payButton.style.display = 'none';
                
                // Save transaction to sessionStorage
                const transaction = {
                    date: new Date().toLocaleString(),
                    seats: selectedSeats,
                    amount: selectedSeats.length * 50,
                    method: document.querySelector('.payment-method.selected h3').textContent
                };
                sessionStorage.setItem('lastTransaction', JSON.stringify(transaction));
            }, 1500);
        });