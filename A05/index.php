<?php
include("connect.php");

$query = "SELECT * FROM userinfo";
$result = executeQuery($query);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jaybook's User Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<style>
  body {
    background-color: #FFFFFF; /* Set background to white */
  }
  
  .title {
    color: #000; /* Plain black text */
    padding: 20px;
    font-size: 2.5rem;
    font-family: Arial, sans-serif;
    font-weight: bold;
    text-align: center;
  }

  .card {
    background-color: #FFFFFF; /* White background for card */
    border: 1px solid #CCC; /* Light grey border */
    border-radius: 5px;
    text-align: center;
    padding: 20px;
  }

  .card h5 {
    color: #000; /* Plain black text */
    font-weight: normal;
    margin: 10px 0;
  }

  .card h5 i {
    color: #333; /* Slightly dark icon color */
  }
</style>

<body>
  <div class="container-fluid mb-5">
    <h3 class="title">jaybook</h3>
  </div>

  <div class="container">
    <div class="row justify-content-center">
    <?php
      if (mysqli_num_rows($result) > 0) {
        while ($user = mysqli_fetch_assoc($result)) {
    ?>
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card text-start">
          <h4 class="card-title text-center mb-3">User Information</h4>
          <h5 class="firstName"><i class="fas fa-user"></i> First Name: <?php echo $user['firstName']; ?></h5>
          <h5 class="lastName"><i class="fas fa-user-tag"></i> Last Name: <?php echo $user['lastName']; ?></h5>
          <h5 class="birthDay"><i class="fas fa-calendar-alt"></i> Birth Day: <?php echo $user['birthDay']; ?></h5>
        </div>
      </div>
    <?php
        }
      } else {
        echo "<p class='text-center'>No user information found.</p>";
      }
    ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
