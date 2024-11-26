<?php
include("connect.php");

$id = $_GET['id'];

if (isset($_POST['btnEdit'])) {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $birthDay = $_POST['birthDay'];

  $editQuery = "UPDATE userinfo SET firstName='$firstName', lastName='$lastName', birthDay='$birthDay' WHERE userInfoID='$id'";
  executeQuery($editQuery);

  header("Location: index.php");
  exit();
}

$query = "SELECT * FROM userinfo WHERE userInfoID = '$id'";
$result = executeQuery($query);


$id = $_GET['id'];

if (isset($_POST['btnEdit'])) {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $birthDay = $_POST['birthDay'];

  $editQuery = "UPDATE userinfo SET firstName='$firstName', lastName='$lastName', birthDay='$birthDay' WHERE userInfoID='$id'";
  executeQuery($editQuery);
}

$query = "SELECT * FROM userinfo WHERE userInfoID = '$id'";
$result = executeQuery($query);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: white;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
      padding: 0;
    }

    .title {
      background-color: #white;
      color: white;
      padding: 20px;
      font-size: 2.5rem;
      font-weight: bold;
      margin-bottom: 30px;
      text-align: center;
    }

    .card {
      background-color: white;
      border: 1px solid #ccc;
      text-align: center;
      padding: 20px;
      margin-bottom: 15px;
    }

    .footer {
      text-align: center;
      padding: 10px 0;
      background-color: transparent;
      margin-top: auto;
    }
  </style>
</head>

<body>
  <div class="container-fluid mb-5">
    <h3 class="title text-center">Edit User Information</h3>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card text-start">
          <h4 class="card-title text-center mb-3">Edit User</h4>

          <?php
          if (mysqli_num_rows($result) > 0) {
            while ($user = mysqli_fetch_assoc($result)) {
              ?>
              <form method="post">
                <div class="mb-3">
                  <label class="form-label">First Name</label>
                  <input value="<?php echo $user['firstName']; ?>" class="form-control" type="text" name="firstName"
                    required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Last Name</label>
                  <input value="<?php echo $user['lastName']; ?>" class="form-control" type="text" name="lastName" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Birth Date</label>
                  <input value="<?php echo $user['birthDay']; ?>" class="form-control" type="date" name="birthDay" required>
                </div>
                <button class="btn btn-primary" type="submit" name="btnEdit">Save Changes</button>
              </form>

              <?php
            }
          } else {
            echo "<p class='text-center'>User not found!</p>";
          }
          ?>
          <a href="index.php" class="btn btn-secondary mt-3">Return to Home</a>

        </div>
      </div>
    </div>
  </div>

  <div class="footer">
    <p>&copy; 2024 Jay Denver M. Monterola. All rights reserved.</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>