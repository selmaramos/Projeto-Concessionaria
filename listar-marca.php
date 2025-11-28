<h1>Listar marca</h1>
<?php
	$sql = "SELECT *FROM marca";

	$res = $conn->query($sql);

	$qtd = $res ->num_rows;

	if($qtd > 0){
		print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";

        print "<table class='table table-bordered table-striped table-hover'>";

		// Cabeçalho da Tabela (<thead>)
        print "<thead>";
        print "<tr>";

		print "<th>#</th>";
		print "<th>Nome</th>";
		print "<th>Ação</th>";
		print "</tr>";

		// Corpo da Tabela (<tbody>)

        print "<tbody>";
		while( $row =$res->fetch_object() ){
			print "<tr>";
			print "<td>".$row->id_marca."</td>";
			print "<td>".$row->nome_marca."</td>";

            // Adicionando botões de Ação com classes Bootstrap para estilização

            print "<td>";
            print "<a href='?page=editar-cliente' class='btn btn-warning btn-sm mr-1'>Editar</a>";
            print "<button class='btn btn-danger btn-sm'>Excluir</button>";
            print "</td>";
            print "</tr>";
		}
        print "</tbody>";

		print "</table>";
        print"<a href='?page=index.php' class='btn btn-secondary'> Voltar </a>";
	}else{
		print "<p> Não encontrou resultado</p> ";
        print"<a href='?page=index.php' class='btn btn-secondary'> Voltar </a>";
	}



