<?php
include("header.php");
// Consultar categorias
$sql = "
    SELECT linhas.id, linhas.nome, linhas.status, categorias.nome AS nome_categoria 
    FROM linhas 
    INNER JOIN categorias ON linhas.id_categoria = categorias.id
";
$stmt = $db->query($sql);
$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <label>PÁGINA LINHA</label>
    <div class="col-lg-12" style="text-align: right;">
        <a href="CadastroLinha.php" class="btn btn-success" role="button">
            CRIAR UMA NOVA LINHA
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">NOME</th>
                <th scope="col">CATEGORIA</th>
                <th scope="col">Qtd.Produtos Cadastrado</th>
                <th scope="col">STATUS</th>
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($linhas as $linha): ?>
                <tr>
                    <th scope="row"><?php echo htmlspecialchars($linha['id']); ?></th>
                    <td><?php echo htmlspecialchars($linha['nome']); ?></td>
                    <td><?php echo htmlspecialchars($linha['nome_categoria']); ?></td> 
                    <td>---</td> <!-- Substitua por dados reais -->
                    <td>
                        <form method="post" action="Linhas.php" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($linha['id']); ?>">
                            <button type="submit" name="status" value="<?php echo $linha['status']; ?>" 
                                class="btn btn-<?php echo $linha['status'] == 'Y' ? 'success' : 'danger'; ?>">
                                <?php echo $linha['status'] == 'Y' ? 'Ativado' : 'Desativado'; ?>
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="editar_categoria.php?id=<?php echo $linha['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="deletar_categoria.php?id=<?php echo $linha['id']; ?>" class="btn btn-danger">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include("footer.php"); ?>
