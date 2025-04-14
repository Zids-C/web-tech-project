// Wizard navigation
function nextStep(currentStep) {
    document.getElementById(`step${currentStep}`).classList.remove('active');
    document.getElementById(`step${currentStep + 1}`).classList.add('active');
}

function prevStep(currentStep) {
    document.getElementById(`step${currentStep}`).classList.remove('active');
    document.getElementById(`step${currentStep - 1}`).classList.add('active');
}

// Format selection
function selectFormat(format) {
    const formatCards = document.querySelectorAll('.format-card');
    formatCards.forEach(card => card.classList.remove('selected'));
    
    event.currentTarget.classList.add('selected');
    document.querySelector(`input[value="${format}"]`).checked = true;
}

// Delivery method selection
function selectDelivery(method) {
    const deliveryCards = document.querySelectorAll('.delivery-card');
    deliveryCards.forEach(card => card.classList.remove('active'));
    
    event.currentTarget.classList.add('active');
    document.querySelector(`input[value="${method}"]`).checked = true;

    // Show/hide scheduling options
    const schedulingOptions = document.getElementById('scheduling-options');
    if (method === 'scheduled') {
        schedulingOptions.style.display = 'block';
    } else {
        schedulingOptions.style.display = 'none';
    }
}

// Show custom schedule field when custom frequency is selected
document.getElementById('schedule-frequency').addEventListener('change', function() {
    const customSchedule = document.getElementById('custom-schedule');
    if (this.value === 'custom') {
        customSchedule.style.display = 'block';
    } else {
        customSchedule.style.display = 'none';
    }
});

// Submit export
function submitExport() {
    // Get all selected options
    const dataSource = document.getElementById('export-source').value;
    const startDate = document.getElementById('start-date').value;
    const endDate = document.getElementById('end-date').value;
    const format = document.querySelector('input[name="export-format"]:checked').value;
    const deliveryMethod = document.querySelector('input[name="delivery-method"]:checked').value;

    // Hide current step and show success message
    document.getElementById(`step3`).classList.remove('active');
    const successMessage = document.getElementById('success-message');
    successMessage.style.display = 'block';

    // Set success message based on delivery method
    const successDetails = document.getElementById('success-details');
    if (deliveryMethod === 'download') {
        successDetails.textContent = 'Your data export is ready for download.';
        document.getElementById('download-btn').style.display = 'inline-block';
    } else if (deliveryMethod === 'email') {
        successDetails.textContent = 'Your data export will be sent to your email shortly.';
        document.getElementById('download-btn').style.display = 'none';
    } else if (deliveryMethod === 'scheduled') {
        const frequency = document.getElementById('schedule-frequency').value;
        successDetails.textContent = `Your ${frequency} export has been scheduled successfully.`;
        document.getElementById('download-btn').style.display = 'none';
    }

    // Simulate download (in a real app, this would be an actual download)
    document.getElementById('download-btn').addEventListener('click', function() {
        alert(`Downloading ${format.toUpperCase()} export of ${dataSource} from ${startDate} to ${endDate}`);
    });
}

// Start new export
function startNewExport() {
    // Reset form
    document.getElementById('success-message').style.display = 'none';
    document.getElementById('export-source').value = 'users';
    document.getElementById('start-date').value = '';
    document.getElementById('end-date').value = '';
    document.querySelector('input[value="csv"]').checked = true;
    document.querySelector('input[value="download"]').checked = true;
    
    // Reset UI states
    document.querySelectorAll('.format-card').forEach(card => card.classList.remove('selected'));
    document.querySelector('.format-card').classList.add('selected');
    
    document.querySelectorAll('.delivery-card').forEach(card => card.classList.remove('active'));
    document.querySelector('.delivery-card').classList.add('active');
    
    document.getElementById('scheduling-options').style.display = 'none';

    // Go back to step 1
    document.getElementById('success-message').style.display = 'none';
    document.getElementById('step1').classList.add('active');
}

// Set default dates (today and 30 days ago)
window.onload = function() {
    const today = new Date().toISOString().split('T')[0];
    const thirtyDaysAgo = new Date();
    thirtyDaysAgo.setDate(thirtyDaysAgo.getDate() - 30);
    const thirtyDaysAgoStr = thirtyDaysAgo.toISOString().split('T')[0];
    
    document.getElementById('end-date').value = today;
    document.getElementById('start-date').value = thirtyDaysAgoStr;
};