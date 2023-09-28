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
		<meta name="description" content="Mangás">
		<meta name="keywords" content="Anime,Animes,Manga,Mangá,Mangás,Download,Baixar,Moe">
		<meta name="author" content="Neofox">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 8]>
            <script src="https://raw.githubusercontent.com/aFarkas/html5shiv/master/dist/html5shiv.min.js"></script>
            <script src="https://raw.githubusercontent.com/scottjehl/Respond/master/src/respond.js"></script>
        <![endif]-->
		<!-- Page favicon -->
		<link rel="shortcut icon" href="../../images/global/favicon.png"/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="../../css/style.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Page title -->
		<?php $page_title = "Projetos - Mangás | Izumi✰Project"; ?>
		<title><?php echo $page_title ?></title>
		<?php
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$page_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		?>
	</head>
	<body>
    <?php include('../h_topnavMenu.php'); ?>
    <?php include('../h_topbar.php'); ?>
  	<?php include('../h_sidenav.php'); ?>
    <div id="content">
      <div id="post-wrapper" style="width: 98.5%; margin-right: 0;">
        <div class="post" style="padding: 1em;">
					<h1>Projetos > Mangás</h1>
					<div id="separador"></div>
					<?php include('../pesquisabarra.php'); ?>
					<br />
				<h2>Todos</h2>
				<div id="separador"></div>
				<ol id='list' class="ol-row">
					<?php include('../cards-projetos/lucky-star/card.php'); ?>
					<?php include('../cards-projetos/miyakawa-ke-no-kuufuku-manga/card.php'); ?>
					</ol>
        </div>
      </div>
      <?php include('../h_footer.php'); ?>
      </div>
      <?php include('../h_topbutton.php'); ?>
      <!-- Page scripts -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
      <script type="text/javascript" src="../../scripts/sidenav_accordion.js"></script>
      <script type="text/javascript" src="../../scripts/topnav_accordion.js"></script>
      <script type="text/javascript" src="../../scripts/top-button.js"></script>
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
	</body>
</html>
