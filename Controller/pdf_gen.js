// Load transaction data from sessionStorage
        const transaction = JSON.parse(sessionStorage.getItem('lastTransaction')) || {};
        const selectedSeats = transaction.seats || [];
        
        // Update invoice details
        document.getElementById('invoiceDate').textContent = transaction.date || new Date().toLocaleString();
        document.getElementById('orderNumber').textContent = '#' + Math.floor(Math.random() * 1000000);
        
        const seatsList = document.getElementById('seatsList');
        let subtotal = 0;
        
        if (selectedSeats.length > 0) {
            selectedSeats.forEach(seat => {
                const seatRow = document.createElement('div');
                seatRow.className = 'invoice-row';
                seatRow.innerHTML = `<span>Seat ${seat}:</span> <span>$50.00</span>`;
                seatsList.appendChild(seatRow);
                subtotal += 50;
            });
        } else {
            seatsList.innerHTML = '<div class="invoice-row"><span>No seats selected</span></div>';
        }
        
        document.getElementById('subtotal').textContent = '$' + subtotal.toFixed(2);
        document.getElementById('totalAmount').textContent = '$' + (subtotal + 5).toFixed(2);
        
        // Button functionality
        document.getElementById('downloadInvoice').addEventListener('click', () => {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    doc.setFontSize(16);
    doc.text('Invoice', 90, 20);

    doc.setFontSize(12);
    doc.text(`Event: Summer Music Festival 2023`, 20, 40);
    doc.text(`Date: ${document.getElementById('invoiceDate').textContent}`, 20, 50);
    doc.text(`Order Number: ${document.getElementById('orderNumber').textContent}`, 20, 60);

    let y = 80;
    doc.text('Seats:', 20, y);
    y += 10;

    if (selectedSeats.length > 0) {
        selectedSeats.forEach((seat, index) => {
            doc.text(`Seat ${seat}: $50.00`, 30, y);
            y += 10;
        });
    } else {
        doc.text('No seats selected', 30, y);
        y += 10;
    }

    y += 10;
    doc.text(`Subtotal: $${subtotal.toFixed(2)}`, 20, y);
    y += 10;
    doc.text(`Service Fee: $5.00`, 20, y);
    y += 10;
    doc.setFontSize(14);
    doc.text(`Total: $${(subtotal + 5).toFixed(2)}`, 20, y);

    doc.save('Invoice.pdf');
});

        
        document.getElementById('emailInvoice').addEventListener('click', () => {
            alert('Invoice sent to your email!');
        });
        
        document.getElementById('downloadTickets').addEventListener('click', () => {
            alert('Tickets downloaded!');
        });