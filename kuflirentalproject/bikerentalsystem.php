<?php
session_start(); 
?>
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
   :root {
      --primary-color: #006039;
      --white: #ffffff;
      --text-color: #333;
      --light-bg: #f4f6f8;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background: var(--light-bg);
      color: var(--text-color);
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
      padding: 0;
    }

    
    .navbar {
      background-color: var(--primary-color);
      padding: 15px 0;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .navbar-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }
    
    .navbar-brand {
      color: var(--white) !important;
      font-weight: bold;
      font-size: 1.5rem;
      text-decoration: none;
    }
    
    .nav-menu {
      display: flex;
      align-items: center;
    }
    
    .nav-links {
      display: flex;
      gap: 20px;
      margin-right: 20px;
      list-style: none;
      padding: 0;
      margin: 0;
    }
    
    .nav-link {
      color: var(--white) !important;
      font-weight: 500;
      text-decoration: none;
      transition: color 0.3s;
      padding: 8px 12px;
    }
    
    .nav-link:hover {
      color: rgba(255, 255, 255, 0.8) !important;
    }
    
    .nav-link.active {
      font-weight: 600;
      
    }
    
    
    .rental-section {
      position: relative;
      height: 100vh;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .bg-video {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .overlay {
      background: rgba(0, 0, 0, 0.6);
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: left;
      color: white;
      padding: 0 10%;
    }

    .overlay .content-box {
      max-width: 700px;
    }

    .overlay h1 {
      font-size: 3rem;
      font-weight: 700;
      margin-bottom: 20px;
      line-height: 1.2;
    }

    .overlay p {
      font-size: 1.2rem;
      margin-bottom: 10px;
    }

    
    .card-container {
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
      padding: 40px;
    }
    
    .card {
      width: 300px;
      min-height: 350px;
      background-color: var(--white);
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 25px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
    }

   
    .footer {
      background-color: var(--primary-color);
      color: #f1f1f1;
      padding: 40px 0;
      margin-top: auto;
    }

    
    @media (max-width: 768px) {
      .navbar-container {
        flex-direction: column;
      }
      
      .nav-menu {
        flex-direction: column;
        width: 100%;
        margin-top: 15px;
      }
      
      .nav-links {
        flex-direction: column;
        gap: 10px;
        margin-right: 0;
        width: 100%;
      }
      
      .overlay {
        padding: 0 20px;
        text-align: center;
      }
      
      .overlay h1 {
        font-size: 2.2rem;
      }
      
      .overlay p {
        font-size: 1rem;
      }
      
      .card-container {
        padding: 20px;
      }
    }
    .footer .social-icons i {
      margin-right: 15px;
      font-size: 18px;
      color: #ccc;
      transition: color 0.3s;
    }
    
    .footer .social-icons i:hover {
      color: var(--white);
    }
    .choose-box {
  width: 300px;
  height: 180px;
  background-color: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  padding: 15px 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.choose-box h5 {
  font-size: 18px;
  font-weight: 600;
  margin-bottom: 8px;
  text-align: center;
}

.choose-box p {
  font-size: 14px;
  text-align: center;
  color: #555;
  line-height: 1.4

  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="bikerentalsystem.php">Kufli Rentals</a>
    
    <ul class="nav nav-underline">
      <li class="nav-item">
        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'bikerentalsystem.php' ? 'active' : ''; ?>" 
           href="bikerentalsystem.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'rental.php' ? 'active' : ''; ?>" 
           href="rental.php">Rentals</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'bookingform.php' ? 'active' : ''; ?>" 
           href="bookingform.php">Book Now</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>" 
           href="about.php">About Us</a>
      </li>
      <?php if(isset($_SESSION['user_id'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>

<section class="rental-section position-relative">
  <video autoplay muted loop class="bg-video">
    <source src="coverr-bikers-driving-at-a-high-altitude-close-to-a-mountain-peak-7946-1080p.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <div class="overlay">
    <div class="content-box">
      <h1>FAST AND EASY WAY <br>TO RENT A BIKE.</h1>
      <p>
        Discover a seamless bike rental experience with us. Choose from a range of standard to premium vehicles that suit your style and needs.
      </p>
      <p><strong>Quick, easy, and reliable - rent your ride today!</strong></p>
    </div>
  </div>
</section><br><br>
<h1 class="section-title" s><center>OUR BIKE COLLECTION</center></h1>

<div class="card-container">
  <div class="card">
    <h5 class="card-title">COMMUTER BIKES</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Details:</h6>
    <p class="card-text">Efficient, comfortable, and built for everyday travel—our commuter bikes are ideal for navigating traffic and short-to-medium rides.
      Designed with practicality and fuel economy in mind.
      Enjoy the ride!</p>
    <a href="rental.php" class="card-link">Click Here</a>
  </div>

  <div class="card">
    <h5 class="card-title">STANDARD BIKES</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Details:</h6>
    <p class="card-text">Reliable and economical, perfect for daily commutes and city rides. 
      Experience smooth performance and fuel efficiency with our standard bikes.<br>
      Enjoy the ride!</p>
    <a href="rental.php" class="card-link">Click Here</a>
  </div>

  <div class="card">
    <h5 class="card-title">PREMIUM BIKES</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Details:</h6>
    <p class="card-text">Unleash the thrill of riding with our premium bikes. Designed for performance and comfort, these bikes are perfect for long trips and highway cruising.<br>
      Enjoy the ride!</p>
    <a href="rental.php" class="card-link">Click Here</a>
  </div>
</div><br><br>

  <h1><center>OUR RENTAL PLANS</center></h1><br>
  <div style="display: flex; gap: 30px; justify-content: center; flex-wrap: wrap;">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Commuter Rentals</h5>
        
        <p class="card-text">Perfect for everyday commuting and short-distance rides</p>
        <ul>
          <li>Lightweight and easy to handle</li>
          <li>Great mileage and fuel efficiency</li>
          <li>Helmet included</li>
          <li>Ideal for traffic and city travel</li>
          <li>Budget-friendly option</li>
          <li>Low maintenance and hassle-free</li>
          <li>Quick pickup and return process</li>
        </ul>
        <h4 style="font-weight: bold;">From 1200/- per day.</h4>
      </div>
    </div>
   
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Standard Rentals</h5>
          
          <p class="card-text">Perfect for casual rides and city exploration</p>
          <ul>
            <li>Confortable city bikes</li>
            <li>Helmet included</li>
            <li>Lock provided</li>
            <li>Basic maintenance kit</li>
            <li>Ideal for beginners</li>
            <li>Fuel efficient model</li>
            <li>Easy booking process</li>
          </ul>
          <h4 style="font-weight: bold;">From 1600/- per day.</h4>
        </div>
      </div>
    
    
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Premium Rental</h5>
          
          <p class="card-text">Perfect for long-distance travel and premium experience.</p>
          <ul>
            <li>Helmet included</li>
            <li>Lock provided</li>
            <li>Roadside assistance included</li>
            <li>GPS-enabled bikes</li>
            <li>Designed for touring comfort</li>
            <li>Premium booking service</li>
          </ul>
          <h4 style="font-weight: bold;">From 4000/- per day.</h4>
          
        </div>
      </div>
  </div><br><br><br><br>
  <h1><center>WHY CHOOSE US</center></h1>
<div style="display: flex; gap: 30px; justify-content: center; flex-wrap: wrap; padding: 20px;">
  <div class="choose-box">
   <center><img src="directions_bike_16dp_3B82F6_FILL0_wght400_GRAD0_opsz20.png" width="40px" height="40px"></center>
    <h5>Variety Of Bikes</h5>
    <p>Choose from our city bikes, mountain bikes, e-bikes, and family bikes.</p>
  </div>
  <div class="choose-box">
    <center><img src="schedule_16dp_3B82F6_FILL0_wght400_GRAD0_opsz20.png" width="40px" height="40px"></center>
    <h5>Flexible Rental Periods</h5>
    <p>Hourly, daily, weekly & monthly options with easy extensions and returns.</p>
  </div>
  <div class="choose-box">
    <center><img src="group_16dp_3B82F6_FILL0_wght400_GRAD0_opsz20.png" width="40px" height="40px"></center>
    <h5>Group Discounts</h5>
    <p>Special rates for 5+ riders, corporate events & tour groups.</p>
  </div>
</div>
<div style="display: flex; gap: 30px; justify-content: center; flex-wrap: wrap; padding: 20px;">
    <div class="choose-box">
        <center><img src="build_16dp_3B82F6_FILL0_wght400_GRAD0_opsz20.png" width="40px" height="40px"></center>
        <h5>Free Maintenance</h5>
        <p>Complimentary basic maintenance and adjustments during your rental period</p>
    </div>
    <div class="choose-box">
        <center><img src="shield_16dp_3B82F6_FILL0_wght400_GRAD0_opsz20.png" width="40px" height="40px"></center>
        <h5>Insurance Options</h5>
        <p>Optional insurance coverage for peace of mind during your adventures</p>
    </div>
    <div class="choose-box">
         <center><img src="location_on_16dp_3B82F6_FILL0_wght400_GRAD0_opsz20.png" width="40px" height="40px"></center>
        <h5>Multiple Locations</h5>
        <p>Convenient pickup and drop-off points across the city</p>

    </div>
</div>




<footer class="footer">
  <div class="container">
    <div class="row text-center text-md-start">
      <div class="col-md-4 mb-4">
        <h5>Contact Us</h5>
        <p>📞 +91 98480 22338</p>
        <p>✉️ webproject@srmap.edu.in</p>
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