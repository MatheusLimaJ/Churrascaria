<?php
include 'acesso_com.php';
include '../conn/connect.php';
if($_POST) // Se o usuario clicou no botão atualizar
{
    $id = $_POST['id'];
	$sigla = $_POST['sigla'];
	$rotulo = $_POST['rotulo'];

    $update = "update tipos set 
			   sigla = '$sigla',
               rotulo = '$rotulo',
               where id = $id;";

    $resultado = $conn -> query($update);
    if($resultado)
    {
        header('location:tipos_lista.php');
    }
}
if($_GET) // se vier dados enviados via get
{
    $id_form = $_GET['id']; // $id_form recebe o que foi enviado via get
}
else
{
    $id_form = 0; // senão recebe 0
}
$lista = $conn -> query ("select * from tipos where id = $id_form");
$row = $lista -> fetch_assoc();
 
 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Tipos - Altera</title>
</head>
<body>

<main class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-6  col-md-8">
            <h2 class="breadcrumb text-danger">
                <a href="produtos_lista.php">
                    <button class="btn btn-danger">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </button>
                </a>
                Alterando Tipos
            </h2>
            <div class="thumbnail">
                <div class="alert alert-danger" role="alert">
                    <form action="tipos_insere.php" method="post"
                    name="form_insere" enctype="multipart/form-data"
                    id="form_insere">
        
                            <label for="rotulo">Rótulo:</label>    
                        <div class="input-group">
                           <span class="input-group-addon">
                                <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                           </span>
                           <input type="text" name="rotulo" id="rotulo"
                                class="form-control" placeholder="Digite o Rotulo do tipo"
                                maxlength="100" required>
                        </div>  

                        <br>
                       
                        <label for="sigla">Sigla:</label>    
                        <div class="input-group">
                           <span class="input-group-addon">
                                <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                           </span>
                           <input type="text" name="sigla" id="sigla"
                                class="form-control" placeholder="Digite a Sigla do tipo"
                                maxlength="100" required>
                        </div>  
                       
                  

                        <br>
                        <input type="submit" name="enviar" id="enviar" class="btn btn-danger btn-block" value="Cadastrar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
 
 
</body>

</html>