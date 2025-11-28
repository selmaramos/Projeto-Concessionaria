<h1>Listar Modelo</h1>

<?php

    // Query SQL para selecionar todos os dados do modelo,
    // e o nome da marca correspondente usando um INNER JOIN.
    $sql = "SELECT * FROM modelo AS mo
            INNER JOIN marca AS ma
            ON mo.marca_id_marca = ma.id_marca";

    // Executa a query
    $res = $conn->query($sql);

    // Conta o número de resultados
    $qtd = $res->num_rows;

    // Verifica se encontrou resultados
    if($qtd > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>"; 
        print "<th>Marca</th>"; 
        print "<th>Nome do Modelo</th>";
        print "<th>Cor</th>";
        print "<th>Ano</th>";
        print "<th>Tipo</th>";
        print "<th>Ações</th>"; 
        print "</tr>";

        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->id_modelo."</td>";
            print "<td>".$row->nome_marca."</td>"; 
            print "<td>".$row->nome_modelo."</td>";
            print "<td>".$row->cor_modelo."</td>";
            print "<td>".$row->ano_modelo."</td>";
            print "<td>".$row->tipo_modelo."</td>";
            print "<td>";
           
            print "<button class='btn btn-success' onclick=\"
                       location.href='?page=editar-modelo&id_modelo=".$row->id_modelo."';
                   \">
                       Editar
                   </button>";
            
            print "<button class='btn btn-danger' onclick=\"
                       if(confirm('Tem certeza que deseja excluir?')){
                           location.href='?page=salvar-modelo&acao=excluir&id_modelo=".$row->id_modelo."';
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
        print "<p>Não há resultados</p>";
    }
?>