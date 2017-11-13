<?php
include_once 'Pessoa.php';
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 2017-10-24
 * Time: 10:39 PM
 */
final class Vendedor extends Pessoa
{
    private $cpf;
    private $rg;
    private $genero;
    private $dataDeNascimento;
    private $dataDeAdmissao;

    /**
     * Vendedor constructor.
     * @param $cpf
     * @param $dataDeAdimissao
     */
    public function __construct($id, $nome, $telefone, $email, $cpf, $dataDeAdmissao)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->dataDeAdmissao = $dataDeAdmissao;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * @param mixed $rg
     */
    public function setRg($rg)
    {
        $this->rg = $rg;
    }

    /**
     * @return mixed
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * @param mixed $genero
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    /**
     * @return mixed
     */
    public function getDataDeNascimento()
    {
        return $this->dataDeNascimento;
    }

    /**
     * @param mixed $dataDeNascimento
     */
    public function setDataDeNascimento($dataDeNascimento)
    {
        $this->dataDeNascimento = $dataDeNascimento;
    }

    /**
     * @return mixed
     */
    public function getDataDeAdimissao()
    {
        return $this->dataDeAdmissao;
    }

    /**
     * @param mixed $dataDeAdimissao
     */
    public function setDataDeAdimissao($dataDeAdmissao)
    {
        $this->dataDeAdmissao = $dataDeAdmissao;
    }

}