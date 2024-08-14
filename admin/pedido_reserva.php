<?php
include 'acesso_com.php';
include '../conn/connect.php';



    if(isset($_GET['id']))
    {
        $id_form = intval($_GET['id']);
        $usuario_id = isset($_SESSION['usuario_id']);
        $status = "A";
        $atualizaPedido = "UPDATE pedidos set
                       usuario_id = $usuario_id,
                       status = '$status'
                       where id = $id_form";
        $resultado = $conn -> query($atualizaPedido);
    if($resultado)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $pedido_id = intval($_GET['id']);
            $mesa_id = $_POST['mesas'];
            
            $insereReserva = "INSERT into reservas(pedido_id, mesa_id, data, horario) 
            values ($pedido_id, '$mesa_id', '$data', '$horario')";
            $resultado = $conn -> query($insereReserva);
        }
    }
    }
    else
    {
        echo "Erro ao atualizar o pedido";
    }
    

    include 'reservas_insere.php';
?>