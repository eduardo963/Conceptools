<?php
include_once '../Data.php';
include_once '../model/Categoria.php';
include_once '../dao/CategoriasDao.php';
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 05/11/2017
 * Time: 15:10
 */
class CategoriaController
{
    private $categoriaDao;

    function __construct()
    {
        $this->categoriaDao = new CategoriasDao();
    }

    public function criarNovoCategoria($nome, $descricao, $observacao, $detalhes, $paticularidade, $importancia){

        $categoria = new Categoria($nome, $descricao);
        $categoria->setObservacao($observacao);
        $categoria->setDetalhes($detalhes);
        $categoria->setPaticularidade($paticularidade);
        $categoria->setImportancia($importancia);
        $categoria->setAtivo("s");

        $id = $this->categoriaDao->inserirCategoria($categoria);
        return $id;

    }

    public function updateCategoria($id, $nome, $descricao, $observacao, $detalhes, $paticularidade, $importancia){

        $categoria = new Categoria($nome, $descricao);
        $categoria->setObservacao($observacao);
        $categoria->setDetalhes($detalhes);
        $categoria->setPaticularidade($paticularidade);
        $categoria->setImportancia($importancia);

        $resultado = $this->categoriaDao->updateCategoria($categoria, $id);
        return $resultado;

    }

    public function deletarCategoria($id){
        return $this->categoriaDao->deletarCategoria($id);
    }

    public function pegarCategoria($id){
        $resultado = $this->categoriaDao->pegarCategoria($id);

        return $resultado;
    }

    public function getCategoria($id){
        $resultado = $this->categoriaDao->pegarCategoria($id);
        return $resultado;
    }

    public function ativarCategoria($id){
        $resultado = $this->categoriaDao->alterarCategoria($id, "s");
        return $resultado;
    }

    public function desativarCategoria($id){
        $resultado = $this->categoriaDao->alterarCategoria($id, "n");
        return $resultado;
    }

    public function isCategoriaAtivo($id)
    {
        $arrayDeLinhas = $this->categoriaDao->pegarCategoria($id);
            $aVenda = $arrayDeLinhas["ativo"];
            if ($aVenda == "s") {
                return true;
            }
            if ($aVenda == "n") {
                return false;
            } else {
                echo "Erro ao consultar o categoria";
            }

    }

    public function exibirCategoriasCadastrados(){
        $arrayDeLinhas = $this->categoriaDao->listarTodosOsCategorias();
        $arrayDeCategorias = array();

        if($arrayDeLinhas) {
            foreach ($arrayDeLinhas as $linhaAtual) {

                $categoria = new Categoria($linhaAtual["nome"], $linhaAtual["descricao"]);
                $categoria->setImportancia($linhaAtual["importancia"]);
                $categoria->setId($linhaAtual["id"]);

                array_push($arrayDeCategorias, $categoria);
            }
        }
        return $arrayDeCategorias;

    }

    public function exibirNomeCategorias(){
        $arrayDeLinhas = $this->categoriaDao->listarTodosOsCategorias();
        $arrayDeCategorias = array();
        if($arrayDeLinhas) {
            foreach ($arrayDeLinhas as $linhaAtual) {

                $categoria = new Categoria($linhaAtual["nome"], $linhaAtual["descricao"]);
                $categoria->setId($linhaAtual["id"]);

                array_push($arrayDeCategorias, $categoria);
            }
        }
        return $arrayDeCategorias;

    }


}