<h1>Editar Funcionário</h1>
<?php
// Linha 1: Cabeçalho
?>
<h1>Editar Funcionário</h1>

<?php
// Linha 3-8: Lógica para buscar dados do funcionário no banco de dados
$sql = "SELECT * FROM funcionario WHERE id_funcionario = '{$_REQUEST['id_funcionario']}'";

$res = $conn->query($sql);

$row = $res->fetch_object();
?>

<form action="?page=salvar-funcionario" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_funcionario" value="<?php print $row->id_funcionario; ?>">

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome_funcionario" class="form-control" value="<?php
        print $row->nome_funcionario;
        ?>">
    </div>

    <div class="mb-3">
    <label>E-mail</label>
    <input type="email" name="email_funcionario" class="form-control" value="<?php
    print $row->email_funcionario;
    ?>">
</div>

<div class="mb-3">
    <label>Telefone</label>
    <input type="text" name="telefone_funcionario" class="form-control" value="<?php
    print $row->telefone_funcionario;
    ?>">
</div>

<div class="mb-3">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
</form>