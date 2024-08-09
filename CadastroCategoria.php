<?php 
	include("header.php");
?>

<div class="container">
    <label>CRIAR / EDITAR CATEGORIA</label>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome_categoria">NOME DA CATEGORIA</label>
            <input type="text" class="form-control" id="nome_categoria" name="nome_categoria" placeholder="DIGITE O NOME DA CATEGORIA" required style="text-transform: uppercase;">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

<?php include("footer.php"); ?>
