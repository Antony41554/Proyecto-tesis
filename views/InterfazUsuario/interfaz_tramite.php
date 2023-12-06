<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "srv1006.hstgr.io";
        $username = "u472469844_grupo12";
        $password = "oadGFo9y";
        $database = "u472469844_grupo12";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $id_usuario_emite = $_POST["id_usuario_emite"];
        $id_usuario_recibe = $_POST["id_usuario_recibe"];
        $id_documento = $_POST["id_documento"];
        $enlace_pdf = $_POST["enlace_pdf"];
        $fecha_emision = $_POST["fecha_emision"];

        // Llamar al procedimiento almacenado para insertar los datos
        $sql = "CALL InsertarTramites(?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiiss", $id_usuario_emite, $id_usuario_recibe, $id_documento, $enlace_pdf, $fecha_emision);

        if ($stmt->execute()) {
            echo "Trámite de documento registrado con éxito.";
        } else {
            echo "Error al registrar el trámite de documento.";
        }

        $stmt->close();
        $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Barra de navegación lateral -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            Registrar Trámite
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Ver Trámites
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Contenido principal -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Contenido de tu dashboard va aquí -->
                    <h2>Formulario de Registro de Trámites de Documentos</h2>
                    <form action="" method="post">
                        <label for="id_usuario_emite">ID del Usuario que Emite:</label>
                        <input type="text" name="id_usuario_emite" id="id_usuario_emite" required><br><br>

                        <label for="id_usuario_recibe">ID del Usuario que Recibe:</label>
                        <input type="text" name="id_usuario_recibe" id="id_usuario_recibe" required><br><br>

                        <label for="id_documento">ID del Documento:</label>
                        <input type="text" name="id_documento" id="id_documento" required><br><br>

                        <label for="enlace_pdf">Enlace del PDF:</label>
                        <input type="text" name="enlace_pdf" id="enlace_pdf" required><br><br>

                        <label for="fecha_emision">Fecha de Emisión:</label>
                        <input type="date" name="fecha_emision" id="fecha_emision" required><br><br>

                        <input type="submit" value="Guardar">
                    </form>
                

        </main>
    </div>
</div>

<!-- Incluye Bootstrap JS (al final del archivo para evitar problemas de carga) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>