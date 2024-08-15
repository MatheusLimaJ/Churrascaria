<?php 
    
include "../conn/connect.php";

$conn-> query("update reservas set ativo = 0 where id = " . $_GET['id']);
header("location: reservas_lista.php");

?>