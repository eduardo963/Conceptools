<?php
include_once '../Data.php';
include_once '../banco/Repositorio.php';
include_once '../model/Usuario.php';


/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 2017-09-27
 * Time: 11:28 PM
 */
class UsuarioDao
{
    private $banco;

    /**
     * UsuarioDao constructor.
     */
    public function __construct()
    {
        $this->banco = new repositorio();
    }

    public function inserirUsuario(Usuario $usuario){
        $login = $usuario->getLogin();
        $senha = $usuario->getSenha();
        $nome  = $usuario->getNome();
        $email = $usuario->getEmail();


        $querry = "insert into usuarios (login, senha, email, nome) values ('".$login."', '".$senha."', '".$email."', '".$nome."')";

        $resultado = $this->banco->insert($querry);

        return $resultado;
    }

    public function listarTodosOsUsuarios(){
        $resultado = $this->banco->select("SELECT * FROM usuarios");
        return $resultado;
    }





}