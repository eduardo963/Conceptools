<?php
include_once '../cabecalho.php';
?>
    <h2>Novo Pedido </h2>
    <div class="col-md-6">
        <form action="telaPedidoCadastrado.php">
            <div class="form-group">
                <strong>Número do pedido:</strong>
                <input class="form-control" name="numeroPedido" type="text"><strong>Valor total: </strong>
                <input class="form-control" name="valorPedido" type="number"><strong>Data do pedido: </strong>
                <input class="form-control" name="dataPedido" type="date">
                <button class="btn btn-default btn-block" type="submit">Cadastrar </button>
            </div>
        </form>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>