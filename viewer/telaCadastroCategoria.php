<?php
include_once '../cabecalho.php';
include_once '../controller/CategoriaController.php';
?>

<h2>Cadastro de categoria</h2>
<div class="col-md-6">
    <div>
        <?php
        if(array_key_exists("id", $_GET)):
            $controller = new CategoriaController();
            $id = $_GET["id"];

            $arrayDaCategoria = $controller->getCategoria($id);
            $nome = $arrayDaCategoria["nome"];
            $descricao = $arrayDaCategoria["descricao"];
            $observacao = $arrayDaCategoria["observacao"];
            $detalhes = $arrayDaCategoria["detalhes"];
            $paticularidade = $arrayDaCategoria["particularidade"];
            $importancia = $arrayDaCategoria["importancia"];
        ?>
        <form method="post" action="telaDetalhesCategoria.php"><strong>Nome: </strong>
            <input class="form-control" type="text" name="nome" value="<?=$nome?>" required="" maxlength="40" minlength="4" autocomplete="off" autofocus=""><strong>Descrição: </strong>
            <input class="form-control" type="text" name="descricao" value="<?=$descricao?>" required="" maxlength="30" minlength="1" autocomplete="off"><strong>Observações: </strong>
            <input class="form-control" type="text" name="observacao" value="<?=$observacao?>" maxlength="30" minlength="1" autocomplete="on"><strong>Detalhes: </strong>
            <input class="form-control" type="text" name="detalhes" value="<?=$detalhes?>" maxlength="20" minlength="1" autocomplete="off" inputmode="numeric"><strong>Particularidades: </strong>
            <input class="form-control" type="text" name="particularidade" value="<?=$paticularidade?>" maxlength="30" minlength="1" autocomplete="on"><strong>Importância:</strong>
            <input class="form-control" type="text" name="importancia" value="<?=$importancia?>" maxlength="20" minlength="1" autocomplete="on">
            <input class="hidden" name="from" value="updateCategoria">
            <input class="hidden" name="id" value="<?=$id?>">
            <button class="btn btn-default btn-block" type="submit">Cadastrar Categoria</button>
        </form>
        <?php
        else:
        ?>
        <form method="post" action="telaDetalhesCategoria.php"><strong>Nome: </strong>
            <input class="form-control" type="text" name="nome" required="" maxlength="40" minlength="4" autocomplete="off" autofocus=""><strong>Descrição: </strong>
            <input class="form-control" type="text" name="descricao" required="" maxlength="30" minlength="1" autocomplete="off"><strong>Observações: </strong>
            <input class="form-control" type="text" name="observacao" maxlength="30" minlength="1" autocomplete="on"><strong>Detalhes: </strong>
            <input class="form-control" type="text" name="detalhes" maxlength="10" minlength="1" autocomplete="off" inputmode="numeric"><strong>Particularidades: </strong>
            <input class="form-control" type="text" name="particularidade" maxlength="30" minlength="1" autocomplete="on"><strong>Importância:</strong>
            <input class="form-control" type="text" name="importancia" maxlength="2" minlength="1" autocomplete="on">
            <input class="hidden" name="from" value="cadastroCategoria">
            <button class="btn btn-default btn-block" type="submit">Cadastrar Categoria</button>
        </form>
        <?php
        endif;
        ?>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>