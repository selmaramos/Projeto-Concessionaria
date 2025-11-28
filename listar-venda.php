<h1>Listar Vendas</h1>

<?php
    $sql = "SELECT v.*, mo.nome_modelo, cl.nome_cliente 
            FROM venda AS v
            INNER JOIN modelo AS mo ON v.modelo_id_modelo = mo.id_modelo
            INNER JOIN cliente AS cl ON v.cliente_id_cliente = cl.id_cliente
            ORDER BY v.data_venda DESC";

    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Data</th>";
        print "<th>Modelo</th>";
        print "<th>Cliente</th>";
        print "<th>Valor (R$)</th>";
        print "<th>Ações</th>";
        print "</tr>";

        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->id_venda."</td>";
            print "<td>".date('d/m/Y', strtotime($row->data_venda))."</td>"; // Formata a data
            print "<td>".$row->nome_modelo."</td>";
            print "<td>".$row->nome_cliente."</td>";
            print "<td>R$ ".number_format($row->valor_venda, 2, ',', '.')."</td>"; 
            print "<td>";

            print "<button class='btn btn-success btn-sm' onclick=\"
                       location.href='?page=editar-venda&id_venda=".$row->id_venda."';
                   \">
                       Editar
                   </button>";
            print "<button class='btn btn-danger btn-sm' onclick=\"
                       if(confirm('Tem certeza que deseja excluir esta venda?')){
                           location.href='?page=salvar-venda&acao=excluir&id_venda=".$row->id_venda."';
                       }else{
                           false;
                       }
                   \">
                       Excluir
                   </button>";

            print "</td>";
            print "</tr>";
        }

        print "</table>";

    }else{
        print "<p>Não há vendas registradas</p>";
    }
?>