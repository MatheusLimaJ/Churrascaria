<?php
include '../conn/connect.php';

$id_form = 0;
if ($_GET) {
    $id_form = $_GET['id'];
}

$listaPedido = $conn->query("SELECT * FROM pedidos WHERE id = $id_form");
$row = $listaPedido->fetch_assoc();

if ($_POST) { // Se o usuário clicou no botão atualizar
    $pedido_id = $id_form;
    $mesa_id = $_POST['mesa'];
    $data_escolhida = $row['data_escolhida'];
    $horario = $row['horario'];
    $pessoas = $row['pessoas'];

    $insert = "INSERT INTO reservas (pedido_id, mesa_id, data, horario) VALUES ('$pedido_id', '$mesa_id', '$data_escolhida', '$horario')";
    $resultado = $conn->query($insert);

    if ($resultado) {
        header('Location: reservas_lista.php');
    } else {
        echo "Erro ao inserir reserva: " . $conn->error;
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
<?php include "../cliente/menu_cliente.php";?>
<main class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8">
            <h2 class="breadcrumb text-danger">
                <a href="pedidos.lista.php">
                    <button class="btn btn-danger">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </button>
                </a>
                Inserindo Reserva
            </h2>
            <div class="thumbnail">
                <div class="alert alert-danger" role="alert">
                    <form action="reservas_insere.php?id=<?php echo $id_form; ?>" method="post" name="form_insere" enctype="multipart/form-data" id="form_insere">
                        <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">

                        <label for="data">Data:</label>    
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                            </span>
                            <input type="date" name="data" id="data" class="form-control" value="<?php echo $row['data_escolhida']; ?>" placeholder="Digite a data de reserva" maxlength="100" disabled>
                        </div>
                        <br>
                        <label for="horario">Horário:</label>    
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                            </span>
                            <input type="time" name="horario" id="horario" value="<?php echo $row['horario']; ?>" class="form-control" placeholder="Digite o horário para reserva" maxlength="100" disabled>
                        </div>
                        <br>
                        <label for="pessoas">Pessoas:</label>    
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </span>
                            <input type="number" name="pessoas" id="pessoas" value="<?php echo $row['pessoas']; ?>" class="form-control" placeholder="Digite a quantidade de pessoas" maxlength="100" disabled>
                        </div>
                        <br>
                        <label for="motivo">Motivo:</label>    
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </span>
                            <input type="text" name="motivo" id="motivo" value="<?php echo $row['motivo']; ?>" class="form-control" placeholder="Digite o motivo da reserva" maxlength="100" disabled>
                        </div>
                        <br>
                        <label for="mesa">Mesa:</label>    
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                            </span>
                            <input type="number" name="mesa" id="mesa" class="form-control" placeholder="Digite o número da mesa" maxlength="100" required>
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
