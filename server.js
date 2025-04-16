// Import required modules
const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql2');

const app = express();
const PORT = process.env.PORT || 3000;

// Middleware
app.use(bodyParser.json());
app.use(express.static('public'));

// Database connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',       // Replace with your MySQL username
    password: '',       // Replace with your MySQL password
    database: 'garage_services'
});

// Connect to database
db.connect(err => {
    if (err) {
        console.error('Database connection failed:', err);
        return;
    }
    console.log('Connected to MySQL database.');
});

// Route to book appointment
app.post('/api/book-appointment', (req, res) => {
    const { service, date, time, contact } = req.body;

    if (!service || !date || !time || !contact) {
        return res.status(400).json({ success: false, message: 'All fields are required!' });
    }

    const query = 'INSERT INTO appointments (service, date, time, contact) VALUES (?, ?, ?, ?)';
    db.query(query, [service, date, time, contact], (err, result) => {
        if (err) {
            console.error('Error inserting appointment:', err);
            return res.status(500).json({ success: false, message: 'Error booking appointment.' });
        }
        res.json({ success: true, message: 'Appointment booked successfully!' });
    });
});

// Route to get all appointments
app.get('/api/appointments', (req, res) => {
    const query = 'SELECT * FROM appointments';
    db.query(query, (err, results) => {
        if (err) {
            console.error('Error fetching appointments:', err);
            return res.status(500).json({ success: false, message: 'Error fetching appointments.' });
        }
        res.json({ success: true, appointments: results });
    });
});

// Start server
app.listen(PORT, () => {
    console.log(`Server running on http://localhost:${PORT}`);
});
