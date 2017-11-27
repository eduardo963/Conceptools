<?php
include_once "FilialInteface.php";
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 2017-10-23
 * Time: 10:45 PM
 */
class Filial implements FilialInteface
{
    private $id;
    private $cep;
    private $logradouro;
    private $bairro;
    private $numero;
    private $cidade;
    private $uf;
    private $pais;
    private $dataDeInauguracao;
    private $ativo;

    /**
     * Filial constructor.
     * @param $id
     * @param $cep
     * @param $logradouro
     */
    public function __construct($id, $cep, $logradouro)
    {
        $this->id = $id;
        $this->cep = $cep;
        $this->logradouro = $logradouro;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    /**
     * @return mixed
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * @param mixed $logradouro
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     * @return mixed
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param mixed $uf
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    /**
     * @return mixed
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * @param mixed $pais
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
    }

    /**
     * @return mixed
     */
    public function getDataDeInauguracao()
    {
        return $this->dataDeInauguracao;
    }

    /**
     * @param mixed $dataDeInauguracao
     */
    public function setDataDeInauguracao($dataDeInauguracao)
    {
        $this->dataDeInauguracao = $dataDeInauguracao;
    }

    /**
     * @return mixed
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * @param mixed $ativo
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }

}