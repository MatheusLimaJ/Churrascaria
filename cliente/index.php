<?php 
    include '../admin/acesso_com.php';

?>

<h2>
    <strong>
        <?php 
            echo $_GET['cliente']
        ?>     
    </strong>, Bem vindo à área de cliente!
</h2>

<a href="../admin/logout.php">
    sair
</a>