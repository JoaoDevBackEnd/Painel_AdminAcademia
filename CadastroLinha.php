<?php 
include("header.php");

$sql = "SELECT * FROM categorias";
$stmt = $db->query($sql);
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <label>CRIAR / EDITAR CATEGORIA</label>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome_linha">NOME</label>
            <input type="text" class="form-control" id="nome_linha" name="nome_linha" placeholder="DIGITE O NOME DA LINHA" required style="text-transform: uppercase;">
        </div>
        <div>
            <label>CATEGORIA: </label>
            <select class="form-select" name="id_categoria">
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?php echo htmlspecialchars($categoria['id']); ?>">
                        <?php echo htmlspecialchars($categoria['nome']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
       
        <br>
        <div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
</div>

<?php include("footer.php"); ?>
