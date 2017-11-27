<?php
include_once '../Data.php';
include_once '../model/Produto.php';
include_once '../dao/ProdutosDao.php';
include_once '../controller/CategoriaController.php';
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 05/11/2017
 * Time: 15:10
 */
class ProdutoController
{
    private $produtoDao;

    function __construct()
    {
        $this->produtoDao = new ProdutosDao();
    }

    public function criarNovoProduto($idProduto, $codProduto, $valor, $idCategoriaProduto, $nomeProduto, $cor, $pesoBruto, $dimensoes,
    $material, $descricao){
        $produto = new Produto($idProduto, $codProduto, $valor, "s", $idCategoriaProduto, $nomeProduto);
        $produto->setCor($cor);
        $produto->setPesoBruto($pesoBruto);
        $produto->setDimensoes($dimensoes);
        $produto->setMaterial($material);
        $produto->setDescricao($descricao);

        $id = $this->produtoDao->inserirProduto($produto);

        return $id;

    }

    public function updateNovoProduto($idProduto, $codProduto, $valor, $idCategoriaProduto, $nomeProduto, $cor, $pesoBruto, $dimensoes,
                                     $material, $descricao){
        $produto = new Produto($idProduto, $codProduto, $valor, "s", $idCategoriaProduto, $nomeProduto);
        $produto->setCor($cor);
        $produto->setPesoBruto($pesoBruto);
        $produto->setDimensoes($dimensoes);
        $produto->setMaterial($material);
        $produto->setDescricao($descricao);

        $resultado = $this->produtoDao->updateProduto($produto, $idProduto);

        return $resultado;

    }

    public function deletarProduto($id){
        return $this->produtoDao->deletarProduto($id);
    }

    public function pegarProduto($id){
        $resultado = $this->produtoDao->pegarProduto($id);

        return $resultado;
    }

    public function getProduto($id){
        $resultado = $this->produtoDao->pegarProduto($id);
        var_dump($resultado);

        foreach ($resultado as $linha){
            var_dump($linha);
            return $linha;
        }
    }

    public function ativarProduto($id){
        $resultado = $this->produtoDao->alterarProduto($id, "s");
        return $resultado;
    }

    public function desativarProduto($id){
        $resultado = $this->produtoDao->alterarProduto($id, "n");
        return $resultado;
    }

    public function isProdutoAtivo($id)
    {
        $arrayDeLinhas = $this->produtoDao->pegarProduto($id);
            $aVenda = $arrayDeLinhas["aVenda"];
            if ($aVenda == "s") {
                return true;
            }
            if ($aVenda == "n") {
                return false;
            } else {
                echo "Erro ao consultar o produto";
            }
    }

    public function exibirProdutosCadastrados(){
        $arrayDeLinhas = $this->produtoDao->listarTodosOsProdutos();
        if($arrayDeLinhas) {
            foreach ($arrayDeLinhas as $linhaAtual) {
                $id = $linhaAtual["idProduto"];
                echo "<tr>
                    <td>{$linhaAtual["idProduto"]} </td>
                    <td>{$linhaAtual["codProduto"]} </td>
                    <td>{$linhaAtual["nomeProduto"]} </td>
                    <td>{$linhaAtual["idCategoriaProduto"]} </td>
                    <td>{$linhaAtual["valor"]} </td>
                    <td>
                    <form method='post'>
                        <input type='hidden' name='from' value='telaProdutos'>
                        <button type='submit' name='visualizar' value='{$id}'>
                            <img src='../assets/img/imgVisualizar.png' alt='Visualizar' style='width:1.2em; height:1.2em'>
                        </button> 
                        <button type='submit' name='aprovar' value='{$id}'> 
                            <img src='../assets/img/imgAprovar.png' alt='Aprovar' style='width:1.2em; height:1.2em'>
                        </button> <button type='submit' name='deletar' value='{$id}'> 
                            <img src='../assets/img/imgDeletar.png' alt='Deletar' style='width:1.2em; height:1.2em'>
                        </button>
                    </form> 
                    </td>
                    </tr>";
            }
        }


    }

    public function exibirCategorias(){
        $categoriaController = new CategoriaController();
        $arrayDeCategorias = $categoriaController->exibirNomeCategorias();
        return $arrayDeCategorias;
    }

    public function listarProdutos($numeroProduto, $dataInicial, $dataFinal, $valorInicial, $valorFinal){

        $arrayDeLinhas = $this->produtoDao->filtrarProdutos($numeroProduto, $dataInicial,$dataFinal,$valorInicial, $valorFinal);


        foreach ($arrayDeLinhas as $linhaAtual){
            echo "<tr>
                    <td>{$linhaAtual["numero"]} </td>
                        <td>{$linhaAtual["valorTotal"]} </td>
                        <td>{$linhaAtual["dataProduto"]} </td>
                        <td><form method='post'><button type='submit' name='visualizar' value='{$linhaAtual["numero"]}'> <img src='../assets/img/imgVisualizar.png' alt='Visualizar' style='width:1.2em; height:1.2em'></button> <button type='submit' name='editar' value='{$linhaAtual["numero"]}'> <img src='../assets/img/imgEditar.png' alt='Editar' style='width:1.2em; height:1.2em'></button> <button type='submit' name='aprovar' value='{$linhaAtual["numero"]}'> <img src='../assets/img/imgAprovar.png' alt='Aprovar' style='width:1.2em; height:1.2em'></button> <button type='submit' name='deletar' value='{$linhaAtual["numero"]}'> <img src='../assets/img/imgDeletar.png' alt='Deletar' style='width:1.2em; height:1.2em'></button></form> </td>
                    </tr>";
        }
    }


}