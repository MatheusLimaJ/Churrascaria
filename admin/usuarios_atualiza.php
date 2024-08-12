<?php
include 'acesso_com.php';
include '../conn/connect.php';
if($_POST) // Se o usuario clicou no botão atualizar
{
    $id = $_POST['id'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
    $nivel = $_POST['nivel'];

    $update = "update usuarios set 
			   login= '$login',
               senha = '$senha',
               nivel = '$nivel'
               where id = $id;";

    $resultado = $conn -> query($update);
    if($resultado)
    {
        header('location:usuarios_lista.php');
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
$lista = $conn -> query("select * from usuarios where id = $id_form");
$row = $lista -> fetch_assoc();
 
 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Usuarios - Altera</title>
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
                Alterando Usuarios
            </h2>
            <div class="thumbnail">
                <div class="alert alert-danger" role="alert">
                    <form action="usuarios_atualiza.php" method="post"
                    name="form_atualiza" enctype="multipart/form-data"
                    id="form_atualiza">
        
                       
                    <input type="hidden" name="id" id="id" value=" <?php echo $row['id']; ?>  ">

                    
                    <label for="login">Login:</label>    
                        <div class="input-group">
                           <span class="input-group-addon">
                                <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                           </span>
                           <input type="text" name="login" id="login"
                                class="form-control" placeholder="Digite o Login do usuario"
                                maxlength="100" value ="<?php echo $row['login'] ?>" required>
                        </div>  

                        <br>
                       
                        <label for="senha">Senha:</label>    
                        <div class="input-group">
                           <span class="input-group-addon">
                                <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                           </span>
                           <input type="text" name="senha" id="senha"
                                class="form-control" placeholder="Digite uma nova senha"
                                maxlength="100" value="" required>
                        </div>  

                        <label for="nivel">Nível:</label>
                        <div class="input-group">
                            <label for="nivel_c" class="radio-inline">
                                <input type="radio" name="nivel" id="nivel_c" value="Com"
                                <?php  echo $row['nivel'] == "com" ? "checked" : null; ?> >Comum
                            </label>
                            <label for="nivel_s" class="radio-inline">
                                <input type="radio" name="nivel" id="nivel_s" value="Sup" 
                                <?php echo $row['nivel'] == "sup" ? "checked" : null; ?> >Super
                            </label>
                        </div>
                       
                  

                        <br>
                        <input type="submit" name="enviar" id="enviar" class="btn btn-danger btn-block" value="Alterar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
 
 
</body>


 

</html>