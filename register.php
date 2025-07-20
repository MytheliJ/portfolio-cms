<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
</head>
<body>
  <h2>Register</h2>
  <form method="POST" action="">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="register">Register</button>
  </form>
</body>
</html>

<?php
if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $username, $email, $password);

  if ($stmt->execute()) {
    echo "Registration successful. <a href='login.php'>Login here</a>";
  } else {
    echo "Error: " . $stmt->error;
  }
}
?>