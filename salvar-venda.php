<?php
    switch ($_REQUEST['acao']) {
        
        case 'cadastrar':
            $modelo = $_POST['modelo_id_modelo'];
            $cliente = $_POST['cliente_id_cliente'];
            $data = $_POST['data_venda'];
            $valor = $_POST['valor_venda'];

            $sql = "INSERT INTO venda (modelo_id_modelo, cliente_id_cliente, data_venda, valor_venda)
                    VALUES ({$modelo}, {$cliente}, '{$data}', {$valor})";

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Venda cadastrada com sucesso!');</script>";
                print "<script>location.href='?page=listar-venda';</script>";
            } else {
                print "<script>alert('Não foi possível cadastrar a venda!');</script>";
                print "<script>location.href='?page=listar-venda';</script>";
            }
            break;

        case 'editar':
            $modelo = $_POST['modelo_id_modelo'];
            $cliente = $_POST['cliente_id_cliente'];
            $data = $_POST['data_venda'];
            $valor = $_POST['valor_venda'];
            $id = $_POST['id_venda'];

            $sql = "UPDATE venda SET
                        modelo_id_modelo={$modelo},
                        cliente_id_cliente={$cliente},
                        data_venda='{$data}',
                        valor_venda={$valor}
                    WHERE id_venda=".$id;

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Venda editada com sucesso!');</script>";
                print "<script>location.href='?page=listar-venda';</script>";
            } else {
                print "<script>alert('Não foi possível editar a venda!');</script>";
                print "<script>location.href='?page=listar-venda';</script>";
            }
            break;

        case 'excluir':
            $sql = "DELETE FROM venda WHERE id_venda=".$_REQUEST['id_venda'];
            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Venda excluída com sucesso!');</script>";
                print "<script>location.href='?page=listar-venda';</script>";
            } else {
                print "<script>alert('Não foi possível excluir a venda!');</script>";
                print "<script>location.href='?page=listar-venda';</script>";
            }
            break;
    }
?>