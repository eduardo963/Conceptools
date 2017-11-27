<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Virtual</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>

<div class="page-header">
    <h1>Sistema de loja virtual<small> Versão 1.0</small></h1>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="../viewer/home.php"><img src="../assets/img/imgHome.png" alt='Home' style='width:1.4em; height:1.4em'></a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li role="presentation"><a href="../viewer/telaPedidos.php" id="btnMenuPedidos">Pedidos </a></li>
                    <li role="presentation"><a href="../viewer/telaProdutos.php" id="btnMenuProdutos">Produtos </a></li>
                    <li role="presentation"><a href="../viewer/telaCategorias.php" id="btnMenuCategorias">Categorias </a></li>
                    <li role="presentation"><a href="../viewer/telaClientes.php" id="btnMenuClientes">Clientes </a></li>
                    <li role="presentation"><a href="../viewer/telaVendedores.php" id="btnMenuVendedores">Vendedores </a></li>
                    <li role="presentation"><a href="../viewer/telaFiliais.php" id="btnMenuFiliais">Filiais </a></li>
                    <li role="presentation"><a href="../viewer/telaUsuarios.php" id="btnMenuUsuarios">Usuários </a></li>
                </ul>
                <form action="../index.php">
                <button class="btn btn-default navbar-btn navbar-right" type="submit">Sair </button>
                </form>
            </div>
        </div>
    </nav>
</div>