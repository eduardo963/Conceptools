<?php

/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 23/11/2017
 * Time: 16:11
 */
class Categoria
{
    private $id;
    private $nome;
    private $descricao;
    private $dataCriacao;
    private $dataModificacao;
    private $observacao;
    private $detalhes;
    private $paticularidade;
    private $importancia;
    private $ativo;

    /**
     * Categoria constructor.
     * @param $nome
     * @param $descricao
     */
    public function __construct($nome, $descricao)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }

    /**
     * @param mixed $dataCriacao
     */
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;
    }

    /**
     * @return mixed
     */
    public function getDataModificacao()
    {
        return $this->dataModificacao;
    }

    /**
     * @param mixed $dataModificacao
     */
    public function setDataModificacao($dataModificacao)
    {
        $this->dataModificacao = $dataModificacao;
    }

    /**
     * @return mixed
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * @param mixed $observacao
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
    }

    /**
     * @return mixed
     */
    public function getDetalhes()
    {
        return $this->detalhes;
    }

    /**
     * @param mixed $detalhes
     */
    public function setDetalhes($detalhes)
    {
        $this->detalhes = $detalhes;
    }

    /**
     * @return mixed
     */
    public function getPaticularidade()
    {
        return $this->paticularidade;
    }

    /**
     * @param mixed $paticularidade
     */
    public function setPaticularidade($paticularidade)
    {
        $this->paticularidade = $paticularidade;
    }

    /**
     * @return mixed
     */
    public function getImportancia()
    {
        return $this->importancia;
    }

    /**
     * @param mixed $importancia
     */
    public function setImportancia($importancia)
    {
        $this->importancia = $importancia;
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