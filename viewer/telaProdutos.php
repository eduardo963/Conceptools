<?php
include_once '../cabecalho.php';
?>
    <h2>Produtos</h2>
    <div class="col-md-3">
        <form action="telaCadastroProduto.php">
            <button class="btn btn-default btn-block" type="submit" ><strong>Novo Produto</strong></button>
        </form>
        <h4 class="text-uppercase text-center">Filtros </h4><strong>Numero do produto: </strong>
        <form>
            <div class="form-group">
                <input class="form-control" type="text"><strong>Categoria: </strong>
                <select class="form-control">
                    <optgroup label="Selecione uma categoria">
                        <option value="12" selected="">Categoria 1</option>
                        <option value="13">Categoria 2</option>
                        <option value="14">Categoria 3</option>
                    </optgroup>
                </select><strong>Valor incial e final:</strong>
                <div class="row">
                    <div class="col-md-6">
                        <input class="form-control" type="number">
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="number">
                    </div>
                </div>
                <br>
                <button class="btn btn-default btn-block" type="submit">Filtrar </button>
            </div>
        </form>
    </div>
    <div class="col-md-8 col-md-offset-0">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="active">Numero </th>
                        <th class="active">Nome do produto</th>
                        <th class="active">Categoria </th>
                        <th class="active">Valor </th>
                        <th class="active">Barra de ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1 </td>
                        <td>Regata No Pain no Gain</td>
                        <td>Regatas </td>
                        <td>R$ 69,90 </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td>2 </td>
                        <td>Bolsa Louis Vuitton </td>
                        <td>Artigos de luxo </td>
                        <td>R$ 5499,90 </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>(Sem produtos)</td>
                        <td> </td>
                        <td> </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>(Sem produtos) </td>
                        <td> </td>
                        <td> </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>(Sem produtos) </td>
                        <td> </td>
                        <td> </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>(Sem produtos) </td>
                        <td> </td>
                        <td> </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>(Sem produtos) </td>
                        <td> </td>
                        <td> </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>(Sem produtos) </td>
                        <td> </td>
                        <td> </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>(Sem produtos) </td>
                        <td> </td>
                        <td> </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>(Sem produtos) </td>
                        <td> </td>
                        <td> </td>
                        <td>(Barra de ações)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>