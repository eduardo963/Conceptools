<?php
include_once '../Data.php';
include_once '../model/PessoaFisica.php';
include_once '../model/PessoaJuridica.php';
include_once '../dao/ClientesDao.php';
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 05/11/2017
 * Time: 15:10
 */
class ClienteController
{
    private $clienteDao;

    function __construct()
    {
        $this->clienteDao = new ClientesDao();
    }

    public function criarNovaPessoaFisica( $nome, $telefone, $celular, $email, $endereco, $cep, $cidade, $estado, $pais,
                                           $cpf, $rg, $genero){

        $cliente = new PessoaFisica(0, $nome, $telefone, $email, $cpf);
        $cliente->setCelular($celular);
        $cliente->setEndereco($endereco);
        $cliente->setCep($cep);
        $cliente->setCidade($cidade);
        $cliente->setEstado($estado);
        $cliente->setPais($pais);
        $cliente->setAtivo("s");
        $cliente->setTipo("pessoaFisica");

        $cliente->setCpf($cpf);
        $cliente->setRg($rg);
        $cliente->setGenero($genero);

        $id = $this->clienteDao->inserirCliente($cliente);

        return $id;

    }

    public function updateNovaPessoaFisica($id, $nome, $telefone, $celular, $email, $endereco, $cep, $cidade, $estado, $pais,
                                           $cpf, $rg, $genero){

        $cliente = new PessoaFisica(0, $nome, $telefone, $email, $cpf);
        $cliente->setCelular($celular);
        $cliente->setEndereco($endereco);
        $cliente->setCep($cep);
        $cliente->setCidade($cidade);
        $cliente->setEstado($estado);
        $cliente->setPais($pais);
        $cliente->setTipo("pessoaFisica");

        $cliente->setCpf($cpf);
        $cliente->setRg($rg);
        $cliente->setGenero($genero);

        $id = $this->clienteDao->updateCliente($id, $cliente);

        return $id;

    }

    public function criarNovaPessoaJuridica( $nome, $telefone, $celular, $email, $endereco, $cep, $cidade, $estado, $pais,
                                           $cnpj, $inscricaoEstadual, $nomeFantasia){

        $cliente = new PessoaJuridica(0, $nome, $telefone, $email, $cnpj);
        $cliente->setCelular($celular);
        $cliente->setEndereco($endereco);
        $cliente->setCep($cep);
        $cliente->setCidade($cidade);
        $cliente->setEstado($estado);
        $cliente->setPais($pais);
        $cliente->setAtivo("s");
        $cliente->setTipo("pessoaJuridica");

        $cliente->setCnpj($cnpj);
        $cliente->setInscricaoEstadual($inscricaoEstadual);
        $cliente->setNomeFantasia($nomeFantasia);

        $id = $this->clienteDao->inserirCliente($cliente);

        return $id;

    }

    public function updateNovaPessoaJuridica($id, $nome, $telefone, $celular, $email, $endereco, $cep, $cidade, $estado, $pais,
                                             $cnpj, $inscricaoEstadual, $nomeFantasia){

        $cliente = new PessoaJuridica(0, $nome, $telefone, $email, $cnpj);
        $cliente->setCelular($celular);
        $cliente->setEndereco($endereco);
        $cliente->setCep($cep);
        $cliente->setCidade($cidade);
        $cliente->setEstado($estado);
        $cliente->setPais($pais);
        $cliente->setAtivo("s");
        $cliente->setTipo("pessoaJuridica");

        $cliente->setCnpj($cnpj);
        $cliente->setInscricaoEstadual($inscricaoEstadual);
        $cliente->setNomeFantasia($nomeFantasia);

        $id = $this->clienteDao->updateCliente($cliente, $id);

        return $id;

    }

    public function deletarCliente($id){
        return $this->clienteDao->deletarCliente($id);
    }

