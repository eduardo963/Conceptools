<?php


/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 2017-09-26
 * Time: 11:13 PM
 */
class Produto {
    protected $idProduto;           //Inteiro - Id do produto no banco.
	protected $codProduto;          //String  - Código do produto.
	private $valor;                 //Double  - Valor do produto.
    private $aVenda;                //Boleano - Informa se o protuto está disponível para venda.
	private $idCategoriaProduto;    //Inteiro - Id da categoria do produto. Ex: Alimentício.
    private $nomeProduto;           //String  - Nome do produto.
    private $cor;                   //String  - Cor do produto.
    private $pesoBruto;             //Double  - Peso bruto da unidade do produto.
    private $dimensoes;             //String  - Dimensões do produto.
    private $material;              //String  - Material do qual o produto é feito
    private $descricao;             //String  - Descrição do produto.

    /**
     * Produto constructor.
     * @param $codProduto
     * @param $valor
     * @param $aVenda
     * @param $idCategoriaProduto
     * @param $nomeProduto
     */
    public function __construct($idProduto, $codProduto, $valor, $aVenda, $idCategoriaProduto, $nomeProduto)
    {
        $this->idProduto = $idProduto;
        $this->codProduto = $codProduto;
        $this->valor = $valor;
        $this->aVenda = $aVenda;
        $this->idCategoriaProduto = $idCategoriaProduto;
        $this->nomeProduto = $nomeProduto;
    }

    /**
     * @return mixed
     */
    public function getIdProduto()
    {
        return $this->idProduto;
    }

    /**
     * @param mixed $idProduto
     */
    public function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;
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
    public function getidCategoriaProduto()
    {
        return $this->idCategoriaProduto;
    }

    /**
     * @param mixed $idCategoriaProduto
     */
    public function setidCategoriaProduto($idCategoriaProduto)
    {
        $this->idCategoriaProduto = $idCategoriaProduto;
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

    /**
     * @return mixed
     */
    public function getIdGrupoProduto()
    {
        return $this->idGrupoProduto;
    }

    /**
     * @param mixed $idGrupoProduto
     */
    public function setIdGrupoProduto($idGrupoProduto)
    {
        $this->idGrupoProduto = $idGrupoProduto;
    }

    /**
     * @return mixed
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * @param mixed $cor
     */
    public function setCor($cor)
    {
        $this->cor = $cor;
    }

    /**
     * @return mixed
     */
    public function getPesoBruto()
    {
        return $this->pesoBruto;
    }

    /**
     * @param mixed $pesoBruto
     */
    public function setPesoBruto($pesoBruto)
    {
        $this->pesoBruto = $pesoBruto;
    }

    /**
     * @return mixed
     */
    public function getDimensoes()
    {
        return $this->dimensoes;
    }

    /**
     * @param mixed $dimensoes
     */
    public function setDimensoes($dimensoes)
    {
        $this->dimensoes = $dimensoes;
    }

    /**
     * @return mixed
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * @param mixed $material
     */
    public function setMaterial($material)
    {
        $this->material = $material;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }


}

?>