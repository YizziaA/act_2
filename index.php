<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from servicio");
    $servicio = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($servicio);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos correctamente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Tabla servicio de estetica
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Cita</th>
                                <th scope="col">Corte</th>
                                <th scope="col">limpieza</th>
                                <th scope="col">locion</th>
                                <th scope="col">llegada</th>
                                <th scope="col">salida</th>
                                <th scope="col">Accesorio</th>
                                <th scope="col">Precio</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($servicio as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->codigo; ?></td>
                                <td><?php echo $dato->cita; ?></td>
                                <td><?php echo $dato->tcorte; ?></td>
                                <td><?php echo $dato->tlimpieza; ?></td>
                                <td><?php echo $dato->tlocion; ?></td>
                                <td><?php echo $dato->llegada; ?></td>
                                <td><?php echo $dato->salida; ?></td>
                                <td><?php echo $dato->accesorio; ?></td>
                                <td><?php echo $dato->total; ?></td>
                                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Cita: </label>
                        <input type="text" class="form-control" name="txtcita" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">corte: </label>
                        <input type="text" class="form-control" name="txtcorte" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">limpieza: </label>
                        <input type="text" class="form-control" name="txtlimpieza" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">locion: </label>
                        <input type="text" class="form-control" name="txtlocion" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">llegada: </label>
                        <input type="text" class="form-control" name="txtllegada" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">salida: </label>
                        <input type="text" class="form-control" name="txtsalida" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Accesorio: </label>
                        <input type="text" class="form-control" name="txtaccesorio" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="text" class="form-control" name="txtpagar" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>
