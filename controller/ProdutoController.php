<?php
include_once '../Data.php';
include_once '../model/Produto.php';
include_once '../dao/ProdutosDao.php';
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


        if($this->produtoDao->inserirProduto($produto)){
            return true;
        } else{
            return false;
        }

    }

    public function deletarProduto($numeroProduto){
        return $this->produtoDao->deletarProduto($numeroProduto);
    }



    public function isProdutoCadastrado($id){
        $hoje = date('Y-m-d');
    }

    public function exibirProdutosCadastrados(){
        $arrayDeLinhas = $this->produtoDao->listarProdutosDoDiaAtual();
        if($arrayDeLinhas) {
            foreach ($arrayDeLinhas as $linhaAtual) {
                echo "<tr>
                    <td>{$linhaAtual["numero"]} </td>
                        <td>{$linhaAtual["valorTotal"]} </td>
                        <td>{$linhaAtual["dataProduto"]} </td>
                        <td><form method='post'><button type='submit' name='visualizar' value='{$linhaAtual["numero"]}'> <img src='../assets/img/imgVisualizar.png' alt='Visualizar' style='width:1.2em; height:1.2em'></button> <button type='submit' name='editar' value='{$linhaAtual["numero"]}'> <img src='../assets/img/imgEditar.png' alt='Editar' style='width:1.2em; height:1.2em'></button> <button type='submit' name='aprovar' value='{$linhaAtual["numero"]}'> <img src='../assets/img/imgAprovar.png' alt='Aprovar' style='width:1.2em; height:1.2em'></button> <button type='submit' name='deletar' value='{$linhaAtual["numero"]}'> <img src='../assets/img/imgDeletar.png' alt='Deletar' style='width:1.2em; height:1.2em'></button></form> </td>
                    </tr>";
            }
        }


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