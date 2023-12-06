<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario1 = $_POST['usuario'];
    $password1 = $_POST['contrasena'];

    $sql = "SELECT id_usuario, id_tipo_usuario FROM Usuario WHERE DNI = $usuario1 AND codigo = '$password1'";
    $run_sql = mysqli_query($connection, $sql);

    echo $usuario1;
    echo $password1;

    if (mysqli_num_rows($run_sql) > 0) {
        $fila = mysqli_fetch_assoc($run_sql);
        session_start();
        $_SESSION['id_usuario'] = $fila['id_usuario'];

        if ($fila['id_tipo_usuario'] == 1) {
            header('Location: ../index.php');
        } else if ($fila['id_tipo_usuario'] == 3) {
            header('Location: ../views/InterfazAdmin/mostrar_tramites.php');
        }
    } else {
        header('Location: ../index.php');
    }
} else {
    header('Location: ../index.php');
}
?>
