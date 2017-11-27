<?php
include_once '../Data.php';
include_once '../model/Filial.php';
include_once '../dao/FiliaisDao.php';
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 12/11/2017
 * Time: 15:10
 */
class FilialController
{
    private $filialDao;

    function __construct()
    {
        $this->filialDao = new FiliaisDao();
    }

    public function criarNovaFilial($id, $cep, $logradouro, $bairro, $numero, $cidade, $uf, $pais,
                                    $dataDeInauguracao){

        $filial = new Filial($id, $cep, $logradouro);
        $filial->setBairro($bairro);
        $filial->setNumero($numero);
        $filial->setCidade($cidade);
        $filial->setUf($uf);
        $filial->setPais($pais);
        $filial->setDataDeInauguracao($dataDeInauguracao);
        $filial->setAtivo("s");

        $id = $this->filialDao->inserirFilial($filial);

        return $id;

    }

    public function updateNovaFilial($id, $cep, $logradouro, $bairro, $numero, $cidade, $uf, $pais,
                                    $dataDeInauguracao){

        $filial = new Filial($id, $cep, $logradouro);
        $filial->setBairro($bairro);
        $filial->setNumero($numero);
        $filial->setCidade($cidade);
        $filial->setUf($uf);
        $filial->setPais($pais);
        $filial->setDataDeInauguracao($dataDeInauguracao);

        $resultado = $this->filialDao->updateFilial($filial, $id);

        return $resultado;

    }

    public function deletarFilial($id){
        return $this->filialDao->deletarFilial($id);
    }

    public function getFilial($id){
        $resultado = $this->filialDao->pegarFilial($id);
        foreach ($resultado as $linha){
            return $linha;
        }
    }

    public function ativarFilial($id){
        $resultado = $this->filialDao->alterarFilial($id, "s");
        return $resultado;
    }

    public function desativarFilial($id){
        $resultado = $this->filialDao->alterarFilial($id, "n");
        return $resultado;
    }

    public function isFilialAtiva($id)
    {
        $arrayDeLinhas = $this->filialDao->pegarFilial($id);
        foreach ($arrayDeLinhas as $linha) {
            $aVenda = $linha["ativo"];
            if ($aVenda == "s") {
                return true;
            }
            if ($aVenda == "n") {
                return false;
            } else {
                echo "Erro ao consultar a filial";
            }


        }
    }

    public function exibirFiliaisCadastradas(){
        $arrayDeLinhas = $this->filialDao->listarTodasAsFiliais();
        if($arrayDeLinhas) {
            foreach ($arrayDeLinhas as $linhaAtual) {
                $id = $linhaAtual["id"];
                echo "<tr>
                    <td>{$linhaAtual["id"]} </td>
                    <td>{$linhaAtual["logradouro"]} </td>
                    <td>{$linhaAtual["bairro"]} </td>
                    <td>{$linhaAtual["cidade"]} </td>
                    <td>
                    <form method='post'>
                        <input type='hidden' name='from' value='telaFiliais'>
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
}