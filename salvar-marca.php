<?php 
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$nome = $_POST['nome_marca'];

			$sql = "INSERT INTO marca (nome_marca)
					VALUES ('{$nome}')";

			

			$res = $conn->query($sql);

			if($res == true){
				print "<script>alert('Cadastrou com sucesso!');</script>";
				print "<script>location.href='?page=listar-marca';</script>";
			}else{
				print "<script>alert('Não Cadastrou!');</script>";
				print "<script>location.href='?page=listar-marca';</script>";
			}
			break;
		case 'editar':
			// code ...
			break;

		case 'excluir':
			// code ...
			break;
	}

?>