<?php
include_once '../cabecalho.php';
include_once '../controller/PedidoController.php';
$controler = new PedidoController();
session_start();

if(isset($_SESSION['venda'])){

} else{
    $_SESSION['venda'] = array();

}

if(array_key_exists("from", $_POST)){
    if(array_key_exists("tipo", $_POST)){
        $tipo = $_POST["tipo"];
        if($tipo == "concluir"){
            //Valor total:
            $idsDosProdutos = array_keys($_SESSION["venda"]);
            $valorTotal = 0;
            foreach ($idsDosProdutos as $idProduto){
                $arrayDoProduto = $controler->getProduto($idProduto);
                $valor = $arrayDoProduto["valor"];
                $valor *= $_SESSION["venda"][$idProduto];
                $valorTotal += $valor;
            }
            $numeroDeItens = array_sum($_SESSION['venda']);
            $produtos = $_SESSION["venda"];
            $cliente = $_POST["cliente"];
            $vendedor = $_POST["vendedor"];
            $filial = $_POST["filial"];

            $id = $controler->criarNovoPedido($valorTotal, $cliente, $vendedor, $filial, $numeroDeItens, $produtos);


            session_destroy();
            header("Location: ../viewer/telaDetalhesPedido.php?from=cadastropedido&id=".$id);
            exit();
        }

        elseif ($tipo == "cancelar"){
            header("Location: ../viewer/telaPedidos.php");
            exit();
        }

    }

    if(array_key_exists("adicionar", $_POST)){
        $id = $_POST["adicionar"];
        $quantidade = $_POST["quantidade"];
        if(isset($_SESSION['venda'][$id])){
            $_SESSION['venda'][$id] += $quantidade;

        } else{
            $_SESSION['venda'][$id] = 1;

        }
    }
    elseif(array_key_exists("remover", $_POST)){
        $id = $_POST["remover"];
        if(isset($_SESSION['venda'][$id])){
            unset($_SESSION['venda'][$id]);


        }
    }

    if(array_key_exists("busca", $_POST)){
        $nome = $_POST["nomeProduto"];
        $codigo = $_POST["codigoProduto"];

    }
    else {
        $nome = "";
        $codigo = "";
    }


} else {
    $nome = "";
    $codigo = "";
}

$numeroDeItens = array_sum($_SESSION['venda']);
?>
<h2>Novo Pedido </h2>
<div class="col-md-3">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <h3>Status </h3>
            <div>
                <p><strong>Valor total: <?php
                        $ids = array_keys($_SESSION["venda"]);
                        $valorTotal = 0;
                        foreach ($ids as $id){
                            $arrayDoProduto = $controler->getProduto($id);
                            $valor = $arrayDoProduto["valor"];
                            $valor *= $_SESSION["venda"][$id];
                            $valorTotal += $valor;
                        }
                        echo $valorTotal;
                        ?> </strong></p>
                <p><strong>Número de itens: <?=$numeroDeItens?></strong></p>
            </div>
        </div>
    </div>
    <form method="post">
    <p><strong>Cliente:</strong> </p>
    <select name="cliente">
        <optgroup label="Selecione um cliente">
            <?php $controler->listarOpcoesDeClientes();?>
        </optgroup>
    </select>
    <p><strong>Vendedor:</strong> </p>
    <select name="vendedor">
        <optgroup label="Selecione um vendedor">
            <?php $controler->listarOpcoesDeVendedores();?>
        </optgroup>
    </select>
    <p><strong>Filial:</strong> </p>
    <select name="filial">
        <optgroup label="Selecione uma filial">
            <?php $controler->listarOpcoesDeFiliais();?>
        </optgroup>
    </select>
    <p> </p>
        <input type="hidden" name="from" value="cadastropedido">
        <button class="btn btn-default btn-block" type="submit" name="tipo" value="concluir"><strong>Concluir Pedido</strong></button>
        <button class="btn btn-default btn-block" type="submit" name="tipo" value="cancelar"><strong>Cancelar Pedido</strong></button>
    </form>
</div>
<div class="col-md-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3>Filtro de produtos</h3>
                <form method="post">
                    <strong>Nome do produto: </strong>
                    <input type="hidden" name="from" value="telaCadastroPedido">
                    <input type="hidden" name="busca" value="produto">
                    <input class="form-control" name="nomeProduto" type="text" placeholder="Nome do produto" autofocus="" autocomplete="on"><strong>Codigo do produto: </strong>
                    <input class="form-control" name="codigoProduto" type="text" inputmode="numeric">
                    <button class="btn btn-default btn-block" type="submit">Buscar </button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                    <tr class="active">
                        <th>Código: </th>
                        <th>Nome: </th>
                        <th>Ação: </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $controler->buscarProdutos($nome, $codigo); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4">
    <h3>Produtos adicionados</h3>
    <table class="table table-striped table-bordered table-condensed">
        <thead>
        <tr class="active">
            <th>Código: </th>
            <th>Nome: </th>
            <th>Quantidade: </th>
            <th>Ação: </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
                if(array_key_exists("venda", $_SESSION)){
                $ids = array_keys($_SESSION["venda"]);

                    foreach ($ids as $id){
                        $arrayDoProduto = $controler->getProduto($id);
                        $codigo = $arrayDoProduto["codProduto"];
                        $nome = $arrayDoProduto["nomeProduto"];
                        $quantidade = $_SESSION["venda"][$id];

                        echo "
<tr>
<td>
".$codigo."
</td>
<td>
".$nome."
</td>
<td>
".$quantidade."
</td>
<td>
<form method='post'>
                    <input type='hidden' name='from' value='telaCadastroPedido'>
                    <button type='submit' name='remover' value='{$id}'> 
                        <img src='../assets/img/imgAprovar.png' alt='Remover' style='width:1.2em; height:1.2em'>
                    </button>
                  </form>
</td>
</tr>";
                    }
                }else{
                    echo "nada para nada";
                }
            ?>
        </tr>
    </table>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>