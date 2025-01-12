<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Path to PHPMailer autoload.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clinic = $_POST['clinic'];
    $doctor = $_POST['doctor'];
    $name = $_POST['contact-name'];
    $email = $_POST['contact-email'];
    $phone = $_POST['contact-phone'];
    $date = $_POST['contact-date'];
    $time = $_POST['contact-time'];

    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com'; // Replace with your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@sketchhub.co.in'; // Replace with your SMTP username
        $mail->Password = 'Sai@5412'; // Replace with your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 465;

        // Email setup
        $mail->setFrom('no-reply@sketchhub.co.in', 'SketchHub Admin');
        $mail->addAddress('admin@sketchhub.co.in'); // Admin email address

        $mail->isHTML(true);
        $mail->Subject = "New Appointment Booking from $name";
        $mail->Body = "
            <h3>New Appointment Details</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Clinic:</strong> $clinic</p>
            <p><strong>Doctor:</strong> $doctor</p>
            <p><strong>Date:</strong> $date</p>
            <p><strong>Time:</strong> $time</p>
        ";

        $mail->send();
        echo "Appointment booked successfully!";
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Form submission error.";
}
?>
