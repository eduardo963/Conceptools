<?php
include_once '../cabecalho.php';
?>
    <h2>Usuários </h2>
    <div class="col-md-3">
        <form action="telaCadastroUsuario.php">
            <button class="btn btn-default btn-block" type="submit" ><strong>Novo Usuário</strong></button>
        </form>
        <h4 class="text-uppercase text-center">Filtros </h4><strong>Id do usuário:</strong>
        <form>
            <div class="form-group">
                <input class="form-control" type="text"><strong>Nome: </strong>
                <input class="form-control" type="text"><strong>Login:</strong>
                <input class="form-control" type="text">
                <div class="checkbox">
                    <label class="control-label">
                        <input type="checkbox"><strong>Somente usuários ativos</strong></label>
                </div>
                <button class="btn btn-default btn-block" type="submit">Filtrar </button>
            </div>
        </form>
    </div>
    <div class="col-md-8 col-md-offset-0">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="active">Id</th>
                        <th class="active">Nome do usuário</th>
                        <th class="active">Login </th>
                        <th class="active">E-mail </th>
                        <th class="active">Barra de ações </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1 </td>
                        <td>Alan da Silva</td>
                        <td>alan.silva </td>
                        <td>alan34@gmail.com </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td>2 </td>
                        <td>Ana maria</td>
                        <td>ana.maria </td>
                        <td>ana173@hotmail.com </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>(Sem usuários)</td>
                        <td> </td>
                        <td> </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>(Sem usuários) </td>
                        <td> </td>
                        <td> </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>(Sem usuários) </td>
                        <td> </td>
                        <td> </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>(Sem usuários) </td>
                        <td> </td>
                        <td> </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>(Sem usuários) </td>
                        <td> </td>
                        <td> </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>(Sem usuários) </td>
                        <td> </td>
                        <td> </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>(Sem usuários) </td>
                        <td> </td>
                        <td> </td>
                        <td>(Barra de ações)</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>(Sem usuários) </td>
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