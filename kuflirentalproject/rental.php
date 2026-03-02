<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Kufli Rentals</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/jpg" href="Logo.JPG">

  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    
    body {
      font-family: "Syncopate", sans-serif;
      background-image: url('bgmimage.png');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      background-repeat: no-repeat;
      color: #333;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      position: relative;
    }
    
    
    
      100% {
        background-position: 200% 0;
      }
    }
    
    .premium-title {
      position: relative;
      display: inline-block;
    }
    
    
    
  
   
    h1.section-title {
      text-align: center !important; 
      margin: 40px auto 20px !important;
      width: 100% !important;
      font-size: 30px; 
      color: #000;
      animation: fadeIn 0.5s ease-out;
      text-shadow: 1px 1px 2px rgba(255,255,255,0.5);
    }
    
   
    .row.justify-content-center {
      justify-content: center !important;
      margin: 0 auto;
      max-width: 1200px;
    }
    
    .card {
      width: 300px; 
      min-height: 350px; 
      background-color: #fff;
      border-radius: 15px; 
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
      display: flex; 
      flex-direction: column; 
      justify-content: space-between;
      padding: 25px; 
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      opacity: 0;
      transform: translateY(20px);
      margin: 0 auto;
    }
    
    .card.show {
      opacity: 1;
      transform: translateY(0);
      transition: opacity 0.5s ease, transform 0.5s ease;
    }
    
    .card:hover { 
      transform: translateY(-5px) !important; 
      box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15); 
    }
    
    .card-title { 
      font-size: 22px; 
      font-weight: 600; 
      margin-bottom: 8px; 
      text-align: center; 
    }
    .card-subtitle { 
      font-size: 14px; 
      color: #888; 
      margin-bottom: 12px; 
      text-align: center; 
    }
    .card-text { 
      font-size: 15px; 
      line-height: 1.5; 
      color: #444; 
      flex-grow: 1; 
    }
    .navbar {
  background-color: #006039;
}

