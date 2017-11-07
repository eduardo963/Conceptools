<?php
include_once '../Data.php';
include_once '../banco/repositorio.php';
include_once '../model/Pedido.php';

class pedidosDao {

    private $banco;


	function __construct() {
        $this->banco = new repositorio();

	}
	public function inserirPedido(pedido $pedido){
        $valorTotal = $pedido->getValorTotal();
        $dataPedido = $pedido->getDataPedido();

        $querry = "insert into pedido (valorTotal, dataPedido, ativo) values ('".$valorTotal."', '".$dataPedido."', 's')";

        $resultado = $this->banco->insert($querry);

        return $resultado;
		
	}

	public function deletarPedido($numeroPedido){
	    return $resultado = $this->banco->delete("DELETE FROM pedido WHERE numero = ".$numeroPedido);
    }

	public function listarTodosOsPedidos(){
        $resultado = $this->banco->select("SELECT * FROM pedido");
        return $resultado;
    }

    public function listarPedidosDoDiaAtual(){
        date_default_timezone_set("America/Sao_Paulo");
        $hoje = date('Y-m-d');
        $resultado = $this->banco->select("select * from pedido where dataPedido = '".$hoje."'");
        return $resultado;
    }

    public function filtrarPedidos($numeroPedido, $dataInicial, $dataFinal, $valorInicial, $valorFinal){
        /*echo  "num ".$numeroPedido. " dt in ". $dataInicial. " dt fim ". $dataFinal. " pc in ". $valorInicial. " pc fim ". $valorFinal;
        var_dump($numeroPedido);*/

        if (is_numeric($numeroPedido)){
            $querry = "select * from pedido where numero = " . $numeroPedido;

        } else {
            if (!(empty($dataInicial))) {
                if (!(empty($dataFinal))) {
                    if (!(empty($valorInicial))) {
                        if (!(empty($valorFinal))) {
                            $querry = "select * from pedido where dataPedido >= '" . $dataInicial . "' 
                        and dataPedido <= '" . $dataFinal . "' and valorTotal >= '" . $valorInicial . "' 
                        and valorTotal <= '" . $valorFinal . "'";
                        } else {
                            $querry = "select * from pedido where dataPedido >= '" . $dataInicial . "' 
                        and dataPedido <= '" . $dataFinal . "' and valorTotal >= '" . $valorInicial . "'";
                        }
                    } else {
                        if (!(empty($valorFinal))) {
                            $querry = "select * from pedido where dataPedido >= '" . $dataInicial . "' 
                        and dataPedido <= '" . $dataFinal . "' and valorTotal <= '" . $valorFinal . "'";
                        } else {
                            $querry = "select * from pedido where dataPedido >= '" . $dataInicial . "' 
                        and dataPedido <= '" . $dataFinal . "'";
                        }
                    }

                } else {
                    if (!(empty($valorInicial))) {
                        if (!(empty($valorFinal))) {
                            $querry = "select * from pedido where dataPedido >= '" . $dataInicial . "' 
                        and valorTotal >= '" . $valorInicial . "' and valorTotal <= '" . $valorFinal . "'";
                        } else {
                            $querry = "select * from pedido where dataPedido >= '" . $dataInicial . "' 
                        and valorTotal >= '" . $valorInicial . "'";
                        }
                    } else {
                        if (!(empty($valorFinal))) {
                            $querry = "select * from pedido where dataPedido >= '" . $dataInicial . "' 
                        and valorTotal <= '" . $valorFinal . "'";
                        } else {
                            $querry = "select * from pedido where dataPedido >= '" . $dataInicial . "'";
                        }
                    }
                }

            }else {
                if (!(empty($dataFinal))) {
                    if (!(empty($valorInicial))) {
                        if (!(empty($valorFinal))) {
                            $querry = "select * from pedido where dataPedido <= '" . $dataFinal . "' 
                            and valorTotal >= '" . $valorInicial . "' 
                        and valorTotal <= '" . $valorFinal . "'";
                        } else {
                            $querry = "select * from pedido where dataPedido <= '" . $dataFinal . "' 
                            and valorTotal >= '" . $valorInicial . "'";
                        }
                    } else {
                        if (!(empty($valorFinal))) {
                            $querry = "select * from pedido where dataPedido <= '" . $dataFinal . "' 
                            and valorTotal <= '" . $valorFinal . "'";
                        } else {
                            $querry = "select * from pedido where dataPedido <= '" . $dataFinal . "'";
                        }
                    }

                } else {
                    if (!(empty($valorInicial))) {
                        if (!(empty($valorFinal))) {
                            $querry = "select * from pedido where valorTotal >= '" . $valorInicial . "' 
                            and valorTotal <= '" . $valorFinal . "'";
                        } else {
                            $querry = "select * from pedido where valorTotal >= '" . $valorInicial . "'";
                        }
                    } else {
                        if (!(empty($valorFinal))) {
                            $querry = "select * from pedido where valorTotal <= '" . $valorFinal . "'";
                        } else {
                            $querry = "select * from pedido";
                        }
                    }
                }
            }
        }
        $resultado = $this->banco->select($querry);
        return $resultado;
    }

	public function pegarPedido($id){
        $resultado = $this->banco->select("SELECT * FROM pedido WHERE numero = ".$id);
        return $resultado;
    }


}
