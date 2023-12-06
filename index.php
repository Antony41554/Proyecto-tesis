<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link href="views/styles/style-login.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</head>
<body>
    <section class="container-background">
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">Iniciar Sesión</h2>
                        </div>
                        <div class="card-body">
                            <form action="models/mLogin.php" method="post">
                                <div class="form-group">
                                    <label for="usuario" class="text-left">Usuario</label>
                                    <input type="text" class="form-control" id="usuario1" name="usuario" placeholder="Nombre de usuario" required>
                                </div>
                                <div class="form-group">
                                    <label for="contrasena" class="text-left">Contraseña</label>
                                    <input type="password" class="form-control" id="password1" name="contrasena" placeholder="Contraseña" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                            </form>
                            <?php if (isset($mensaje_error)) { ?>
                                <div class="alert alert-danger mt-3"><?php echo $mensaje_error; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
