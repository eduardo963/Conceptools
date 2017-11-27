<?php
include_once '../cabecalho.php';
include_once '../controller/CategoriaController.php';
$controler = new CategoriaController();

if(array_key_exists("from",$_POST )){

    if(array_key_exists("aprovar", $_POST)){
        $id = $_POST["aprovar"];
        if($controler->isCategoriaAtivo($id)){
            if($controler->desativarCategoria($id)) {
                echo "<p class='alert-success'>Categoria desativada com sucesso!</p>";
            } else{
                echo "<p class='alert-warning'>A categoria não foi desativada com sucesso.</p>";
            }
        }else{
            if($controler->ativarCategoria($id)) {
                echo "<p class='alert-success'>Categoria ativada com sucesso!</p>";
            } else{
                echo "<p class='alert-warning'>A categoria não foi ativada com sucesso.</p>";
            }
        }
    }

    else if(array_key_exists("deletar",$_POST )){
        $id = $_POST["deletar"];
        if($controler->deletarCategoria($id)) {
            echo "<p class='alert-success'>Categoria excluida com sucesso!</p>";
        } else{
            echo "<p class='alert-warning'>A categoria não foi excluida com sucesso.</p>";
        }


    }

    else if(array_key_exists("visualizar", $_POST)){
        $id = $_POST["visualizar"];
        var_dump($id);
        header("Location: ../viewer/telaDetalhesCategoria.php?id=".$id);
        exit();
    }

    else if(array_key_exists("editar", $_POST)){
        $id = $_POST["editar"];
        var_dump($id);
        header("Location: ../viewer/telaCadastroCategoria.php?id=".$id);
        exit();
    }
}



?>
<div class="col-md-4">
    <h2>Categorias </h2>
    <form action="telaCadastroCategoria.php">
        <button class="btn btn-default btn-block" type="submit" ><strong>Nova Categoria</strong></button>
    </form>
    </div>
    <div class="col-md-12 col-md-offset-0">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="active">Id</th>
                        <th class="active">Nome da categoria</th>
                        <th class="active">Descrição </th>
                        <th class="active">Importância </th>
                        <th class="active">Barra de ações </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $arrayDeCategorias = $controler->exibirCategoriasCadastrados();
                if($arrayDeCategorias) {
                    foreach ($arrayDeCategorias as $categoria) {
                        $id = $categoria->getId();
                        echo "<tr>
                    <td>{$categoria->getId()} </td>
                    <td>{$categoria->getNome()} </td>
                    <td>{$categoria->getDescricao()} </td>
                    <td>{$categoria->getImportancia()} </td>
                    <td>
                    <form method='post'>
                        <input type='hidden' name='from' value='telaCategorias'>
                        <button type='submit' name='visualizar' value='{$id}'>
                            <img src='../assets/img/imgVisualizar.png' alt='Visualizar' style='width:1.2em; height:1.2em'>
                        </button> 
                        <button type='submit' name='aprovar' value='{$id}'> 
                            <img src='../assets/img/imgAprovar.png' alt='Aprovar' style='width:1.2em; height:1.2em'>
                        </button> 
                        <button type='submit' name='deletar' value='{$id}'> 
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