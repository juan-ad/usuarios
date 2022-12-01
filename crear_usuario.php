<?php
    include("conexion.php");

    $con = conectar();
    $query = "INSERT INTO usuario (codigo, nombre, edad) VALUES ('".$_POST['codigo']."', '".$_POST['nombre']."', '".$_POST['edad']."')";
    $res = mysql_query($query, $conexion) or die(mysql_error());
    $state = true;
    echo "Registro Insertado Correctamente"

?>