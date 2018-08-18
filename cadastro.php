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
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					<a href="./" class="navbar-brand" id="titulo">Total Ville Quadra 101</a>
					<button class="navbar-toggler" data-toggle="collapse" data-target="#navemenu">
						<span class="navbar-toggler-icon">
						</span>
					</button>

					<div class="navbar-collapse collapse" id="navemenu">
						<div class="navbar-nav">
							<a href="./" class="nav-item nav-link active">Home</a>
							<a href="cadastro.php" class="nav-item nav-link">Cadastro</a>
							<a href="contas.php" class="nav-item nav-link">Contas</a>
							<a href="atas.php" class="nav-item nav-link">Assembléias</a>
							<a href="documentos/ConvencaoRegistrada.pdf" class="nav-item nav-link" 
							target="_blank">Convenção</a>
							<a href="documentos/RegimentoInterno.pdf" class="nav-item nav-link" 
							target="_blank">Regimento</a>
							<a href="negociacoes.php" class="nav-item nav-link">Negociação</a>
							<a href="reserva.php" class="nav-item nav-link">Reservas</a>
							<a href="circular.php" class="nav-item nav-link">Comunicados</a>
							<a href="./sistema/sistema.php" class="nav-item nav-link" target="_blank">Sistema</a>

						</div>
					</div> 
				</nav>
			</div>

<!-- CABEÇALHO-->
			<div class="container">
				<div class="row align-items-center">
					<div class="cabecalho col-sm-4">
					<img class= "img-responsive" src="imagens/novologo.jpg">
					</div>
					<div class="cabecalho col-sm-4">
					<h4>G-COND <small class="text-muted">Cadastramento</small></h4>
					</div>
					<div class="cabecalho col-sm-4">
<?php
require "validador_acesso.php";

?>
					</div>
				</div>
			</div>
		<hr>

<!-- CORPO-->
		<div class="container">
			<div class="row">
				<div class="col-9">
					<div id="accordion">
						<div class="card">
							<div class="card-header justify-content-between">
								<div class="row">
									<div class="col-sm-6">
										<button class="btn btn-link" data-toggle="collapse" aria-controls="card1" 
										data-target="#card1">
										Dados Pessoais
										</button>
									</div>
									<div class="col-sm-6">		
