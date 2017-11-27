<?php
if(array_key_exists("erro", $_GET)){
    $erro = $_GET["erro"];
    if($erro == "usuarioOuSenhaIcorreto"){
        $mensagem = "Usuário ou senha incorreto!";
    }
    elseif ($erro == "semLoginRealizado"){
        $mensagem = "Por favor realize login";
    } else{
        $mensagem = false;
    }

} else {
    $mensagem = false;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="page-header">
        <h1>Sistema de loja virtual <small> Versão 1.0 </small></h1></div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title"><strong>Área de acesso aos usuários</strong></h2></div>
            <?php if($mensagem) echo "<p class='alert-danger'>".$mensagem."</p>";?>
        <div class="panel-body">
            <div class="col-md-4 col-md-offset-0">
                <form class="form-horizontal" action="viewer/home.php" method="post">
                    <input type="hidden" name="from" value="login">
                    <span> Usuário: </span>
                    <input name="usuario" class="form-control" type="text">
                    <span>Senha: </span>
                    <input name="senha" class="form-control" type="password">
                    <button class="btn btn-primary" type="submit">Login </button><a href="#"> Esqueci minha senha!</a></form>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>