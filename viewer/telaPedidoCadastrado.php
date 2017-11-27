<?php
include_once '../Data.php';
include_once '../controller/PedidoController.php';
$numeroPedido = $_GET['numeroPedido'];
$valorPedido = $_GET['valorPedido'];
$dataPedido = $_GET['dataPedido'];

$novoPedido = new pedidoController();

$resultado = $novoPedido->criarNovoPedido($valorPedido,$dataPedido);


include_once '../cabecalho.php';
if($resultado){
?>
        <h2>Pedido Cadastrado!</h2>
        <div class="col-md-6">
            <form action="telaPedidos.php">
                <div class="form-group">
                    <strong>Número do pedido:</strong>
                    <p><?php echo $numeroPedido;?> </p>
                    <strong>Valor total: </strong>
                    <p><?php echo $valorPedido;?> </p>
                    <strong>Data do pedido: </strong>
                    <p><?php echo $dataPedido;?></p>
                    <button class="btn btn-default" type="submit">Voltar </button>
                </div>
            </form>

        </div>
        <?php
    } else {
    ?>
    <h2>Pedido não Cadastrado!</h2>
    <div class="col-md-6">
        <form action="telaPedidos.php">
            <div class="form-group">
                <strong>Número do pedido:</strong>
                <p><?php echo $numeroPedido;?> </p>
                <strong>Valor total: </strong>
                <p><?php echo $valorPedido;?> </p>
                <strong>Data do pedido: </strong>
                <p><?php echo $dataPedido;?></p>
                <button class="btn btn-default" type="submit">Voltar </button>
            </div>
        </form>

    </div>
    <?php
    }
    ?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>