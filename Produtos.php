<?php
include("header.php");
// Consultar categorias
$sql = "
    SELECT produtos.id, produtos.imagem, produtos.nome, produtos.status,produtos.descricao,linhas.nome AS nome_linha ,categorias.nome AS nome_categoria 
    FROM produtos 
    INNER JOIN linhas ON produtos.id_linha = linhas.id
    INNER JOIN categorias ON linhas.id_categoria = categorias.id
";
$stmt = $db->query($sql);
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <label>PÁGINA PRODUTOS</label>
    <div class="col-lg-12" style="text-align: right;">
        <a href="CadastrarProduto.php" class="btn btn-success" role="button">
            CRIAR UMA NOVO PRODUTO
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">#</th>
                <th scope="col">IMAGEM</th>
                <th scope="col">Nome</th>
                <th scope="col">CATEGORIA</th>
                <th scope="col">LINHA</th>
                <th scope="col">DESCRIÇÃO</th>
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <th scope="row"><?php echo htmlspecialchars($categoria['id']); ?></th>
                    <td><?php echo htmlspecialchars($categoria['imagem']); ?></td>
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
