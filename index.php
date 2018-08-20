<html>
	<head>
		<title>Total Ville 101</title>
		<meta charset="UTF-8">
		<meta id="viewport" name="viewport" content="width=device-width, user-scalable=no, shrink-to-fit=no">

		<?php
		require "configuracoes.php";
		?>


		<link rel="stylesheet" type="text/css" href="biblioteca/normalize.css">
		<link rel="stylesheet" type="text/css" href="biblioteca/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/styleStrap.css">


		<link rel="shortcut icon" type="text/css" href="imagens/sistema.ico">

		<script type="text/javascript" src="biblioteca/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="biblioteca/bootstrap.bundle.min.js"></script>

		<script type="text/javascript" src="script/script.js"></script>
<?php
session_start();
?>
</head>

<!-- Modal Login Inicio-->
<div class="modal fade" id="login">
	<div class="modal-dialog modal-dialog-centered modal-sm"> 
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-titulo">Acesso ao Sistema</h5>
				<button class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" class="justify-content-around">
					<div class="form-group">
						<label for="login_usuario">Usuário:</label>
						<input id="login_usuario" type="text" name="login_usuario" class="form-control 
						form-control-sm" placeholder="Informe o CPF (somente números)"> 	
					</div>
					<div class="form-group">
						<label for="login_senha">Senha:</label>
						<input id="login_senha" type="password" name="login_senha" class="form-control 
						form-control-sm" placeholder="Informe sua senha">
					</div>
					<div class="form-group"><center>
						<input type="submit" value="Entrar" class="btn btn-primary"></center>
					</div>
				</form>
			</div>
			<div class="modal-footer justify-content-between">
				<a href="01cadastro.php"class="btn btn-success"target="_blank">Cadastra-se</a>
				<a href="esqueci.php"class="btn btn-danger" target="_blank">Esqueci Senha</a>
			</div>
		</div>	
	</div>
</div>


<body>
<!-- Navegação-->
				<div class="container">
<?php
require "menu_nav.php"
?>

			</div>
<!-- CABEÇALHO-->
			<div class="container">
				<div class="row align-items-center">
					<div class="cabecalho col-sm-6">
					<img class= "img-responsive" src="imagens/novologo.jpg">
					</div>
					<div class="cabecalho col-sm-6">
<?php
require "validador_acesso.php";
?>
					</div>
				</div>
			</div>
		<hr>
