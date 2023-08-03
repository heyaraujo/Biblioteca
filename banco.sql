CREATE TABLE livros (
  id INT PRIMARY KEY AUTO_INCREMENT,
  titulo VARCHAR(100) NOT NULL,
  autor VARCHAR(100) NOT NULL,
  ano INT NOT NULL,
  genero VARCHAR(50) NOT NULL
);



CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  access_level INT NOT NULL DEFAULT 1
);

UPDATE users
SET access_level = 2
WHERE id = ;

ALTER TABLE users ADD CONSTRAINT unique_username UNIQUE (username);

ALTER TABLE users ADD Imagem longblob NOT NULL;

