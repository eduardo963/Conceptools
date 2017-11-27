<?php
include_once '../Data.php';
include_once '../banco/repositorio.php';
include_once '../model/Categoria.php';

class CategoriasDao {

    private $banco;

	function __construct() {
        $this->banco = new repositorio();

	}

	public function inserirCategoria(Categoria $categoria){
        $nome = $categoria->getNome();
        $descricao = $categoria->getDescricao();
        $observacao = $categoria->getObservacao();
        $detalhes = $categoria->getDetalhes();
        $paticularidade = $categoria->getPaticularidade();
        $importancia = $categoria->getImportancia();
        $ativo = $categoria->getAtivo();

        $querry = "INSERT INTO `categorias`(`nome`, `descricao`, `dataCriacao`, `dataModificacao`, `observacao`, 
`detalhes`, `particularidade`, `importancia`, `ativo`) VALUES ('".$nome."', '".$descricao."', NOW(), 
'', '".$observacao."', '".$detalhes."',
        '".$paticularidade."', '".$importancia."', '".$ativo."')";

        $resultado = $this->banco->insert($querry);
        return $resultado;
	}

    public function updateCategoria(Categoria $categoria, $id){
        $nome = $categoria->getNome();
        $descricao = $categoria->getDescricao();
        $observacao = $categoria->getObservacao();
        $detalhes = $categoria->getDetalhes();
        $paticularidade = $categoria->getPaticularidade();
        $importancia = $categoria->getImportancia();

        $querry = "UPDATE `categorias` SET `nome`='".$nome."',`descricao`='".$descricao."',`dataModificacao`= NOW(),
`observacao`='".$observacao."',`detalhes`='".$detalhes."',`particularidade`='".$paticularidade."',
`importancia`='".$importancia."' WHERE id = '".$id."';";

        $resultado = $this->banco->update($querry);

        return $resultado;
    }

	public function deletarCategoria($idCategoria){
	    return $resultado = $this->banco->delete("DELETE FROM categorias WHERE id = ".$idCategoria);
    }

	public function listarTodosOsCategorias(){
        $resultado = $this->banco->select("SELECT * FROM categorias");
        return $resultado;
    }

    public function alterarCategoria($id, $valor){
        $resultado = $this->banco->update("UPDATE `categorias` SET `ativo` = '".$valor."' WHERE `id` = '".$id."'");
        return $resultado;
    }

	public function pegarCategoria($id){
        $resultado = $this->banco->select("SELECT * FROM categorias WHERE id = ".$id);
        foreach ($resultado as $linha){
            return $linha;
        }
    }


}
