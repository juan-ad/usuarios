<?php
    include("conecta.php");
    $bd = conectar();

    $nom = $_POST["txtNom"];
    $ape = $_POST["txtApe"];
    $ema = $_POST["txtEma"];
    $pass = $_POST["txtPass"];
    $cel = $_POST["txtCel"];
    $est = $_POST["optest"];

    $mensaje = "";

    $sql = "SELECT email FROM usuario WHERE email = '$ema'";
    $query_select = mysqli_query($bd, $sql);

    if (mysqli_num_rows($query_select) > 0){
        $mensaje = "ya existe";
    }else{

        $sql_insert = "INSERT INTO usuario VALUES(NULL,'$nom','$ape','$ema','$pass','$cel','$est')";

        $query_insert = mysqli_query($bd, $sql_insert);       

        if ($query_insert){
            $mensaje = "registrado";
        }
        else {
            $mensaje = "no registrado";
        }
    }            
    
    mysqli_close($bd);
    echo json_encode($mensaje);
?>
