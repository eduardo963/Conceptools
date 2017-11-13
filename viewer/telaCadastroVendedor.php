<?php
include_once '../cabecalho.php';
?>
<h2>Cadastro de vendedor</h2>
<div class="col-md-6">
    <div>
        <form method="post" action="telaDetalhesVendedor.php"><strong>Nome: </strong>
            <input class="form-control" type="text" name="nome" required="" maxlength="40" minlength="4" autocomplete="off"><strong>CPF: </strong>
            <input class="form-control" type="text" name="cpf" required="" maxlength="30" minlength="1" autocomplete="off"><strong>RG: </strong>
            <input class="form-control" type="text" name="rg" maxlength="30" minlength="1" autocomplete="off"><strong>Gênero: </strong>
            <input class="form-control" type="text" name="genero" maxlength="30" minlength="1" autocomplete="off" inputmode="numeric"><strong>Data de nascimento: </strong>
            <input class="form-control" type="date" name="dataDeNascimento" maxlength="30" autocomplete="off" ><strong>Data de admissão: </strong>
            <input class="form-control" type="date" name="dataDeAdmissao" maxlength="30" required="" autocomplete="off" ><strong>Telefone: </strong>
            <input class="form-control" type="text" name="telefone" required="" maxlength="30" minlength="4" autofocus="" autocomplete="on" inputmode="numeric"><strong>Celular: </strong>
            <input class="form-control" type="text" name="celular" maxlength="30" autofocus="" autocomplete="off" inputmode="numeric"><strong>Email:</strong>
            <input class="form-control" type="text" name="email" required="" maxlength="30" minlength="5" autofocus="" autocomplete="off"><strong>Endereco: </strong>
            <input class="form-control" type="text" name="endereco" maxlength="30" autofocus="" autocomplete="on"><strong>CEP: </strong>
            <input class="form-control" type="text" name="cep" maxlength="30" autofocus="" autocomplete="on" inputmode="numeric"><strong>Cidade: </strong>
            <input class="form-control" type="text" name="cidade" maxlength="30" autofocus="" autocomplete="on"><strong>Estado: </strong>
            <input class="form-control" type="text" name="estado" maxlength="30" autofocus="" autocomplete="on"><strong>País: </strong>
            <input class="form-control" type="text" name="pais" maxlength="30" autofocus="" autocomplete="on">
            <input class="hidden" name="from" value="cadastroVendedor">
            <button class="btn btn-default btn-block" type="submit">Cadastrar Vendedor</button>
        </form>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>