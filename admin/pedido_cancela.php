<?php 

include "../conn/connect.php";

$conn-> query("update pedidos set status = 'C' where id = " . $_GET['id']);
header("location: pedidos_lista.php");



?>