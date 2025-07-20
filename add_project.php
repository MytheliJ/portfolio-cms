<?php
include 'config.php';

if (isset($_POST['add'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];

  $image = $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $upload_path = 'uploads/' . $image;

  if (move_uploaded_file($tmp_name, $upload_path)) {
    $sql = "INSERT INTO projects (title, description, image) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $description, $image);

    if ($stmt->execute()) {
      echo "Project added successfully. <a href='dashboard.php'>Go back</a>";
    } else {
      echo "Error: " . $stmt->error;
    }
  } else {
    echo "Image upload failed.";
  }
}
?>
