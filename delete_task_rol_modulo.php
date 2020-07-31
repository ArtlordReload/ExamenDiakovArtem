<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM matriculas WHERE id = $id";
  $result = mysqli_query($conex, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Datos eliminados exitosamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
