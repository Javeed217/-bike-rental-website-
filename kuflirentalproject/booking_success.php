<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-success">
            <h4 class="alert-heading">Booking Successful!</h4>
            <p>Your bike rental has been confirmed. Thank you for choosing Kufli Rentals.</p>
            <hr>
            <p class="mb-0">You'll receive a confirmation email with all the details shortly.</p>
        </div>
        <a href="bikerentalsystem.html" class="btn btn-primary">Back to Home</a>
    </div>
</body>
</html>