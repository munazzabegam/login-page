<?php

include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM login WHERE Username = ? AND Password = ?");
    $stmt->bind_param("ss", $username, $password);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION["username"] = $username;
        header("Location: home.php");
        exit();
    } else {
        $error_message = "Invalid username or password";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .login-container {
      max-width: 400px;
      margin: auto;
      margin-top: 100px;
    }

    .error_msg {
      text-align: center;
      font-size: 0.8rem;
      color: red;
      margin-top: 0.9rem;
    }
    
  </style>
</head>
<body>

<div class="container login-container">
  <h2 class="text-center mb-4">Login</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Login</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php if (isset($error_message)) : ?>
  <h1 class="error_msg"><?php echo $error_message; ?></h1>
<?php endif; ?>

