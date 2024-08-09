<?php
include 'acesso_com.php';
include '../conn/connect.php';
// implementação backend a partir daqui...

if($_POST)
{
    $id = $_POST['id_tipo'];
    $destaque = $_POST['destaque'];
    $descricao = $_POST['descricao'];
    $resumo = $_POST['resumo'];
    $valor = $_POST['valor'];
    $imagem = $rand.$nome_img;
    $insereProduto = "INSERT produtos (tipo_id, descricao, resumo, valor, imagem, destaque) 
    values ($id, '$descricao', '$resumo', '$valor', '$imagem', '$destaque')";
    $resultado = $conn -> query($insereProduto);
    if(mysqli_insert_id($conn))
    {
        header('location:produtos_lista.php');
    }
}

// selecionar a lista de tipos para preencher p <select>
$listaTipo = $conn -> query("select * from tipos order by rotulo");
$rowTipo = $listaTipo -> fetch_assoc();
$numLinhas = $listaTipo -> num_rows;




 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Tipos - Insere</title>
</head>
<body>
<?php?>
<main class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-6  col-md-8">
            <h2 class="breadcrumb text-danger">
                <a href="produtos_lista.php">
                    <button class="btn btn-danger">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </button>
                </a>
                Inserindo Tipos
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