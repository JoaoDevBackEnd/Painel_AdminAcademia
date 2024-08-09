<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];
    
    $novo_status = ($status == 'Y') ? 'N' : 'Y';

    $sql = "UPDATE linhas SET status = :status WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':status', $novo_status);
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        header("Location: Linhas.php");
    }
}
?>
