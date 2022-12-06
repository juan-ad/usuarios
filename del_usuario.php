<?php
        
    include("conecta.php");
    $bd = conectar();
    $idUsuario = $_POST["id_usuario"];

    $sql = "DELETE FROM usuario where id = '$idUsuario'";
    $query_del = mysqli_query($bd,$sql);

    $mensaje = "eliminado";

    mysqli_close($bd);
    echo json_encode($mensaje);
?>