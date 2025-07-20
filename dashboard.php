<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Portfolio CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <p>This is your dashboard where you can manage your portfolio projects.</p>
        <a href="logout.php" class="btn btn-danger">Logout</a>
        <h2>Add New Project</h2>
<form action="add_project.php" method="POST" enctype="multipart/form-data">
  <input type="text" name="title" placeholder="Project Title" required><br><br>
  <textarea name="description" placeholder="Project Description" required></textarea><br><br>
  <input type="file" name="image" accept="image/*" required><br><br>
  <button type="submit" name="add">Add Project</button>
</form>
<a href="delete_project.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>

    </div>
</body>
</html>
