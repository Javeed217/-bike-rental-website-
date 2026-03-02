<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bike Rental Booking Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar {
      background-color: #006039;
    }

    .navbar-brand, .nav-link {
      color: #fff !important;
    }

    .main-content {
      flex: 1;
      padding: 60px 15px;
      text-align: center;
    }

    .main-content img {
      max-width: 100%;
      height: auto;
      border-radius: 12px;
      margin-top: 20px;
    }

    .footer {
      background-color: #006039;
      color: #f1f1f1;
      padding: 40px 0;
    }

    .footer h5 {
      color: #ffffff;
      margin-bottom: 15px;
    }

    .footer a {
      color: #ccc;
      text-decoration: none;
    }

    .footer a:hover {
      color: #fff;
    }

    .footer .social-icons i {
      margin-right: 15px;
      font-size: 18px;
      color: #ccc;
    }

    .footer .social-icons i:hover {
      color: #fff;
    }
    
    body {
      background: #f0f2f5;
      color: #333333;
      font-family: 'Segoe UI', sans-serif;
    }

    .form-container {
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      padding: 30px;
      width: 800px;
      margin: 50px auto;
      transform: perspective(1000px) rotateX(2deg);
    }
    .form-container .form-label,
    .form-container .form-control,
    .form-container .form-select {
      width: 100%;
    }

    .form-label {
      color: #000000;
    }

    .button, .btn-custom {
      background-color: #006039;
      color: #ffffff;
      border: none;
      border-radius: 30px;
      padding: 10px 30px;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .button:hover, .btn-custom:hover {
      background-color: #00cc66;
    }

    .form-check-label {
      color: #666666;
    }
  </style>
</head>
<body>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'db_connection.php';


$successMessage = '';
$formError = '';
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Log the POST data for debugging
        error_log("POST data received: " . print_r($_POST, true));
        
        // Get form data
        $pickupLocation = $_POST['pickupLocation'] ?? '';
        $bikeType = $_POST['bikeType'] ?? '';
        $bikeModel = $_POST['bikeModel'] ?? '';
        $startDate = $_POST['startDate'] ?? '';
        $endDate = $_POST['endDate'] ?? '';
        $helmet = isset($_POST['helmet']) ? 1 : 0;
        $insurance = isset($_POST['insurance']) ? 1 : 0;
        $lock = isset($_POST['lock']) ? 1 : 0;
        $fullName = $_POST['fullName'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';

        // Log the processed data
        error_log("Processed form data: " . print_r([
            'pickupLocation' => $pickupLocation,
            'bikeType' => $bikeType,
            'bikeModel' => $bikeModel,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'helmet' => $helmet,
            'insurance' => $insurance,
            'lock' => $lock,
            'fullName' => $fullName,
            'email' => $email,
            'phone' => $phone
        ], true));

        // Validate required fields
        if (empty($pickupLocation) || empty($bikeType) || empty($bikeModel) || 
            empty($startDate) || empty($endDate) || empty($fullName) || 
            empty($email) || empty($phone)) {
            throw new Exception("All fields are required");
        }

        // Validate dates
        if (strtotime($endDate) < strtotime($startDate)) {
            throw new Exception("End date must be after start date");
        }

        // Check if the bookings table exists
        $checkTable = $conn->query("SHOW TABLES LIKE 'bookings'");
        if ($checkTable->rowCount() == 0) {
            throw new Exception("Bookings table does not exist. Please check database setup.");
        }

        // Insert into database
        $stmt = $conn->prepare("INSERT INTO bookings (pickupLocation, bikeType, bikeModel, startDate, endDate, helmet, insurance, `lock`, fullName, email, phone) 
                               VALUES (:pickupLocation, :bikeType, :bikeModel, :startDate, :endDate, :helmet, :insurance, :lock, :fullName, :email, :phone)");
        
        $stmt->bindParam(':pickupLocation', $pickupLocation);
        $stmt->bindParam(':bikeType', $bikeType);
        $stmt->bindParam(':bikeModel', $bikeModel);
        $stmt->bindParam(':startDate', $startDate);
        $stmt->bindParam(':endDate', $endDate);
        $stmt->bindParam(':helmet', $helmet, PDO::PARAM_INT);
        $stmt->bindParam(':insurance', $insurance, PDO::PARAM_INT);
        $stmt->bindParam(':lock', $lock, PDO::PARAM_INT);
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        
        // Log the SQL query
        error_log("Attempting to execute SQL query");
        
        if ($stmt->execute()) {
            $successMessage = 'Booking Completed Successfully!';
            error_log("Booking successfully inserted into database");
            // Clear form data after successful submission
            $_POST = array();
        } else {
            throw new Exception("Error processing your booking. Please try again.");
        }
    } catch (Exception $e) {
        $formError = $e->getMessage();
        error_log("Booking Error: " . $e->getMessage());
    } catch (PDOException $e) {
        $formError = "Database error: " . $e->getMessage();
        error_log("Database Error: " . $e->getMessage());
    }
}
?>

<header>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">Kufli Rentals</a>
      <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon bg-light"></span>
      </button>
      <ul class="nav nav-underline">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="bikerentalsystem.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="rental.php">Rental</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="bookingform.php">Book Now</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-container">
                <h2 class="text-center mb-4">Bike Booking Form</h2>
                
                <?php if (!empty($successMessage)): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo htmlspecialchars($successMessage); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (!empty($formError)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo htmlspecialchars($formError); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (!empty($errorMessage)): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php echo htmlspecialchars($errorMessage); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="alert alert-danger" id="formErrors" style="display: none;">
                    Please enter all required fields
                </div>

                <form class="needs-validation" method="post" action="" novalidate>
                    <div class="mb-4">
                        <label for="pickupLocation" class="form-label">Pickup Location</label>
                        <select class="form-select" id="pickupLocation" name="pickupLocation" required>
                            <option value="" disabled selected>Select Location</option>
                            <option value="Ongole">Ongole</option>
                            <option value="Guntur">Guntur</option>
                            <option value="Vijayawada">Vijayawada</option>
                            <option value="Nellore">Nellore</option>
                            <option value="Vizag">Vizag</option>
                            <option value="Hyderabad">Hyderabad</option>
                        </select>
                        <div class="invalid-feedback">Please select a pickup location</div>
                    </div>

                    <div class="mb-4">
                        <label for="bikeType" class="form-label">Bike Type</label>
                        <select class="form-select" id="bikeType" name="bikeType" onchange="ShowBikeOptions()" required>
                            <option value="" disabled selected>Select Type</option>
                            <option value="Commuter Bikes">Commuter Bikes</option>
                            <option value="Standard Bikes">Standard Bikes</option>
                            <option value="Premium Bikes">Premium Bikes</option>
                        </select>
                        <div class="invalid-feedback">Please select a bike type</div>
                    </div>

                    <div class="mb-4" id="bikeOptions">
                        <!-- Bike options will be populated by JavaScript -->
                    </div>

                    <div class="mb-4">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                        <div class="invalid-feedback">Please select a valid start date</div>
                    </div>

                    <div class="mb-4">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" required>
                        <div class="invalid-feedback">Please select a valid end date</div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Additional Options</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="helmet" name="helmet">
                            <label class="form-check-label" for="helmet">Helmet</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="insurance" name="insurance">
                            <label class="form-check-label" for="insurance">Insurance</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="lock" name="lock">
                            <label class="form-check-label" for="lock">Lock</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" required>
                        <div class="invalid-feedback">Please enter your full name</div>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                        <div class="invalid-feedback">Please enter a valid email address</div>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required pattern="[0-9]{10}">
                        <div class="invalid-feedback">Please enter a valid 10-digit phone number</div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn button">Book Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
  <div class="container">
    <div class="row text-center text-md-start">
      <div class="col-md-4 mb-4">
        <h5>Contact Us</h5>
        <p>📞 +91 98480 22338</p>
        <p>✉ webproject@srmap.edu.in</p>
        <p>📍 Guntur, Vijayawada</p>
      </div>
      <div class="col-md-4 mb-4">
        <h5>Hours</h5>
        <p>Mon - Fri: 9am - 6pm</p>
        <p>Saturday: 10am - 5pm</p>
        <p>Sunday: 10am - 4pm</p>
      </div>
      <div class="col-md-4 mb-4">
        <h5>Follow Us</h5>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </div>
    <hr style="border-color: #555;">
    <p class="text-center mt-3 mb-0">&copy; 2024 Kufli Rentals. All rights reserved.</p>
  </div>
</footer>

<script>
function ShowBikeOptions() {
  const bikeType = document.getElementById('bikeType').value;
  const bikeOptions = document.getElementById('bikeOptions');
  let options = '<label class="form-label">Select Model</label><select class="form-select" id="bikeModel" name="bikeModel" required><option value="" disabled selected>Select Model</option>';

  if (bikeType === 'Commuter Bikes') {
    options += '<option value="Honda Shine">Honda Shine</option>';
    options += '<option value="Honda Activa 6G">Honda Activa 6G</option>';
    options += '<option value="Suzuki Access 125">Suzuki Access 125</option>';
  } else if (bikeType === 'Standard Bikes') {
    options += '<option value="Yamaha R15">Yamaha R15</option>';
    options += '<option value="Jawa 42">Jawa 42</option>';
    options += '<option value="Harley-Davidson X440">Harley-Davidson X440</option>';
  } else if (bikeType === 'Premium Bikes') {
    options += '<option value="RE Interceptor 650">RE Interceptor 650</option>';
    options += '<option value="Kawasaki Ninja ZX-6R">Kawasaki Ninja ZX-6R</option>';
  }

  options += '</select><div class="invalid-feedback">Please select a bike model</div>';
  bikeOptions.innerHTML = options;
}

document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('form');
  
  if (document.getElementById('bikeType').value) {
    ShowBikeOptions();
  }

  // Add validation styles on form submission
  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
    
    if (!form.checkValidity()) {
      event.stopPropagation();
    }
    
    // Validate dates
    const startDate = document.getElementById('startDate');
    const endDate = document.getElementById('endDate');
    
    if (startDate.value && endDate.value) {
      const start = new Date(startDate.value);
      const end = new Date(endDate.value);
      const today = new Date();
      today.setHours(0, 0, 0, 0);
      
      if (start < today) {
        startDate.setCustomValidity('Start date cannot be in the past');
        event.preventDefault();
      } else if (end < start) {
        endDate.setCustomValidity('End date must be after start date');
        event.preventDefault();
      } else {
        startDate.setCustomValidity('');
        endDate.setCustomValidity('');
      }
    }

    form.classList.add('was-validated');
    
    // Show all validation messages in the error summary
    if (!form.checkValidity()) {
      const formErrors = document.getElementById('formErrors');
      formErrors.style.display = 'block';
    } else {
      document.getElementById('formErrors').style.display = 'none';
      // If form is valid, submit it
      form.submit();
    }
  });

  // Clear custom validity on input
  const inputs = form.querySelectorAll('input, select');
  inputs.forEach(input => {
    input.addEventListener('input', function() {
      this.setCustomValidity('');
      if (form.classList.contains('was-validated')) {
        form.classList.remove('was-validated');
      }
      document.getElementById('formErrors').style.display = 'none';
    });
  });

  // Date input validation
  const startDate = document.getElementById('startDate');
  const endDate = document.getElementById('endDate');
  
  startDate.addEventListener('change', function() {
    if (endDate.value) {
      const start = new Date(this.value);
      const end = new Date(endDate.value);
      if (end < start) {
        endDate.setCustomValidity('End date must be after start date');
      } else {
        endDate.setCustomValidity('');
      }
    }
  });

  endDate.addEventListener('change', function() {
    if (startDate.value) {
      const start = new Date(startDate.value);
      const end = new Date(this.value);
      if (end < start) {
        this.setCustomValidity('End date must be after start date');
      } else {
        this.setCustomValidity('');
      }
    }
  });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>