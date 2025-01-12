<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data from the POST request
    $clinic = $_POST['clinic']; 
    $doctor = $_POST['doctor']; 
    $name = $_POST['contact-name']; 
    $email = $_POST['contact-email']; 
    $phone = $_POST['contact-phone']; 
    $date = $_POST['contact-date']; 
    $time = $_POST['contact-time']; 

    // Email details
    $to = "admin@sketchhub.co.in"; // Replace with your email address
    $subject = "New Appointment Booking from $name";
    
    // Build the email body with the form data
    $message = "
    <html>
    <head>
    <title>Appointment Booking</title>
    </head>
    <body>
    <h3>New Appointment Details</h3>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Phone:</strong> $phone</p>
    <p><strong>Clinic:</strong> $clinic</p>
    <p><strong>Doctor:</strong> $doctor</p>
    <p><strong>Date:</strong> $date</p>
    <p><strong>Time:</strong> $time</p>
    </body>
    </html>
    ";
    
    // Set headers to send HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";  // The sender's email

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Appointment booked successfully! We will get back to you soon.";
    } else {
        echo "There was an error while sending your email. Please try again.";
    }
} else {
    // If the form is not submitted, show an error message
    echo "Form submission error.";
}
?>
