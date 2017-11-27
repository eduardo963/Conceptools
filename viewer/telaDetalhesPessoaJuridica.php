<?php
include_once '../cabecalho.php';
include_once '../controller/ClienteController.php';
$controller = new ClienteController();

if(array_key_exists("id", $_GET)){
    $id = $_GET["id"];

    $arrayDoCliente = $controller->getCliente($id);
    $nome = $arrayDoCliente["nome"];
    $telefone = $arrayDoCliente["telefone"];
    $celular = $arrayDoCliente["celular"];
    $email = $arrayDoCliente["email"];
    $endereco = $arrayDoCliente["endereco"];
    $cep = $arrayDoCliente["cep"];
    $cidade = $arrayDoCliente["cidade"];
    $estado = $arrayDoCliente["estado"];
    $pais = $arrayDoCliente["pais"];

    $cnpj = $arrayDoCliente["cnpj"];
    $inscricaoEstadual = $arrayDoCliente["inscricaoEstadual"];
    $nomeFantasia = $arrayDoCliente["nomeFantasia"];

    if($controller->isClienteAtivo($id)){
        $ativo = "SIM";
    } else {
        $ativo = "NÃO";
    }
}

if(array_key_exists("from", $_POST)){
    $from = $_POST["from"];

    if($from == "cadastroCliente"){

        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $celular = $_POST["celular"];
        $email = $_POST["email"];
        $endereco = $_POST["endereco"];
        $cep = $_POST["cep"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $pais = $_POST["pais"];

        $cnpj = $_POST["cnpj"];
        $inscricaoEstadual = $_POST["inscricaoEstadual"];
        $nomeFantasia = $_POST["nomeFantasia"];


        $id = $controller->criarNovaPessoaJuridica($nome, $telefone, $celular, $email, $endereco, $cep, $cidade, $estado, $pais,
            $cnpj, $inscricaoEstadual, $nomeFantasia);

        $ativo = "SIM";

        if($id){
            echo "<p class='alert-success'>Cliente cadastrado com sucesso!</p>";
        } else{

            echo "<p class='alert-warning'>Cliente não cadastrado!</p>";
        }

    } else if($from == "updateCliente"){

        $id = $_POST["id"];

        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $celular = $_POST["celular"];
        $email = $_POST["email"];
        $endereco = $_POST["endereco"];
        $cep = $_POST["cep"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $pais = $_POST["pais"];

        $cnpj = $_POST["cnpj"];
        $inscricaoEstadual = $_POST["inscricaoEstadual"];
        $nomeFantasia = $_POST["nomeFantasia"];

        $arrayDaCliente = $controller->getCliente($id);
        $ativo = $arrayDaCliente["ativo"];

        $sucesso = $controller->updateNovaPessoaJuridica($id, $nome, $telefone, $celular, $email, $endereco, $cep, $cidade, $estado, $pais,
            $cnpj, $inscricaoEstadual, $nomeFantasia);



        if($sucesso){
            echo "<p class='alert-success'>Cliente atualizado com sucesso!</p>";
        } else{

            echo "<p class='alert-warning'>Cliente não atualizado!</p>";
        }

    }
    
    
    
    

    else if ($from == "detalhesCliente"){
        $id = $_POST["id"];

        if(array_key_exists("action",$_POST)){
            $action = $_POST["action"];
        } else {
            $action = "0";
        }

        $arrayDoCliente = $controller->getCliente($id);

        $nome = $arrayDoCliente["nome"];
        $telefone = $arrayDoCliente["telefone"];
        $celular = $arrayDoCliente["celular"];
        $email = $arrayDoCliente["email"];
        $endereco = $arrayDoCliente["endereco"];
        $cep = $arrayDoCliente["cep"];
        $cidade = $arrayDoCliente["cidade"];
        $estado = $arrayDoCliente["estado"];
        $pais = $arrayDoCliente["pais"];

        $cnpj = $arrayDoCliente["cnpj"];
        $inscricaoEstadual = $arrayDoCliente["inscricaoEstadual"];
        $nomeFantasia = $arrayDoCliente["nomeFantasia"];

        if($controller->isClienteAtivo($id)){
            $ativo = "SIM";
        } else {
            $ativo = "NÃO";
        }

        if ($action == "desativarCliente"){
            $controller->desativarCliente($id);
            echo "<p class='alert-success'>Cliente desativado com sucesso!</p>";
            $ativo = "NÃO";
        }
        else if ($action == "excluirCliente"){
            $controller->deletarCliente($id);
            echo "<p class='alert-success'>Cliente excluido com sucesso!</p>";
            die;
        } else if ($action == "ativarCliente"){
            $controller->ativarCliente($id);
            echo "<p class='alert-success'>Cliente ativado com sucesso!</p>";
            $ativo = "SIM";
        }



    }
}

?>
<h2>Detalhes do Cliente</h2>
<div class="col-md-3">
    <h3>Status </h3>
    <p><strong>Ativo: <?=$ativo?></strong></p>
    <p><strong>Tipo: Pessoa Jurídica</strong></p>
    <p> </p>
    <form method="post">
        <input type="hidden" name="from" value="detalhesCliente">
        <input type="hidden" name="id" value="<?=$id?>">
        <?php
        if($ativo == "SIM") {
            echo "<button class=\"btn btn-default btn-block\" name=\"action\" value=\"desativarCliente\" type=\"submit\"><strong>Desativar Cliente</strong></button>";
        } else {
            echo "<button class=\"btn btn-default btn-block\" name=\"action\" value=\"ativarCliente\" type=\"submit\"><strong>Ativar Cliente</strong></button>";
        }
        ?>
        <button class="btn btn-default btn-block" type="submit"><strong>Excluir Cliente</strong></button>
    </form>
</div>
<div class="col-md-9">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed">
            <tbody>
            <tr>
                <td><strong>ID:</strong> </td>
                <td><?=$id?></td>
            </tr>
            <tr>
                <td><strong>Razão Social: </strong></td>
                <td><?=$nome?></td>
            </tr>
            <tr>
                <td><strong>Nome Fantasia: </strong></td>
                <td><?=$nomeFantasia?></td>
            </tr>
            <tr>
                <td><strong>CNPJ:</strong></td>
                <td><?=$cnpj?></td>
            </tr>
            <tr>
                <td><strong>Inscrição Estadual: </strong></td>
                <td><?=$inscricaoEstadual?></td>
            </tr>
            <tr>
                <td><strong>Telefone: </strong></td>
                <td><?=$telefone?></td>
            </tr>
            <tr>
                <td><strong>Celular:</strong></td>
                <td><?=$celular?></td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td><?=$email?></td>
            </tr>
            <tr>
                <td><strong>Endereço: </strong></td>
                <td><?=$endereco?></td>
            </tr>
            <tr>
                <td><strong>Cep: </strong></td>
                <td><?=$cep?></td>
            </tr>
            <tr>
                <td><strong>Cidade:</strong></td>
                <td><?=$cidade?></td>
            </tr>
            <tr>
                <td><strong>Estado:</strong> </td>
                <td><?=$estado?> </td>
            </tr>
            <tr>
                <td><strong>País:</strong> </td>
                <td><?=$pais?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>