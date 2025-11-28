<h1>Cadastrar Venda</h1>
<form action="?page=salvar-venda" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    
    <div class="mb-3">
        <label>Modelo</label>
        <select name="modelo_id_modelo" class="form-control">
            <option>== Escolha o Modelo ==</option>
            <?php
                $sql = "SELECT id_modelo, nome_modelo FROM modelo";
                $res = $conn->query($sql);
                $qtd = $res->num_rows;

                if($qtd > 0){
                    while($row = $res->fetch_object()){
                        print "<option value=\"{$row->id_modelo}\">{$row->nome_modelo}</option>";
                    }
                }else{
                    print "<option>Não há modelos registrados</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Cliente</label>
        <select name="cliente_id_cliente" class="form-control">
            <option>== Escolha o Cliente ==</option>
            <?php
                $sql = "SELECT id_cliente, nome_cliente FROM cliente";
                $res = $conn->query($sql);
                $qtd = $res->num_rows;

                if($qtd > 0){
                    while($row = $res->fetch_object()){
                        print "<option value=\"{$row->id_cliente}\">{$row->nome_cliente}</option>";
                    }
                }else{
                    print "<option>Não há clientes registrados</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Data da Venda</label>
        <input type="date" name="data_venda" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Valor (R$)</label>
        <input type="number" step="0.01" name="valor_venda" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Registrar Venda</button>
</form>