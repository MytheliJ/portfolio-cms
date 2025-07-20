<?php
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM projects WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
  header("Location: dashboard.php");
  exit();
} else {
  echo "Error deleting project.";
}
?>
