<?php
include_once '../Data.php';
include_once '../controller/PedidoController.php';
include_once '../cabecalho.php';
session_start();
session_destroy();

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

    <div class="col-md-4">
        <h2>Pedidos </h2>
        <form action="telaCadastroPedido.php" method="post">
            <button class="btn btn-default btn-block" type="submit" id="btnCadastrarPedido"><strong>Novo Pedido!!</strong></button>
        </form>
    </div>
    <div class="col-md-12 col-md-offset-0">
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
                <?php
                $pedidos = $controler->exibirPedidosCadastrados();
                if($pedidos) {
                    foreach ($pedidos as $pedido) {
                        echo "<tr>
                    <td>{$pedido["id"]} </td>
                        <td>{$pedido["valorTotal"]} </td>
                        <td>{$pedido["dataPedido"]} </td>
                        <td><form method='post'>
                        <input type='hidden' name='from' value='telaPedidos'>
                        <button type='submit' name='visualizar' value='{$pedido["id"]}'> 
                            <img src='../assets/img/imgVisualizar.png' alt='Visualizar' style='width:1.2em; height:1.2em'>
                        </button>
                        <button type='submit' name='aprovar' value='{$pedido["id"]}'> 
                            <img src='../assets/img/imgAprovar.png' alt='Aprovar' style='width:1.2em; height:1.2em'>
                        </button> 
                        <button type='submit' name='deletar' value='{$pedido["id"]}'> 
                            <img src='../assets/img/imgDeletar.png' alt='Deletar' style='width:1.2em; height:1.2em'>
                        </button>
                        </form> 
                        </td>
                    </tr>";
                    }
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