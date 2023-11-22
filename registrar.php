<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtcita"]) || empty($_POST["txtcorte"]) || empty($_POST["txtlimpieza"])|| empty($_POST["txtlocion"])|| empty($_POST["txtllegada"])|| empty($_POST["txtsalida"])|| empty($_POST["txtaccesorio"])|| empty($_POST["txtpagar"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $cita = $_POST["txtcita"];
    $tcorte = $_POST["txtcorte"];
    $tlimpieza = $_POST["txtlimpieza"];
    $tlocion = $_POST["txtlocion"];
    $llegada = $_POST["txtllegada"];
    $salida = $_POST["txtsalida"];
    $accesorio = $_POST["txtaccesorio"];
    $total = $_POST["txtpagar"];
    
    $sentencia = $bd->prepare("INSERT INTO servicio(cita,tcorte,tlimpieza,tlocion,llegada,salida,accesorio,total) VALUES (?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$cita,$tcorte,$tlimpieza,$tlocion,$llegada,$salida,$accesorio,$total]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
