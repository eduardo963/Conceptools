<?php
include_once '../cabecalho.php';
?>
<h2>Cadastro de filial</h2>
<div class="col-md-6">
    <div>
        <form method="post"><strong>Logradouro: </strong>
            <input class="form-control" type="text" name="endereco" required="" maxlength="40" minlength="4" autocomplete="off"><strong>CEP: </strong>
            <input class="form-control" type="text" name="cep" required="" maxlength="15" minlength="1" autocomplete="off"><strong>Bairro: </strong>
            <input class="form-control" type="text" name="bairro" maxlength="15" minlength="1" autocomplete="off"><strong>Número: </strong>
            <input class="form-control" type="text" name="numero" maxlength="10" minlength="1" autocomplete="off" inputmode="numeric"><strong>Cidade: </strong>
            <input class="form-control" type="text" name="cidade" maxlength="10" minlength="1" autocomplete="off" inputmode="numeric"><strong>UF:</strong>
            <input class="form-control" type="text" name="uf" maxlength="10" minlength="1" autocomplete="off" inputmode="numeric"><strong>País: </strong>
            <input class="form-control" type="text" name="pais" required="" maxlength="15" minlength="4" autofocus="" autocomplete="on" inputmode="numeric"><strong>Data de inauguração: </strong>
            <input class="form-control" type="text" name="datainauguracao" maxlength="15" autofocus="" autocomplete="off" inputmode="numeric">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="filialativa" checked=""><strong>Filial ativa?</strong>l</label>
            </div>
            <button class="btn btn-default btn-block" type="submit">Cadastrar Filial</button>
        </form>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>