<?php
include_once '../cabecalho.php';
include_once '../controller/FilialController.php';
$controler = new FilialController();

if(array_key_exists("from",$_POST )){

    if(array_key_exists("aprovar", $_POST)){
        $id = $_POST["aprovar"];
        if($controler->isFilialAtiva($id)){
            if($controler->desativarFilial($id)) {
                echo "<p class='alert-success'>Filial desativada com sucesso!</p>";
            } else{
                echo "<p class='alert-warning'>A filial não foi desativada com sucesso.</p>";
            }
        }else{
            if($controler->ativarFilial($id)) {
                echo "<p class='alert-success'>Filial ativada com sucesso!</p>";
            } else{
                echo "<p class='alert-warning'>A filial não foi ativada com sucesso.</p>";
            }
        }
    }

    else if(array_key_exists("deletar",$_POST )){
        $id = $_POST["deletar"];
        if($controler->deletarFilial($id)) {
            echo "<p class='alert-success'>Filial excluida com sucesso!</p>";
        } else{
            echo "<p class='alert-warning'>A filial não foi excluida com sucesso.</p>";
        }


    }

    else if(array_key_exists("visualizar", $_POST)){
        $id = $_POST["visualizar"];
        var_dump($id);
        header("Location: ../viewer/telaDetalhesFilial.php?id=".$id);
        exit();
    }
}



?>
<h2>Filiais</h2>
<div class="col-md-3">
    <form action="telaCadastroFilial.php">
        <button class="btn btn-default btn-block" type="submit" ><strong>Nova Filial</strong></button>
    </form>
    <h4 class="text-uppercase text-center">Filtros </h4>
    <form>
        <div class="form-group"><strong>ID: </strong>
            <input class="form-control" type="text" name="id"><strong>Logradouro: </strong>
            <input class="form-control" type="text" name="nomerazao"><strong>Bairro: </strong>
            <input class="form-control" type="text" name="cpfcnpj"><strong>Cidade:</strong>
            <input class="form-control" type="text" name="cpfcnpj">
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
                <th class="active">Logradouro </th>
                <th class="active">Bairro </th>
                <th class="active">Cidade </th>
                <th class="active">Barra de ações</th>
            </tr>
            </thead>
            <tbody>
            <?php $controler->exibirFiliaisCadastradas();?>
            </tbody>
        </table>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>