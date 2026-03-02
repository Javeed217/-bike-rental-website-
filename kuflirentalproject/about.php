<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Kufli Rentals</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="icon" type="image/jpg" href="Logo.JPG">
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
@media (max-width: 768px) {
  .navbar-toggler {
    display: none !important;
  }
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
      font-family: 'Segoe UI', sans-serif;
      background: #f4f6f8;
      margin: 0;
      padding: 0;
    }

    .navbar {
      background-color: #006039;
    }

    .navbar-brand, .nav-link {
      color: white !important;
    }

    .about-section {
      padding: 60px 20px;
    }

    .about-section h1 {
      font-size: 36px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 40px;
      color: #006039;
    }

    .about-img {
      width: 100%;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .about-content {
      font-size: 16px;
      line-height: 1.8;
      color: #444;
    }

    .feedback-form {
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      padding: 30px;
      max-width: 800px;
      margin: 60px auto;
    }

    .btn-custom {
      background-color: #006039;
      color: white;
      border-radius: 30px;
      padding: 10px 25px;
      font-weight: bold;
      border: none;
    }

    .btn-custom:hover {
      background-color: #00cc66;
    }
    </style>

</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">Kufli Rentals</a>
     
      <ul class="nav nav-underline">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="bikerentalsystem.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="rental.php">Rentals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bookingform.php">Book Now</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="about.php">About Us</a>
        </li>
       
      </ul>
    </div>
  </nav>

<div class="container about-section">
  <h1>About Us</h1>
  <div class="row align-items-center">
    <div class="col-md-6 mb-4">
      <img src="IMG_8820.JPG" alt="About Image" class="about-img">
    </div>
    <div class="col-md-6 about-content">
      <p>
        Welcome to <strong>Kufli Rentals</strong> – your trusted companion for convenient and reliable bike rentals. 
        Founded in 2025, we aim to offer a seamless and affordable rental experience to every customer. 
        Whether you're looking for a commuter, standard, or premium bike – we've got something for everyone.
      </p>
      <p>
        Customer satisfaction is our top priority. With a focus on safety, flexibility, and quality service, 
        we ensure your journey starts smooth and ends with a smile. 
        Ride with confidence. Ride with Kufli.
      </p>
    </div>
  </div>
</div>


<div class="feedback-form">
    <h2 class="text-center mb-4" style="color:#006039;">We Value Your Feedback</h2>
    
    <?php
    
    $successMessage = '';
    $errorMessage = '';

   
    require_once 'db_connection.php';

    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

        
        if (empty($name) || empty($email) || empty($message)) {
            $errorMessage = "Please fill in all fields.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMessage = "Please enter a valid email address.";
        } else {
            try {
                $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (:name, :email, :message)");
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':message', $message);
                
                if ($stmt->execute()) {
                    $successMessage = "Thank you for your feedback, " . htmlspecialchars($name) . "!";
                    // Clear form data after successful submission
                    $_POST = array();
                } else {
                    $errorMessage = "Error submitting feedback. Please try again.";
                }
            } catch(PDOException $e) {
                $errorMessage = "Database error: " . $e->getMessage();
                error_log("Feedback Error: " . $e->getMessage());
            }
        }
    }
    ?>
    
    <?php if ($successMessage): ?>
        <div class="alert alert-success"><?php echo $successMessage; ?></div>
    <?php endif; ?>
    
    <?php if ($errorMessage): ?>
        <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
    <?php endif; ?>
    
    <form method="POST" action="">
        <div class="mb-3">
            <label for="name" class="form-label">Your Name:</label>
            <input type="text" class="form-control" id="name" name="name" 
                   value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" 
                   required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address:</label>
            <input type="email" class="form-control" id="email" name="email" 
                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" 
                   required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Your Feedback:</label>
            <textarea class="form-control" id="message" name="message" rows="4" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-custom">Submit</button>
        </div>
    </form>
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
    <p class="text-center mt-3 mb-0">&copy; 2025 Kufli Rentals. All rights reserved.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
