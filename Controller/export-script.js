// Format selection
function selectFormat(card) {
    const formatCards = document.querySelectorAll('.format-card');
    formatCards.forEach(c => c.classList.remove('selected'));
    card.classList.add('selected');
}

// Delivery method selection
function selectDelivery(card) {
    const deliveryCards = document.querySelectorAll('.delivery-card');
    deliveryCards.forEach(c => c.classList.remove('active'));
    card.classList.add('active');
}

// Event delegation for card selections
document.addEventListener('DOMContentLoaded', function() {
    // Format card selection
    document.querySelectorAll('.format-card').forEach(card => {
        card.addEventListener('click', function() {
            selectFormat(this);
            const radio = this.querySelector('input[type="radio"]');
            if (radio) radio.checked = true;
        });
    });

    // Delivery card selection
    document.querySelectorAll('.delivery-card').forEach(card => {
        card.addEventListener('click', function() {
            selectDelivery(this);
            const radio = this.querySelector('input[type="radio"]');
            if (radio) radio.checked = true;
            
            // Show/hide scheduling options
            const schedulingOptions = document.getElementById('scheduling-options');
            if (radio && radio.value === 'scheduled') {
                schedulingOptions.style.display = 'block';
            } else {
                schedulingOptions.style.display = 'none';
            }
        });
    });

    // Show custom schedule field when custom frequency is selected
    const scheduleFrequency = document.getElementById('schedule-frequency');
    if (scheduleFrequency) {
        scheduleFrequency.addEventListener('change', function() {
            const customSchedule = document.getElementById('custom-schedule');
            customSchedule.style.display = this.value === 'custom' ? 'block' : 'none';
        });
    }
});