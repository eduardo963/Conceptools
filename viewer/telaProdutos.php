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
}
?>
    <h2>Produtos</h2>
    <div class="col-md-3">
        <form action="telaCadastroProduto.php">
            <button class="btn btn-default btn-block" type="submit" ><strong>Novo Produto</strong></button>
        </form>
        <h4 class="text-uppercase text-center">Filtros </h4><strong>Numero do produto: </strong>
        <form>
            <div class="form-group">
                <input class="form-control" type="text"><strong>Categoria: </strong>
                <select class="form-control">
                    <optgroup label="Selecione uma categoria">
                        <option value="12" selected="">Categoria 1</option>
                        <option value="13">Categoria 2</option>
                        <option value="14">Categoria 3</option>
                    </optgroup>
                </select><strong>Valor incial e final:</strong>
                <div class="row">
                    <div class="col-md-6">
                        <input class="form-control" type="number">
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="number">
                    </div>
                </div>
                <br>
                <button class="btn btn-default btn-block" type="submit">Filtrar </button>
            </div>
        </form>
    </div>
    <div class="col-md-8 col-md-offset-0">
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
                <?php $controler->exibirProdutosCadastrados();?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>