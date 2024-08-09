<?php
include("header.php");
// Consultar categorias
$sql = "SELECT * FROM categorias";
$stmt = $db->query($sql);
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <label>PÁGINA CATEGORIA</label>
    <div class="col-lg-12" style="text-align: right;">
        <a href="CadastroCategoria.php" class="btn btn-success" role="button">
            CRIAR UMA NOVA CATEGORIA
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">NOME</th>
                <th scope="col">Qtd.Linhas Cadastrada</th>
                <th scope="col">Qtd.Produtos Cadastrado</th>
                <th scope="col">STATUS</th>
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <th scope="row"><?php echo htmlspecialchars($categoria['id']); ?></th>
                    <td><?php echo htmlspecialchars($categoria['nome']); ?></td>
                    <td>---</td> <!-- Substitua por dados reais -->
                    <td>---</td> <!-- Substitua por dados reais -->
                    <td>
                        <form method="post" action="Categoria.php" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($categoria['id']); ?>">
                            <button type="submit" name="status" value="<?php echo $categoria['status']; ?>" 
                                class="btn btn-<?php echo $categoria['status'] == 'Y' ? 'success' : 'danger'; ?>">
                                <?php echo $categoria['status'] == 'Y' ? 'Ativado' : 'Desativado'; ?>
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="editar_categoria.php?id=<?php echo $categoria['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="deletar_categoria.php?id=<?php echo $categoria['id']; ?>" class="btn btn-danger">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include("footer.php"); ?>
