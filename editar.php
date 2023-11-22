<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from servicio where codigo = ?;");
    $sentencia->execute([$codigo]);
    $servicio = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($servicio);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Cita: </label>
                        <input type="text" class="form-control" name="txtcita" required 
                        value="<?php echo $servicio->cita; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">corte: </label>
                        <input type="text" class="form-control" name="txtcorte" autofocus required
                        value="<?php echo $servicio->tcorte; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">limpieza: </label>
                        <input type="text" class="form-control" name="txtlimpieza" autofocus required
                        value="<?php echo $servicio->tlimpieza; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">locion: </label>
                        <input type="text" class="form-control" name="txtlocion" required 
                        value="<?php echo $servicio->tlocion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">llegada: </label>
                        <input type="text" class="form-control" name="txtllegada" required 
                        value="<?php echo $servicio->llegada; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">salida: </label>
                        <input type="text" class="form-control" name="txtsalida" required 
                        value="<?php echo $servicio->salida; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Accesorio: </label>
                        <input type="text" class="form-control" name="txtaccesorio" required 
                        value="<?php echo $servicio->accesorio; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="text" class="form-control" name="txtpagar" required 
                        value="<?php echo $servicio->total; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $servicio->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>
