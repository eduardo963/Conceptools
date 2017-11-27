<?php
include_once '../cabecalho.php';
include_once '../controller/UsuarioController.php';
?>
<h2>Cadastro de usuários</h2>
<div class="col-md-6">
    <div>
        <?php
        if(array_key_exists("id", $_GET)):
        $controller = new UsuarioController();
        $id = $_GET["id"];

            $arrayDoUsuario = $controller->getUsuario($id);
            $login = $arrayDoUsuario["login"];
            $nome = $arrayDoUsuario["nome"];
            $email = $arrayDoUsuario["email"];
            $emailRecuperacao = $arrayDoUsuario["emailRecuperacao"];
            $celular = $arrayDoUsuario["celular"];
        ?>
        <form method="post" action="telaDetalhesUsuario.php"><strong>Login: </strong>
            <input class="form-control" type="text" name="login" value="<?=$login?>" required="" maxlength="20" minlength="6" autofocus="" autocomplete="off"><strong>Senha: </strong>
            <input class="form-control" type="password" name="senha" value="" required="" maxlength="20" minlength="6" autocomplete="off"><strong>Nome: </strong>
            <input class="form-control" type="text" name="nome" value="<?=$nome?>" required="" maxlength="30" minlength="4" autocomplete="off"><strong>Email: </strong>
            <input class="form-control" type="email" name="email" value="<?=$email?>" required="" maxlength="30" minlength="1" autocomplete="off" inputmode="numeric"><strong>Email secundário / de recuperação: </strong>
            <input class="form-control" type="email" name="emailRecuperacao" value="<?=$emailRecuperacao?>" maxlength="30" autocomplete="off" inputmode="numeric"><strong>Celular:</strong>
            <input class="form-control" type="text" name="celular" value="<?=$celular?>" maxlength="30" minlength="1" autocomplete="off" inputmode="numeric"><strong>Pergunta de recuperação: </strong>
            <input class="form-control" type="text" name="perguntaRecuperacao" value="NOVA PERGUNTA" maxlength="30" inputmode="numeric"><strong>Resposta: </strong>
            <input class="form-control" type="text" name="respostaRecuperacao" value="NOVA RESPOSTA" maxlength="30" autocomplete="off" inputmode="numeric">
            <input class="hidden" name="from" value="updateUsuario">
            <input class="hidden" name="id" value="<?=$id?>">
            <button class="btn btn-default btn-block" type="submit">Cadastrar Usuário</button>
        </form>
        <?php
        else:
        ?>
        <form method="post" action="telaDetalhesUsuario.php"><strong>Login: </strong>
            <input class="form-control" type="text" name="login" required="" maxlength="20" minlength="6" autofocus="" autocomplete="off"><strong>Senha: </strong>
            <input class="form-control" type="password" name="senha" required="" maxlength="20" minlength="6" autocomplete="off"><strong>Nome: </strong>
            <input class="form-control" type="text" name="nome" required="" maxlength="30" minlength="4" autocomplete="off"><strong>Email: </strong>
            <input class="form-control" type="email" name="email" required="" maxlength="30" minlength="1" autocomplete="off" inputmode="numeric"><strong>Email secundário / de recuperação: </strong>
            <input class="form-control" type="email" name="emailRecuperacao" maxlength="30" autocomplete="off" inputmode="numeric"><strong>Celular:</strong>
            <input class="form-control" type="text" name="celular" maxlength="30" minlength="1" autocomplete="off" inputmode="numeric"><strong>Pergunta de recuperação: </strong>
            <input class="form-control" type="text" name="perguntaRecuperacao" maxlength="30" inputmode="numeric"><strong>Resposta: </strong>
            <input class="form-control" type="text" name="respostaRecuperacao" maxlength="30" autocomplete="off" inputmode="numeric">
            <input class="hidden" name="from" value="cadastroUsuario">
            <button class="btn btn-default btn-block" type="submit">Cadastrar Usuário</button>
        </form>
            <?php
            endif;
            ?>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>