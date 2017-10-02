<?php
include_once '../Data.php';
include_once '../controller/pedidoController.php';
$pedidos = new pedidoController();
include_once '../cabecalho.php';
?>
    <h2>Pedidos </h2>
    <div class="col-md-3">
        <form action="telaCadastroPedido.php" method="get">
            <button class="btn btn-default btn-block" type="submit"><strong>Novo Pedido!!</strong></button>
        </form>
        <h4 class="text-uppercase text-center">Filtros </h4>
        <form action="telaPedidosFiltros.php">
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
                <?php $pedidos->exibirPedidosCadastrados(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>