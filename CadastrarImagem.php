<?php 
	include_once("header.php");
?>

<div class="container">
    <label>SALVAR IMAGEM</label>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome_imagem">NOME DA IMAGEM</label>
            <input type="text" class="form-control" id="nome_imagem" name="nome_imagem" placeholder="DIGITE O NOME DA CATEGORIA" required style="text-transform: uppercase;">
        </div>
        <div class="form-group">
            <label for="imagem">Selecione a imagem:</label>
            <input type="file" class="form-control" id="imagem" name="imagem" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
<?php include_once("footer.php"); ?>
