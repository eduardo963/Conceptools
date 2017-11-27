<?php
include_once '../cabecalho.php';
include_once '../controller/FilialController.php';
$controller = new FilialController();

if(array_key_exists("id", $_GET)){
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

    if($controller->isFilialAtiva($id)){
        $ativo = "SIM";
    } else {
        $ativo = "NÃO";
    }
}

if(array_key_exists("from", $_POST)){
    $from = $_POST["from"];

    if($from == "cadastroFilial"){

        $cep = $_POST["cep"];
        $logradouro = $_POST["logradouro"];
        $bairro = $_POST["bairro"];
        $numero = $_POST["numero"];
        $cidade = $_POST["cidade"];
        $uf = $_POST["uf"];
        $pais = $_POST["pais"];
        $dataDeInauguracao = $_POST["dataDeInauguracao"];

        $id = $controller->criarNovaFilial(0, $cep, $logradouro, $bairro, $numero,
            $cidade, $uf, $pais, $dataDeInauguracao);

        $ativo = "SIM";

        if($id){
            echo "<p class='alert-success'>Filial cadastrada com sucesso!</p>";
        } else{

            echo "<p class='alert-warning'>Filial não cadastrada!</p>";
        }

    }

    else if ($from == "detalhesFilial" or $from == "telaFilials"){
        $id = $_POST["id"];

        if(array_key_exists("action",$_POST)){
            $action = $_POST["action"];
        } else {
            $action = "0";
        }

        $arrayDaFilial = $controller->getFilial($id);

        $cep = $arrayDaFilial["cep"];
        $logradouro = $arrayDaFilial["logradouro"];
        $bairro = $arrayDaFilial["bairro"];
        $numero = $arrayDaFilial["numero"];
        $cidade = $arrayDaFilial["cidade"];
        $uf = $arrayDaFilial["uf"];
        $pais = $arrayDaFilial["pais"];
        $dataDeInauguracao = $arrayDaFilial["dataDeInauguracao"];

        if($controller->isFilialAtiva($id)){
            $ativo = "SIM";
        } else {
            $ativo = "NÃO";
        }

        if ($action == "desativarFilial"){
            $controller->desativarFilial($id);
            echo "<p class='alert-success'>Filial desativada com sucesso!</p>";
            $ativo = "NÃO";
        }
        else if ($action == "excluirFilial"){
            $controller->deletarFilial($id);
            echo "<p class='alert-success'>Filial excluida com sucesso!</p>";
            die;
        } else if ($action == "ativarFilial"){
            $controller->ativarFilial($id);
            echo "<p class='alert-success'>Filial ativada com sucesso!</p>";
            $ativo = "SIM";
        }




    }
}



?>
<h2>Detalhes da Filial</h2>
<div class="col-md-3">
    <h3>Status </h3>
    <p><strong>Ativo: <?=$ativo?></strong></p>
    <p><strong>Data de inauguração: <?=$dataDeInauguracao?></strong></p>
    <p> </p>
    <form method="post">
        <input type="hidden" name="from" value="detalhesProduto">
        <input type="hidden" name="id" value="<?=$id?>">
        <?php
        if($ativo == "SIM") {
            echo "<button class=\"btn btn-default btn-block\" name=\"action\" value=\"desativarFilial\" type=\"submit\"><strong>Desativar Filial</strong></button>";
        } else {
            echo "<button class=\"btn btn-default btn-block\" name=\"action\" value=\"ativarFilial\" type=\"submit\"><strong>Ativar Filial</strong></button>";
        }
        ?>
        <button class="btn btn-default btn-block" name="action" value="excluirFilial" type="submit" ><strong>Excluir Filial</strong></button>
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
                <td><strong>Logradouro: </strong></td>
                <td><?=$logradouro?></td>
            </tr>
            <tr>
                <td><strong>Cep: </strong></td>
                <td><?=$cep?></td>
            </tr>
            <tr>
                <td><strong>Bairro:</strong></td>
                <td><?=$bairro?></td>
            </tr>
            <tr>
                <td><strong>Número: </strong></td>
                <td><?=$numero?></td>
            </tr>
            <tr>
                <td><strong>Cidade:</strong></td>
                <td><?=$cidade?></td>
            </tr>
            <tr>
                <td><strong>UF: </strong></td>
                <td><?=$uf?></td>
            </tr>
            <tr>
                <td><strong>País:</strong></td>
                <td><?=$pais?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>