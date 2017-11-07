<?php

/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 2017-10-22
 * Time: 10:31 PM
 */
final class PessoaJuridica extends Pessoa
{
    private $cnpj;
    private $inscricaoEstadual;
    private $nomeFantasia;

    /**
     * PessoaJuridica constructor.
     * @param $cnpj
     */
    public function __construct($id, $nome, $telefone, $email, $cnpj)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->cnpj = $cnpj;
    }

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    /**
     * @return mixed
     */
    public function getInscricaoEstadual()
    {
        return $this->inscricaoEstadual;
    }

    /**
     * @param mixed $inscricaoEstadual
     */
    public function setInscricaoEstadual($inscricaoEstadual)
    {
        $this->inscricaoEstadual = $inscricaoEstadual;
    }

    /**
     * @return mixed
     */
    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }

    /**
     * @param mixed $nomeFantasia
     */
    public function setNomeFantasia($nomeFantasia)
    {
        $this->nomeFantasia = $nomeFantasia;
    }

}