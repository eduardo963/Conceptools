<?php
include_once '../cabecalho.php';
include_once '../controller/UsuarioController.php';
$controler = new UsuarioController();

if(array_key_exists("from",$_POST )){

    if(array_key_exists("aprovar", $_POST)){
        $id = $_POST["aprovar"];
        if($controler->isUsuarioAtivo($id)){
            if($controler->desativarUsuario($id)) {
                echo "<p class='alert-success'>Usuario desativado com sucesso!</p>";
            } else{
                echo "<p class='alert-warning'>O usuario não foi desativado com sucesso.</p>";
            }
        }else{
            if($controler->ativarUsuario($id)) {
                echo "<p class='alert-success'>Usuario ativado com sucesso!</p>";
            } else{
                echo "<p class='alert-warning'>O usuario não foi ativado com sucesso.</p>";
            }
        }
    }

    else if(array_key_exists("deletar",$_POST )){
        $id = $_POST["deletar"];
        if($controler->deletarUsuario($id)) {
            echo "<p class='alert-success'>Usuario excluido com sucesso!</p>";
        } else{
            echo "<p class='alert-warning'>O usuario não foi excluido com sucesso.</p>";
        }


    }

    else if(array_key_exists("visualizar", $_POST)){
        $id = $_POST["visualizar"];
        var_dump($id);
        header("Location: ../viewer/telaDetalhesUsuario.php?id=".$id);
        exit();
    }

    else if(array_key_exists("editar", $_POST)){
        $id = $_POST["editar"];
        var_dump($id);
        header("Location: ../viewer/telaCadastroUsuario.php?id=".$id);
        exit();
    }
}



?>
    <div class="col-md-4">
        <h2>Usuários </h2>
        <form action="telaCadastroUsuario.php">
            <button class="btn btn-default btn-block" type="submit" ><strong>Novo Usuário</strong></button>
        </form>
    </div>
    <div class="col-md-12 col-md-offset-0">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="active">Id</th>
                        <th class="active">Nome do usuário</th>
                        <th class="active">Login </th>
                        <th class="active">E-mail </th>
                        <th class="active">Barra de ações </th>
                    </tr>
                </thead>
                <tbody>
                <?php $arrayDeUsuarios = $controler->exibirUsuariosCadastrados();
                if($arrayDeUsuarios) {
                    foreach ($arrayDeUsuarios as $usuario) {
                        $id = $usuario->getId();
                        echo "<tr>
                    <td>{$usuario->getId()} </td>
                    <td>{$usuario->getNome()} </td>
                    <td>{$usuario->getLogin()} </td>
                    <td>{$usuario->getEmail()} </td>
                    <td>
                    <form method='post'>
                        <input type='hidden' name='from' value='telaUsuarios'>
                        <button type='submit' name='visualizar' value='{$id}'>
                            <img src='../assets/img/imgVisualizar.png' alt='Visualizar' style='width:1.2em; height:1.2em'>
                        </button> 
                        <button type='submit' name='aprovar' value='{$id}'> 
                            <img src='../assets/img/imgAprovar.png' alt='Aprovar' style='width:1.2em; height:1.2em'>
                        </button> <button type='submit' name='deletar' value='{$id}'> 
                            <img src='../assets/img/imgDeletar.png' alt='Deletar' style='width:1.2em; height:1.2em'>
                        </button>
                        <button type='submit' name='editar' value='{$id}'> 
                            <img src='../assets/img/imgEditar.png' alt='Editar' style='width:1.2em; height:1.2em'>
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>