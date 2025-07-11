<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About Us</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
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
      border-bottom: 1px solid #ddd;
      font-size: 1.8rem;
      font-weight: bold;
      text-align: center;
    }

    .card-body {
      padding: 30px;
      background-color: #ffffff;
    }

    .card-body p {
      font-size: 1.05rem;
      line-height: 1.8;
      margin-bottom: 1rem;
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
        About Us
      </div>
      <div class="card-body">
        <p><strong>Chronological Development of DNCC</strong></p>

        <p>From its beginning as a small city with a few thousand people, Dhaka actually experienced dramatic turns upward...</p>

        <p><strong>a. British Period</strong><br>Dhaka Municipality was established on 1st August, 1864... Mr. Ananda Chandra Roy was the first elected Chairman...</p>

        <p><strong>b. Pakistan Period</strong><br>After the partition of India, Dhaka became the provincial capital...</p>

        <p><strong>c. Bangladesh Period</strong><br>Dhaka became the capital of Bangladesh with the independence in 1971... The city area was divided into 50 wards...</p>

        <a href="{{ route('home') }}" class="btn btn-secondary btn-back">Back</a>
      </div>
    </div>
  </div>
</body>
</html>
