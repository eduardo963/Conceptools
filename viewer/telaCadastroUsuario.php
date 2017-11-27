<?php
include_once '../cabecalho.php';
?>
<h2>Cadastro de usuários</h2>
<div class="col-md-6">
    <div>
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
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>