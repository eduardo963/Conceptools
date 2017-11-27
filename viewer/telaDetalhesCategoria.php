<?php
include_once '../cabecalho.php';
include_once '../controller/CategoriaController.php';
$controller = new CategoriaController();

if(array_key_exists("id", $_GET)){
    $id = $_GET["id"];
    $arrayDaCategoria = $controller->getCategoria($id);

    $nome = $arrayDaCategoria["nome"];
    $descricao = $arrayDaCategoria["descricao"];
    $observacao = $arrayDaCategoria["observacao"];
    $detalhes = $arrayDaCategoria["detalhes"];
    $paticularidade = $arrayDaCategoria["particularidade"];
    $importancia = $arrayDaCategoria["importancia"];
    $dataCriacao = $arrayDaCategoria["dataCriacao"];
    $dataModificacao = $arrayDaCategoria["dataModificacao"];

    if($controller->isCategoriaAtivo($id)){
        $ativo = "SIM";
    } else {
        $ativo = "NÃO";
    }
}

if(array_key_exists("from", $_POST)){
    $from = $_POST["from"];

    if($from == "cadastroCategoria"){

        date_default_timezone_set("America/Sao_Paulo");
        $hoje = date('Y-m-d');

        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $observacao = $_POST["observacao"];
        $detalhes = $_POST["detalhes"];
        $paticularidade = $_POST["particularidade"];
        $importancia = $_POST["importancia"];
        $dataCriacao = $hoje;
        $dataModificacao = "";

        $id = $controller->criarNovoCategoria($nome, $descricao, $observacao, $detalhes, $paticularidade, $importancia);

        $ativo = "SIM";

        if($id){
            echo "<p class='alert-success'>Categoria cadastrada com sucesso!</p>";
        } else{

            echo "<p class='alert-warning'>Categoria não cadastrada!</p>";
        }

    } else if($from == "updateCategoria"){

        date_default_timezone_set("America/Sao_Paulo");
        $hoje = date('Y-m-d');

        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $observacao = $_POST["observacao"];
        $detalhes = $_POST["detalhes"];
        $paticularidade = $_POST["particularidade"];
        $importancia = $_POST["importancia"];

        $arrayDaCategoria = $controller->getCategoria($id);
        $dataCriacao = $arrayDaCategoria["dataCriacao"];
        $ativo = $arrayDaCategoria["ativo"];

        $dataModificacao = $hoje;

        $sucesso = $controller->updateCategoria($id, $nome, $descricao, $observacao, $detalhes, $paticularidade, $importancia);



        if($sucesso){
            echo "<p class='alert-success'>Categoria atualizada com sucesso!</p>";
        } else{

            echo "<p class='alert-warning'>Categoria não atualizada!</p>";
        }

    }

    else if ($from == "detalhesCategoria" or $from == "telaCategorias"){
        $id = $_POST["id"];

        if(array_key_exists("action",$_POST)){
            $action = $_POST["action"];
        } else {
            $action = "0";
        }

        $arrayDaCategoria = $controller->getCategoria($id);

        $nome = $arrayDaCategoria["nome"];
        $descricao = $arrayDaCategoria["descricao"];
        $observacao = $arrayDaCategoria["observacao"];
        $detalhes = $arrayDaCategoria["detalhes"];
        $paticularidade = $arrayDaCategoria["particularidade"];
        $importancia = $arrayDaCategoria["importancia"];
        $dataCriacao = $arrayDaCategoria["dataCriacao"];
        $dataModificacao = $arrayDaCategoria["dataModificacao"];

        if($controller->isCategoriaAtivo($id)){
            $ativo = "SIM";
        } else {
            $ativo = "NÃO";
        }

        if ($action == "desativarCategoria"){
            $controller->desativarCategoria($id);
            echo "<p class='alert-success'>Categoria desativada com sucesso!</p>";
            $ativo = "NÃO";
        }
        else if ($action == "excluirCategoria"){
            $controller->deletarCategoria($id);
            echo "<p class='alert-success'>Categoria excluida com sucesso!</p>";
            die;
        } else if ($action == "ativarCategoria"){
            $controller->ativarCategoria($id);
            echo "<p class='alert-success'>Categoria ativada com sucesso!</p>";
            $ativo = "SIM";
        }




    }
}



?>
<h2>Detalhes da Categoria</h2>
<div class="col-md-3">
    <h3>Status </h3>
    <p><strong>Ativo: <?=$ativo?></strong></p>
    <p><strong>Data de criação: <?=$dataCriacao?></strong></p>
    <p><strong>Data de Modificação: <?=$dataModificacao?></strong></p>
    <p> </p>
    <form method="post">
        <input type="hidden" name="from" value="detalhesCategoria">
        <input type="hidden" name="id" value="<?=$id?>">
        <?php
        if($ativo == "SIM") {
            echo "<button class=\"btn btn-default btn-block\" name=\"action\" value=\"desativarCategoria\" type=\"submit\"><strong>Desativar Categoria</strong></button>";
        } else {
            echo "<button class=\"btn btn-default btn-block\" name=\"action\" value=\"ativarCategoria\" type=\"submit\"><strong>Ativar Categoria</strong></button>";
        }
        ?>
        <button class="btn btn-default btn-block" name="action" value="excluirCategoria" type="submit" ><strong>Excluir Categoria</strong></button>
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
                <td><strong>Nome: </strong></td>
                <td><?=$nome?></td>
            </tr>
            <tr>
                <td><strong>Descrição: </strong></td>
                <td><?=$descricao?></td>
            </tr>
            <tr>
                <td><strong>Observação:</strong></td>
                <td><?=$observacao?></td>
            </tr>
            <tr>
                <td><strong>Detalhes: </strong></td>
                <td><?=$detalhes?></td>
            </tr>
            <tr>
                <td><strong>Particularidades:</strong></td>
                <td><?=$paticularidade?></td>
            </tr>
            <tr>
                <td><strong>Importância: </strong></td>
                <td><?=$importancia?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>