<?php
include("header.php");

// Inicializar variáveis
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$nome_linha = '';
$status = 'N';
$id_categoria = 0;

// Verificar se o ID está presente para edição
if ($id > 0) {
    $sql = "SELECT nome, status, id_categoria FROM linhas WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $linha = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($linha) {
        $nome_linha = $linha['nome'];
        $status = $linha['status'];
        $id_categoria = $linha['id_categoria'];
    } else {
        // Redirecionar se a linha não for encontrada
        header("Location: Linhas.php");
        exit();
    }
}

// Processar o envio do formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_linha = trim($_POST['nome_linha']);
    $id_categoria = trim($_POST['id_categoria']);
    $status = 'N'; // Status padrão

    if (!empty($nome_linha)) {
        if ($id > 0) {
            // Atualizar linha existente
            $query = "UPDATE linhas SET nome = :nome, id_categoria = :id_categoria WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':nome', $nome_linha);
            $stmt->bindParam(':id_categoria', $id_categoria);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Linha atualizada com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Erro ao atualizar a linha.</div>";
            }
        } else {
            // Cadastrar nova linha
            $query = "INSERT INTO linhas (id_categoria, nome, status) VALUES (:id_categoria, :nome, :status)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id_categoria', $id_categoria);
            $stmt->bindParam(':nome', $nome_linha);
            $stmt->bindParam(':status', $status);
            
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Linha cadastrada com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Erro ao cadastrar a linha.</div>";
            }
        }
    } else {
        echo "<div class='alert alert-warning'>Por favor, preencha o nome da linha.</div>";
    }
}

// Carregar categorias para o formulário
$sql = "SELECT * FROM categorias";
$stmt = $db->query($sql);
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2><?php echo $id > 0 ? 'Editar Linha' : 'Criar Linha'; ?></h2>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome_linha">Nome</label>
            <input type="text" class="form-control" id="nome_linha" name="nome_linha" placeholder="Digite o nome da linha" value="<?php echo htmlspecialchars($nome_linha); ?>" required style="text-transform: uppercase;">
        </div>
        <div>
            <label for="id_categoria">Categoria: </label>
            <select class="form-select" id="id_categoria" name="id_categoria">
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?php echo htmlspecialchars($categoria['id']); ?>" <?php echo $categoria['id'] == $id_categoria ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($categoria['nome']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary"><?php echo $id > 0 ? 'Atualizar' : 'Cadastrar'; ?></button>
    </form>
</div>

<?php include("footer.php"); ?>
