<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $birthDay = $_POST['birthDay'];

    $addData = "INSERT INTO userinfo (firstName, lastName, birthDay) VALUES ('$firstName', '$lastName', '$birthDay')";
    
    if (mysqli_query($conn, $addData)) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='text-center text-danger'>Error: " . mysqli_error($conn) . "</p>";
    }
}

$query = "SELECT * FROM userinfo";
$result = mysqli_query($conn, $query);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jaybook's User Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f7f9fc;
      font-family: Arial, sans-serif;
      color: #343a40;
    }

    .container {
      max-width: 800px;
      margin: auto;
    }

    .title {
      color: #4a4e69;
      font-size: 2.5rem;
      font-weight: bold;
      text-align: center;
      margin-top: 20px;
      padding: 20px;
    }

    .form-container {
      background-color: #fff;
      border: 1px solid #dee2e6;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }

    .card {
      background-color: #ffffff;
      border: none;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s;
    }

    .card:hover {
      transform: scale(1.05);
    }

    .card-title {
      font-size: 1.25rem;
      font-weight: bold;
      color: #343a40;
      margin-bottom: 15px;
    }

    .card h5 {
      color: #6c757d;
      font-weight: normal;
    }
  </style>
</head>

<body>
  <div class="container">
    <h3 class="title">Jaybook's User Info</h3>

<div class="form-container mb-4">
  <h4 class="text-center">Add New User</h4>
  <form method="POST" action="">
    <div class="mb-3">
      <label for="firstName" class="form-label">First Name</label>
      <input type="text" class="form-control" id="firstName" name="firstName" required>
    </div>
    <div class="mb-3">
      <label for="lastName" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="lastName" name="lastName" required>
    </div>
    <div class="mb-3">
      <label for="birthDay" class="form-label">Birthday</label>
      <input type="date" class="form-control" id="birthDay" name="birthDay" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Add User</button>
  </form>
</div>

    <div class="row justify-content-center">
      <?php
      if (mysqli_num_rows($result) > 0) {
          while ($user = mysqli_fetch_assoc($result)) {
      ?>
      <div class="col-md-6 mb-4">
        <div class="card p-3">
          <h4 class="card-title text-center">User Information</h4>
          <h5><i class="fas fa-user"></i> First Name: <?php echo $user['firstName']; ?></h5>
          <h5><i class="fas fa-user-tag"></i> Last Name: <?php echo $user['lastName']; ?></h5>
          <h5><i class="fas fa-calendar-alt"></i> Birth Day: <?php echo $user['birthDay']; ?></h5>
        </div>
      </div>
      <?php
          }
      } else {
          echo "<p class='text-center text-secondary'>No user information found.</p>";
      }
      ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
