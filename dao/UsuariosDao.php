<?php
include_once '../Data.php';
include_once '../banco/repositorio.php';
include_once '../model/Usuario.php';


class UsuariosDao {

    private $banco;


    function __construct() {
        $this->banco = new repositorio();

    }
    public function inserirUsuario(Usuario $usuario){
        $login = $usuario->getLogin();
        $senha = $usuario->getSenha();
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $emailRecuperacao = $usuario->getEmailRecuperacao();
        $celular = $usuario->getCelular();
        $perguntaRecuperacao = $usuario->getPerguntaRecuperacao();
        $respostaRecuperacao = $usuario->getRespostaRecuperacao();
        $ativo = "s";


        $querry = "INSERT INTO `usuarios`(`login`, `senha`, `nome`, `email`, `emailRecuperacao`,
        `celular`, `perguntaRecuperacao`, `respostaRecuperacao`, `ativo`)
        VALUES ('".$login."', '".$senha."', '".$nome."', '".$email."', '".$emailRecuperacao."', '".$celular."', 
        '".$perguntaRecuperacao."', '".$respostaRecuperacao."', '".$ativo."')";

        $resultado = $this->banco->insert($querry);

        return $resultado;

    }

    public function updateUsuario(Usuario $usuario, $id){
        $login = $usuario->getLogin();
        $senha = $usuario->getSenha();
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $emailRecuperacao = $usuario->getEmailRecuperacao();
        $celular = $usuario->getCelular();
        $perguntaRecuperacao = $usuario->getPerguntaRecuperacao();
        $respostaRecuperacao = $usuario->getRespostaRecuperacao();


        $querry = "UPDATE `usuarios` SET `login`='".$login."',`senha`='".$senha."',`nome`='".$nome."',
`email`='".$email."',`emailRecuperacao`='".$emailRecuperacao."',`celular`='".$celular."',`perguntaRecuperacao`='".$perguntaRecuperacao."',
`respostaRecuperacao`='".$respostaRecuperacao."' WHERE id = '".$id."';";

        $resultado = $this->banco->update($querry);
        return $resultado;

    }

    public function deletarUsuario($id){
        return $resultado = $this->banco->delete("DELETE FROM usuarios WHERE id = ".$id);
    }

    public function listarTodosOsUsuarios(){
        $resultado = $this->banco->select("SELECT * FROM usuarios");
        return $resultado;
    }

    public function alterarUsuario($id, $valor){
        $resultado = $this->banco->update("UPDATE `usuarios` SET `ativo` = '".$valor."' WHERE `id` = '".$id."'");
        return $resultado;
    }

    public function pegarUsuario($id){
        $resultado = $this->banco->select("SELECT * FROM usuarios WHERE id = ".$id);
        return $resultado;
    }

    public function buscarUsuario($login){
        $resultado = $this->banco->select("SELECT * FROM usuarios WHERE login = '".$login."'");

        if($resultado){
            foreach ($resultado as $linha){
                $id = $linha["id"];
            }
        } else {
            $id = false;
        }

        return $id;
    }

    public function testarUsuario($login, $senha){
        $resultado = $this->banco->select("SELECT * FROM usuarios WHERE login = '".$login."' AND senha = '".$senha."'");
        if($resultado){
            return true;
        } else {
            return false;
        }
    }


}
