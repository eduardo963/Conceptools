<?php
include_once '../cabecalho.php';
?>
<h2>Clientes</h2>
<div class="col-md-3">
    <form action="telaTipoCliente.php">
        <button class="btn btn-default btn-block" type="submit"><strong>Novo cliente</strong></button>
    </form>
    <h4 class="text-uppercase text-center">Filtros </h4>
    <form>
        <div class="form-group"><strong>ID: </strong>
            <input class="form-control" type="text" name="id"><strong>Nome / Razão social: </strong>
            <input class="form-control" type="text" name="nomerazao"><strong>CPF / CNPJ: </strong>
            <input class="form-control" type="text" name="cpfcnpj"><strong>Tipo de cliente:</strong>
            <select class="form-control" name="tipo">
                <optgroup label="Selecione um tipo">
                    <option value="ambos" selected="">Ambos</option>
                    <option value="pessoafisica">Pessoa Física</option>
                    <option value="pessoajuridica">Pessoa Jurídica</option>
                </optgroup>
            </select>
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
                <th class="active">Nome / Razão social</th>
                <th class="active">Tipo</th>
                <th class="active">CNPJ / CPF</th>
                <th class="active">Barra de ações</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1 </td>
                <td>Alan da Silva</td>
                <td>Pessoa Juridica</td>
                <td>275.164.378-75 </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td>2 </td>
                <td>Ana maria</td>
                <td>Pessoa Física</td>
                <td>23.341.957/0001-05 </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem clientes)</td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem clientes)</td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem clientes)</td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem clientes)</td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem clientes)</td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem clientes)</td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem clientes)</td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem clientes)</td>
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