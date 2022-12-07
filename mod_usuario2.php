<?php
    include("conecta.php");
    $bd = conectar();

    $idUsuario = $_POST["txtIdUsr"];
    $nom = $_POST["txtNom"];
    $ape = $_POST["txtApe"];
    $ema = $_POST["txtEma"];
    $cel = $_POST["txtCel"];
    $est = $_POST["optest"];

    $mensaje = "no modificado";

    $sql = "UPDATE usuario set nombre = '$nom', apellido = '$ape', email = '$ema', celular = '$cel', estado = '$est' where id = '$idUsuario'";
    
    try{
        $query_update = mysqli_query($bd, $sql);
        $mensaje = "modificado";
    }catch (Exception $e){
        $mensaje = "ya existe";
    }
    
    mysqli_close($bd);
    echo json_encode($mensaje);
?>
