<?php


/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 2017-09-26
 * Time: 11:13 PM
 */
class Produto {
	protected $codProduto;     //String  - Código do produto.
	private $valor;            //Double  - Valor do produto.
    private $aVenda;           //Boleano - Informa se o protuto está disponível para venda.
	private $categoriaProduto; //String  - Categoria do produto. Ex: Alimentício.
    private $nomeProduto;      //String  - Nome do produto.


	function __construct($codProduto, $valor, $aVenda,$categoriaProduto, $nomeProduto){
		$this->codProduto = $codProduto;
		$this->valor = $valor;
        $this->aVenda = $aVenda;
        $this->categoriaProduto = $categoriaProduto;
        $this->nomeProduto = $nomeProduto;


	}

    /**
     * @return mixed
     */
    public function getCodProduto()
    {
        return $this->codProduto;
    }

    /**
     * @param mixed $codProduto
     */
    public function setCodProduto($codProduto)
    {
        $this->codProduto = $codProduto;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getAVenda()
    {
        return $this->aVenda;
    }

    /**
     * @param mixed $aVenda
     */
    public function setAVenda($aVenda)
    {
        $this->aVenda = $aVenda;
    }

    /**
     * @return mixed
     */
    public function getCategoriaProduto()
    {
        return $this->categoriaProduto;
    }

    /**
     * @param mixed $categoriaProduto
     */
    public function setCategoriaProduto($categoriaProduto)
    {
        $this->categoriaProduto = $categoriaProduto;
    }

    /**
     * @return mixed
     */
    public function getNomeProduto()
    {
        return $this->nomeProduto;
    }

    /**
     * @param mixed $nomeProduto
     */
    public function setNomeProduto($nomeProduto)
    {
        $this->nomeProduto = $nomeProduto;
    }





}

?>