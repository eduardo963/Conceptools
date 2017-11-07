<?php
include_once '../cabecalho.php';
include_once '../controller/ProdutoController.php';

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

        $controller = new ProdutoController();
        if($controller->criarNovoProduto(0, $codigoProduto, $valorProduto, $categoriaProduto, $nomeProduto,
            $corProduto, $pesoProduto, $dimensoesProduto, $materialProduto, $descricaoProduto)){
            echo "<p class='alert-success'>Produto cadastrado com sucesso!</p>";
        } else{

            echo "<p class='alert-warning'>Produto não cadastrado!</p>";
        }

    }
    else{

    }
}

?>
<h2>Detalhes do Produto </h2>
<div class="col-md-3">
    <h3>Status </h3>
    <p><strong>Descrição: </strong></p>
    <p>(descrição) </p>
    <p><strong>À venda: SIM</strong></p>
    <p> </p>
    <button class="btn btn-default btn-block" type="submit"><strong>Desativar Produto</strong></button>
    <button class="btn btn-default btn-block" type="submit"><strong>Excluir Produto</strong></button>
</div>
<div class="col-md-9">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed">
            <tbody>
            <tr>
                <td><strong>Código: </strong></td>
                <td>Cell 2</td>
            </tr>
            <tr>
                <td><strong>Nome: </strong></td>
                <td>Cell 2</td>
            </tr>
            <tr>
                <td><strong>Valor da unidade:</strong></td>
                <td>Cell 2</td>
            </tr>
            <tr>
                <td><strong>Categoria: </strong></td>
                <td>Cell 2</td>
            </tr>
            <tr>
                <td><strong>Cor: </strong></td>
                <td>Cell 2</td>
            </tr>
            <tr>
                <td><strong>Peso bruto:</strong></td>
                <td>Cell 2</td>
            </tr>
            <tr>
                <td><strong>Material:</strong> </td>
                <td>Cell 2 </td>
            </tr>
            <tr>
                <td><strong>Dimensões:</strong> </td>
                <td>Cell 2</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
