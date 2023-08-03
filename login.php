<?php
require_once "cabeçalho.php";
require_once 'util.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $pdo = new PDO('mysql:host=localhost;dbname=livros', 'root', '');

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["access_level"] = $user["access_level"];
        
        
        header("Location: visualizar.php");
        exit;
    } else {
        
        $login_error = "Usuário ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h3>Login</h3>
    <?php if (isset($login_error)) { ?>
        <p><?php echo $login_error; ?></p>
    <?php } ?>
    <form action="login.php" method="post">
        <label for="username">Usuário:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Senha:</label>
        <input type="password" name="password" required>
        <br>
        <div class="form-footer">
                    <p>Não tem uma conta? <a href="cadastro.php">Cadastrar-se</a></p>
                </div>
        <input type="submit"  class="entrar" value="Entrar">
    </form>
</body>
</html>
