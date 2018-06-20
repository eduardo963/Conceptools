<?php
include_once '../Data.php';
include_once '../model/Pedido.php';
include_once '../dao/PedidosDao.php';
include_once '../dao/ClientesDao.php';
include_once '../dao/FiliaisDao.php';
include_once '../dao/VendedoresDao.php';
include_once '../dao/ProdutosDao.php';

/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 19/09/2017
 * Time: 15:10
 */
class PedidoController
{
    private $pedidoDao;

    function __construct()
    {
        $this->pedidoDao = new pedidosDao();
    }

    public function criarNovoPedido($valorTotal, $cliente, $vendedor, $filial, $numeroDeItens, $produtos){

        date_default_timezone_set("America/Sao_Paulo");
        $dataPedido = date('Y-m-d');

        $pedido = new pedido($valorTotal, $dataPedido, $cliente, $vendedor, $filial);
        $pedido->setNumeroDeItens($numeroDeItens);



        $idGerado = $this->pedidoDao->inserirPedido($pedido, $produtos);

        return $idGerado;

    }

    public function deletarPedido($numeroPedido){
        return $this->pedidoDao->deletarPedido($numeroPedido);
    }

    public function isPedidoAprovado($id){
        $arrayDeLinhas = $this->pedidoDao->pegarPedido($id);
        if($arrayDeLinhas){
            foreach ($arrayDeLinhas as $linha) {
                $aprovado = $linha["aprovado"];
                if ($aprovado == "s") {
                    return true;
                }
                if ($aprovado == "n") {
                    return false;
                } else {
                    echo "Erro ao consultar o pedido";
                }
            }
        } else{
            return false;
        }

    }

    public function exibirPedidosCadastrados(){
        $arrayDeLinhas = $this->pedidoDao->listarPedidosDoDiaAtual();

        return $arrayDeLinhas;
    }


    public function getPedido($id){
        $resultado = $this->pedidoDao->pegarPedido($id);
        if($resultado){
            foreach ($resultado as $linha){
                return $linha;
            }
        } else {
            return false;
        }
    }

    public function listarOpcoesDeClientes(){
        $clientes = new ClientesDao();
        $lista = $clientes->listarTodosOsClientes();

        if ($lista){
            foreach ($lista as $linha){
                $id = $linha["id"];
                $nome = $linha["nome"];
                echo "<option value=\"".$id."\">".$nome."</option>";
            }

        }


    }

    public function listarNomeDeCliente($id){
        $clientes = new ClientesDao();
        $lista = $clientes->pegarCliente($id);
        if ($lista){
            foreach ($lista as $linha){
                $nome = $linha["nome"];
                return $nome;
            }
        }

    }

    public function listarOpcoesDeVendedores(){
        $clientes = new VendedoresDao();
        $lista = $clientes->listarTodosOsVendedores();

        if ($lista){
            foreach ($lista as $linha){
                $id = $linha["id"];
                $nome = $linha["nome"];
                echo "<option value=\"".$id."\">".$nome."</option>";
            }

        }


    }

    public function listarNomeDeVendedor($id){
        $clientes = new VendedoresDao();
        $lista = $clientes->pegarVendedor($id);

        if ($lista){
            foreach ($lista as $linha){
                $nome = $linha["nome"];
                return $nome;
            }
        }
    }

    public function listarOpcoesDeFiliais(){
        $clientes = new FiliaisDao();
        $lista = $clientes->listarTodasAsFiliais();

        if ($lista){
            foreach ($lista as $linha){
                $id = $linha["id"];
                $nome = $linha["logradouro"];
                echo "<option value=\"".$id."\">".$nome."</option>";
            }

        }


    }

    public function listarNomeDeFilial($id){
        $clientes = new FiliaisDao();
        $lista = $clientes->listarTodasAsFiliais($id);

        if ($lista){
            foreach ($lista as $linha){
                $nome = $linha["logradouro"];
                return $nome;
            }
        }
    }

    public function buscarProdutos($nome, $codigo){
        $produtoDao = new ProdutosDao();

        $arrayDeLinhas = $produtoDao->buscarProduto($nome, $codigo);

        return $arrayDeLinhas;
    }

    public function getProduto($id){
        $produtoDao = new ProdutosDao();
        $arrayDoProduto = $produtoDao->pegarProduto($id);

        return $arrayDoProduto;
    }

    public function listarProdutosDoPedido($id){
        $arrayDeLinhas = $this->pedidoDao->listarProdutosDoPedido($id);

        if($arrayDeLinhas) {
            $arrayDeProdutos = [];
            foreach ($arrayDeLinhas as $linha) {

                $idProduto = $linha["IdProduto"];
                $quantidade = $linha["Quantidade"];

                $arrayDoProduto = $this->getProduto($idProduto);

                $codigo = $arrayDoProduto["codProduto"];
                $nome = $arrayDoProduto["nomeProduto"];
                $arrayDoProduto['quantidade'] = $quantidade;

                $arrayDeProdutos[] = $arrayDoProduto;

            }
            return $arrayDeProdutos;
        } else{
            return false;
        }

    }

    public function ativarPedido($id){
        $resultado = $this->pedidoDao->alterarPedido($id, "s");
        return $resultado;
    }

    public function desativarPedido($id){
        $resultado = $this->pedidoDao->alterarPedido($id, "n");
        return $resultado;
    }

}