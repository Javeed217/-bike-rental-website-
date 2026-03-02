<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['user_id'];
    $pickupLocation = $_POST['pickupLocation'];
    $bikeType = $_POST['bikeType'];
    $bikeModel = $_POST['bikeModel'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $helmet = isset($_POST['helmet']) ? 1 : 0;
    $insurance = isset($_POST['insurance']) ? 1 : 0;
    $lock = isset($_POST['lock']) ? 1 : 0;
    
    
    $start = new DateTime($startDate);
    $end = new DateTime($endDate);
    $days = $start->diff($end)->days + 1; 
    
    try {
       
        $stmt = $conn->prepare("SELECT bike_id, daily_rate FROM bikes WHERE model_name = :model");
        $stmt->bindParam(':model', $bikeModel);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $bike = $stmt->fetch(PDO::FETCH_ASSOC);
            $bikeId = $bike['bike_id'];
            $basePrice = $bike['daily_rate'];
            
           
            $totalAmount = $basePrice * $days;
            if ($insurance) $totalAmount += 200 * $days; 
            
            
            $stmt = $conn->prepare("INSERT INTO bookings (user_id, bike_id, start_date, end_date, total_amount) 
                                  VALUES (:user_id, :bike_id, :start_date, :end_date, :total_amount)");
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':bike_id', $bikeId);
            $stmt->bindParam(':start_date', $startDate);
            $stmt->bindParam(':end_date', $endDate);
            $stmt->bindParam(':total_amount', $totalAmount);
            
            if ($stmt->execute()) {
                header("Location: booking_success.php");
                exit();
            }
        } else {
            $error = "Selected bike not found";
        }
    } catch(PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>