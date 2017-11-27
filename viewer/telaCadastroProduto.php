<?php
include_once '../cabecalho.php';
include_once '../controller/ProdutoController.php'
?>
<h2>Cadastro de produtos</h2>
<div class="col-md-6">
    <div>
        <?php
        if(array_key_exists("id", $_GET)):
        $controller = new ProdutoController();
            $id = $_GET["id"];
            $arrayDoProduto = $controller->pegarProduto($id);
            $codigoProduto = $arrayDoProduto["codProduto"];
            $nomeProduto = $arrayDoProduto["nomeProduto"];
            $valorProduto = $arrayDoProduto["valor"];
            $categoriaProduto = $arrayDoProduto["idCategoriaProduto"];
            $corProduto = $arrayDoProduto["cor"];
            $pesoProduto = $arrayDoProduto["pesoBruto"];
            $materialProduto = $arrayDoProduto["material"];
            $dimensoesProduto = $arrayDoProduto["dimensoes"];
            $descricaoProduto = $arrayDoProduto["descricao"];
        ?>
        <form method="post" action="telaDetalhesProduto.php"><strong>Codigo do produto: </strong>
            <input class="form-control" type="text" name="codigoproduto" value="<?=$codigoProduto?>" required="" placeholder="Código do produto" maxlength="30" minlength="1" autocomplete="off" inputmode="numeric"><strong>Nome do produto: </strong>
            <input class="form-control" type="text" name="nomeproduto" value="<?=$nomeProduto?>" required="" placeholder="Nome do produto" maxlength="45" minlength="4" autofocus="" autocomplete="on"><strong>Valor do item: </strong>
            <input class="form-control" type="text" name="valorproduto" value="<?=$valorProduto?>" required="" placeholder="Valor de uma unidade" maxlength="13" minlength="2" autofocus="" autocomplete="off" inputmode="numeric">
            <strong>Categoria do produto: <button class="btn btn-default btn-xs" type="button" onclick="location.href = 'telaCadastroCategoria.php';">Nova categoria</button> </strong>
            <select class="form-control" name="categoriaproduto" value="0">
                    <optgroup label="Selecione uma categoria">
                        <?php
                        $controler = new ProdutoController();
                        $arrayDeCategorias = $controler->exibirCategorias();
                        if($arrayDeCategorias) {
                            foreach ($arrayDeCategorias as $categoria) {
                                $asd = $categoria->getId();
                                echo "<option value=\"{$categoria->getId()}\" >{$categoria->getNome()} </option>";
                            }
                        }
?>
                </optgroup>
            </select><strong>Cor: </strong>
            <input class="form-control" type="text" name="corproduto" value="<?=$corProduto?>" placeholder="Cor do produto" maxlength="30" autofocus="" autocomplete="on"><strong>Peso do item: </strong>
            <input class="form-control" type="text" name="pesoproduto" value="<?=$pesoProduto?>" placeholder="Peso de uma unidade" maxlength="30" autofocus="" autocomplete="on" inputmode="numeric"><strong>Material do item: </strong>
            <input class="form-control" type="text" name="materialproduto" value="<?=$materialProduto?>" placeholder="Material do produto" maxlength="30" autofocus="" autocomplete="on"><strong>Dimensões do item: </strong>
            <input class="form-control" type="text" name="dimensoesproduto" value="<?=$dimensoesProduto?>" placeholder="Altura, largura, profundidade." maxlength="30" autofocus="" autocomplete="on"><strong>Descrição do item: </strong>
            <textarea class="form-control" name="descricaoproduto" value="<?=$descricaoProduto?>" placeholder="Detalhes extras do produto." maxlength="300" autocomplete="off"></textarea>
            <input class="hidden" name="from" value="updateProduto">
            <input class="hidden" name="id" value="<?=$id?>">
            <button class="btn btn-default btn-block" type="submit">Salvar Edições </button>
        </form>
        <?php
        else:
        ?>
        <form method="post" action="telaDetalhesProduto.php"><strong>Codigo do produto: </strong>
            <input class="form-control" type="text" name="codigoproduto" required="" placeholder="Código do produto" maxlength="30" minlength="1" autocomplete="off" inputmode="numeric"><strong>Nome do produto: </strong>
            <input class="form-control" type="text" name="nomeproduto" required="" placeholder="Nome do produto" maxlength="45" minlength="4" autofocus="" autocomplete="on"><strong>Valor do item: </strong>
            <input class="form-control" type="text" name="valorproduto" required="" placeholder="Valor de uma unidade" maxlength="13" minlength="2" autofocus="" autocomplete="off" inputmode="numeric">
            <strong>Categoria do produto: <button class="btn btn-default btn-xs" type="button" onclick="location.href = 'telaCadastroCategoria.php';">Nova categoria</button> </strong>
            <select class="form-control" name="categoriaproduto" value="0">
                <optgroup label="Selecione uma categoria">
                    <?php
                    $controler = new ProdutoController();
                    $arrayDeCategorias = $controler->exibirCategorias();
                    if($arrayDeCategorias) {
                        foreach ($arrayDeCategorias as $categoria) {
                            $id = $categoria->getId();
                            echo "<option value=\"{$categoria->getId()}\" >{$categoria->getNome()} </option>";
                        }
                    }
                    ?>
                </optgroup>
            </select><strong>Cor: </strong>
            <input class="form-control" type="text" name="corproduto" placeholder="Cor do produto" maxlength="30" autofocus="" autocomplete="on"><strong>Peso do item: </strong>
            <input class="form-control" type="text" name="pesoproduto" placeholder="Peso de uma unidade" maxlength="30" autofocus="" autocomplete="on" inputmode="numeric"><strong>Material do item: </strong>
            <input class="form-control" type="text" name="materialproduto" placeholder="Material do produto" maxlength="30" autofocus="" autocomplete="on"><strong>Dimensões do item: </strong>
            <input class="form-control" type="text" name="dimensoesproduto" placeholder="Altura, largura, profundidade." maxlength="30" autofocus="" autocomplete="on"><strong>Descrição do item: </strong>
            <textarea class="form-control" name="descricaoproduto" placeholder="Detalhes extras do produto." maxlength="300" autocomplete="off"></textarea>
            <input class="hidden" name="from" value="cadastroProduto">
            <button class="btn btn-default btn-block" type="submit">Cadastrar produto </button>
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