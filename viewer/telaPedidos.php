<?php
include_once '../Data.php';
include_once '../controller/PedidoController.php';
include_once '../cabecalho.php';
session_start();
session_destroy();
//$pedidos = new pedidoController();
//$isFiltragem = false;
//$mensagem = "";
//
//
////Este if abaixo verifica se um pedido deverá ser deletado, verificando se existe o parâmetro "deletar" na url enviada
////para o servidor pelo POST.
//
//if(array_key_exists("deletar", $_POST)){
//    $numeroPedidoParaDeletar = $_POST["deletar"];
//
//    if($pedidos->deletarPedido($numeroPedidoParaDeletar)){
//        $mensagem = "<p class='alert-success'>O pedido de número {$numeroPedidoParaDeletar} removido com sucesso! </p>";
//    } else{
//        $mensagem = "<p class='alert-warning'>O pedido de número {$numeroPedidoParaDeletar} não foi removido com sucesso. </p>";
//    }
//
//
//}
////Este if abaixo verifica se um pedido deverá ser visualizado, verificando se existe o parâmetro "visualizar" na url enviada
////para o servidor pelo POST.
//if(array_key_exists("visualizar", $_POST)){
//    $numeroPedidoParaVisualizar = $_POST["visualizar"];
//    include "telaDetalhesPedido.php";
//    die;
//
//}
//
////Este if abaixo verifica se os pedidos deverão ser filtrados, caso exista o parâmetro "numeropedido" na url enviada
////para o servidor pelo POST.
//
//if(array_key_exists("numeropedido", $_POST)){
//    $numeroPedido = $_POST["numeropedido"];
//    $dataInicial = $_POST["datainicial"];
//    $dataFinal = $_POST["datafinal"];
//    $valorInicial = $_POST["precoinicial"];
//    $valorFinal = $_POST["precofinal"];
//    $isFiltragem = true;
//}

include_once '../controller/PedidoController.php';
$controler = new PedidoController();

if(array_key_exists("from",$_POST )){

    if(array_key_exists("aprovar", $_POST)){
        $id = $_POST["aprovar"];
        if($controler->isPedidoAprovado($id)){
            if($controler->desativarPedido($id)) {
                echo "<p class='alert-success'>Pedido desativado com sucesso!</p>";
            } else{
                echo "<p class='alert-warning'>O pedido não foi desativado com sucesso.</p>";
            }
        }else{
            if($controler->ativarPedido($id)) {
                echo "<p class='alert-success'>Pedido ativado com sucesso!</p>";
            } else{
                echo "<p class='alert-warning'>O pedido não foi ativado com sucesso.</p>";
            }
        }
    }

    else if(array_key_exists("deletar",$_POST )){
        $id = $_POST["deletar"];
        if($controler->deletarPedido($id)) {
            echo "<p class='alert-success'>Pedido excluido com sucesso!</p>";
        } else{
            echo "<p class='alert-warning'>O pedido não foi excluido com sucesso.</p>";
        }
    }
    else if(array_key_exists("visualizar", $_POST)){
        $id = $_POST["visualizar"];
        header("Location: ../viewer/telaDetalhesPedido.php?from=telaPedidos&id=".$id."");
        exit();
    }
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
                <?php $controler->exibirPedidosCadastrados(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>