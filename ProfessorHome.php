<?php  session_start();
?>
<html>

<head>
	<!-- Material Design Lite -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,500,400italic,700,700italic' rel='stylesheet' type='text/css'>

	  <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<!-- Material Design icon font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		<header class="mdl-layout__header" style="background-color:#102027">
			<div class="mdl-layout__header-row">
				<!-- Title -->
				<span class="mdl-layout-title">Business Game - <?php  echo $_SESSION['nomeUser']." "; ?><i class="material-icons">school</i></span>
				<!-- Add spacer, to align navigation to the right -->
				<div class="mdl-layout-spacer"></div>
				<!-- Navigation. We hide it in small screens. -->
				<nav class="mdl-navigation mdl-layout--large-screen-only">
					<a class="mdl-navigation__link" href="">Link</a>
					<a class="mdl-navigation__link" href="">Link</a>
					<a class="mdl-navigation__link" href="">Link</a>
					<a class="mdl-navigation__link" href="">Link</a>
				</nav>
			</div>
		</header>
		<div class="mdl-layout__drawer">
            <div style="width:100%; height:25%; background-color:#62727b;background-image:url('images/back.png');" >
                <div id="prof-pic" style="width:50%; height:70%; margin-left:10%; margin-top:10%;  ">
                    <img src="images/professor.png" style="width:100%; height:100%">

                </div>
            </div>
			<span class="mdl-layout-title">Professor <i class="material-icons">school</i></span>
			<nav class="mdl-navigation">
				<a class="mdl-navigation__link" href="NovaPartida.html"><i class="material-icons">create_new_folder</i> Nova Partida</a>
								<a class="mdl-navigation__link" href="Tabuleiro.html"><i class="material-icons">view_quilt</i> Tabuleiro</a>
				<a class="mdl-navigation__link" href="Perguntas.php"><i class="material-icons">question_answer</i> Perguntas   </a>
                <a class="mdl-navigation__link" href="Equipes.html"><i class="material-icons">recent_actors</i> Equipes</a>
				<a class="mdl-navigation__link" href=""><i class="material-icons">settings</i> Configurações</a>
								<a class="mdl-navigation__link" href="actions/EncerrarSessao.php"><i class="material-icons">keyboard_backspace</i> Encerrar</a>
			</nav>
		</div>
		<main class="mdl-layout__content">
			<div class="page-content" style="text-align:center"><!-- Your content goes here -->

<form>

</form>
</div>

		  </main>
	</div>
</body>
</html>

<style>
        body {
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
    }
</style>
