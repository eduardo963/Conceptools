<?php
include_once '../cabecalho.php';
include_once '../controller/ProdutoController.php';
$controller = new ProdutoController();

if(array_key_exists("id", $_GET)){
    $id = $_GET["id"];

    $arrayDoProduto = $controller->getProduto($id);
    $codigoProduto = $arrayDoProduto["codProduto"];
    $nomeProduto = $arrayDoProduto["nomeProduto"];
    $valorProduto = $arrayDoProduto["valor"];
    $categoriaProduto = $arrayDoProduto["idCategoriaProduto"];
    $corProduto = $arrayDoProduto["cor"];
    $pesoProduto = $arrayDoProduto["pesoBruto"];
    $materialProduto = $arrayDoProduto["material"];
    $dimensoesProduto = $arrayDoProduto["dimensoes"];
    $descricaoProduto = $arrayDoProduto["descricao"];

    if($controller->isProdutoAtivo($id)){
        $aVenda = "SIM";
    } else {
        $aVenda = "NÃO";
    }
}

if(array_key_exists("from", $_POST)){
    $from = $_POST["from"];

    if($from == "cadastroProduto"){

        $codigoProduto = $_POST["codigoproduto"];
        $nomeProduto = $_POST["nomeproduto"];
        $valorProduto = $_POST["valorproduto"];
        $categoriaProduto = $_POST["categoriaproduto"];
        $corProduto = $_POST["corproduto"];
        $pesoProduto = $_POST["pesoproduto"];
        $materialProduto = $_POST["materialproduto"];
        $dimensoesProduto = $_POST["dimensoesproduto"];
        $descricaoProduto = $_POST["descricaoproduto"];

        $id = $controller->criarNovoProduto(0, $codigoProduto, $valorProduto, $categoriaProduto, $nomeProduto,
            $corProduto, $pesoProduto, $dimensoesProduto, $materialProduto, $descricaoProduto);

        $aVenda = "SIM";

        if($id){
            echo "<p class='alert-success'>Produto cadastrado com sucesso!</p>";
        } else{

            echo "<p class='alert-warning'>Produto não cadastrado!</p>";
        }

    }

    else if ($from == "detalhesProduto" or $from == "telaProdutos"){
        $id = $_POST["id"];

        if(array_key_exists("action",$_POST)){
            $action = $_POST["action"];
        } else {
            $action = "0";
        }

        $arrayDoProduto = $controller->getProduto($id);
        $codigoProduto = $arrayDoProduto["codProduto"];
        $nomeProduto = $arrayDoProduto["nomeProduto"];
        $valorProduto = $arrayDoProduto["valor"];
        $categoriaProduto = $arrayDoProduto["idCategoriaProduto"];
        $corProduto = $arrayDoProduto["cor"];
        $pesoProduto = $arrayDoProduto["pesoBruto"];
        $materialProduto = $arrayDoProduto["material"];
        $dimensoesProduto = $arrayDoProduto["dimensoes"];
        $descricaoProduto = $arrayDoProduto["descricao"];

        if($controller->isProdutoAtivo($id)){
            $aVenda = "SIM";
        } else {
            $aVenda = "NÃO";
        }

        if ($action == "desativarProduto"){
            $controller->desativarProduto($id);
            echo "<p class='alert-success'>Produto desativado com sucesso!</p>";
            $aVenda = "NÃO";
        }
        else if ($action == "excluirProduto"){
            $controller->deletarProduto($id);
            echo "<p class='alert-success'>Produto excluido com sucesso!</p>";
            die;
        } else if ($action == "ativarProduto"){
            $controller->ativarProduto($id);
            echo "<p class='alert-success'>Produto ativado com sucesso!</p>";
            $aVenda = "SIM";
        }




    }
}



?>
<h2>Detalhes do Produto </h2>
<div class="col-md-3">
    <h3>Status </h3>
    <p><strong>Descrição:</strong></p>
    <p> <?=$descricaoProduto?> </p>
    <p><strong>À venda: <?=$aVenda?></strong></p>
    <p> </p>
    <form method="post">
        <input type="hidden" name="from" value="detalhesProduto">
        <input type="hidden" name="id" value="<?=$id?>">
        <?php
        if($aVenda == "SIM") {
            echo "<button class=\"btn btn-default btn-block\" name=\"action\" value=\"desativarProduto\" type=\"submit\"><strong>Desativar Produto</strong></button>";
        } else {
            echo "<button class=\"btn btn-default btn-block\" name=\"action\" value=\"ativarProduto\" type=\"submit\"><strong>Ativar Produto</strong></button>";
        }
        ?>
        <button class="btn btn-default btn-block" name="action" value="excluirProduto" type="submit" ><strong>Excluir Produto</strong></button>
    </form>
</div>
<div class="col-md-9">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed">
            <tbody>
            <tr>
                <td><strong>Código: </strong></td>
                <td><?=$codigoProduto?></td>
            </tr>
            <tr>
                <td><strong>Nome: </strong></td>
                <td><?=$nomeProduto?></td>
            </tr>
            <tr>
                <td><strong>Valor da unidade:</strong></td>
                <td><?=$valorProduto?></td>
            </tr>
            <tr>
                <td><strong>Categoria: </strong></td>
                <td><?=$categoriaProduto?></td>
            </tr>
            <tr>
                <td><strong>Cor: </strong></td>
                <td><?=$corProduto?></td>
            </tr>
            <tr>
                <td><strong>Peso bruto:</strong></td>
                <td><?=$pesoProduto?></td>
            </tr>
            <tr>
                <td><strong>Material:</strong> </td>
                <td><?=$materialProduto?></td>
            </tr>
            <tr>
                <td><strong>Dimensões:</strong> </td>
                <td><?=$dimensoesProduto?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