    public function getCliente($id){
        $resultado = $this->clienteDao->pegarCliente($id);
        foreach ($resultado as $linha){
            return $linha;
        }
    }

    public function ativarCliente($id){
        $resultado = $this->clienteDao->alterarCliente($id, "s");
        return $resultado;
    }

    public function desativarCliente($id){
        $resultado = $this->clienteDao->alterarCliente($id, "n");
        return $resultado;
    }

    public function isClienteAtivo($id)
    {
        $arrayDeLinhas = $this->clienteDao->pegarCliente($id);
        foreach ($arrayDeLinhas as $linha) {
            $aVenda = $linha["ativo"];
            if ($aVenda == "s") {
                return true;
            }
            if ($aVenda == "n") {
                return false;
            } else {
                echo "Erro ao consultar o cliente";
            }


        }
    }

    public function exibirClientesCadastrados(){
        $arrayDeLinhas = $this->clienteDao->listarTodosOsClientes();
        if($arrayDeLinhas) {
            foreach ($arrayDeLinhas as $linhaAtual) {
                $id = $linhaAtual["id"];

                if($linhaAtual["tipoCliente"] == "pessoaFisica"){
                    $tipo = "Pessoa Física";
                    $identidade = $linhaAtual["cpf"];
                    $tipoCliente = "PessoaFisica";
                } else {
                    $tipo = "Pessoa Jurídica";
                    $identidade = $linhaAtual["cnpj"];
                    $tipoCliente = "PessoaJuridica";
                }

                echo "<tr>
                    <td>{$linhaAtual["id"]} </td>
                    <td>{$linhaAtual["nome"]} </td>
                    <td>{$tipo} </td>
                    <td>{$identidade} </td>
                    <td>
                    <form method='post'>
                        <input type='hidden' name='from' value='telaClientes'>
                        <input type='hidden' name='tipo' value='".$tipoCliente."'>
                        <button type='submit' name='visualizar' value='{$id}'>
                            <img src='../assets/img/imgVisualizar.png' alt='Visualizar' style='width:1.2em; height:1.2em'>
                        </button> 
                        <button type='submit' name='aprovar' value='{$id}'> 
                            <img src='../assets/img/imgAprovar.png' alt='Aprovar' style='width:1.2em; height:1.2em'>
                        </button> <button type='submit' name='deletar' value='{$id}'> 
                            <img src='../assets/img/imgDeletar.png' alt='Deletar' style='width:1.2em; height:1.2em'>
                        </button>
                    </form> 
                    </td>
                    </tr>";
            }
        }


    }

    public function listarClientes($numeroCliente, $dataInicial, $dataFinal, $valorInicial, $valorFinal){

        $arrayDeLinhas = $this->clienteDao->filtrarClientes($numeroCliente, $dataInicial,$dataFinal,$valorInicial, $valorFinal);


        foreach ($arrayDeLinhas as $linhaAtual){
            echo "<tr>
                    <td>{$linhaAtual["numero"]} </td>
                        <td>{$linhaAtual["valorTotal"]} </td>
                        <td>{$linhaAtual["dataCliente"]} </td>
                        <td><form method='post'><button type='submit' name='visualizar' value='{$linhaAtual["numero"]}'> <img src='../assets/img/imgVisualizar.png' alt='Visualizar' style='width:1.2em; height:1.2em'></button> <button type='submit' name='editar' value='{$linhaAtual["numero"]}'> <img src='../assets/img/imgEditar.png' alt='Editar' style='width:1.2em; height:1.2em'></button> <button type='submit' name='aprovar' value='{$linhaAtual["numero"]}'> <img src='../assets/img/imgAprovar.png' alt='Aprovar' style='width:1.2em; height:1.2em'></button> <button type='submit' name='deletar' value='{$linhaAtual["numero"]}'> <img src='../assets/img/imgDeletar.png' alt='Deletar' style='width:1.2em; height:1.2em'></button></form> </td>
                    </tr>";
        }
    }
}