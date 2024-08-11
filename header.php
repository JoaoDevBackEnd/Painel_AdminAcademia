<?php 
require_once("include/bd.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<!-- Meta tags Obrigatórias -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<title>Painel de Gerenciamento</title>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php">ADMIN</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="Imagens.php">IMAGENS HOME<span class="sr-only">(página atual)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="Linhas.php">LINHAS<span class="sr-only">(página atual)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="Categoria.php">CATEGORIAS<span class="sr-only">(página atual)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="Produtos.php">PRODUTOS<span class="sr-only">(página atual)</span></a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
			</form>
		</div>
	</nav>
