<?php

/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 2017-11-12
 * Time: 10:30 PM
 */
class Pedido {
	private $id;
	private $valorTotal;
	private $dataPedido;
    private $cliente;
    private $vendedor;
    private $filial;
    private $numeroDeItens;
    private $produtos;
    private $dataAprovacao;
    private $aprovado;

    /**
     * Pedido constructor.
     * @param $valorTotal
     * @param $dataPedido
     * @param $cliente
     * @param $vendedor
     * @param $filial
     */
    public function __construct($valorTotal, $dataPedido, $cliente, $vendedor, $filial)
    {
        $this->valorTotal = $valorTotal;
        $this->dataPedido = $dataPedido;
        $this->cliente = $cliente;
        $this->vendedor = $vendedor;
        $this->filial = $filial;
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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return mixed
     */
    public function getVendedor()
    {
        return $this->vendedor;
    }

    /**
     * @param mixed $vendedor
     */
    public function setVendedor($vendedor)
    {
        $this->vendedor = $vendedor;
    }

    /**
     * @return mixed
     */
    public function getFilial()
    {
        return $this->filial;
    }

    /**
     * @param mixed $filial
     */
    public function setFilial($filial)
    {
        $this->filial = $filial;
    }

    /**
     * @return mixed
     */
    public function getNumeroDeItens()
    {
        return $this->numeroDeItens;
    }

    /**
     * @param mixed $numeroDeItens
     */
    public function setNumeroDeItens($numeroDeItens)
    {
        $this->numeroDeItens = $numeroDeItens;
    }

    /**
     * @return mixed
     */
    public function getProdutos()
    {
        return $this->produtos;
    }

    /**
     * @param mixed $produtos
     */
    public function setProdutos($produtos)
    {
        $this->produtos = $produtos;
    }

    /**
     * @return mixed
     */
    public function getDataAprovacao()
    {
        return $this->dataAprovacao;
    }

    /**
     * @param mixed $dataAprovacao
     */
    public function setDataAprovacao($dataAprovacao)
    {
        $this->dataAprovacao = $dataAprovacao;
    }

    /**
     * @return mixed
     */
    public function getAprovado()
    {
        return $this->aprovado;
    }

    /**
     * @param mixed $aprovado
     */
    public function setAprovado($aprovado)
    {
        $this->aprovado = $aprovado;
    }



}

?>