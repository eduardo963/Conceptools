<?php
include_once '../cabecalho.php';
?>
<h2>Qual o tipo de cliente?</h2>
<div class="col-md-4">
    <button class="btn btn-default btn-block" type="submit" onclick="location.href = 'telaCadastroPessoaFisica.php';"><strong>Pessoa Física</strong></button>
    <button class="btn btn-default btn-block" type="submit" onclick="location.href = 'telaCadastroPessoaJuridica.php';"><strong>Pessoa Juridica</strong></button>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>