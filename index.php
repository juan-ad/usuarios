<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="shortcut icon" href="./img/user.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/styles.css">

</head>
<body>
    <div class="container mt-4 mb-3">
    
    <?php 
        include('conecta.php');
        $bd = conectar();

        $sql = "SELECT id, nombre, apellido, email, celular, estado FROM usuario";

        $datos = mysqli_query($bd, $sql);
    ?>
        <div class="table-wrapper table-responsive">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Gestión de <b>Usuarios</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a onclick="añadir()" href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Añadir Usuario</span></a>
                    </div>
                </div>
            </div>
            <table id="tblUsuarios" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class='p-3'>#</th>
                        <th class='p-3'>Nombre</th>
                        <th class='p-3'>Apellido</th>
                        <th class='p-3'>Email</th>
                        <th class='p-3'>Nro. Celular</th>
                        <th class='p-3'>Estado</th>
                        <th class='p-3'>Opciones</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($arr = mysqli_fetch_array($datos)) {
                            $est = 'INACTIVO';
                            if($arr[5] == 'A'){
                                $est = 'ACTIVO';
                            }
                            echo "<tr>";
                                echo "<td class='p-3'>$arr[0]</td>";
                                echo "<td class='p-3'>$arr[1]</td>";
                                echo "<td class='p-3'>$arr[2]</td>";
                                echo "<td class='p-3'>$arr[3]</td>";
                                echo "<td class='p-3'>$arr[4]</td>";
                                echo "<td class='p-3'>$est</td>";
                                echo "<td class='p-3 text-center'>";                
                                    echo "<a href='#' onclick=editar('$arr[0]') class='edit'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>";
                                    echo "<a href='#' onclick=eliminar('$arr[0]') class='delete'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>";
                                echo "</td>";
                            echo "<tr>";
                        }
                        mysqli_close($bd);
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Añadir -->
    <div class="modal fade" tabindex="-1" id="modalAdd">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white fw-bold text-center">
                    <h5 class="modal-title">Registrar Usuario</h5>
                </div>
                
                <form id="frmAddUsuario" action="add_usuario.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="txtNom" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="txtNom" required maxlength="100">
                        </div>

                        <div class="mb-4">
                            <label for="txtApe" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="txtApe" required maxlength="100">
                        </div>

                        <div class="mb-4">
                            <label for="txtEma" class="form-label">Email</label>
                            <input type="email" class="form-control" name="txtEma" required maxlength="100">
                        </div>

                        <div class="mb-4">
                            <label for="txtPass" class="form-label">Password</label>
                            <input type="password" class="form-control" name="txtPass" required maxlength="100">
                        </div>

                        <div class="mb-4">
                            <label for="txtCel" class="form-label">Nro. Celular</label>
                            <input type="text" class="form-control" name="txtCel" maxlength="10" pattern="[0-9]{10}" title="El número de celular debe tener 10 dígitos" required">
                        </div>

                        <div class="mb-1">
                            <label class="form-label">Estado</label>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="optest" id="optest1" checked value="A">
                                        <label class="form-check-label" for="optest1">
                                            Activo
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="optest" id="optest2" required value="I">
                                        <label class="form-check-label" for="optest2">
                                            Inactivo
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="cancelar()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <div class="modal fade" tabindex="-1" id="modalEdit">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white fw-bold text-center">
                    <h5 class="modal-title">Modificar Usuario</h5>
                </div>
                <div id="divres"></div>
            </div>
        </div>
    </div>

    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/usuario.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
