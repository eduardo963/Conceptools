<?php

/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 2017-10-22
 * Time: 10:36 PM
 */
class PessoaFisica extends Pessoa
{
    private $cpf;
    private $rg;
    private $genero;

    /**
     * PessoaFisica constructor.
     * @param $cpf
     */
    public function __construct($id, $nome, $telefone, $email, $cpf)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->cpf = $cpf;
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

}