<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <style>
    body {
      background-image: url('/uploads/users/facultyimg4.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      font-family: 'Arial', sans-serif;
      color: #343a40;
    }

    .card-custom {
      margin: 50px auto;
      max-width: 850px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    .card-header {
      background-color: #f8f9fa;
      font-size: 1.8rem;
      font-weight: bold;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }

    .card-body {
      padding: 30px;
      background-color: #ffffff;
    }

    .card-body h2 {
      font-size: 1.3rem;
      margin-top: 25px;
      color: #333;
    }

    .card-body p {
      font-size: 1.05rem;
      margin-bottom: 10px;
    }

    .contact-form .form-group label {
      font-weight: 600;
    }

    .btn-back {
      width: 100%;
      margin-top: 20px;
    }

    @media (max-width: 768px) {
      .card-body {
        padding: 20px;
      }

      .card-header {
        font-size: 1.5rem;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card card-custom">
      <div class="card-header">
        Contact Us
      </div>
      <div class="card-body">
        <div class="contact-details">
          <h2>Address</h2>
          <p>Nagar Bhaban<br>
            Dhaka North City Corporation<br>
            Gulshan Center Point<br>
            Plot No# 23-26, Road No# 46,<br>
            Gulshan-2, Dhaka-1212.
          </p>

          <h2>Contact</h2>
          <p><strong>Mobile:</strong> (+88) 01796430956</p>
          <p><strong>Hotline:</strong> 48117008</p>
          <p><strong>Email:</strong> <a href="mailto:kajol.99bd@gmail.com">kajol.99bd@gmail.com</a></p>

          <h2>Hours of Operation</h2>
          <p><strong>Sunday - Thursday:</strong> 9:00 AM - 4:00 PM</p>
          <p><strong>Friday & Saturday:</strong> Off Day</p>
        </div>

        <h2 class="mt-4">Fill the form below so we can get to know you and your needs better.</h2>
        <form class="contact-form mt-3">
          <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
          </div>

          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your message" required></textarea>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>

        <a href="{{ route('home') }}" class="btn btn-secondary btn-back">Back</a>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
