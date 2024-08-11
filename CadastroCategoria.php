<?php
include("header.php");


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$nome_categoria = '';
$status = 'N';


if ($id > 0) {
    $sql = "SELECT nome, status FROM categorias WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $categoria = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($categoria) {
        $nome_categoria = $categoria['nome'];
        $status = $categoria['status'];
    } else {
       
        header("Location: Categoria.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_categoria = trim($_POST['nome_categoria']);
    
    if (!empty($nome_categoria)) {
        if ($id > 0) {
            // Atualizar categoria existente
            $query = "UPDATE categorias SET nome = :nome, status = :status WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':nome', $nome_categoria);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Categoria atualizada com sucesso!</div>";
            } 
        } else {
            // Cadastrar nova categoria
            $query = "INSERT INTO categorias (nome, status) VALUES (:nome, :status)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':nome', $nome_categoria);
            $stmt->bindParam(':status', $status);
            
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Categoria cadastrada com sucesso!</div>";
            } 
        }
    } else {
        echo "<div class='alert alert-warning'>Por favor, preencha o nome da categoria.</div>";
    }
}
?>

<div class="container">
    <label><?php echo $id > 0 ? 'EDITAR CATEGORIA' : 'CRIAR CATEGORIA'; ?></label>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome_categoria">NOME DA CATEGORIA</label>
            <input type="text" class="form-control" id="nome_categoria" name="nome_categoria" placeholder="DIGITE O NOME DA CATEGORIA" value="<?php echo htmlspecialchars($nome_categoria); ?>" required style="text-transform: uppercase;">
        </div>
        <button type="submit" class="btn btn-primary"><?php echo $id > 0 ? 'Atualizar' : 'Cadastrar'; ?></button>
    </form>
</div>

<?php include("footer.php"); ?>
