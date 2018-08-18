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

</head>

<body>

	
<!-- Navegação-->

				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					<a href="./" class="navbar-brand">Total Ville Quadra 101</a>
					<button class="navbar-toggler" data-toggle="collapse" data-target="#navemenu">
						<span class="navbar-toggler-icon">
						</span>
					</button>

					<div class="navbar-collapse collapse" id="navemenu">
						<div class="navbar-nav">
							<a href="./" class="nav-item nav-link active">Home</a>
							<a href="cadastro.php" class="nav-item nav-link">Cadastro</a>
							<a href="contas.php" class="nav-item nav-link">Prestação de Contas</a>
							<a href="atas.php" class="nav-item nav-link">Assembléias</a>
							<a href="documentos/ConvencaoRegistrada.pdf" class="nav-item nav-link" 
							target="_blank">Convenção</a>
							<a href="documentos/RegimentoInterno.pdf" class="nav-item nav-link" 
							target="_blank">Regimento</a>
							<a href="negociacoes.php" class="nav-item nav-link">Negociação</a>
							<a href="reserva.php" class="nav-item nav-link">Reservas</a>
							<a href="circular.php" class="nav-item nav-link">Comunicados</a>
						</div>
					</div> 
				</nav>
<!-- CABEÇALHO-->
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="cabecalho col-md-6">
					<img src="imagens/novologo.jpg">
					</div>
					<div class="cabecalho col-md-6">
<?php
	session_start();
require "validador_acesso.php";

?>
					</div>
				</div>
			</div>
		<hr>
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
						<input type="submit" value="Cadastrar" class="btn btn-primary"></center>
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

<?php

$valida = $_GET['valida'];
$usuario_status = "Validado";
if (!empty($valida)){
	$sql="UPDATE usuarios SET usuario_status='$usuario_status' WHERE MD5(id) ='$valida'";
    $sql=$pdo->query($sql); 

//E-mail de cadastro validado 

  				$sql="SELECT * FROM usuarios WHERE MD5(id)='$valida'";
				$sql=$pdo->query($sql);
		        $dados = $sql->fetch();
				$usuario=$dados['usuario'];
		        $usuario_status=$dados['usuario_status'];

				$sql="SELECT * FROM pessoafisica WHERE cpf='$usuario'";
				$sql=$pdo->query($sql);
		        $dados = $sql->fetch();
				$cpf=$dados['cpf'];
		        $email_pf=$dados['email_pf'];

	       		$_SESSION['usuario']= $dados['cpf'];


	$emailsender = "suporte@totalville101.com.br";

	/* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. */
	
	if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
	elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
	else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");


	$emaildestinatario = "administracao@totalville101.com.br";
	$assuntoconfirma = "Cadastro Validado";
	$corpo = "<p>E-mail: ".$email_pf."</p><p>CPF:".$cpf."</p><p>Status: ".$usuario_status;

	$cabecalho = "MIME-Version: 1.1".$quebra_linha;
	$cabecalho .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
	$cabecalho .= "From: ".$emailsender.$quebra_linha;
	$cabecalho .= "Return-Path: ".$emailsender.$quebra_linha;
	$cabecalho .=  "Reply-To: ".$email_pf.$quebra_linha;
	$cabecalho .=  "X-Mailer: PHP/".phpversion();

mail($emaildestinatario, $assuntoconfirma, $corpo, $cabecalho, "-r". $emailsender);

echo "<div class='container-fluid'><div class='row align-items-center'><div class='inicio col'>
	<div class='alert alert-primary alert dismissible show' role='alert' id='AlertaCadastro'>
	E-mail Validado!  ".$email_pf."</div><a class='btn btn-success' href='index.php'>Página Inicial</a></div>
	</div></div>";
}
?>


</body>
