<?php
include_once '../cabecalho.php';
include_once '../controller/FilialController.php';
?>
<h2>Cadastro de filial</h2>
<div class="col-md-6">
    <div>
        <?php
        if(array_key_exists("id", $_GET)):
        $controller = new FilialController();
        $id = $_GET["id"];

            $arrayDaFilial = $controller->getFilial($id);

            $cep = $arrayDaFilial["cep"];
            $logradouro = $arrayDaFilial["logradouro"];
            $bairro = $arrayDaFilial["bairro"];
            $numero = $arrayDaFilial["numero"];
            $cidade = $arrayDaFilial["cidade"];
            $uf = $arrayDaFilial["uf"];
            $pais = $arrayDaFilial["pais"];
            $dataDeInauguracao = $arrayDaFilial["dataDeInauguracao"];
        ?>
        <form method="post" action="telaDetalhesFilial.php"><strong>Logradouro: </strong>
            <input class="form-control" type="text" name="logradouro" value="<?=$logradouro?>" required="" maxlength="40" minlength="4" autocomplete="off" autofocus=""><strong>CEP: </strong>
            <input class="form-control" type="text" name="cep" value="<?=$cep?>" required="" maxlength="30" minlength="1" autocomplete="off"><strong>Bairro: </strong>
            <input class="form-control" type="text" name="bairro" value="<?=$bairro?>" maxlength="30" minlength="1" autocomplete="on"><strong>Número: </strong>
            <input class="form-control" type="text" name="numero" value="<?=$numero?>" maxlength="10" minlength="1" autocomplete="off" inputmode="numeric"><strong>Cidade: </strong>
            <input class="form-control" type="text" name="cidade" value="<?=$cidade?>" maxlength="30" minlength="1" autocomplete="on"><strong>UF:</strong>
            <input class="form-control" type="text" name="uf" value="<?=$uf?>" maxlength="2" minlength="1" autocomplete="on"><strong>País: </strong>
            <input class="form-control" type="text" name="pais" value="<?=$pais?>" maxlength="30" minlength="4" autocomplete="on"><strong>Data de inauguração: </strong>
            <input class="form-control" type="date" name="dataDeInauguracao" value="<?=$dataDeInauguracao?>" required="" autocomplete="off">
            <input class="hidden" name="from" value="updateFilial">
            <input class="hidden" name="id" value="<?=$id?>">
            <button class="btn btn-default btn-block" type="submit">Salvar edições</button>
        </form>
        <?php
        else:
        ?>
        <form method="post" action="telaDetalhesFilial.php"><strong>Logradouro: </strong>
            <input class="form-control" type="text" name="logradouro" required="" maxlength="40" minlength="4" autocomplete="off" autofocus=""><strong>CEP: </strong>
            <input class="form-control" type="text" name="cep" required="" maxlength="30" minlength="1" autocomplete="off"><strong>Bairro: </strong>
            <input class="form-control" type="text" name="bairro" maxlength="30" minlength="1" autocomplete="on"><strong>Número: </strong>
            <input class="form-control" type="text" name="numero" maxlength="10" minlength="1" autocomplete="off" inputmode="numeric"><strong>Cidade: </strong>
            <input class="form-control" type="text" name="cidade" maxlength="30" minlength="1" autocomplete="on"><strong>UF:</strong>
            <input class="form-control" type="text" name="uf" maxlength="2" minlength="1" autocomplete="on"><strong>País: </strong>
            <input class="form-control" type="text" name="pais" maxlength="30" minlength="4" autocomplete="on"><strong>Data de inauguração: </strong>
            <input class="form-control" type="date" name="dataDeInauguracao" required="" autocomplete="off">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="filialativa" checked="" value="s"><strong>Filial ativa?</strong></label>
            </div>
            <input class="hidden" name="from" value="cadastroFilial">
            <button class="btn btn-default btn-block" type="submit">Cadastrar Filial</button>
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