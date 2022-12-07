<?php
    include("conecta.php");
    $bd = conectar();
    $idUsuario = $_POST["id_usuario"];

    $sql = "SELECT id, nombre, apellido, email, celular, estado FROM usuario WHERE id = '$idUsuario'";
    $datos = mysqli_query($bd, $sql);
    $arr = mysqli_fetch_array($datos);
?>

<form id="frmModUsuario" action="mod_usuario2.php" method="POST">
    <div class="modal-body">
        <input type="hidden" class="form-control" name="txtIdUsr" value="<?php echo $idUsuario ?>">
        <div class="mb-4">
            <label for="txtNom" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="txtNom" required maxlength="100" value="<?php echo $arr[1] ?>">
        </div> 

        <div class="mb-4"> 
            <label for="txtApe" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="txtApe" required maxlength="100" value="<?php echo $arr[2] ?>">
        </div> 

        <div class="mb-4">
            <label for="txtEma" class="form-label">Email</label>
            <input type="email" class="form-control" name="txtEma" required maxlength="100" value="<?php echo $arr[3] ?>">
        </div>

        <div class="mb-4">
            <label for="txtCel" class="form-label">Nro. Celular</label>
            <input type="text" class="form-control" name="txtCel" maxlength="10" pattern="[0-9]{10}" title="El número de celular debe tener 10 dígitos" required value="<?php echo $arr[4] ?>">
        </div>

        <div class="mb-1">

            <label class="form-label">Estado</label>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-check">
                        <?php
                            if ($arr[5] == "A") {
                                echo "<input class='form-check-input' type='radio' name='optest' id='optest1' required value='A' checked>";
                            } else {
                                echo "<input class='form-check-input' type='radio' name='optest' id='optest1' required value='A'>";
                            }
                        ?>
                        <label class="form-check-label" for="optest1">
                            Activo
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <?php
                            if ($arr[5] == "I") {
                                echo "<input class='form-check-input' type='radio' name='optest' id='optest2' required value='I' checked>";
                            } else {
                                echo "<input class='form-check-input' type='radio' name='optest' id='optest2' required value='I'>";
                            }
                        ?>
                        <label class="form-check-label" for="optest2">
                            Inactivo
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary py-2">Modificar</button>
    </div>

</form>

<script src="js/usuario.js"></script>