.navbar-brand, .nav-link {
  color: #fff !important;
}
    
    

    .footer {
      background-color:  #006039; 
      color: #f1f1f1; 
      padding: 40px 0;
    }
    .footer h5 { 
      color: #fff; 
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
    
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .bike-section {
      animation: fadeIn 0.5s ease-out;
      text-align: center;
    }
    @media (max-width: 768px) {
  .navbar-toggler {
    display: none !important;
  }
}

    
    .card:nth-child(1) { transition-delay: 0.1s; }
    .card:nth-child(2) { transition-delay: 0.2s; }
    .card:nth-child(3) { transition-delay: 0.3s; }
    .card:nth-child(4) { transition-delay: 0.4s; }
    .card:nth-child(5) { transition-delay: 0.5s; }
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
          <a class="nav-link active" href="rental.php">Rental</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bookingform.php">Book Now</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid mt-5">
    <div class="text-center my-4">
      <button class="btn btn-dark mx-2" onclick="showSection('commuter')">Commuter Bikes</button>
      <button class="btn btn-dark mx-2" onclick="showSection('standard')">Standard Bikes</button>
      <button class="btn btn-dark mx-2" onclick="showSection('premium')">Premium Bikes</button>
    </div>

    <div id="commuter" class="bike-section" style="display: none;">
      <h1 class="section-title">Commuter Bikes</h1>
      <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="hondashine.png" class="card-img-top" alt="Honda Shine" style="max-width: 90%; margin: auto;">
            <div class="card-body">
              <h5 class="card-title">Honda Shine</h5>
              <p class="card-text">India's most trusted commuter with unmatched reliability.</p>
              <b> Price- Rs.150/hr </b>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="hondaactiva.jpg" class="card-img-top" alt="Honda Activa" style="max-width: 90%; margin: auto;">
            <div class="card-body">
              <h5 class="card-title">Honda Activa</h5>
              <p class="card-text">Smooth, smart, and simple — the everyday scooter for everyone.</p>
              <b> Price- Rs.150/hr </b>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="access125.jpeg" class="card-img-top" alt="Suzuki Access" style="max-width: 90%; margin: auto;">
            <div class="card-body">
              <h5 class="card-title">Suzuki Access 125</h5>
              <p class="card-text">A practical, stylish scooter offering excellent performance and comfort.</p>
              <b> Price- Rs.150/hr </b>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mb-5">
        <a href="bookingform.php" class="btn btn-dark">Book a Commuter Bike</a>
      </div>
    </div>

    <div id="standard" class="bike-section" style="display: none;">
      <h1 class="section-title">Standard Bikes</h1>
      <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="r15img.png" class="card-img-top" alt="Yamaha R15" style="max-width: 90%; margin: auto;">
            <div class="card-body">
              <h5 class="card-title">Yamaha R15</h5>
              <p class="card-text">Sleek, powerful, and built for speed.</p>
              <b> Price- Rs.1200/day </b>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="jawa42.jpg" class="card-img-top" alt="Jawa 42" style="max-width: 90%; margin: auto;">
            <div class="card-body">
              <h5 class="card-title">Jawa 42 Standard</h5>
              <p class="card-text">The perfect urban cruiser.</p>
              <b> Price- Rs.1400/day </b>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="harley440.png" class="card-img-top" alt="Harley Davidson" style="max-width: 90%; margin: auto;">
            <div class="card-body">
              <h5 class="card-title">Harley Davidson x440</h5>
              <p class="card-text">Retro charm with modern tech.</p>
              <b> Price- Rs.1200/day </b>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mb-5">
        <a href="bookingform.php" class="btn btn-dark">Book a Standard Bike</a>
      </div>
    </div>

    <div id="premium" class="bike-section" style="display: none;">
      <div class="premium-title" id="premiumTitleContainer">
        <h1 class="section-title" id="premiumTitle">Premium Bikes</h1>
        <span class="sparkle" id="sparkle">✨</span>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="interceptor.jpg" class="card-img-top" alt="Interceptor 650" style="max-width: 90%; margin: auto;">
            <div class="card-body">
              <h5 class="card-title">Interceptor 650</h5>
              <p class="card-text">Unleash the power of a perfect blend of muscle and refinement.</p>
              <b>Price - Rs.1700/day</b>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="zx6r.png" class="card-img-top" alt="Kawasaki ZX-6R" style="max-width: 90%; margin: auto;">
            <div class="card-body">
              <h5 class="card-title">Kawasaki ZX-6R</h5>
              <p class="card-text">Purebred supersport bike with blistering performance.</p>
              <b>Price - Rs.2000/day</b>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mb-5">
        <a href="bookingform.php" class="btn btn-dark">Book a Premium Bike</a>
      </div>
    </div>
  </div>

  <footer class="footer mt-auto">
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
      <p class="text-center mt-3 mb-0">&copy; 2025 Kulfi Rentals. All rights reserved.</p>
    </div>
  </footer>

  <script>
    function showSection(id) {
      const sections = document.querySelectorAll('.bike-section');
      sections.forEach(section => {
        section.style.display = 'none';
      });
      
      const activeSection = document.getElementById(id);
      if (activeSection) {
        activeSection.style.display = 'block';
        
        const premiumTitle = document.getElementById('premiumTitle');
        const sparkle = document.getElementById('sparkle');
        const premiumContainer = document.getElementById('premiumTitleContainer');
        
        if (premiumTitle && sparkle && premiumContainer) {
          premiumContainer.classList.remove('glow');
          sparkle.classList.remove('visible');
          
          
          void premiumContainer.offsetWidth;
          
          
          if (id === 'premium') {
            premiumContainer.classList.add('glow');
            setTimeout(() => {
              sparkle.classList.add('visible');
            }, 800);
          }
        }
        
       
        const cards = activeSection.querySelectorAll('.card');
        cards.forEach(card => {
          card.classList.remove('show');
        });
        
        setTimeout(() => {
          cards.forEach((card, index) => {
            setTimeout(() => {
              card.classList.add('show');
            }, index * 100);
          });
        }, 50);
      }
    }
    
    window.onload = () => {
      showSection('commuter');
      
      setTimeout(() => {
        const cards = document.querySelectorAll('#commuter .card');
        cards.forEach((card, index) => {
          setTimeout(() => {
            card.classList.add('show');
          }, index * 100);
        });
      }, 50);
    };
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>