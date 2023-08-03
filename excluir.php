 <?php
    require_once 'util.php';
    require_once "cabeçalho.php";

    if (isset($_POST['submit'])) {

        $hostname = 'localhost';
        $database = 'livros';

        $conexao = mysqli_connect($hostname, 'root', '', $database);

        if ($conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
        }


        $livro_id = Util::limpeza($_POST['livro_id']);


        $consulta = "DELETE FROM livros WHERE id = '$livro_id'";


        if ($conexao->query($consulta) === TRUE) {
            echo "Livro excluído com sucesso.";
        } else {
            echo "Erro ao excluir o livro: " . $conexao->error;
        }


        $conexao->close();
    }
    ?>

    <h2>Excluir Livro</h2>
    <form method="post" action="">
        <label>ID do Livro:</label>
        <input type="text" name="livro_id">
        <br>
        <input type="submit"  class="entrar" name="submit" value="Excluir">
    </form>
</body>

</html>