<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_linha = trim($_POST['nome_linha']);
    $status = 'N'; 
    $id_categoria = trim($_POST['id_categoria']);

    if (!empty($nome_linha)) {
        $query = "INSERT INTO linhas (id_categoria, nome, status) VALUES (:id_categoria, :nome, :status)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id_categoria', $id_categoria);
        $stmt->bindParam(':nome', $nome_linha);
        $stmt->bindParam(':status', $status);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Linha cadastrada com sucesso!</div>";
        } else {
            echo "<div class='alert alert-danger'>Erro ao cadastrar essa Linha.</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Por favor, preencha o nome da nova Linha.</div>";
    }
}
?>
