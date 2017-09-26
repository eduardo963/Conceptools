<?php
include_once '../Data.php';
include_once '../banco/repositorio.php';
include_once '../model/pedido.php';

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
            $querry = "select * from pedido where dataPedido >= '" . $dataInicial . "' 
                        and dataPedido <= '" . $dataFinal . "' and valorTotal >= '" . $valorInicial . "' 
                        and valorTotal <= '" . $valorFinal . "'";
            /*if (!(is_null($dataInicial))) {
                if (!(is_null($dataFinal))) {
                    if (!(is_null($valorInicial))) {
                        if (!(is_null($valorFinal))) {
                            $querry = "select * from pedido where dataPedido >= '" . $dataInicial . "' 
                        and dataPedido <= '" . $dataFinal . "' and valorTotal >= '" . $valorInicial . "' 
                        and valorTotal <= '" . $valorFinal . "'";
                        } else {
                            $querry = "select * from pedido where dataPedido >= '" . $dataInicial . "' 
                        and dataPedido <= '" . $dataFinal . "' and valorTotal >= '" . $valorInicial . "'";
                        }
                    } else {

                    }

                }


            }*/
        }
        $resultado = $this->banco->select($querry);
        return $resultado;
    }

	public function pegarPedido($id){
        $db = new mysqli('localhost', 'root', '231511', 'testes');
        if(mysqli_connect_errno()){
            echo mysqli_connect_error();
        }
        $result = $db->query('SELECT * FROM `produtos`');
        if($result){
            while ($row = $result->fetch_assoc()){
                echo '<br /><pre>';
                print_r($row);
                echo '</pre>';
            }
            $result->free();
        }
        $db->close();



    }



}




?>