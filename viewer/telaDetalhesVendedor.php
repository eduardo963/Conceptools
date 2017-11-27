<?php
include_once '../cabecalho.php';
include_once '../controller/VendedorController.php';
$controller = new VendedorController();

if(array_key_exists("id", $_GET)){
    $id = $_GET["id"];

    $arrayDoVendedor = $controller->getVendedor($id);
    $nome = $arrayDoVendedor["nome"];
    $telefone = $arrayDoVendedor["telefone"];
    $celular = $arrayDoVendedor["celular"];
    $email = $arrayDoVendedor["email"];
    $endereco = $arrayDoVendedor["endereco"];
    $cep = $arrayDoVendedor["cep"];
    $cidade = $arrayDoVendedor["cidade"];
    $estado = $arrayDoVendedor["estado"];
    $pais = $arrayDoVendedor["pais"];

    $cpf = $arrayDoVendedor["cpf"];
    $rg = $arrayDoVendedor["rg"];
    $genero = $arrayDoVendedor["genero"];

    $dataDeNascimento = $arrayDoVendedor["dataDeNascimento"];
    $dataDeAdmissao = $arrayDoVendedor["dataDeAdmissao"];

    if($controller->isVendedorAtivo($id)){
        $ativo = "SIM";
    } else {
        $ativo = "NÃO";
    }
}

if(array_key_exists("from", $_POST)){
    $from = $_POST["from"];

    if($from == "cadastroVendedor"){

        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $celular = $_POST["celular"];
        $email = $_POST["email"];
        $endereco = $_POST["endereco"];
        $cep = $_POST["cep"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $pais = $_POST["pais"];

        $cpf = $_POST["cpf"];
        $rg = $_POST["rg"];
        $genero = $_POST["genero"];

        $dataDeAdmissao = $_POST["dataDeAdmissao"];
        $dataDeNascimento = $_POST["dataDeNascimento"];

        $id = $controller->criarNovoVendedor($nome, $telefone, $celular, $email, $endereco, $cep, $cidade, $estado, $pais,
            $cpf, $rg, $genero, $dataDeAdmissao, $dataDeNascimento);

        $ativo = "SIM";

        if($id){
            echo "<p class='alert-success'>Vendedor cadastrado com sucesso!</p>";
        } else{

            echo "<p class='alert-warning'>Vendedor não cadastrado!</p>";
        }

    } else if($from == "updateVendedor"){

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

        $cpf = $_POST["cpf"];
        $rg = $_POST["rg"];
        $genero = $_POST["genero"];

        $dataDeAdmissao = $_POST["dataDeAdmissao"];
        $dataDeNascimento = $_POST["dataDeNascimento"];

        $arrayDaVendedor = $controller->getVendedor($id);
        $ativo = $arrayDaVendedor["ativo"];


        $sucesso = $controller->updateNovoVendedor($id, $nome, $telefone, $celular, $email, $endereco, $cep, $cidade, $estado, $pais,
            $cpf, $rg, $genero, $dataDeAdmissao, $dataDeNascimento);



        if($sucesso){
            echo "<p class='alert-success'>Vendedor atualizado com sucesso!</p>";
        } else{

            echo "<p class='alert-warning'>Vendedor não atualizado!</p>";
        }

    }



    else if ($from == "detalhesVendedor"){
        $id = $_POST["id"];

        if(array_key_exists("action",$_POST)){
            $action = $_POST["action"];
        } else {
            $action = "0";
        }

        $arrayDoVendedor = $controller->getVendedor($id);

        $nome = $arrayDoVendedor["nome"];
        $telefone = $arrayDoVendedor["telefone"];
        $celular = $arrayDoVendedor["celular"];
        $email = $arrayDoVendedor["email"];
        $endereco = $arrayDoVendedor["endereco"];
        $cep = $arrayDoVendedor["cep"];
        $cidade = $arrayDoVendedor["cidade"];
        $estado = $arrayDoVendedor["estado"];
        $pais = $arrayDoVendedor["pais"];

        $cpf = $arrayDoVendedor["cpf"];
        $rg = $arrayDoVendedor["rg"];
        $genero = $arrayDoVendedor["genero"];

        $dataDeAdmissao = $arrayDoVendedor["dataDeNascimento"];
        $dataDeNascimento = $arrayDoVendedor["dataDeAdmissao"];

        if($controller->isVendedorAtivo($id)){
            $ativo = "SIM";
        } else {
            $ativo = "NÃO";
        }

        if ($action == "desativarVendedor"){
            $controller->desativarVendedor($id);
            echo "<p class='alert-success'>Vendedor desativado com sucesso!</p>";
            $ativo = "NÃO";
        }
        else if ($action == "excluirVendedor"){
            $controller->deletarVendedor($id);
            echo "<p class='alert-success'>Vendedor excluido com sucesso!</p>";
            die;
        } else if ($action == "ativarVendedor"){
            $controller->ativarVendedor($id);
            echo "<p class='alert-success'>Vendedor ativado com sucesso!</p>";
            $ativo = "SIM";
        }



    }
}

?>
<h2>Detalhes do Vendedor</h2>
<div class="col-md-3">
    <h3>Status </h3>
    <p><strong>Ativo: <?=$ativo?></strong></p>
    <p><strong>Data de admissão: <?=$dataDeAdmissao?></strong></p>
    <p> </p>
    <form method="post">
        <input type="hidden" name="from" value="detalhesVendedor">
        <input type="hidden" name="id" value="<?=$id?>">
        <?php
        if($ativo == "SIM") {
            echo "<button class=\"btn btn-default btn-block\" name=\"action\" value=\"desativarVendedor\" type=\"submit\"><strong>Desativar Vendedor</strong></button>";
        } else {
            echo "<button class=\"btn btn-default btn-block\" name=\"action\" value=\"ativarVendedor\" type=\"submit\"><strong>Ativar Vendedor</strong></button>";
        }
        ?>
        <button class="btn btn-default btn-block" name="action" value="excluirVendedor" type="submit"><strong>Excluir Vendedor</strong></button>
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
                <td><strong>Nome: </strong></td>
                <td><?=$nome?></td>
            </tr>
            <tr>
                <td><strong>CPF: </strong></td>
                <td><?=$cpf?></td>
            </tr>
            <tr>
                <td><strong>RG:</strong></td>
                <td><?=$rg?></td>
            </tr>
            <tr>
                <td><strong>Gênero: </strong></td>
                <td><?=$genero?></td>
            </tr>
            <tr>
                <td><strong>Data de nascimento: </strong></td>
                <td><?=$dataDeNascimento?></td>
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