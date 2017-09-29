<?php

/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 2017-09-27
 * Time: 11:13 PM
 */
class Usuario
{
    private $id;        //Inteiro - Id do usuário no banco de dados
    private $login;     //String  - Login do usuário
    private $senha;     //String  - Senha do usuário
    private $nome;      //String  - Nome do usuário
    private $email;     //String  - E-mail do usuário

    /**
     * Usuario constructor.
     * @param $id
     * @param $login
     * @param $senha
     * @param $nome
     * @param $email
     */
    public function __construct($id, $login, $senha, $nome, $email)
    {
        $this->id = $id;
        $this->login = $login;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->email = $email;
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
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }






}