<?php
require "validador_cadastroDP.php";
?>
									</div>
								</div>
							</div>
							</div>
							<div id="card1" class="collapse" data-parent="#accordion">
								<div class="card-body">
									<form method="POST" enctype="multipart/form-data" class="justify-content-around">

										<div class="form-group">
											<label for="dpnome_pf">Nome Completo:</label>
											<input id="dpnome_pf" type="text" name="dpnome_pf" class="form-control 
											form-control-sm"> 	
										</div>
										<div class="form-group">
											<label for="dpcpf">CPF:</label>
											<input id="dpcpf" type="number" name="dpcpf" class="form-control 
											form-control-sm" placeholder="Informe os 11 números">
										</div>
										<div class="form-group">
											<label for="dprg_PF">RG:</label>
											<input id="dprg_pf" type="text" name="dprg_pf" class="form-control 
											form-control-sm">
										</div>
										<div class="form-group">
											<label for="dpnasc_PF">Data de Nascimento:</label>
											<input id="dpnasc_pf" type="date" name="dpnasc_pf" class="form-control 
											form-control-sm">
										</div>
										<div class="form-group">
											<label for="dpemail_pf">E-mail:</label>
											<input id="dpemail_pf" type="email" name="dpemail_pf" class="form-control 
											form-control-sm">
										</div>
										<div class="form-group">
											<label for="dpetelefone_pf">Telefone:</label>
											<input id="dptelefone_pf" type="tel" name="dptelefone_pf" 
											class="form-control	form-control-sm" placeholder="Informe 99999-9999">
										</div>
										<div class="form-group">
											<label for="dpendereco_rua_pf">Rua/Quadra/Setor:</label>
											<input id="dpendereco_rua_pf" type="text" name="dpendereco_rua_pf" 
											class="form-control form-control-sm">
										</div>
										<div class="form-group">
											<label for="dpendereco_numero_pf">Número:</label>
											<input id="dpendereco_numeropf" type="text" name="dpendereco_numero_pf" 
											class="form-control form-control-sm">
										</div>
										<div class="form-group">
											<label for="dpendereco_complemento_pf">Complemento:</label>
											<input id="dpendereco_complemento_pf" type="text" name="dpendereco_complemento_pf"
											class="form-control form-control-sm">
										</div>
										<div class="form-group">
											<label for="dpendereco_bairro_pf">Bairro/Satélite:</label>
											<input id="dpendereco_bairro_pf" type="text" name="dpendereco_bairro_pf" 
											class="form-control form-control-sm">
										</div>
										<div class="form-group">
											<label for="dpendereco_cidade_pf">Cidade:</label>
											<input id="dpendereco_cidade_pf" type="text" name="dpendereco_cidade_pf" 
											class="form-control form-control-sm">
										</div>
										<div class="form-group">
											<label for="dpendereco_estado_pf">Estado:</label>
											<input id="dpendereco_estado_pf" type="text" name="dpendereco_estado_pf" class="form-control 
											form-control-sm">
										</div>
										<div class="form-group">
											<label for="dpcep_pf">CEP:</label>
											<input id="dpcep_pf" type="text" name="dpcep_pf" class="form-control 
											form-control-sm">
										</div>
										<div class="form-group">
											<label for="dpimagem_pf">Inserir sua Imagem:</label>
												<label class="btn btn-sm btn-warning">
	    										Arquivo JPG/PNG 
	    										<input class="btn btn-sm btn-warning form-control form-control-sm" type="file" 
	    										id="dpimagem_pf" name="dpimagem_pf" hidden>
												</label>	
										</div>	
										<div class="form-group">
											<label for="dpsenha">Cadastre a Senha:</label>
											<input id="dpsenha" type="password" name="dpsenha" 
											class="form-control form-control-sm">
										</div>
										<div class="form-group">
											<label for="dpconfirma_senha">Confirme sua Senha:</label>
											<input id="dpconfirma_senha" type="password" name="dpconfirma_senha" 
											class="form-control form-control-sm">

										</div>

										<div class="form-group">
											<input type="submit" value="Cadastrar" class="btn btn-primary">
										</div>
									</form>
								</div>
							</div>		
						</div>	
						<div class="card disabled">
							<div class="card-header">
								<button class="btn btn-link disabled" data-toggle="collapse" aria-controls="card2" 
								data-target="#card2" aria-disabled="true" id="cadastrar_unidade">
								Cadastrar sua Unidade
								</button>
							</div>
							<div id="card2" class="collapse" data-parent="#accordion">
								<div class="card-body">
									
								</div>	
							</div>
						</div>	

						<div class="card">
							<div class="card-header">
								<button class="btn btn-link" data-toggle="collapse" aria-controls="card3" 
								data-target="#card3" disabled>
								Cadastrar Dependentes
								</button>
							</div>
							<div id="card3" class="collapse" data-parent="#accordion">
								<div class="card-body">
									
								</div>	
							</div>
						</div>	

						<div class="card">
							<div class="card-header">
								<button class="btn btn-link" data-toggle="collapse" aria-controls="card4" 
								data-target="#card4" disabled>
								Cadastrar seu veículo
								</button>
							</div>
							<div id="card4" class="collapse" data-parent="#accordion">
								<div class="card-body">
									
								</div>	
							</div>
						</div>	

						<div class="card">
							<div class="card-header">
								<button class="btn btn-link" data-toggle="collapse" aria-controls="card5" 
								data-target="#card5" disabled>
								Cadastrar Locatário
								</button>
							</div>
							<div id="card5" class="collapse" data-parent="#accordion">
								<div class="card-body">
									
								</div>	
							</div>
						</div>	

						<div class="card">
							<div class="card-header">
								<button class="btn btn-link" data-toggle="collapse" aria-controls="card6" 
								data-target="#card6" disabled>
								Cadastrar seu Procurador
								</button>
							</div>
							<div id="card6" class="collapse" data-parent="#accordion">
								<div class="card-body">
									
								</div>	
							</div>
						</div>	
					</div>		
				</div>
				<div class="col-3">

				</div>
			</div>
		</div>










