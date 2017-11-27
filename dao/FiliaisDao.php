<?php
include_once '../Data.php';
include_once '../banco/repositorio.php';
include_once '../model/Filial.php';

class FiliaisDao {

    private $banco;

	function __construct() {
        $this->banco = new repositorio();

	}

	public function inserirFilial(Filial $filial){
        $cep = $filial->getCep();
        $logradouro = $filial->getLogradouro();
        $bairro = $filial->getBairro();
        $numero = $filial->getNumero();
        $cidade = $filial->getCidade();
        $uf = $filial->getUf();
        $pais = $filial->getPais();
        $dataDeInauguracao = $filial->getDataDeInauguracao();
        $ativo = "s";

        $querry = "INSERT INTO `filiais`(`cep`, `logradouro`, `bairro`, `numero`, `cidade`,
        `uf`, `pais`, `dataDeInauguracao`, `ativo`) 
        VALUES ('".$cep."', '".$logradouro."', '".$bairro."', '".$numero."', '".$cidade."', '".$uf."',
        '".$pais."', '".$dataDeInauguracao."', '".$ativo."')";

        $resultado = $this->banco->insert($querry);

        return $resultado;

	}

    public function updateFilial(Filial $filial, $id){
        $cep = $filial->getCep();
        $logradouro = $filial->getLogradouro();
        $bairro = $filial->getBairro();
        $numero = $filial->getNumero();
        $cidade = $filial->getCidade();
        $uf = $filial->getUf();
        $pais = $filial->getPais();
        $dataDeInauguracao = $filial->getDataDeInauguracao();

        $querry = "UPDATE `filiais` SET `cep`='".$cep."',`logradouro`='".$logradouro."',`bairro`='".$bairro."',
`numero`='".$numero."',`cidade`='".$cidade."',`uf`='".$uf."',`pais`='".$pais."',`dataDeInauguracao`='".$dataDeInauguracao."' WHERE id = '".$id."';)";

        $resultado = $this->banco->update($querry);

        return $resultado;

    }

	public function deletarFilial($idFilial){
	    return $resultado = $this->banco->delete("DELETE FROM filiais WHERE id = ".$idFilial);
    }

	public function listarTodasAsFiliais(){
        $resultado = $this->banco->select("SELECT * FROM filiais");
        return $resultado;
    }

    public function alterarFilial($id, $valor){
        $resultado = $this->banco->update("UPDATE `filiais` SET `ativo` = '".$valor."' WHERE `id` = '".$id."'");
        return $resultado;
    }

	public function pegarFilial($id){
        $resultado = $this->banco->select("SELECT * FROM filiais WHERE id = ".$id);
        return $resultado;
    }


}
