<?php
require_once "cabeçalho.php";
if (isset($_GET["msg"])) {
   
  $message = $_GET["msg"];
  if ($message === "success") {
      echo "Livro Cadastrado com Sucesso!";
  } elseif ($message === "error") {
      echo "Erro em cadastra o livro.";
  }
}

?>
  <h2>Cadastrar Livro</h2>
  <form action="salvar.php" method="POST">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" required><br><br>
    
    <label for="autor">Autor:</label>
    <input type="text" name="autor" id="autor" required><br><br>
    
    <label for="ano">Ano de Publicação:</label>
    <input type="number" class="custom-input" name="ano" id="ano" required><br><br>
    
    <label for="genero">Gênero:</label>
    <input type="text" name="genero" id="genero" required><br><br>
    
    <input type="submit" class="entrar" value="Cadastrar">
  </form>
</body>
</html>
