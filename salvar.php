<?php
require_once 'util.php';

try {
    $conn = new PDO('mysql:host=localhost;dbname=livros', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];
    $genero = $_POST['genero'];

    
    $titulo = Util::limpeza($titulo);
    $autor = Util::limpeza($autor);
    $ano = Util::limpeza($ano);
    $genero = Util::limpeza($genero);

    $sql = "INSERT INTO livros (titulo, autor, ano, genero) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$titulo, $autor, $ano, $genero]);

    echo "Livro cadastrado com sucesso!";
} catch(PDOException $e) {
    echo "Erro ao cadastrar o livro: " . $e->getMessage();
}

if ($stmt->execute()) {
    header("Location: index.php?msg=success");
    exit;
} else {
    header("Location: index.php?msg=error");
    exit;
}