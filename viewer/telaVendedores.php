<?php
include_once '../cabecalho.php';
include_once '../controller/VendedorController.php';
$controler = new VendedorController();

if(array_key_exists("from",$_POST )){

    if(array_key_exists("aprovar", $_POST)){
        $id = $_POST["aprovar"];
        if($controler->isVendedorAtivo($id)){
            if($controler->desativarVendedor($id)) {
                echo "<p class='alert-success'>Vendedor desativado com sucesso!</p>";
            } else{
                echo "<p class='alert-warning'>O vendedor não foi desativado com sucesso.</p>";
            }
        }else{
            if($controler->ativarVendedor($id)) {
                echo "<p class='alert-success'>Vendedor ativado com sucesso!</p>";
            } else{
                echo "<p class='alert-warning'>O vendedor não foi ativado com sucesso.</p>";
            }
        }
    }

    else if(array_key_exists("deletar",$_POST )){
        $id = $_POST["deletar"];
        if($controler->deletarVendedor($id)) {
            echo "<p class='alert-success'>Vendedor excluido com sucesso!</p>";
        } else{
            echo "<p class='alert-warning'>O vendedor não foi excluido com sucesso.</p>";
        }


    }

    else if(array_key_exists("visualizar", $_POST)){
        $id = $_POST["visualizar"];
        header("Location: ../viewer/telaDetalhesVendedor.php?id=".$id."");
        exit();
    }

    else if(array_key_exists("editar", $_POST)){
        $id = $_POST["editar"];
        var_dump($id);
        header("Location: ../viewer/telaCadastroVendedor.php?id=".$id);
        exit();
    }
}
?>

<div class="col-md-4">
    <h2>Vendedores</h2>
    <form action="telaCadastroVendedor.php" method="post">
        <button class="btn btn-default btn-block" type="submit" id="btnCadastrarPedido"><strong>Novo vendedor</strong></button>
    </form>
</div>
<div class="col-md-12 col-md-offset-0">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th class="active">ID </th>
                <th class="active">Nome</th>
                <th class="active">CPF </th>
                <th class="active">Telefone </th>
                <th class="active">Barra de ações</th>
            </tr>
            </thead>
            <tbody>
            <?php $controler->exibirVendedoresCadastrados();?>
            </tbody>
        </table>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>