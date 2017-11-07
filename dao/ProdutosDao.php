<?php
include_once '../Data.php';
include_once '../banco/repositorio.php';
include_once '../model/Produto.php';

class ProdutosDao {

    private $banco;


	function __construct() {
        $this->banco = new repositorio();

	}
	public function inserirProduto(Produto $produto){
        $codigoProduto = $produto->getCodProduto();
        $nomeProduto = $produto->getNomeProduto();
        $valorProduto = $produto->getValor();
        $categoriaProduto = $produto->getidCategoriaProduto();
        $corProduto = $produto->getCor();
        $pesoProduto = $produto->getPesoBruto();
        $materialProduto = $produto->getMaterial();
        $dimensoesProduto = $produto->getDimensoes();
        $descricaoProduto = $produto->getDescricao();
        $aVenda = "s";

        $querry = "insert into produtos 
(codProduto, valor, aVenda, idCategoriaProduto, nomeProduto, cor, pesoBruto, dimensoes, material, descricao)
values ('".$codigoProduto."', '".$valorProduto."', '".$aVenda."', '".$categoriaProduto."', '".$nomeProduto."', '".$corProduto."',
        '".$pesoProduto."', '".$dimensoesProduto."', '".$materialProduto."', '".$descricaoProduto."')";

        $resultado = $this->banco->insert($querry);

        return $resultado;
		
	}

	public function deletarProduto($idProduto){
	    return $resultado = $this->banco->delete("DELETE FROM produtos WHERE idProduto = ".$idProduto);
    }

	public function listarTodosOsProdutos(){
        $resultado = $this->banco->select("SELECT * FROM produtos");
        return $resultado;
    }

    public function listarProdutosDoDiaAtual(){
        date_default_timezone_set("America/Sao_Paulo");
        $hoje = date('Y-m-d');
        $resultado = $this->banco->select("select * from produtos where dataProduto = '".$hoje."'");
        return $resultado;
    }

	public function pegarProduto($id){
        $resultado = $this->banco->select("SELECT * FROM Produto WHERE numero = ".$id);
        return $resultado;
    }


}