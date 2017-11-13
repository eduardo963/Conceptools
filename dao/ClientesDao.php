<?php
include_once '../Data.php';
include_once '../banco/repositorio.php';
include_once '../model/Pessoa.php';
include_once '../model/PessoaFisica.php';
include_once '../model/PessoaJuridica.php';

class ClientesDao {

    private $banco;


	function __construct() {
        $this->banco = new repositorio();

	}
	public function inserirCliente(Pessoa $cliente){
        $nome = $cliente->getNome();
        $telefone = $cliente->getTelefone();
        $celular = $cliente->getCelular();
        $email = $cliente->getEmail();
        $endereco = $cliente->getEndereco();
        $cep = $cliente->getCep();
        $cidade = $cliente->getCidade();
        $estado = $cliente->getEstado();
        $pais = $cliente->getPais();
        $ativo = $cliente->getAtivo();
        $tipo = $cliente->getTipo();

        if($tipo == "pessoaFisica"){

            $cpf = $cliente->getCpf();
            $rg = $cliente->getRg();
            $genero = $cliente->getGenero();

            $querry = "INSERT INTO `clientes`(`nome`, `telefone`, `celular`, `email`, `endereco`, `cep`, `cidade`,
        `estado`, `pais`, `ativo`, `tipoCliente`, `cpf`, `rg`, `genero`) 
        VALUES('".$nome."', '".$telefone."', '".$celular."', '".$email."', '".$endereco."', '".$cep."', '".$cidade."', 
        '".$estado."', '".$pais."', '".$ativo."', '".$tipo."', '".$cpf."', '".$rg."', '".$genero."')";
        }

        else{

            $cnpj = $cliente->getCnpj();
            $inscricaoEstadual = $cliente->getInscricaoEstadual();
            $nomeFantasia = $cliente->getNomeFantasia();

            $querry = "INSERT INTO `clientes`(`nome`, `telefone`, `celular`, `email`, `endereco`, `cep`, `cidade`,
        `estado`, `pais`, `ativo`, `tipoCliente`, `cnpj`, `inscricaoEstadual`, `nomeFantasia`) 
        VALUES('".$nome."', '".$telefone."', '".$celular."', '".$email."', '".$endereco."', '".$cep."', '".$cidade."', 
        '".$estado."', '".$pais."', '".$ativo."', '".$tipo."', '".$cnpj."', '".$inscricaoEstadual."', '".$nomeFantasia."')";
        }


        $resultado = $this->banco->insert($querry);

        return $resultado;
		
	}

	public function deletarCliente($id){
	    return $resultado = $this->banco->delete("DELETE FROM clientes WHERE id = ".$id);
    }

	public function listarTodosOsClientes(){
        $resultado = $this->banco->select("SELECT * FROM clientes");
        return $resultado;
    }

    public function alterarCliente($id, $valor){
        $resultado = $this->banco->update("UPDATE `clientes` SET `ativo` = '".$valor."' WHERE `id` = '".$id."'");
        return $resultado;
    }

	public function pegarCliente($id){
        $resultado = $this->banco->select("SELECT * FROM clientes WHERE id = ".$id);
        return $resultado;
    }


}
