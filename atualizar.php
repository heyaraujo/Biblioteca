<?php

$host = 'localhost';
$dbname = 'livros';
$username = 'root';
$password = '';

try {
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['livro_id'])) {
        $livroId = filter_input(INPUT_GET, 'livro_id', FILTER_VALIDATE_INT);

  
        if ($livroId === false || $livroId === null) {
            echo "ID do livro inválido.";
            exit;
        }

       
        $sql = "SELECT * FROM livros WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $livroId, PDO::PARAM_INT);
        $stmt->execute();

        
        if ($stmt->rowCount() > 0) {
            $livro = $stmt->fetch(PDO::FETCH_ASSOC);
            
            
            $livroId = $livro['id'];
            $titulo = $livro['titulo'];
            $autor = $livro['autor'];
            $ano = $livro['ano'];
            $genero = $livro['genero'];

        
        } else {
            echo "Livro não encontrado.";
        }
    } else {
        echo "ID do livro não especificado.";
    }
} catch (PDOException $e) {
    echo "Erro ao buscar o livro: " . $e->getMessage();
}
?>

