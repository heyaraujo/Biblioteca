<?php
  require_once 'util.php';
session_start();
function isAdmin()
{
  return isset($_SESSION["access_level"]) && $_SESSION["access_level"] > 1;
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Biblioteca</title>
  <link rel="stylesheet" href="atv.css" />

</head>   

<body>
<nav class="navbar">
    <ul class="menu cf">
        <?php if (!isset($_SESSION ["user_id"])):?>
        <li><a href="login.php">Login</a></li>
        <?php endif;?>
        <?php if (isAdmin()) { ?>
            <li><a href="index.php">Cadastrar Livro</a></li>
            <li><a href="editar.php">Editar Livros</a></li>
            <li><a href="excluir.php">Excluir Livros</a></li>
        <?php } ?>
        
        <?php if (isset($_SESSION["user_id"])):?> 
        <li><a href="visualizar.php">Tabela de Livros</a></li>
        <li><a href="logout.php">Logout</a></li>
       
        <?php endif;?>
    </ul>
</nav>
