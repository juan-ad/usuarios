<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="FormularioDinamico.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="FormularioDinamico.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="formulario">
            <form method="post" action="crear_usuario.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">CODIGO</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="codigo" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">NOMBRE</label>
                    <input type="text" class="form-control" name="nombre" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">EDAD</label>
                    <input type="number" class="form-control" name="edad" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">GUARDAR</button><br><br>
                <button type="button" class="btn btn-primary">MODIFICAR</button><br><br>
                <button type="button" class="btn btn-primary">ELIMINAR</button><br><br>
            </form>
        </div>
    
        <div class="tabla">
            <table class="table">
                <thead>
                    <tr>
                        <th class="encabezados" scope="col"><b>#</b></th>
                        <th class="encabezados" scope="col"><b>Codigo</b></th>
                        <th class="encabezados" scope="col"><b>Nombre</b></th>
                        <th class="encabezados" scope="col"><b>Edad</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>