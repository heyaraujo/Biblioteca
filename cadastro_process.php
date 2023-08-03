<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $imagem = file_get_contents($_FILES["imagem"]["tmp_name"]); /*Salvar a imagem no banco*/


    $pdo = new PDO('mysql:host=localhost;dbname=livros', 'root', '');

    $stmt_check = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username"); /*Procura no banco se tem user igual e informa que user já esxiste*/
    $stmt_check->bindParam(":username", $username);
    $stmt_check->execute();
    $count = $stmt_check->fetchColumn();

    if ($count > 0) {

        header("Location: cadastro.php?msg=error&error=duplicate");
        exit;
    }


    $stmt = $pdo->prepare("INSERT INTO users (username, password, imagem) VALUES (:username, :password , :imagem)");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":imagem", $imagem);

    if ($stmt->execute()) {
        header("Location: cadastro.php?msg=success");
        exit;
    } else {
        header("Location: cadastro.php?msg=error");
        exit;
    }

}
