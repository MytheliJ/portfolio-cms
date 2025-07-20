<?php
include 'config.php';

$id = $_GET['id'];

$sql = "SELECT * FROM projects WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$project = $result->fetch_assoc();

if (isset($_POST['update'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];

  $sql = "UPDATE projects SET title=?, description=? WHERE id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssi", $title, $description, $id);

  if ($stmt->execute()) {
    echo "Project updated successfully.";
    header("Location: dashboard.php");
    exit();
  } else {
    echo "Error: " . $stmt->error;
  }
}
?>

<form method="POST">
  <input type="text" name="title" value="<?= $project['title'] ?>" required>
  <textarea name="description" required><?= $project['description'] ?></textarea>
  <button type="submit" name="update">Update</button>
</form>
