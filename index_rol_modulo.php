<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<!--TABLE string,numerico,fecha
    ID,Apellido,Nombre,Pais,Ciudad,fecha_nacimiento,direccion,sexo,valor_matricula-->
<div class="">

    <div class="card-header card-header-lg bg-success text-white p-6 rounded-top">
        <h4 class="font-weight-bold mb-0 text-center">Datos Matricula</h4>
    </div>

    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert  alert-<?= $_SESSION['message_type']; ?> fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php session_unset();
    } ?>


    <table>
        <tr>
            <th>ID</th>
            <th>Apellido</th>
            <th>Nombre</th>
            <th>Pais</th>
            <th>Ciudad</th>
            <th>Fecha de nacimiento</th>
            <th>Direccion</th>
            <th>Sexo</th>
            <th>Valor Matricula</th>
            <th>Accion</th>
        </tr>

        <?php
        $sql = "SELECT id, apellido, nombre,pais,ciudad,fechanacimiento,direccion,sexo,valor_matricula FROM matriculas";
        $result = $conex->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["apellido"]; ?></td>
                    <td><?php echo $row["nombre"]; ?></td>
                    <td><?php echo $row["pais"]; ?></td>
                    <td><?php echo $row["ciudad"]; ?></td>
                    <td><?php echo $row["fechanacimiento"]; ?></td>
                    <td><?php echo $row["direccion"]; ?></td>
                    <td><?php echo $row["sexo"]; ?></td>
                    <td><?php echo $row["valor_matricula"]; ?></td>
                    <td>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmacion de eliminacion de datos</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Esta seguro que desea eliminar la fila de datos seleccionados?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary" >
                                            <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="text-white">ELIMINAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--linea para modificar columna action con edit y delete, usando concatenacion php a travez de id-->
                        <div class="container">
                            <div class="float-left">
                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="text-info">
                                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-pen "  class="" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.707 13.707a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391L10.086 2.5a2 2 0 0 1 2.828 0l.586.586a2 2 0 0 1 0 2.828l-7.793 7.793zM3 11l7.793-7.793a1 1 0 0 1 1.414 0l.586.586a1 1 0 0 1 0 1.414L5 13l-3 1 1-3z" />
                                        <path fill-rule="evenodd" d="M9.854 2.56a.5.5 0 0 0-.708 0L5.854 5.855a.5.5 0 0 1-.708-.708L8.44 1.854a1.5 1.5 0 0 1 2.122 0l.293.292a.5.5 0 0 1-.707.708l-.293-.293z" />
                                        <path d="M13.293 1.207a1 1 0 0 1 1.414 0l.03.03a1 1 0 0 1 .03 1.383L13.5 4 12 2.5l1.293-1.293z" />
                                    </svg>
                            </div>
                            <div class="float-right">
                                <a a href="delete_task.php?id=<?php echo $row['id'] ?>" data-toggle="modal" data-target="#exampleModal">
                                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="10"class="text-center bold">No hay datos</td>
            </tr>

        <?php }
        $conex->close();
        ?>
    </table>

</div>
<br>
<br>
<hr>
<!--FORM-->
<!--TABLE string,numerico,fecha
    ID,Apellido,Nombre,Pais,Ciudad,fecha_nacimiento,direccion,sexo,valor_matricula-->
<div class=" ">
    <form class="" action="save_task.php" method="POST">
        <div class="card bg-transparent shadow-none">
            <div class="card-header card-header-lg bg-danger text-white p-6 rounded-top">
                <h4 class="font-weight-bold mb-0 text-center">Formulario Matricula</h4>
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
                        <input type="text" class="form-control border-success rounded-sm" name="apellido" required>
                    </div>

                    <div class="form-group form-group-icon col-md-4">
                        <label for="address-1">Nombre</label>
                        <input type="text" class="form-control border-danger rounded-sm" name="nombre" required>
                    </div>
                    <div class="form-group form-group-icon col-md-4">
                        <label for="address-2">Pais</label>
                        <input type="text" class="form-control border-info rounded-sm" name="pais" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group form-group-icon col-md-4">
                        <label for="city">Ciudad</label>
                        <input type="text" class="form-control border-purple rounded-sm" name="ciudad" required>
                    </div>
                    <div class="form-group form-group-icon col-md-4">
                        <label for="birthdaytime">Fecha de nacimiento</label>
                        <input type="date" class="form-control border-purple rounded-sm" name="fechanacimiento" required>
                    </div>
                    <div class="form-group form-group-icon col-md-4">
                        <label for="state">Sexo</label>
                        <select id="sexo" class="form-control border-warning rounded-sm" name="sexo" required>
                            <option value="" selected disabled>Seleccione</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group form-group-icon col-md-4">
                        <label for="country">Valor Matricula</label>
                        <input type="number" class="form-control border-success rounded-sm" name="valor_matricula" step=".01" required>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="" for="text-aria">Direccion</label>
                    <textarea name="direccion" class="form-control border-purple rounded-sm" rows="7" cols="95" id="text-aria" required></textarea>
                </div>
                <div class="pull-right mt-4">
                    <input type="submit" class="btn btn-success text-white text-uppercase" name="save_task" value="Guardar"></a>
                </div>
    </form>
</div>

<?php include("includes/footer.php") ?>