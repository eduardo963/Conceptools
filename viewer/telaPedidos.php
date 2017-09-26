<!DOCTYPE html>
<html>
<?php
include_once '../Data.php';
include_once '../controller/pedidoController.php';
$pedidos = new pedidoController();
?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Virtual</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>

    <div class="page-header">
        <h1>Sistema de loja virtual<small> Versão 0.1</small></h1>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand navbar-link"> </a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li class="active" role="presentation"><a href="#" id="btnPedidos">Pedidos </a></li>
                        <li role="presentation"><a href="#">Produtos </a></li>
                        <li role="presentation"><a href="#">Clientes </a></li>
                        <li role="presentation"><a href="#">Vendedores </a></li>
                        <li role="presentation"><a href="#">Filiais </a></li>
                        <li role="presentation"><a href="#">Usuários </a></li>
                    </ul>
                    <button class="btn btn-default navbar-btn navbar-right" type="button">Sair </button>
                </div>
            </div>
        </nav>
    </div>
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