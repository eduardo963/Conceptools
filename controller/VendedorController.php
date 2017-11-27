<?php
include_once '../Data.php';
include_once '../model/Vendedor.php';
include_once '../dao/VendedoresDao.php';
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 05/11/2017
 * Time: 15:10
 */
class VendedorController
{
    private $vendedorDao;

    function __construct()
    {
        $this->vendedorDao = new VendedoresDao();
    }

    public function criarNovoVendedor( $nome, $telefone, $celular, $email, $endereco, $cep, $cidade, $estado, $pais,
                                           $cpf, $rg, $genero, $dataDeAdmissao, $dataNascimento){

        $vendedor = new Vendedor(0, $nome, $telefone, $email, $cpf, $dataDeAdmissao);
        $vendedor->setCelular($celular);
        $vendedor->setEndereco($endereco);
        $vendedor->setCep($cep);
        $vendedor->setCidade($cidade);
        $vendedor->setEstado($estado);
        $vendedor->setPais($pais);
        $vendedor->setAtivo("s");

        $vendedor->setCpf($cpf);
        $vendedor->setRg($rg);
        $vendedor->setGenero($genero);

        $vendedor->setDataDeAdimissao($dataDeAdmissao);
        $vendedor->setDataDeNascimento($dataNascimento);

        $id = $this->vendedorDao->inserirVendedor($vendedor);

        return $id;

    }


    public function updateNovoVendedor($id, $nome, $telefone, $celular, $email, $endereco, $cep, $cidade, $estado, $pais,
                                       $cpf, $rg, $genero, $dataDeAdmissao, $dataNascimento){

        $vendedor = new Vendedor(0, $nome, $telefone, $email, $cpf, $dataDeAdmissao);
        $vendedor->setCelular($celular);
        $vendedor->setEndereco($endereco);
        $vendedor->setCep($cep);
        $vendedor->setCidade($cidade);
        $vendedor->setEstado($estado);
        $vendedor->setPais($pais);
        $vendedor->setAtivo("s");

        $vendedor->setCpf($cpf);
        $vendedor->setRg($rg);
        $vendedor->setGenero($genero);

        $vendedor->setDataDeAdimissao($dataDeAdmissao);
        $vendedor->setDataDeNascimento($dataNascimento);

        $resultado = $this->vendedorDao->updateVendedor($vendedor, $id);

        return $resultado;

    }

    public function deletarVendedor($id){
        return $this->vendedorDao->deletarVendedor($id);
    }

    public function getVendedor($id){
        $resultado = $this->vendedorDao->pegarVendedor($id);
        foreach ($resultado as $linha){
            return $linha;
        }
    }

    public function ativarVendedor($id){
        $resultado = $this->vendedorDao->alterarVendedor($id, "s");
        return $resultado;
    }

    public function desativarVendedor($id){
        $resultado = $this->vendedorDao->alterarVendedor($id, "n");
        return $resultado;
    }

    public function isVendedorAtivo($id)
    {
        $arrayDeLinhas = $this->vendedorDao->pegarVendedor($id);
        foreach ($arrayDeLinhas as $linha) {
            $ativo = $linha["ativo"];
            if ($ativo == "s") {
                return true;
            }
            if ($ativo == "n") {
                return false;
            } else {
                echo "Erro ao consultar o vendedor";
            }


        }
    }

    public function exibirVendedoresCadastrados(){
        $arrayDeLinhas = $this->vendedorDao->listarTodosOsVendedores();
        if($arrayDeLinhas) {
            foreach ($arrayDeLinhas as $linhaAtual) {
                $id = $linhaAtual["id"];

                echo "<tr>
                    <td>{$linhaAtual["id"]} </td>
                    <td>{$linhaAtual["nome"]} </td>
                    <td>{$linhaAtual["cpf"]} </td>
                    <td>{$linhaAtual["telefone"]} </td>
                    <td>
                    <form method='post'>
                        <input type='hidden' name='from' value='telaVendedors'>
                        <button type='submit' name='visualizar' value='{$id}'>
                            <img src='../assets/img/imgVisualizar.png' alt='Visualizar' style='width:1.2em; height:1.2em'>
                        </button> 
                        <button type='submit' name='aprovar' value='{$id}'> 
                            <img src='../assets/img/imgAprovar.png' alt='Aprovar' style='width:1.2em; height:1.2em'>
                        </button> <button type='submit' name='deletar' value='{$id}'> 
                            <img src='../assets/img/imgDeletar.png' alt='Deletar' style='width:1.2em; height:1.2em'>
                        </button>
                        <button type='submit' name='editar' value='{$id}'> 
                            <img src='../assets/img/imgEditar.png' alt='Editar' style='width:1.2em; height:1.2em'>
                        </button>
                    </form> 
                    </td>
                    </tr>";
            }
        }


    }

    public function listarVendedors($numeroVendedor, $dataInicial, $dataFinal, $valorInicial, $valorFinal){

        $arrayDeLinhas = $this->vendedorDao->filtrarVendedors($numeroVendedor, $dataInicial,$dataFinal,$valorInicial, $valorFinal);


        foreach ($arrayDeLinhas as $linhaAtual){
            echo "<tr>
                    <td>{$linhaAtual["numero"]} </td>
                        <td>{$linhaAtual["valorTotal"]} </td>
                        <td>{$linhaAtual["dataVendedor"]} </td>
                        <td><form method='post'><button type='submit' name='visualizar' value='{$linhaAtual["numero"]}'> <img src='../assets/img/imgVisualizar.png' alt='Visualizar' style='width:1.2em; height:1.2em'></button> <button type='submit' name='editar' value='{$linhaAtual["numero"]}'> <img src='../assets/img/imgEditar.png' alt='Editar' style='width:1.2em; height:1.2em'></button> <button type='submit' name='aprovar' value='{$linhaAtual["numero"]}'> <img src='../assets/img/imgAprovar.png' alt='Aprovar' style='width:1.2em; height:1.2em'></button> <button type='submit' name='deletar' value='{$linhaAtual["numero"]}'> <img src='../assets/img/imgDeletar.png' alt='Deletar' style='width:1.2em; height:1.2em'></button></form> </td>
                    </tr>";
        }
    }
}