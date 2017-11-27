<?php
include_once '../cabecalho.php';
include_once '../controller/ProdutoController.php';
$controler = new ProdutoController();

if(array_key_exists("from",$_POST )){

    if(array_key_exists("aprovar", $_POST)){
        $id = $_POST["aprovar"];
        if($controler->isProdutoAtivo($id)){
            if($controler->desativarProduto($id)) {
                echo "<p class='alert-success'>Produto desativado com sucesso!</p>";
            } else{
                echo "<p class='alert-warning'>O produto não foi desativado com sucesso.</p>";
            }
        }else{
            if($controler->ativarProduto($id)) {
                echo "<p class='alert-success'>Produto ativado com sucesso!</p>";
            } else{
                echo "<p class='alert-warning'>O produto não foi ativado com sucesso.</p>";
            }
        }
    }

    else if(array_key_exists("deletar",$_POST )){
        $id = $_POST["deletar"];
        if($controler->deletarProduto($id)) {
            echo "<p class='alert-success'>Produto excluido com sucesso!</p>";
        } else{
            echo "<p class='alert-warning'>O produto não foi excluido com sucesso.</p>";
        }


    }

    else if(array_key_exists("visualizar", $_POST)){
        $id = $_POST["visualizar"];
        header("Location: ../viewer/telaDetalhesProduto.php?id=".$id."");
        exit();
    }

    else if(array_key_exists("editar", $_POST)){
        $id = $_POST["editar"];
        var_dump($id);
        header("Location: ../viewer/telaCadastroProduto.php?id=".$id);
        exit();
    }
}
?>
    <div class="col-md-4">
        <h2>Produtos</h2>
        <form action="telaCadastroProduto.php">
            <button class="btn btn-default btn-block" type="submit" ><strong>Novo Produto</strong></button>
        </form>
    </div>
    <div class="col-md-12 col-md-offset-0">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="active">ID </th>
                        <th class="active">Código </th>
                        <th class="active">Nome do produto</th>
                        <th class="active">Categoria </th>
                        <th class="active">Valor </th>
                        <th class="active">Barra de ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php $controler->exibirProdutosCadastrados();
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>