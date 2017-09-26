<?php
include_once '../Data.php';
include_once '../model/pedido.php';
include_once '../dao/pedidosDao.php';
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 19/09/2017
 * Time: 15:10
 */
class pedidoController
{
    private $pedidoDao;

    function __construct()
    {
        $this->pedidoDao = new pedidosDao();
    }

    public function criarNovoPedido($valorTotal, $dataPedido){
        $pedido = new pedido($valorTotal, $dataPedido);
        if($this->pedidoDao->inserirPedido($pedido)){
            echo "Sucesso pow!";
        } else{
            echo "Saiu de casa e não comeu pra caralho";
        }

    }

    public function isPedidoCadastrado($id){
        $hoje = date('Y-m-d');
    }

    public function exibirPedidosCadastrados(){
        $arrayDeLinhas = $this->pedidoDao->listarPedidosDoDiaAtual();
        $numeroDeLinhas = count($arrayDeLinhas);
        $i = 0;
        while ($i < $numeroDeLinhas){
            $linhaAtual = $arrayDeLinhas[$i];
            echo "<tr>
                    <td>{$linhaAtual["numero"]} </td>
                        <td>{$linhaAtual["valorTotal"]} </td>
                        <td>{$linhaAtual["dataPedido"]} </td>
                    </tr>";

            $i += 1;
        }

    }
    public function listarPedidos($numeroPedido, $dataInicial, $dataFinal, $valorInicial, $valorFinal){
        $arrayDeLinhas = $this->pedidoDao->filtrarPedidos($numeroPedido, $dataInicial,$dataFinal,$valorInicial, $valorFinal);
        $numeroDeLinhas = count($arrayDeLinhas);
        $i = 0;
        while ($i < $numeroDeLinhas){
            $linhaAtual = $arrayDeLinhas[$i];
            echo "<tr>
                    <td>{$linhaAtual["numero"]} </td>
                        <td>{$linhaAtual["valorTotal"]} </td>
                        <td>{$linhaAtual["dataPedido"]} </td>
                    </tr>";

            $i += 1;
        }
    }
}