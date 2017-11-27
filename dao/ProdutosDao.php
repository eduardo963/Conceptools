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

    public function updateProduto(Produto $produto, $id){
        $codigoProduto = $produto->getCodProduto();
        $nomeProduto = $produto->getNomeProduto();
        $valorProduto = $produto->getValor();
        $categoriaProduto = $produto->getidCategoriaProduto();
        $corProduto = $produto->getCor();
        $pesoProduto = $produto->getPesoBruto();
        $materialProduto = $produto->getMaterial();
        $dimensoesProduto = $produto->getDimensoes();
        $descricaoProduto = $produto->getDescricao();

        $querry = "UPDATE `produtos` SET `codProduto`='".$codigoProduto."',`valor`='".$valorProduto."',
`idCategoriaProduto`='".$categoriaProduto."',`nomeProduto`='".$nomeProduto."',`cor`='".$corProduto."',`pesoBruto`='".$pesoProduto."',
`dimensoes`='".$dimensoesProduto."',`material`='".$materialProduto."',`descricao`='".$descricaoProduto."' WHERE idProduto = '".$id."';";

        $resultado = $this->banco->update($querry);

        return $resultado;
    }

	public function deletarProduto($idProduto){
	    return $resultado = $this->banco->delete("DELETE FROM produtos WHERE idProduto = ".$idProduto);
    }

	public function listarTodosOsProdutos(){
        $resultado = $this->banco->select("SELECT * FROM produtos");
        return $resultado;
    }

    public function alterarProduto($id, $valor){
        $resultado = $this->banco->update("UPDATE `produtos` SET `aVenda` = '".$valor."' WHERE `idProduto` = '".$id."'");
        return $resultado;
    }

	public function pegarProduto($id){
        $resultado = $this->banco->select("SELECT * FROM produtos WHERE idProduto = ".$id);
        foreach ($resultado as $linha){
            return $linha;
        }
    }

    public function buscarProduto($nome, $codigo){
        $resultado = $this->banco->select("SELECT * FROM produtos WHERE `nomeProduto` LIKE '%".$nome."%' 
        and `codProduto` LIKE '%".$codigo."%' LIMIT 10");
        return $resultado;
    }

}
