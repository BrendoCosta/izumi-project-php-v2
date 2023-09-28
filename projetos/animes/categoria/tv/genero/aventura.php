<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<!--
			# "Four Moe Friends" theme
			# by 2020 - Neofox
			# Distributed under "Creative Commons BY-NC-SA 4.0" license
			# Last update: feb 5, 2020
		-->
		<!-- Page meta tags -->
		<!-- The three tags below must necessarily come first, before all others -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Additional meta tags -->
		<meta name="description" content="Animes - TV - Aventura">
		<meta name="keywords" content="Anime,Animes,Manga,Mangá,Mangás,Download,Baixar,Moe">
		<meta name="author" content="Neofox">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 8]>
            <script src="https://raw.githubusercontent.com/aFarkas/html5shiv/master/dist/html5shiv.min.js"></script>
            <script src="https://raw.githubusercontent.com/scottjehl/Respond/master/src/respond.js"></script>
        <![endif]-->
		<!-- Page favicon -->
		<link rel="shortcut icon" href="../../../../../images/global/favicon.png"/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="../../../../../css/style.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Page title -->
		<?php $page_title = "Animes - TV - Aventura | Izumi✰Project"; ?>
		<title><?php echo $page_title ?></title>
		<?php
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$page_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		?>
	</head>
	<body>
    <?php include('../../../../../h_topnavMenu.php'); ?>
    <?php include('../../../../../h_topbar.php'); ?>
  	<?php include('../../../../../h_sidenav.php'); ?>
    <div id="content">
      <div id="post-wrapper" style="width: 98.5%; margin-right: 0;">
        <div class="post" style="padding: 1em;">
					<h1>Animes > TV > Aventura</h1>
					<div id="separador"></div>
					<input id="searchbar" onkeyup="search_animal()" type="text" name="search" placeholder="Pesquisar por nome..."></input>
  <form>
      <select id="categoria" name="categoria" onchange="categoriaF()">
      <option value="1">Todas as categorias</option>
      <option value="2" selected>TV</option>
      <option value="3">OVA</option>
      <option value="4">ONA</option>
      <option value="5">Filme</option>
    </select>
      <select id="genero" name="genero" onchange="generoF()">
      <option value="1">Todos os gêneros</option>
      <option value="2">Ação</option>
      <option value="3" selected>Aventura</option>
      <option value="4">Slice-of-life</option>
      <option value="5">Comédia</option>
      <option value="6">Romance</option>
      <option value="7">Drama</option>
      <option value="8">Fantasia</option>
      <option value="9">Ficção científica</option>
      <option value="10">Escola</option>
    </select>
  </form>
					<br />
				<h2>Todos</h2>
				<div id="separador"></div>
				<ol id='list' class="ol-row">
					<?php include('../../../../../cards-projetos/girls-und-panzer/card.php'); ?>
					<?php include('../../../../../cards-projetos/mitsuboshi-colors/card.php'); ?>
					<?php include('../../../../../cards-projetos/urahara/card.php'); ?>
					</ol>
        </div>
      </div>
      <?php include('../../../../../h_footer.php'); ?>
      </div>
      <?php include('../../../../../h_topbutton.php'); ?>
      <!-- Page scripts -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
      <script type="text/javascript" src="../../../../../../scripts/sidenav_accordion.js"></script>
      <script type="text/javascript" src="../../../../../../scripts/topnav_accordion.js"></script>
      <script type="text/javascript" src="../../../../../../scripts/top-button.js"></script>
			<script>
				// Barra de pesquisa
				function search_animal() {
    			let input = document.getElementById('searchbar').value
    			input=input.toLowerCase();
    			let x = document.getElementsByClassName('projeto-card');

    			for (i = 0; i < x.length; i++) {
        		if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
        		}
        		else {
            x[i].style.display="inline-block";
        		}
    			}
				}
			</script>
			<script>
				function categoriaF() {
					var cat = document.getElementById("categoria").value;
					if (cat === "1") {
						if (window.location.href === "https://izumiproject.com.br/projetos/animes") {
							 // Não fazer nada!
						}
						else {
							// Ir para o index principal
							window.location.href = ("https://izumiproject.com.br/projetos/animes");
						}
					}
					if (cat === "2") {
						if (window.location.href === "https://izumiproject.com.br/projetos/animes/categoria/tv") {
							 // Não fazer nada!
						}
						else {
							// Ir para /categoria/tv
							window.location.href = ("https://izumiproject.com.br/projetos/animes/categoria/tv");
						}
					}
					if (cat === "3") {
						if (window.location.href === "https://izumiproject.com.br/projetos/animes/categoria/ova") {
							 // Não fazer nada!
						}
						else {
							// Ir para /categoria/ova
							window.location.href = ("https://izumiproject.com.br/projetos/animes/categoria/ova");
						}
					}
					if (cat === "4") {
						if (window.location.href === "https://izumiproject.com.br/projetos/animes/categoria/ona") {
							 // Não fazer nada!
						}
						else {
							// Ir para /categoria/ona
							window.location.href = ("https://izumiproject.com.br/projetos/animes/categoria/ona");
						}
					}
					if (cat === "5") {
						if (window.location.href === "https://izumiproject.com.br/projetos/animes/categoria/filme") {
							 // Não fazer nada!
						}
						else {
							// Ir para /categoria/filme
							window.location.href = ("https://izumiproject.com.br/projetos/animes/categoria/filme");
						}
					}
				}
				function generoF() {
					var gen = document.getElementById("genero").value;
					if (gen === "1") {
						if (window.location.href === "https://izumiproject.com.br/projetos/animes/categoria/tv") {
							 // Não fazer nada!
						}
						else {
							// Ir para o index principal
							window.location.href = ("https://izumiproject.com.br/projetos/animes/categoria/tv");
						}
					}
					if (gen === "2") {
						if (window.location.href === "https://izumiproject.com.br/projetos/animes/categoria/tv/genero/acao") {
							 // Não fazer nada!
						}
						else {
							// Ir para /categoria/tv
							window.location.href = ("https://izumiproject.com.br/projetos/animes/categoria/tv/genero/acao");
						}
					}
					if (gen === "3") {
						if (window.location.href === "https://izumiproject.com.br/projetos/animes/categoria/tv/genero/aventura") {
							 // Não fazer nada!
						}
						else {
							// Ir para /categoria/ova
							window.location.href = ("https://izumiproject.com.br/projetos/animes/categoria/tv/genero/aventura");
						}
					}
					if (gen === "4") {
						if (window.location.href === "https://izumiproject.com.br/projetos/animes/categoria/tv/genero/slice-of-life") {
							 // Não fazer nada!
						}
						else {
							// Ir para /categoria/ona
							window.location.href = ("https://izumiproject.com.br/projetos/animes/categoria/tv/genero/slice-of-life");
						}
					}
					if (gen === "5") {
						if (window.location.href === "https://izumiproject.com.br/projetos/animes/categoria/tv/genero/comedia") {
							 // Não fazer nada!
						}
						else {
							// Ir para /categoria/filme
							window.location.href = ("https://izumiproject.com.br/projetos/animes/categoria/tv/genero/comedia");
						}
					}
					if (gen === "6") {
						if (window.location.href === "https://izumiproject.com.br/projetos/animes/categoria/tv/genero/romance") {
							 // Não fazer nada!
						}
						else {
							// Ir para /categoria/filme
							window.location.href = ("https://izumiproject.com.br/projetos/animes/categoria/tv/genero/romance");
						}
					}
					if (gen === "7") {
						if (window.location.href === "https://izumiproject.com.br/projetos/animes/categoria/tv/genero/drama") {
							 // Não fazer nada!
						}
						else {
							// Ir para /categoria/filme
							window.location.href = ("https://izumiproject.com.br/projetos/animes/categoria/tv/genero/drama");
						}
					}
					if (gen === "8") {
						if (window.location.href === "https://izumiproject.com.br/projetos/animes/categoria/tv/genero/fantasia") {
							 // Não fazer nada!
						}
						else {
							// Ir para /categoria/filme
							window.location.href = ("https://izumiproject.com.br/projetos/animes/categoria/tv/genero/fantasia");
						}
					}
					if (gen === "9") {
						if (window.location.href === "https://izumiproject.com.br/projetos/animes/categoria/tv/genero/ficcao-cientifica") {
							 // Não fazer nada!
						}
						else {
							// Ir para /categoria/filme
							window.location.href = ("https://izumiproject.com.br/projetos/animes/categoria/tv/genero/ficcao-cientifica");
						}
					}
					if (gen === "10") {
						if (window.location.href === "https://izumiproject.com.br/projetos/animes/categoria/tv/genero/escola") {
							 // Não fazer nada!
						}
						else {
							// Ir para /categoria/filme
							window.location.href = ("https://izumiproject.com.br/projetos/animes/categoria/tv/genero/escola");
						}
					}
				}
			</script>
	</body>
</html>
