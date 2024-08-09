<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_imagem = trim($_POST['nome_imagem']);
    $status = 'N';

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $file_name = $_FILES['imagem']['name'];
        $file_tmp = $_FILES['imagem']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $file_new_name = uniqid('', true) . '.' . $file_ext;
        $upload_path = 'uploads/' . $file_new_name;

        if (move_uploaded_file($file_tmp, $upload_path)) {
            $sql = "INSERT INTO imagens (nome, imagem, status) VALUES (:nome_imagem, :imagem, :status)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':nome_imagem', $nome_imagem);
            $stmt->bindParam(':imagem', $file_new_name);
            $stmt->bindParam(':status', $status);

            if ($stmt->execute()) {
                echo "Imagem cadastrada com sucesso!";
            } else {
                echo "Erro ao cadastrar a imagem no banco de dados.";
            }
        }
    } 
}
?>