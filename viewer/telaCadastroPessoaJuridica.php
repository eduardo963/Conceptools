<?php
include_once '../cabecalho.php';
?>
<h2>Cadastro de pessoa jurídica</h2>
<div class="col-md-6">
    <div>
        <form method="post"><strong>Razão social: </strong>
            <input class="form-control" type="text" name="nome" required="" maxlength="40" minlength="1" autocomplete="off"><strong>Nome fantasia: </strong>
            <input class="form-control" type="text" name="nomefantasia" required="" maxlength="40" minlength="1" autocomplete="off"><strong>CNPJ: </strong>
            <input class="form-control" type="text" name="cnpj" required="" maxlength="40" minlength="1" autocomplete="off"><strong>Inscrição estadual: </strong>
            <input class="form-control" type="text" name="inscricaoestadual" maxlength="40" minlength="1" autocomplete="off" inputmode="numeric"><strong>Telefone: </strong>
            <input class="form-control" type="text" name="telefone" required="" maxlength="15" minlength="4" autofocus="" autocomplete="on" inputmode="numeric"><strong>Celular: </strong>
            <input class="form-control" type="text" name="celular" maxlength="15" autofocus="" autocomplete="off" inputmode="numeric"><strong>Email:</strong>
            <input class="form-control" type="text" name="email" required="" minlength="5" autofocus="" autocomplete="off"><strong>Logradouro: </strong>
            <input class="form-control" type="text" name="endereco" autofocus="" autocomplete="on"><strong>CEP: </strong>
            <input class="form-control" type="text" name="cep" autofocus="" autocomplete="on" inputmode="numeric"><strong>Cidade: </strong>
            <input class="form-control" type="text" name="cidade" autofocus="" autocomplete="on"><strong>Estado: </strong>
            <input class="form-control" type="text" name="estado" autofocus="" autocomplete="on"><strong>País: </strong>
            <input class="form-control" type="text" name="pais" autofocus="" autocomplete="on">
            <button class="btn btn-default btn-block" type="submit">Cadastrar pessoa jurídica</button>
        </form>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>