<?php
include_once '../Data.php';
include_once '../model/Usuario.php';
include_once '../dao/UsuariosDao.php';
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 28/09/2017
 * Time: 12:51
 */
class UsuarioController
{
    private $usuarioDao;

    function __construct()
    {
        $this->usuarioDao = new UsuariosDao();
    }

    public function criarNovoUsuario($login, $senha, $nome, $email, $emailRecuperacao, $celular, $perguntaRecuperacao,
                                     $respostaRecuperacao){

        //A senha do usuário não é salva, o que fica salvo é o hash!

        $hash = $this->encriptarSenha($senha);

        $usuario = new Usuario(0, $login, $hash, $nome, $email);
        $usuario->setEmailRecuperacao($emailRecuperacao);
        $usuario->setCelular($celular);
        $usuario->setPerguntaRecuperacao($perguntaRecuperacao);
        $usuario->setRespostaRecuperacao($respostaRecuperacao);


        $id = $this->usuarioDao->inserirUsuario($usuario);

        return $id;

    }

    public function updateNovoUsuario($id, $login, $senha, $nome, $email, $emailRecuperacao, $celular, $perguntaRecuperacao,
                                     $respostaRecuperacao){

        //A senha do usuário não é salva, o que fica salvo é o hash!
        $hash = $this->encriptarSenha($senha);

        $usuario = new Usuario(0, $login, $hash, $nome, $email);
        $usuario->setEmailRecuperacao($emailRecuperacao);
        $usuario->setCelular($celular);
        $usuario->setPerguntaRecuperacao($perguntaRecuperacao);
        $usuario->setRespostaRecuperacao($respostaRecuperacao);


        $resultado = $this->usuarioDao->updateUsuario($usuario, $id);

        return $resultado;

    }

    public function deletarUsuario($id){
        return $this->usuarioDao->deletarUsuario($id);
    }

    public function getUsuario($id){
        $resultado = $this->usuarioDao->pegarUsuario($id);
        foreach ($resultado as $linha){
            return $linha;
        }
    }

    public function ativarUsuario($id){
        $resultado = $this->usuarioDao->alterarUsuario($id, "s");
        return $resultado;
    }

    public function desativarUsuario($id){
        $resultado = $this->usuarioDao->alterarUsuario($id, "n");
        return $resultado;
    }

    public function isUsuarioAtivo($id)
    {
        $arrayDeLinhas = $this->usuarioDao->pegarUsuario($id);
        foreach ($arrayDeLinhas as $linha) {
            $aVenda = $linha["ativo"];
            if ($aVenda == "s") {
                return true;
            }
            if ($aVenda == "n") {
                return false;
            } else {
                echo "Erro ao consultar o usuario";
            }


        }
    }

    public function exibirUsuariosCadastrados(){
        $arrayDeLinhas = $this->usuarioDao->listarTodosOsUsuarios();
        $arrayDeUsuarios = array();
        if($arrayDeLinhas){
            foreach ($arrayDeLinhas as $linhaAtual){
                $usuario = new Usuario($linhaAtual["id"], $linhaAtual["login"],$linhaAtual["senha"],
                    $linhaAtual["nome"], $linhaAtual["email"]);
                array_push($arrayDeUsuarios, $usuario);
            }
        }
        return $arrayDeUsuarios;
    }

    private function encriptarSenha($input) {
        $input=iconv('UTF-8','UTF-16LE',$input);
        $MD5Hash=hash('md5',$input);
        $HashCaixaAlta=strtoupper($MD5Hash);
        
        return $HashCaixaAlta;
    }

    public function logarUsuario($login, $senha){
        $senhaEncriptada = $this->encriptarSenha($senha);
        $resultado = $this->usuarioDao->testarUsuario($login, $senhaEncriptada);

        return $resultado;
    }

}