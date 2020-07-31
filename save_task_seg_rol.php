<?php

include('db.php');

if (isset($_POST['save_task'])) {
 // $id = $_POST['id'];
  $apellido = $_POST['apellido'];
  $nombre = $_POST['nombre'];
  $pais = $_POST['pais'];
  $ciudad = $_POST['ciudad'];
  $fechanacimiento = $_POST['fechanacimiento'];
  $date = date('Y-m-d', strtotime(str_replace('-', '/', $fechanacimiento)));//conversion de date a mysql
  $sexo = $_POST['sexo'];
  $valor_matricula = $_POST['valor_matricula'];
  $direccion = $_POST['direccion'];
  
  $query="INSERT INTO matriculas(ID, apellido, nombre, pais, ciudad, fechanacimiento, direccion, sexo, valor_matricula) VALUES (NULL, '$apellido', '$nombre', '$pais', '$ciudad', '$date', '$direccion', '$sexo', '$valor_matricula')";
  $result = mysqli_query($conex, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Datos Guardados Exitosamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
