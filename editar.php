<?php
require_once 'util.php';
require_once "cabeçalho.php";
$hostname = "localhost";
$database = "livros";
$username = "root";
$password = "";


$conexao = mysqli_connect($hostname, $username, $password, $database);

if (mysqli_connect_errno()) {
  die("Falha na conexão: " . mysqli_connect_error());
}
require_once 'atualizar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $livroId = $_POST["livro_id"];
  $titulo = $_POST["titulo"];
  $autor = $_POST["autor"];
  $ano = $_POST["ano"];
  $genero = $_POST["genero"];


  $sql = "UPDATE livros SET titulo = '$titulo', autor = '$autor', ano = '$ano', genero = '$genero' WHERE id = '$livroId'";
  if (mysqli_query($conexao, $sql)) {
    
    header("Location: confirmacao.php");
    exit();
  } else {
    echo "Erro ao atualizar o livro: " . mysqli_error($conexao);
  }
}


$sql = "SELECT id FROM livros";
$resultado = mysqli_query($conexao, $sql);


$livrosIds = array();
while ($livro = mysqli_fetch_assoc($resultado)) {
  $livrosIds[] = $livro['id'];
}


if (isset($_GET["livro_id"]) && in_array($_GET["livro_id"], $livrosIds)) {
  $livroId = $_GET["livro_id"];

  $sql = "SELECT * FROM livros WHERE id = '$livroId'";
  $resultado = mysqli_query($conexao, $sql);
  $livro = mysqli_fetch_assoc($resultado);
  
  ?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>Editar Livro</title>
  </head>

  <body>
    <h2>Editar Livro</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <input type="hidden" name="livro_id" value="<?php echo $livro['id']; ?>">
      <label for="titulo">Título:</label>
      <input type="text" name="titulo" id="titulo" value="<?php echo $livro['titulo']; ?>" required><br><br>
      <label for="autor">Autor:</label>
      <input type="text" name="autor" id="autor" value="<?php echo $livro['autor']; ?>" required><br><br>
      <label for="ano">Ano de Publicação:</label>
      <input type="number" name="ano" id="ano" value="<?php echo $livro['ano']; ?>" required><br><br>
      <label for="genero">Gênero:</label>
      <input type="text" name="genero" id="genero" value="<?php echo $livro['genero']; ?>" required><br><br>
      <input type="submit"  class="entrar" value="Atualizar">
    </form>
  </body>

  </html>
<?php
} else {
  echo "Selecione o ID do livro:<br>";
  foreach ($livrosIds as $livroId) {
    echo "<a href='" . $_SERVER['PHP_SELF'] . "?livro_id=$livroId'>$livroId</a><br>";
  }
}

mysqli_close($conexao);
?>