<?php
/**
 * Created by PhpStorm.
 * User: Trinity
 * Date: 23/11/2017
 * Time: 15:22
 */

/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 2017-10-23
 * Time: 10:45 PM
 */
interface FilialInteface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param mixed $id
     */
    public function setId($id);

    /**
     * @return mixed
     */
    public function getCep();

    /**
     * @param mixed $cep
     */
    public function setCep($cep);

    /**
     * @return mixed
     */
    public function getLogradouro();

    /**
     * @param mixed $logradouro
     */
    public function setLogradouro($logradouro);

    /**
     * @return mixed
     */
    public function getBairro();

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro);

    /**
     * @return mixed
     */
    public function getNumero();

    /**
     * @param mixed $numero
     */
    public function setNumero($numero);

    /**
     * @return mixed
     */
    public function getCidade();

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade);

    /**
     * @return mixed
     */
    public function getUf();

    /**
     * @param mixed $uf
     */
    public function setUf($uf);

    /**
     * @return mixed
     */
    public function getPais();

    /**
     * @param mixed $pais
     */
    public function setPais($pais);

    /**
     * @return mixed
     */
    public function getDataDeInauguracao();

    /**
     * @param mixed $dataDeInauguracao
     */
    public function setDataDeInauguracao($dataDeInauguracao);

    /**
     * @return mixed
     */
    public function getAtivo();

    /**
     * @param mixed $ativo
     */
    public function setAtivo($ativo);
}