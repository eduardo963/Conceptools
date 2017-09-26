<!DOCTYPE html>
<html>

<head>
    <?php
    include_once '../Data.php';
    include_once '../controller/pedidoController.php';
    $numeroPedido = $_GET['numeroPedido'];
    $valorPedido = $_GET['valorPedido'];
    $dataPedido = $_GET['dataPedido'];

    $novoPedido = new pedidoController();

    $novoPedido->criarNovoPedido($valorPedido,$dataPedido);


    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido cadastrado</title>
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
                        <li class="active" role="presentation"><a href="telaPedidos.php" id="btnPedidos">Pedidos </a></li>
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
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>