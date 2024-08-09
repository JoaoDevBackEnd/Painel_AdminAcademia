<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome_categoria = trim($_POST['nome_categoria']);
        $status = 'N'; 
    
        if (!empty($nome_categoria)) {
            $query = "INSERT INTO categorias (nome, status) VALUES (:nome, :status)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':nome', $nome_categoria);
            $stmt->bindParam(':status', $status);
    
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Categoria cadastrada com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Erro ao cadastrar categoria.</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>Por favor, preencha o nome da categoria.</div>";
        }
    }
?>