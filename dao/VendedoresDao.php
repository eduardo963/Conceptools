<?php
include_once '../Data.php';
include_once '../banco/repositorio.php';
include_once '../model/Vendedor.php';


class VendedoresDao {

    private $banco;


	function __construct() {
        $this->banco = new repositorio();

	}
	public function inserirVendedor(Vendedor $vendedor){
        $nome = $vendedor->getNome();
        $telefone = $vendedor->getTelefone();
        $celular = $vendedor->getCelular();
        $email = $vendedor->getEmail();
        $endereco = $vendedor->getEndereco();
        $cep = $vendedor->getCep();
        $cidade = $vendedor->getCidade();
        $estado = $vendedor->getEstado();
        $pais = $vendedor->getPais();
        $ativo = $vendedor->getAtivo();
        $tipo = $vendedor->getTipo();

        $cpf = $vendedor->getCpf();
        $rg = $vendedor->getRg();
        $genero = $vendedor->getGenero();

        $dataAdmissao = $vendedor->getDataDeAdimissao();
        $dataNascimento = $vendedor->getDataDeNascimento();

        $querry = "INSERT INTO `vendedores`(`nome`, `telefone`, `celular`, `email`, `endereco`, 
        `cep`, `cidade`, `estado`, `pais`, `ativo`, `cpf`, `rg`, `genero`, `dataDeNascimento`, `dataDeAdmissao`) 
        VALUES ('".$nome."', '".$telefone."', '".$celular."', '".$email."', '".$endereco."', '".$cep."', '".$cidade."', 
        '".$estado."', '".$pais."', '".$ativo."', '".$cpf."', '".$rg."', '".$genero."', 
        '".$dataNascimento."', '".$dataAdmissao."')";

        $resultado = $this->banco->insert($querry);

        return $resultado;
		
	}

	public function deletarVendedor($id){
	    return $resultado = $this->banco->delete("DELETE FROM vendedores WHERE id = ".$id);
    }

	public function listarTodosOsVendedores(){
        $resultado = $this->banco->select("SELECT * FROM vendedores");
        return $resultado;
    }

    public function alterarVendedor($id, $valor){
        $resultado = $this->banco->update("UPDATE `vendedores` SET `ativo` = '".$valor."' WHERE `id` = '".$id."'");
        return $resultado;
    }

	public function pegarVendedor($id){
        $resultado = $this->banco->select("SELECT * FROM vendedores WHERE id = ".$id);
        return $resultado;
    }


}
