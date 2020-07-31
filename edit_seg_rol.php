<?php
include("db.php");
$title = '';
$description = '';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM matriculas  WHERE id=$id";
  $result = mysqli_query($conex, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    $apellido = $row['apellido'];
    $nombre = $row['nombre'];
    $pais = $row['pais'];
    $ciudad = $row['ciudad'];
    $fechanacimiento = $row['fechanacimiento'];
    $date = date('Y-m-d', strtotime(str_replace('-', '/', $fechanacimiento))); //conversion de date a mysql
    $sexo = $row['sexo'];
    $valor_matricula = $row['valor_matricula'];
    $direccion = $row['direccion'];
  }
}
//validacion de los datos por el metodo post que envia el formulario a esta misma pagina
//si existe un name update en formulario voy a obtener sus valores los guardo en variables ejecuto el query y mando a ejecutar mysqli_querry mandandole los datos
if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $apellido = $_POST['apellido'];
  $nombre = $_POST['nombre'];
  $pais = $_POST['pais'];
  $ciudad = $_POST['ciudad'];
  $fechanacimiento = $_POST['fechanacimiento'];
  $date = date('Y-m-d', strtotime(str_replace('-', '/', $fechanacimiento))); //conversion de date a mysql
  $sexo = $_POST['sexo'];
  $valor_matricula = $_POST['valor_matricula'];
  $direccion = $_POST['direccion'];
  echo 'apellido';

  $query = "UPDATE matriculas set
  apellido='$apellido',
  nombre='$nombre',
  pais='$pais',
  ciudad='$ciudad',
  fechanacimiento='$date',
  sexo='$sexo',
  valor_matricula='$valor_matricula',
  direccion='$direccion'
  WHERE id=$id";
  mysqli_query($conex, $query);

  $_SESSION['message']='Se han modificado correctamente los datos!';
  $_SESSION['message_type']='success';
  header("Location: index.php");
}
?>

<?php include('includes/header.php'); ?>
<div class=" ">
  <form class="" action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
    <div class="card bg-transparent shadow-none">
      <div class="card-header card-header-lg bg-purple text-white p-6 rounded-top">
        <h4 class="font-weight-bold mb-0 text-center">Modificar Datos</h4>
      </div>
      <div class="card-body border border-top-0 rounded-bottom-sm p-7">
        <div class="row">
          <!--prueba id
                    <div class="form-group form-group-icon col-md-4">
                        <label for="first-name">ID</label>
                        <input type="text" class="form-control border-warning rounded-sm" name="id" disabled>
                    </div>
                    -->
          <div class="form-group form-group-icon col-md-4">
            <label for="last-name">Apellido</label>
            <input type="text" class="form-control border-success rounded-sm" name="apellido" value="<?php echo $apellido ?>" required>
          </div>

          <div class="form-group form-group-icon col-md-4">
            <label for="address-1">Nombre</label>
            <input type="text" class="form-control border-danger rounded-sm" name="nombre" value="<?php echo $nombre ?>" required>
          </div>
          <div class="form-group form-group-icon col-md-4">
            <label for="address-2">Pais</label>
            <input type="text" class="form-control border-info rounded-sm" name="pais" value="<?php echo $pais ?>" required>
          </div>
        </div>
        <div class="row">
          <div class="form-group form-group-icon col-md-4">
            <label for="city">Ciudad</label>
            <input type="text" class="form-control border-purple rounded-sm" name="ciudad" value="<?php echo $ciudad ?>" required>
          </div>
          <div class="form-group form-group-icon col-md-4">
            <label for="birthdaytime">Fecha de nacimiento</label>
            <input type="date" class="form-control border-purple rounded-sm" name="fechanacimiento" value="<?php echo $date ?>" required>
          </div>
          <div class="form-group form-group-icon col-md-4">
            <label for="state">Sexo</label>
            <select id="sexo" class="form-control border-warning rounded-sm" name="sexo" value="<?php echo $sexo ?>" required>
              <option value="M" <?php  if($sexo=='M'){echo 'selected';} else{echo'';} //i am fkin genius xD=)?>>Masculino</option>=)
              <option value="F" <?php  if($sexo=='F'){echo 'selected';} else{echo'';} ?>>Femenino</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group form-group-icon col-md-4">
            <label for="country">Valor Matricula</label>
            <input type="number" class="form-control border-success rounded-sm" name="valor_matricula" step=".01" value="<?php echo $valor_matricula ?>" required>
          </div>
        </div>
        <div class="form-group mb-4">
          <label class="" for="text-aria">Direccion</label>
          <textarea name="direccion" class="form-control border-purple rounded-sm" rows="7" cols="95" id="text-aria" required><?php echo $direccion ?></textarea>
        </div>
        <div class="pull-right mt-4">
          <input type="submit" class="btn btn-success text-white text-uppercase" name="update" value="Guardar"></a>
        </div>
  </form>
</div>
<?php include('includes/footer.php'); ?>