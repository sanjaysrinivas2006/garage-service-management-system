document.getElementById('appointment-form').addEventListener('submit', async function (e) {
    e.preventDefault();

    const service = document.getElementById('service').value;
    const date = document.getElementById('date').value;
    const time = document.getElementById('time').value;
    const contact = document.getElementById('contact').value;

    const appointmentData = {
        service,
        date,
        time,
        contact,
    };

    // Send appointment data to server
    const response = await fetch('/api/book-appointment', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(appointmentData),
    });

    const result = await response.json();

    if (result.success) {
        alert('Appointment booked successfully!');
        document.getElementById('appointment-form').reset();
    } else {
        alert('Error booking appointment. Please try again.');
    }
});
