<h1>Editar Modelo</h1>

<?php
    $sql = "SELECT * FROM modelo WHERE id_modelo = ".$_REQUEST['id_modelo'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>

<form action="?page=salvar-modelo" method="POST">
    <input type="hidden" name="acao" value="editar">
    
    <input type="hidden" name="id_modelo" value="<?php print $row->id_modelo; ?>">

    <div class="mb-3">
        <label>Marca</label>
        <select name="marca_id_marca" class="form-control">
            <option>== Escolha ==</option>
            
            <?php
                $sql_1 = "SELECT * FROM marca";
                $res_1 = $conn->query($sql_1);
                $qtd_1 = $res_1->num_rows;

                if($qtd_1 > 0){
                    while($row_1 = $res_1->fetch_object()){
                        if($row->marca_id_marca == $row_1->id_marca){
                            print "<option value=\"{$row_1->id_marca}\" selected>{$row_1->nome_marca}</option>";
                        } else {
                            print "<option value=\"{$row_1->id_marca}\">{$row_1->nome_marca}</option>";
                        }
                    }
                } else {
                    print "<option>Não há marcas registradas</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome_modelo" class="form-control" value="<?php print $row->nome_modelo; ?>">
    </div>

    <div class="mb-3">
        <label>Cor</label>
        <input type="text" name="cor_modelo" class="form-control" value="<?php print $row->cor_modelo; ?>">
    </div>

    <div class="mb-3">
        <label>Ano</label>
        <input type="number" name="ano_modelo" class="form-control" value="<?php print $row->ano_modelo; ?>">
    </div>

    <div class="mb-3">
        <label>Tipo</label>
        <input type="text" name="tipo_modelo" class="form-control" value="<?php print $row->tipo_modelo; ?>">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>