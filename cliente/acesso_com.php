<?php 

session_name('chuletaaa'); // Define um nome para a Sessão

// Uso da ! para negação
if(!isset($_SESSION)) // Se não estiver atribuido
{
    session_start();
} 

// Segurança digital

// Verificar se o usuário está logado
if(!isset($_SESSION['login_cliente']))
{
    // se não existir, redirecionamos a sessão por segurança
    header('location: ../cliente/pedido_solicita.php'); // redirecionamento
    exit; 
}

$nome_da_sessao = session_name();
if(!isset($_SESSION['nome_da_sessao']) or ($_SESSION['nome_da_sessao'] != $nome_da_sessao))
{
    session_destroy();
    header('location:login.php');
}






?>