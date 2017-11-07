<?php
include_once '../cabecalho.php';
if(array_key_exists("from", $_POST)){
    echo "<p class='alert-success'>Pedido cadastrado com sucesso!</p>";
}
?>
<h2>Detalhes do Pedido </h2>
<div class="col-md-3">
    <h3>Status </h3>
    <p><strong>Valor total: </strong></p>
    <p><strong>Número de itens:</strong></p>
    <p><strong>Cliente:</strong> </p>
    <p><strong>Vendedor:</strong> </p>
    <p><strong>Filial:</strong> </p>
    <p> </p>
    <button class="btn btn-default btn-block" type="submit"><strong>Aprovar Pedido</strong></button>
    <button class="btn btn-default btn-block" type="submit"><strong>Editar Pedido</strong></button>
    <button class="btn btn-default btn-block" type="submit"><strong>Excluir Pedido</strong></button>
</div>
<div class="col-md-9">
    <h3>Itens do pedido</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed">
            <thead>
            <tr class="active">
                <th>Código: </th>
                <th>Nome: </th>
                <th>Categoria </th>
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
            <tr>
                <td>Cell 1</td>
                <td>Cell 2</td>
                <td>Cell 3</td>
                <td>Cell 4</td>
            </tr>
            <tr>
                <td>Cell 1</td>
                <td>Cell 2</td>
                <td>Cell 3</td>
                <td>Cell 4</td>
            </tr>
            <tr>
                <td>Cell 1</td>
                <td>Cell 2</td>
                <td>Cell 3</td>
                <td>Cell 4</td>
            </tr>
            <tr>
                <td>Cell 1</td>
                <td>Cell 2</td>
                <td>Cell 3</td>
                <td>Cell 4</td>
            </tr>
            <tr>
                <td>Cell 1</td>
                <td>Cell 2</td>
                <td>Cell 3</td>
                <td>Cell 4</td>
            </tr>
            <tr>
                <td>Cell 1</td>
                <td>Cell 2</td>
                <td>Cell 3</td>
                <td>Cell 4</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>