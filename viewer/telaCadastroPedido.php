<?php
include_once '../cabecalho.php';
?>
<h2>Novo Pedido </h2>
<div class="col-md-3">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <h3>Status </h3>
            <div>
                <p><strong>Valor total: </strong></p>
                <p><strong>Número de itens:</strong></p>
            </div>
        </div>
    </div>
    <p><strong>Cliente:</strong> </p>
    <select name="cliente">
        <optgroup label="Selecione um cliente">
            <option value="12" selected="">This is item 1</option>
            <option value="13">This is item 2</option>
            <option value="14">This is item 3</option>
        </optgroup>
    </select>
    <p><strong>Vendedor:</strong> </p>
    <select name="vendedor">
        <optgroup label="Selecione um vendedor">
            <option value="12" selected="">This is item 1</option>
            <option value="13">This is item 2</option>
            <option value="14">This is item 3</option>
        </optgroup>
    </select>
    <p><strong>Filial:</strong> </p>
    <select>
        <optgroup label="This is a group">
            <option value="12" selected="">This is item 1</option>
            <option value="13">This is item 2</option>
            <option value="14">This is item 3</option>
        </optgroup>
    </select>
    <p> </p>
    <form action="telaDetalhesPedido.php" method="post">
        <input type="hidden" name="from" value="cadastropedido">
        <button class="btn btn-default btn-block" type="submit"><strong>Concluir Pedido</strong></button>
    </form>
</div>
<div class="col-md-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3>Filtro de produtos</h3>
                <form action="telaPedidoCadastrado.php">
                    <strong>Nome do produto: </strong>
                    <input class="form-control" type="text" placeholder="Nome do produto" autofocus="" autocomplete="on"><strong>Codigo do produto: </strong>
                    <input class="form-control" type="text" inputmode="numeric">
                    <button class="btn btn-default btn-block" type="submit">Buscar </button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                    <tr class="active">
                        <th>Código: </th>
                        <th>Nome: </th>
                        <th>Ação: </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Cell 1</td>
                        <td>Cell 2</td>
                        <td>Cell 3</td>
                    </tr>
                    <tr>
                        <td>Cell 1</td>
                        <td>Cell 2</td>
                        <td>Cell 3</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4">
    <h3>Produtos adicionados</h3>
    <table class="table table-striped table-bordered table-condensed">
        <thead>
        <tr class="active">
            <th>Código: </th>
            <th>Nome: </th>
            <th>Quantidade: </th>
            <th>Ação: </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Cell 1</td>
            <td>Cell 2</td>
            <td>Cell 3</td>
            <td>Cell 4</td>
        </tr>
    </table>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>