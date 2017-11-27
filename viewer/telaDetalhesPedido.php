<?php
include_once '../cabecalho.php';
include_once '../controller/PedidoController.php';
$controler = new PedidoController();
if(array_key_exists("from", $_GET)){

    if($_GET["from"] == "cadastropedido"){
        echo "<p class='alert-success'>Pedido cadastrado com sucesso!</p>";
    }

    if(array_key_exists("id", $_GET)){
        $id = $_GET["id"];
        $array = $controler->getPedido($id);
        $valorTotal = $array["valorTotal"];
        $numeroDeItens = $array["numeroDeItens"];
        $cliente = $controler->listarNomeDeCliente($array["cliente"]);
        $vendedor = $controler->listarNomeDeVendedor($array["vendedor"]);
        $filial = $controler->listarNomeDeFilial($array["filial"]);
        $dataPedido = $array["dataPedido"];

        if($controler->isPedidoAprovado($id)){
            $aprovado = "SIM";
        } else{
            $aprovado = "NÃO";
        }
        if(array_key_exists("action", $_GET)){
            $action = $_GET["action"];
            if ($action == "desativarPedido"){
                $controler->desativarPedido($id);
                echo "<p class='alert-success'>Pedido desaprovado com sucesso!</p>";
                $aprovado = "NÃO";
            }
            elseif ($action == "ativarPedido"){
                $controler->ativarPedido($id);
                echo "<p class='alert-success'>Pedido aprovado com sucesso!</p>";
                $aprovado = "SIM";
            }
            elseif ($action == "excluirPedido"){
                $controler->deletarPedido($id);
                echo "<p class='alert-success'>Pedido excluido com sucesso!</p>";
                die();
            }
        }
    }



}
?>
<h2>Detalhes do Pedido </h2>
<div class="col-md-3">
    <h3>Status </h3>
    <p><strong>Aprovado? <?= $aprovado?></strong></p>
    <p><strong>Valor total: R$ <?= $valorTotal?></strong></p>
    <p><strong>Número de itens: <?= $numeroDeItens?></strong></p>
    <p><strong>Cliente: <?= $cliente?></strong> </p>
    <p><strong>Vendedor: <?= $vendedor?></strong> </p>
    <p><strong>Filial: <?= $filial?></strong> </p>
    <p><strong>Data do pedido: <?= $dataPedido?></strong> </p>
    <p> </p>
    <form method="get">
        <input type="hidden" name="from" value="detalhesPedido">
        <input type="hidden" name="id" value="<?=$id?>">
        <?php
        if($aprovado == "SIM") {
            echo "<button class=\"btn btn-default btn-block\" name=\"action\" value=\"desativarPedido\" type=\"submit\"><strong>Desaprovar Pedido</strong></button>";
        } else {
            echo "<button class=\"btn btn-default btn-block\" name=\"action\" value=\"ativarPedido\" type=\"submit\"><strong>Aprovar Pedido</strong></button>";
        }
        ?>
        <button class="btn btn-default btn-block" name="action" value="excluirPedido" type="submit" ><strong>Excluir Pedido</strong></button>
    </form>
    
</div>
<div class="col-md-9">
    <h3>Itens do pedido</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed">
            <thead>
            <tr class="active">
                <th>Código: </th>
                <th>Nome: </th>
                <th>Quantidade: </th>
            </tr>
            </thead>
            <tbody>
            <?php $controler->listarProdutosDoPedido($id)?>
            </tbody>
        </table>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>