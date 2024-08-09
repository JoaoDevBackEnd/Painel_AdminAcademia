<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status_linha = $_POST['status'];
    
    $novo_status = ($status_linha == 'Y') ? 'N' : 'Y';

    $sql = "UPDATE categorias SET status = :status WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':status', $novo_status);
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        header("Location: Categoria.php");
    }
}
?>
