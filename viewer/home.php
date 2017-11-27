<?php
include_once '../controller/UsuarioController.php';
if(array_key_exists("from", $_POST)){
    $controller = new UsuarioController();
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if($controller->logarUsuario($usuario, $senha)){

    } else {
        header("Location: ../index.php?erro=usuarioOuSenhaIncorreto");
        die();

    }

}
include_once '../cabecalho.php';




?>


    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>