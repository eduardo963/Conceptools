<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro pedido</title>
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