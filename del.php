<?php
include 'connection.php';
$sql = "DELETE FROM user ";
$sql .= "WHERE user_id='" . $_GET['user_id'] . "'";
if (mysqli_query($conn, $sql)) {
  header('Location:index.php');
} else {
  echo " :: Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?> 