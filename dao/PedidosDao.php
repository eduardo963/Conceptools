<?php
include_once '../Data.php';
include_once '../banco/repositorio.php';
include_once '../model/Pedido.php';

class pedidosDao {

    private $banco;


	function __construct() {
        $this->banco = new repositorio();

	}
	public function inserirPedido(pedido $pedido, $produtos){

        $valorTotal = $pedido->getValorTotal();
        $cliente = $pedido->getCliente();
        $vendedor = $pedido->getVendedor();
        $filial = $pedido->getFilial();
        $numeroDeItens = $pedido->getNumeroDeItens();
        $dataPedido = $pedido->getDataPedido();
        $aprovado = "n";



        $querry = "INSERT INTO `pedidos`(`valorTotal`, `dataPedido`, `cliente`, `vendedor`, `filial`, 
`numeroDeItens`, `aprovado`) VALUES ('".$valorTotal."', '".$dataPedido."','".$cliente."', '".$vendedor."', 
'".$filial."', '".$numeroDeItens."', '".$aprovado."')";

        $idPedido = $this->banco->insert($querry);

//Parte de produtos:
        $ids = array_keys($produtos);

        foreach ($ids as $idProduto){

            $quantidade = $produtos[$idProduto];

            $querry = "INSERT INTO `pedidos_produtos` (`idPedido`, `idProduto`, `Quantidade`) 
VALUES ('".$idPedido."', '".$idProduto."', '".$quantidade."')";


            $this->banco->insert($querry);
        }

        return $idPedido;
		
	}

	public function deletarPedido($numeroPedido){
	    return $resultado = $this->banco->delete("DELETE FROM pedidos WHERE id = ".$numeroPedido);
    }

	public function listarTodosOsPedidos(){
        $resultado = $this->banco->select("SELECT * FROM pedidos");
        return $resultado;
    }

    public function listarPedidosDoDiaAtual(){
        date_default_timezone_set("America/Sao_Paulo");
        $hoje = date('Y-m-d');
        $resultado = $this->banco->select("select * from pedidos;");
        return $resultado;
    }

	public function pegarPedido($id){
        $resultado = $this->banco->select("SELECT * FROM pedidos WHERE id = '".$id."'");
        return $resultado;
    }

    public function listarProdutosDoPedido($id){
        $resultado = $this->banco->select("SELECT * FROM pedidos_produtos WHERE idPedido = '".$id."'");
        return $resultado;
    }

    public function alterarPedido($id, $valor){
        $resultado = $this->banco->update("UPDATE `pedidos` SET `aprovado` = '".$valor."' WHERE `id` = '".$id."'");
        return $resultado;
    }
}
