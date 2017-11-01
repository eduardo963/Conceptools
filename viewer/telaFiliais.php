<?php
include_once '../cabecalho.php';
?>
<h2>Filiais</h2>
<div class="col-md-3">
    <form action="telaCadastroFilial.php">
        <button class="btn btn-default btn-block" type="submit" ><strong>Nova Filial</strong></button>
    </form>
    <h4 class="text-uppercase text-center">Filtros </h4>
    <form>
        <div class="form-group"><strong>ID: </strong>
            <input class="form-control" type="text" name="id"><strong>Logradouro: </strong>
            <input class="form-control" type="text" name="nomerazao"><strong>Bairro: </strong>
            <input class="form-control" type="text" name="cpfcnpj"><strong>Cidade:</strong>
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
                <th class="active">Logradouro </th>
                <th class="active">Bairro </th>
                <th class="active">Cidade </th>
                <th class="active">Barra de ações</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1 </td>
                <td>Rua Esmeralda, 1705</td>
                <td>Nogueira </td>
                <td>Florianópolis </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td>2 </td>
                <td>Av. dos Sonhos, 1861</td>
                <td>Espirito Santo </td>
                <td>João Pessoa </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem filiais)</td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem filiais) </td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem filiais) </td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem filiais) </td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem filiais) </td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem filiais) </td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem filiais) </td>
                <td> </td>
                <td> </td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td> </td>
                <td>(Sem filiais) </td>
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