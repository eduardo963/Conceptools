<?php
include_once '../cabecalho.php';
?>
<h2>Cadastro de filial</h2>
<div class="col-md-6">
    <div>
        <form method="post" action="telaDetalhesFilial.php"><strong>Logradouro: </strong>
            <input class="form-control" type="text" name="logradouro" required="" maxlength="40" minlength="4" autocomplete="off" autofocus=""><strong>CEP: </strong>
            <input class="form-control" type="text" name="cep" required="" maxlength="30" minlength="1" autocomplete="off"><strong>Bairro: </strong>
            <input class="form-control" type="text" name="bairro" maxlength="30" minlength="1" autocomplete="on"><strong>Número: </strong>
            <input class="form-control" type="text" name="numero" maxlength="10" minlength="1" autocomplete="off" inputmode="numeric"><strong>Cidade: </strong>
            <input class="form-control" type="text" name="cidade" maxlength="30" minlength="1" autocomplete="on"><strong>UF:</strong>
            <input class="form-control" type="text" name="uf" maxlength="2" minlength="1" autocomplete="on"><strong>País: </strong>
            <input class="form-control" type="text" name="pais" maxlength="30" minlength="4" autocomplete="on"><strong>Data de inauguração: </strong>
            <input class="form-control" type="date" name="datainauguracao" required="" autocomplete="off">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="filialativa" checked="" value="s"><strong>Filial ativa?</strong></label>
            </div>
            <button class="btn btn-default btn-block" type="submit">Cadastrar Filial</button>
        </form>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>