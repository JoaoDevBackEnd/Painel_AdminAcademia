<?php
include("header.php");

// Inicializar variáveis
$id_categoria = isset($_POST['id_categoria']) ? intval($_POST['id_categoria']) : 0;
$categorias = [];
$linhas = [];

// Consultar todas as categorias
$sql = "SELECT * FROM categorias";
$stmt = $db->query($sql);
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Consultar linhas se uma categoria foi selecionada
if ($id_categoria > 0) {
    $sql_linha = "SELECT * FROM linhas WHERE id_categoria = :id_categoria";
    $stmt_linha = $db->prepare($sql_linha);
    $stmt_linha->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
    $stmt_linha->execute();
    $linhas = $stmt_linha->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="container">
    <label>CRIAR / EDITAR PRODUTO</label>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome_produto">NOME DO PRODUTO</label>
            <input type="text" class="form-control" id="nome_produto" name="nome_produto" placeholder="DIGITE O NOME DO PRODUTO" required style="text-transform: uppercase;">
        </div>

        <div class="mb-3">
            <label for="descricao_produto" class="form-label">DESCRIÇÃO DO PRODUTO</label>
            <textarea class="form-control" id="descricao_produto" name="descricao_produto" rows="3"></textarea>
        </div>

        <div>
            <label>CATEGORIA: </label>
            <select class="form-select" name="id_categoria" id="id_categoria" onchange="">
                <option value="">Selecione uma categoria</option>
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?php echo htmlspecialchars($categoria['id']); ?>" <?php echo ($id_categoria == $categoria['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($categoria['nome']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label>LINHA: </label>
            <select class="form-select" name="id_linha">
                <option value="">Selecione uma linha</option>
                <?php foreach ($linhas as $linha) : ?>
                    <option value="<?php echo htmlspecialchars($linha['id']); ?>">
                        <?php echo htmlspecialchars($linha['nome']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

<?php include("footer.php"); ?>
