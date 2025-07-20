<?php
echo "Login Page- Work In Progress"
?>
<?php include 'config.php'; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <h2>Login</h2>
  <form method="POST" action="">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="login">Login</button>
  </form>
</body>
</html>

<?php
if (isset($_POST['login'])) 
{
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users WHERE email=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) 
  {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) 
    {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      header("Location: dashboard.php");
      exit();
    } 
    else 
    {
      echo "Invalid password.";
    }
  } 
  else 
  {
    echo "User not found.";
  }
}
?>
