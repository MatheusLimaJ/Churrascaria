<?php


 
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
                    <form action="reservas_insere.php" method="post" name="form_insere" enctype="multipart/form-data" id="form_insere">
                        <br>
                        <label for="mesas">Mesas:</label>    
                        <div class="input-group">
                           <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                           </span>
                           <input type="number" name="mesas" id="mesas" class="form-control" placeholder="Digite o número da mesa." maxlength="100" required>
                        </div>  
                       
                        <input type="submit" name="enviar" id="enviar" class="btn btn-danger btn-block" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
  
</body>

</html>