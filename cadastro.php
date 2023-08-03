<?php
require_once 'util.php';
require_once "cabeçalho.php";

if (isset($_GET["msg"])) {

    $message = $_GET["msg"];
    if ($message === "success") {
        echo "Usuário cadastrado com sucesso!";
    } elseif ($message === "error") {
        echo "Usuário já existe.";
    }
}
?>

<h3>Cadastro de Usuário</h3>
<form action="cadastro_process.php" enctype="multipart/form-data" method="post">
    <label for="username">Usuário:</label>
    <input type="text" name="username" required>
    <br>
    <label for="password">Senha:</label>
    <input type="password" name="password" required>
    <br>
        <input type="file" name="imagem" accept="image/*"> 
        <div class="form-footer">
        <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
    </div>
       <input type="submit" class="entrar" value="Cadastrar"> 
</form>
</body>

</html>