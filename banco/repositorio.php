<?php
include "InterfaceRepositorio.php";
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 19/09/2017
 * Time: 14:12
 */


class repositorio implements InterfaceRepositorio{

    private $host;
    private $usuario;
    private $senha;
    private $banco;
    private $conexao;

    function __construct()
    {
        // ### DADOS DO BANCO ###
        $this->host = "localhost";
        $this->usuario = "root";
        $this->senha = "";
        $this->banco = "loja_teste1";

    }


    private function executarSql($querry)
    {
        $this->conexao = mysqli_connect($this->host, $this->usuario, $this->senha, $this->banco);

        if (mysqli_query($this->conexao, $querry)) {
            mysqli_close($this->conexao);
            return true;
        } else {
            mysqli_close($this->conexao);
            return false;
        }
    }

    public function create($querry){
        return $this->executarSql($querry);
    }

    public function update($querry){
        return $this->executarSql($querry);
    }

    public function insert($querry){
        $this->conexao = new mysqli;
        $this->conexao->connect($this->host, $this->usuario, $this->senha, $this->banco);

        if ($this->conexao->query($querry)) {

            $id = $this->conexao->insert_id;


            $this->conexao->close();

            return $id;
        } else {
            $this->conexao->close();

            return false;
        }
    }

    public function delete($querry){
        return $this->executarSql($querry);
    }

    public function select($querry){
        $conexao = new mysqli($this->getHost(), $this->getUsuario(), $this->getSenha(), $this->getBanco());

        if ($conexao->connect_error) {
            echo "Erro na conexão: " . $conexao->connect_error;
            $conexao->close();
            return false;
        }

        $resultado = $conexao->query($querry);
        if(!$resultado){
            $conexao->close();
            return false;
        }

        try {
            if ($resultado->num_rows > 0) {
                // output data of each row
                while ($row = $resultado->fetch_assoc()) {
                    $linhas[] = $row;

                }
                $conexao->close();
                return $linhas;
            } else {
                echo "Nenhum resultado encontrado!";
                $conexao->close();
                return false;
            }
        } catch (Exception $exception){

        }


    }



    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param string $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param string $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return string
     */
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * @param string $banco
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;
    }

    /**
     * @return mixed
     */
    public function getConexao()
    {
        return $this->conexao;
    }

    /**
     * @param mixed $conexao
     */
    public function setConexao($conexao)
    {
        $this->conexao = $conexao;
    }




}