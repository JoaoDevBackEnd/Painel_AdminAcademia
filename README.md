Criação de Tabelas no banco de dados 
Modifcar o arquivo db.php com a conexão do seu banco de dados 
	
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    status CHAR(1) NOT NULL DEFAULT 'N'
);


CREATE TABLE linhas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    status CHAR(1) NOT NULL DEFAULT 'N',
    id_categoria INT,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id) 
);


CREATE TABLE imagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    imagem VARCHAR(255) NOT NULL,
    status CHAR(1) NOT NULL DEFAULT 'N'
);


CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_categoria INT,
    id_linha INT,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    imagem VARCHAR(255),
    FOREIGN KEY (id_categoria) REFERENCES categorias(id),
    FOREIGN KEY (id_linha) REFERENCES linhas(id) 
);
