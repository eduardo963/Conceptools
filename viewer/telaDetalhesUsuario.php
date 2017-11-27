<?php
include_once '../cabecalho.php';
include_once '../controller/UsuarioController.php';
$controller = new UsuarioController();

if(array_key_exists("id", $_GET)){
    $id = $_GET["id"];

    $arrayDoUsuario = $controller->getUsuario($id);

    $login = $arrayDoUsuario["login"];
    $nome = $arrayDoUsuario["nome"];
    $email = $arrayDoUsuario["email"];
    $emailRecuperacao = $arrayDoUsuario["emailRecuperacao"];
    $celular = $arrayDoUsuario["celular"];

    if($controller->isUsuarioAtivo($id)){
        $ativo = "SIM";
    } else {
        $ativo = "NÃO";
    }
}

if(array_key_exists("from", $_POST)){
    $from = $_POST["from"];

    if($from == "cadastroUsuario"){

        $login = $_POST["login"];
        $senha = $_POST["senha"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $emailRecuperacao = $_POST["emailRecuperacao"];
        $celular = $_POST["celular"];
        $perguntaRecuperacao = $_POST["perguntaRecuperacao"];
        $respostaRecuperacao = $_POST["respostaRecuperacao"];


        $id = $controller->criarNovoUsuario($login, $senha, $nome, $email, $emailRecuperacao, $celular, $perguntaRecuperacao,
            $respostaRecuperacao);

        $ativo = "SIM";

        if($id){
            echo "<p class='alert-success'>Usuario cadastrado com sucesso!</p>";
        } else{

            echo "<p class='alert-warning'>Usuario não cadastrado!</p>";
        }

    } else if($from == "updateUsuario"){

        $id = $_POST["id"];
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $emailRecuperacao = $_POST["emailRecuperacao"];
        $celular = $_POST["celular"];
        $perguntaRecuperacao = $_POST["perguntaRecuperacao"];
        $respostaRecuperacao = $_POST["respostaRecuperacao"];

        $arrayDaUsuario = $controller->getUsuario($id);
        $ativo = $arrayDaUsuario["ativo"];

        $sucesso = $controller->updateNovoUsuario($id, $login, $senha, $nome, $email, $emailRecuperacao, $celular, $perguntaRecuperacao,
            $respostaRecuperacao);



        if($sucesso){
            echo "<p class='alert-success'>Usuario atualizado com sucesso!</p>";
        } else{

            echo "<p class='alert-warning'>Usuario não atualizado!</p>";
        }

    }
    
    
    

    else if ($from == "detalhesUsuario" or $from == "telaUsuarios"){
        $id = $_POST["id"];

        if(array_key_exists("action",$_POST)){
            $action = $_POST["action"];
        } else {
            $action = "0";
        }

        $arrayDoUsuario = $controller->getUsuario($id);

        $login = $arrayDoUsuario["login"];
        $nome = $arrayDoUsuario["nome"];
        $email = $arrayDoUsuario["email"];
        $emailRecuperacao = $arrayDoUsuario["emailRecuperacao"];
        $celular = $arrayDoUsuario["celular"];

        if($controller->isUsuarioAtivo($id)){
            $ativo = "SIM";
        } else {
            $ativo = "NÃO";
        }

        if ($action == "desativarUsuario"){
            $controller->desativarUsuario($id);
            echo "<p class='alert-success'>Usuario desativado com sucesso!</p>";
            $ativo = "NÃO";
        }
        else if ($action == "excluirUsuario"){
            $controller->deletarUsuario($id);
            echo "<p class='alert-success'>Usuario excluido com sucesso!</p>";
            die;
        } else if ($action == "ativarUsuario"){
            $controller->ativarUsuario($id);
            echo "<p class='alert-success'>Usuario ativado com sucesso!</p>";
            $ativo = "SIM";
        }




    }
}



?>
<h2>Detalhes do Usuário</h2>
<div class="col-md-3">
    <h3>Status </h3>
    <p><strong>Ativo: <?=$ativo?></strong></p>
    <p> </p>
    <form method="post">
        <input type="hidden" name="from" value="detalhesUsuario">
        <input type="hidden" name="id" value="<?=$id?>">
        <?php
        if($ativo == "SIM") {
            echo "<button class=\"btn btn-default btn-block\" name=\"action\" value=\"desativarUsuario\" type=\"submit\"><strong>Desativar Usuário</strong></button>";
        } else {
            echo "<button class=\"btn btn-default btn-block\" name=\"action\" value=\"ativarUsuario\" type=\"submit\"><strong>Ativar Usuário</strong></button>";
        }
        ?>
        <button class="btn btn-default btn-block" name="action" value="excluirUsuario" type="submit" ><strong>Excluir Usuário</strong></button>
    </form>
</div>
<div class="col-md-9">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed">
            <tbody>
            <tr>
                <td><strong>ID:</strong> </td>
                <td><?=$id?></td>
            </tr>
            <tr>
                <td><strong>Login: </strong></td>
                <td><?=$login?></td>
            </tr>
            <tr>
                <td><strong>Nome: </strong></td>
                <td><?=$nome?></td>
            </tr>
            <tr>
                <td><strong>Email: </strong></td>
                <td><?=$email?></td>
            </tr>
            <tr>
                <td><strong>Email secundário:</strong></td>
                <td><?=$emailRecuperacao?></td>
            </tr>
            <tr>
                <td><strong>Celular: </strong></td>
                <td><?=$celular?></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            </tbody>
        </table>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>