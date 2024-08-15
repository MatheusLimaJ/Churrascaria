<?php

include "acesso_com.php";
include '../conn/connect.php';

// implementação backend a partir daqui...




$cliente_id = $_SESSION['cliente_id'];

if($_POST)
{
            $cliente_id = $_SESSION['cliente_id'];
            $usuario_id = 5;
            $data_escolhida = $_POST['data'];
            $horario = $_POST['horario'];
            $pessoas = $_POST['pessoas'];
            $motivo = $_POST['motivo'];
            $status = "P";
            $motivo_negacao = '';

            $inserePedido = "INSERT into pedidos(cliente_id, usuario_id, data_escolhida, horario, pessoas, motivo, status, motivo_negacao) 
            values ($cliente_id, $usuario_id, '$data_escolhida', '$horario', $pessoas, '$motivo', '$status', '$motivo_negacao')";
            $resultado = $conn -> query($inserePedido);
            if ($resultado){
                echo "Pedido inserido com sucesso!";
            } else {
                echo "Erro ao inserir pedido: " . $conn->error;
            }

}
 

 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Pedido - Insere</title>
</head>
<body>
<?php include "menu_cliente.php";?>
<main class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8">
            <h2 class="breadcrumb text-danger">
                <a href="pedidos.lista.php">
                    <button class="btn btn-danger">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </button>
                </a>
                Pedido de Reserva
            </h2>
            <div class="thumbnail">
                <div class="alert alert-danger" role="alert">
                    <form action="pedido_solicita.php" method="post" name="form_insere" enctype="multipart/form-data" id="form_insere">
                        <label for="data">Data:</label>    
                        <div class="input-group">
                           <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                           </span>
                           <input type="date" name="data" id="data" class="form-control" placeholder="Digite a data de reserva" maxlength="100" required>
                        </div>  
                        <br>
                        <label for="horario">Horário:</label>    
                        <div class="input-group">
                           <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                           </span>
                           <input type="time" name="horario" id="horario" class="form-control" placeholder="Digite o horário para reserva" maxlength="100" required>
                        </div>  
                        <br>
                        <label for="pessoas">Pessoas:</label>    
                        <div class="input-group">
                           <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                           </span>
                           <input type="number" name="pessoas" id="pessoas" class="form-control" placeholder="Digite a quantidade de pessoas" maxlength="100" required>
                        </div>  
                        <br>
                        <label for="motivo">Motivo:</label>    
                        <div class="input-group">
                           <span class="input-group-addon">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                           </span>
                           <input type="text" name="motivo" id="motivo" class="form-control" placeholder="Digite o motivo da reserva" maxlength="100" required>
                        </div>  
                        <br>
                        <input type="submit" name="enviar" id="enviar" class="btn btn-danger btn-block" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
  
</body>

</html>