<?php
include_once '../cabecalho.php';
?>
<h2>Vendedores</h2>
<div class="col-md-3">
    <form action="telaCadastroVendedor.php" method="post">
        <button class="btn btn-default btn-block" type="submit" id="btnCadastrarPedido"><strong>Novo vendedor</strong></button>
    </form>
    <h4 class="text-uppercase text-center">Filtros </h4>
    <form>
        <div class="form-group"><strong>ID: </strong>
            <input class="form-control" type="text" name="id"><strong>Nome: </strong>
            <input class="form-control" type="text" name="nomerazao"><strong>CPF: </strong>
            <input class="form-control" type="text" name="cpfcnpj"><strong>Telefone:</strong>
            <input class="form-control" type="text" name="cpfcnpj">
            <button class="btn btn-default btn-block" type="submit">Filtrar </button>
        </div>
    </form>
</div>
<div class="col-md-8 col-md-offset-0">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th class="active">ID </th>
                <th class="active">Nome</th>
                <th class="active">CPF </th>
                <th class="active">Telefone </th>
                <th class="active">Barra de ações</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1 </td>
                <td>Amaro Carvalho</td>
                <td>671.658.175-81 </td>
                <td>(81)9991-5345 </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td>2 </td>
                <td>Alissom Santana</td>
                <td>887.311.667-17 </td>
                <td>(81)9936-4835 </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem vendedores)</td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem vendedores) </td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem vendedores)&nbsp; </td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem vendedores)&nbsp; </td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem vendedores)&nbsp; </td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem vendedores)&nbsp; </td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem vendedores)&nbsp; </td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem vendedores)&nbsp; </td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>