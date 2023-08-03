<?php
require_once "cabeçalho.php";
require_once 'util.php';
try {
    $conn = new PDO('mysql:host=localhost;dbname=livros', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $sql = "SELECT * FROM livros";
    $livros = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Erro ao buscar os livros: " . $e->getMessage();
}
?>

  <h2>Lista de Livros</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Título</th>
      <th>Autor</th>
      <th>Ano de Publicação</th>
      <th>Gênero</th>
    </tr>
    <?php foreach ($livros as $livro): ?>
    <tr>
      <td><?php echo $livro['id']; ?></td>
      <td><?php echo $livro['titulo']; ?></td>
      <td><?php echo $livro['autor']; ?></td>
      <td><?php echo $livro['ano']; ?></td>
      <td><?php echo $livro['genero']; ?></td>
    </tr>
    <?php endforeach; ?>
  </table>

</body>
</html>
