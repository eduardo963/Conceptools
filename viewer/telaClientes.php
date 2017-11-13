<?php
include_once '../cabecalho.php';
include_once '../controller/ClienteController.php';
$controler = new ClienteController();

if(array_key_exists("from",$_POST )){

    if(array_key_exists("aprovar", $_POST)){
        $id = $_POST["aprovar"];
        if($controler->isClienteAtivo($id)){
            if($controler->desativarCliente($id)) {
                echo "<p class='alert-success'>Cliente desativado com sucesso!</p>";
            } else{
                echo "<p class='alert-warning'>O cliente não foi desativado com sucesso.</p>";
            }
        }else{
            if($controler->ativarCliente($id)) {
                echo "<p class='alert-success'>Cliente ativado com sucesso!</p>";
            } else{
                echo "<p class='alert-warning'>O cliente não foi ativado com sucesso.</p>";
            }
        }
    }

    else if(array_key_exists("deletar",$_POST )){
        $id = $_POST["deletar"];
        if($controler->deletarCliente($id)) {
            echo "<p class='alert-success'>Cliente excluido com sucesso!</p>";
        } else{
            echo "<p class='alert-warning'>O cliente não foi excluido com sucesso.</p>";
        }


    }

    else if(array_key_exists("visualizar", $_POST)){
        $id = $_POST["visualizar"];
        $tipo = $_POST["tipo"];
        header("Location: ../viewer/telaDetalhes".$tipo.".php?id=".$id."");
        exit();
    }
}
?>
<h2>Clientes</h2>
<div class="col-md-3">
    <form action="telaTipoCliente.php">
        <button class="btn btn-default btn-block" type="submit"><strong>Novo cliente</strong></button>
    </form>
    <h4 class="text-uppercase text-center">Filtros </h4>
    <form>
        <div class="form-group"><strong>ID: </strong>
            <input class="form-control" type="text" name="id"><strong>Nome / Razão social: </strong>
            <input class="form-control" type="text" name="nomerazao"><strong>CPF / CNPJ: </strong>
            <input class="form-control" type="text" name="cpfcnpj"><strong>Tipo de cliente:</strong>
            <select class="form-control" name="tipo">
                <optgroup label="Selecione um tipo">
                    <option value="ambos" selected="">Ambos</option>
                    <option value="pessoafisica">Pessoa Física</option>
                    <option value="pessoajuridica">Pessoa Jurídica</option>
                </optgroup>
            </select>
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
                <th class="active">Nome / Razão social</th>
                <th class="active">Tipo</th>
                <th class="active">CNPJ / CPF</th>
                <th class="active">Barra de ações</th>
            </tr>
            </thead>
            <tbody>
            <?php $controler->exibirClientesCadastrados();?>
            </tbody>
        </table>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>