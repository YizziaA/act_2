<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $cita = $_POST['txtcita'];
    $tcorte = $_POST['txtcorte'];
    $tlimpieza = $_POST['txtlimpieza'];
    $tlocion = $_POST['txtlocion'];
    $llegada = $_POST['txtllegada'];
    $salida = $_POST['txtsalida'];
    $accesorio = $_POST['txtaccesorio'];
    $total = $_POST['txtpagar'];

    $sentencia = $bd->prepare("UPDATE servicio SET cita = ?, tcorte = ?, tlimpieza = ?, tlocion = ?, llegada = ?, salida = ?, accesorio = ?, total = ? where codigo = ?;");
    $resultado = $sentencia->execute([$cita, $tcorte, $tlimpieza, $tlocion, $llegada, $salida, $accesorio, $total, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
