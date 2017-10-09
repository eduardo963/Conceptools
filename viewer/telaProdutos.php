<?php
include_once '../Data.php';
include_once '../controller/pedidoController.php';
include_once '../cabecalho.php';
$pedidos = new pedidoController();
$isFiltragem = false;
$mensagem = "";


//Este if abaixo verifica se um pedido deverá ser deletado, verificando se existe o parâmetro "deletar" na url enviada
//para o servidor pelo GET. (Caso o parâmetro exista o pedido deverá ser deletado.)

if(array_key_exists("deletar", $_POST)){
    $numeroPedidoParaDeletar = $_POST["deletar"];

    if($pedidos->deletarPedido($numeroPedidoParaDeletar)){
        $mensagem = "<p class='alert-success'>O pedido de número {$numeroPedidoParaDeletar} removido com sucesso! </p>";
    } else{
        $mensagem = "<p class='alert-warning'>O pedido de número {$numeroPedidoParaDeletar} não foi removido com sucesso. </p>";
    }


}

//Este if abaixo verifica se os pedidos deverão ser filtrados, caso exista o parâmetro "numeropedido" na url enviada
//para o servidor pelo GET.

if(array_key_exists("numeropedido", $_POST)){
    $numeroPedido = $_POST["numeropedido"];
    $dataInicial = $_POST["datainicial"];
    $dataFinal = $_POST["datafinal"];
    $valorInicial = $_POST["precoinicial"];
    $valorFinal = $_POST["precofinal"];
    $isFiltragem = true;
}


?>
    <h2>Pedidos </h2>
    <div class="col-md-3">
        <form action="telaCadastroPedido.php" method="post">
            <button class="btn btn-default btn-block" type="submit" id="btnCadastrarPedido"><strong>Novo Pedido!!</strong></button>
        </form>
        <h4 class="text-uppercase text-center">Filtros </h4>
        <form action="telaPedidos.php" method="post">
            <div class="form-group">
                <strong>Número do pedido:</strong>
                <input class="form-control" name="numeropedido" type="text"><strong>Preço inicial: </strong>
                <input class="form-control" name="precoinicial" type="number"><strong>Preço final:</strong>
                <input class="form-control" name="precofinal" type="number"><strong>Data inicial: </strong>
                <input class="form-control" name="datainicial" type="date"><strong>Data Final: </strong>
                <input class="form-control" name="datafinal" type="date">
                <button class="btn btn-default btn-block" type="submit">Filtrar </button>
            </div>
        </form>
    </div>
    <div class="col-md-8 col-md-offset-0">
        <div class="table-responsive">
            <?php
                echo $mensagem;
            ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="active">Número do pedido</th>
                        <th class="active">Valor </th>
                        <th class="active">Data </th>
                        <th class="active" style="font-weight:bold;width:11.5em">Ações </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if($isFiltragem){
                    $pedidos->listarPedidos($numeroPedido, $dataInicial,$dataFinal,$valorInicial,$valorFinal);
                } else {
                    $pedidos->exibirPedidosCadastrados();
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>