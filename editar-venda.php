<h1>Editar Venda</h1>

<?php
    
    $sql_venda = "SELECT * FROM venda WHERE id_venda = ".$_REQUEST['id_venda'];
    $res_venda = $conn->query($sql_venda);
    $row_venda = $res_venda->fetch_object();
?>

<form action="?page=salvar-venda" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_venda" value="<?php print $row_venda->id_venda; ?>">
    
    <div class="mb-3">
        <label>Modelo</label>
        <select name="modelo_id_modelo" class="form-control">
            <option>== Escolha o Modelo ==</option>
            <?php
                $sql_mod = "SELECT id_modelo, nome_modelo FROM modelo";
                $res_mod = $conn->query($sql_mod);
                
                while($row_mod = $res_mod->fetch_object()){
                    $selected = ($row_venda->modelo_id_modelo == $row_mod->id_modelo) ? 'selected' : '';
                    print "<option value=\"{$row_mod->id_modelo}\" {$selected}>{$row_mod->nome_modelo}</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Cliente</label>
        <select name="cliente_id_cliente" class="form-control">
            <option>== Escolha o Cliente ==</option>
            <?php
             
                $sql_cli = "SELECT id_cliente, nome_cliente FROM cliente";
                $res_cli = $conn->query($sql_cli);

                while($row_cli = $res_cli->fetch_object()){
                    $selected = ($row_venda->cliente_id_cliente == $row_cli->id_cliente) ? 'selected' : '';
                    print "<option value=\"{$row_cli->id_cliente}\" {$selected}>{$row_cli->nome_cliente}</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Data da Venda</label>
        <input type="date" name="data_venda" class="form-control" 
            value="<?php print $row_venda->data_venda; ?>" required>
    </div>

    <div class="mb-3">
        <label>Valor (R$)</label>
        <input type="number" step="0.01" name="valor_venda" class="form-control" 
            value="<?php print $row_venda->valor_venda; ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
</form>