<?php

class pedido {
	private $idPedido;
	private $valorTotal;
	private $dataPedido;

	function __construct($valorTotal, $dataPedido){
		$this->valorTotal = $valorTotal;
		$this->dataPedido = $dataPedido;


	}
	 /**
     * @param mixed $idPedido
     */
    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;
    }

	public function getNumeroPedido(){
		return $this->idPedido;
	}

	public function getDataPedido(){
		return $this->dataPedido;
	}
    /**
     * @return mixed
     */
    public function getValorTotal()
    {
        return $this->valorTotal;
    }
}

?>