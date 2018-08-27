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
<?php
$validadoCPF="";
$foto_pf="";
require "validador_cadastroDP.php";
?>

		<div class="container">
			<div class="row">
				<div class="col-9">
					<div id="accordion">
						<div class="card">
							<div class="card-header justify-content-between">
								<b>Dados Pessoais</b>
								<div class="row">
									<div class="col-sm-3">
										<button id="BTNCadastroNovo" class="BTNCadastro btn btn-sm" data-toggle="collapse" aria-controls="cardCadastro" 
										data-target="#cardCadastro" disabled>
										Cadastro
										</button>
									</div>
									<div class="col-sm-3">
										<button id="BTNCadastroEditar" class="BTNCadastro btn btn-sm" data-toggle="collapse" aria-controls="cardEditar" 
										data-target="#cardEditar" disabled>
										Editar
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
<!-- Cadastro-->
							<div id="cardCadastro" class="collapse" data-parent="#accordion">
									<div class="card-body">
										<form method="POST" enctype="multipart/form-data" onsubmit="return checkCadastro()"
										class="form justify-content-between">
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label for="dpnome_pf"><b>(*)</b>Nome Completo:</label>
														<input id="dpnome_pf" type="text" name="dpnome_pf" class="form-control 
														form-control-sm"> 
													</div>	
													<div class="form-group">
														<label for="dpcpf"><b>(*)</b>CPF:</label>
														<input id="dpcpf" type="number" name="dpcpf" class="form-control 
														form-control-sm">
													</div>
													<div class="form-group">
														<label for="dprg_PF"><b>(*)</b>RG:</label>
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
														<label for="dpimagem_pf">Inserir Foto:</label><br>
															<label class="btn btn-sm btn-warning">
															Arquivo JPG/PNG 
															<input class="btn btn-sm btn-warning form-control form-control-sm" type="file" 
															id="dpimagem_pf" name="dpimagem_pf" hidden>
															</label>	
													</div>	
												</div>
											<div class="col-sm-6">
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
													<input id="dpcep_pf" type="text" name="dpcep_pf" class="form-control form-control-sm">
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

											</div>
										</div>
											<div class="form-group">
												<input type="submit" value="Cadastrar" 
												class="btn btn-success">
											</div>
										</form>	
									</div>
							</div>		
<!-- Edição-->
							<div id="cardEditar" class="collapse" data-parent="#accordion">
									<div class="card-body">
										<form method="POST" enctype="multipart/form-data" onsubmit="return checkEdit()" 
										class="form justify-content-between">
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label for="editnome_pf"><b>(*)</b>Nome Completo:</label>
														<input id="editnome_pf" type="text" name="editnome_pf" 
														class="form-control form-control-sm" value="<?php echo $nome_pf;?>"> 
													</div>	
													<div class="form-group">
														<label for="editcpf"><b>(*)</b>CPF:</label>
														<input id="editcpf" type="number" name="editcpf" class="form-control 
														form-control-sm" value="<?php echo $cpf;?>" readonly>
													</div>
													<div class="form-group">
														<label for="editrg_PF"><b>(*)</b>RG:</label>
														<input id="editrg_pf" type="text" name="editrg_pf" class="form-control form-control-sm" value="<?php echo $rg_pf;?>">
													</div>
													<div class="form-group">
														<label for="editnasc_PF">Data de Nascimento:</label>
														<input id="editnasc_pf" type="text" name="editnasc_pf" class="form-control form-control-sm" 
														value="<?php echo $nasc_pf3;?>" readonly>
													</div>
													<div class="form-group">
														<label for="editemail_pf">E-mail:</label>
														<input id="editemail_pf" type="email" name="editemail_pf" class="form-control form-control-sm" 
														value="<?php echo $email_pf;?>">
													</div>
													<div class="form-group">
														<label for="editetelefone_pf">Telefone:</label>
														<input id="edittelefone_pf" type="tel" name="edittelefone_pf" 
														class="form-control	form-control-sm" 
														value="<?php echo $telefone_pf;?>">
													</div>
													<div class="form-group">
														<label for="editimagem_pf">Substituir Foto:</label><br>
															<label class="btn btn-sm btn-primary">
															Arquivo JPG/PNG 
															<input class="btn btn-sm btn-primary form-control form-control-sm" type="file" 
															id="editimagem_pf" name="editimagem_pf" hidden>
															</label>	
													</div>	
												</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label for="editendereco_rua_pf">Rua/Quadra/Setor:</label>
													<input id="editendereco_rua_pf" type="text" name="editendereco_rua_pf"class="form-control form-control-sm" 
													value="<?php echo $endereco_rua_pf;?>">
												</div>
												<div class="form-group">
													<label for="editendereco_numero_pf">Número:</label>
													<input id="editendereco_numeropf" type="text" name="editendereco_numero_pf" class="form-control form-control-sm"
													value="<?php echo $endereco_numero_pf;?>">
												</div>
												<div class="form-group">
													<label for="editendereco_complemento_pf">Complemento:</label>
													<input id="editendereco_complemento_pf" type="text" name="editendereco_complemento_pf" class="form-control form-control-sm"
													value="<?php echo $endereco_complemento_pf;?>">
												</div>
												<div class="form-group">
													<label for="editendereco_bairro_pf">Bairro/Satélite:</label>
													<input id="editendereco_bairro_pf" type="text" name="editendereco_bairro_pf"class="form-control form-control-sm"
													value="<?php echo $endereco_bairro_pf;?>">
												</div>
												<div class="form-group">
													<label for="editendereco_cidade_pf">Cidade:</label>
													<input id="editendereco_cidade_pf" type="text" name="editendereco_cidade_pf" class="form-control form-control-sm"
													value="<?php echo $endereco_cidade_pf;?>">
												</div>
												<div class="form-group">
													<label for="editendereco_estado_pf">Estado:</label>
													<input id="editendereco_estado_pf" type="text" name="editendereco_estado_pf" class="form-control form-control-sm"
													value="<?php echo $endereco_estado_pf;?>">
												</div>
												<div class="form-group">
													<label for="editcep_pf">CEP:</label>
													<input id="editcep_pf" type="text" name="editcep_pf" class="form-control form-control-sm" 
													value="<?php echo $endereco_cep_pf;?>">
												</div>
											<div class="form-group">
												<label for="dpsenha">Cadastre sua Senha:</label>
												<input id="dpsenha" type="password" name="dpsenha" 
												class="form-control form-control-sm">
											</div>
											<div class="form-group">
												<label for="dpconfirma_senha">Confirme sua Senha:</label>
												<input id="dpconfirma_senha" type="password" name="dpconfirma_senha" 
												class="form-control form-control-sm">
											</div>
											</div>
										</div>
											<div class="form-group">
												<input type="submit" value="Editar" 
												class="btn btn-warning">
											</div>
										</form>	
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
									<img id="fotoCPF" class="img-fluid float-right img-thumbnail" 
									src="../pessoafisica/<?php echo $validadoCPF;?>/<?php echo $foto_pf;?>">

				</div>
			</div>
		</div>










