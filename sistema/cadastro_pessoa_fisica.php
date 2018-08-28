<html>
	<head>
		<title>Total Ville 101</title>
		<meta charset="UTF-8">
		<meta id="viewport" name="viewport" content="width=device-width, user-scalable=no, shrink-to-fit=no">

		<?php
		require "../configuracoes.php";
		?>


		<link rel="stylesheet" type="text/css" href="../biblioteca/normalize.css">
		<link rel="stylesheet" type="text/css" href="../biblioteca/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/styleStrap.css">


		<link rel="shortcut icon" type="text/css" href="../imagens/sistema.ico">

		<script type="text/javascript" src="../biblioteca/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../biblioteca/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="../script/script.js"></script>

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
			<div class="container-fluid">
<?php
require "menu_nav_sistema.php"
?>
			</div>
<!-- Término Navegação -->
		<hr>
		<div class="container-fluid">
			<div class="row">
				<div class="col-4" id="corpo1">
<?php
require "menu_sistema.php";
?>
					</div>
				<div class="col-8" id="corpo2">
					<div class="row">
						<div class="col-lg-9" id="corpo2A">
							<div id="accordion">

<?php
$validadoCPF="Informe o CPF";
require "validador_cadastro_pf.php";
?>

								<div class="card">
									<div class="card-header justify-content-between">
									<img id="fotoCPF" class="img-fluid float-right img-thumbnail" 
									src="../pessoafisica/<?php echo $validadoCPF;?>/<?php echo $foto_pf;?>">
										<form id="form_validar_cpf" method="POST" 
										enctype="multipart/form-data" 
										class="form-inline">
										<input id="validar_cpf" type="number" name="validar_cpf" class="form-control form-control-sm" 
										placeholder="<?php echo $validadoCPF;?>" disabled>								
										<input id="botao_verificar" type="submit" class="btn
										btn-sm" value="Verificar"disabled>
										</form>
										<button id="botao_cadastrar"value="Cadastrar" class="btn
										btn-sm" data-toggle="collapse" aria-controls="card_cadastrar" 
										data-target="#card_cadastrar" disabled onclick="acionaCadastro()">Cadastrar</button>
										<button id="botao_editar" value="Editar" class="btn
										btn-sm" data-toggle="collapse" aria-controls="card_editar" 
										data-target="#card_editar" disabled onclick="acionaEdit()">Editar</button>
										<button id="botao_imprimir" value="Imprimir" class="btn
										btn-sm" data-toggle="collapse" aria-controls="card_imprimir" 
										data-target="#card_imprimir" disabled>Imprimir</button>
										<button id="botao_deletar" value="Deletar" class="btn
										btn-sm" data-toggle="collapse" aria-controls="card_editar"
										data-target="#card_deletar" disabled>Deletar</button>
									</form>
									</div>
								</div>
<!-- Cadastrar-->
								<div id="card_cadastrar" class="collapse" data-parent="#accordion">
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
														form-control-sm" value="<?php echo $validadoCPF;?>" readonly>
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
														<label for="sexo">Sexo:</label>
															<select id="sexo" class="custom-select custom-select-md" name="dpsexo_pf">
																<option value=""></option>
																<option value="Masculino">Masculino</option>
																<option value="Feminino">Feminino</option>
															</select>
													</div>
													<div class="form-group">
														<label for="estadocivil">Estado Civil:</label>
															<select id="estadocivil" class="custom-select custom-select-md" name="dpestadocivil_pf">
																<option value=""></option>
																<option value="Solteiro">Solteiro</option>
																<option value="Casado">Casado</option>
																<option value="Divorciado">Divorciado</option>
																<option value="Viúvo">Viúvo</option>
															</select>
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
														<label for="estado">Estado:</label>
															<select id="estado" class="custom-select custom-select-md" name="dpendereco_estado_pf">
																<option value=""></option>
																<option value="AC">ACRE</option>
																<option value="AL">ALAGOAS</option>
																<option value="AP">AMAPÁ</option>
																<option value="AM">AMAZONAS</option>
																<option value="BA">BAHIA</option>
																<option value="CE">CEARÁ</option>
																<option value="DF">DISTRITO FEDERAL</option>
																<option value="ES">ESPÍRITO SANTO</option>
																<option value="GO">GOIÁS</option>
																<option value="MA">MARANHÃO</option>
																<option value="MT">MATO GROSSO</option>
																<option value="MS">MATO GROSSO DO SUL</option>
																<option value="MG">MINAS GERAIS</option>
																<option value="PA">PARÁ</option>
																<option value="PB">PARAÍBA</option>
																<option value="PR">PARANÁ</option>
																<option value="PE">PERNAMBUCO</option>
																<option value="PI">PIAUÍ</option>
																<option value="RN">RIO GRANDE DO NORTE</option>
																<option value="RS">RIO GRANDE DO SUL</option>
																<option value="RJ">RIO DE JANEIRO</option>
																<option value="RO">RONDÔNIA</option>
																<option value="RR">RORAIMA</option>
																<option value="SC">SANTA CATARINA</option>
																<option value="SP">SÃO PAULO</option>
																<option value="SE">SERGIPE</option>
																<option value="TO">TOCANTINS</option>
															</select>
													</div>
												<div class="form-group">
													<label for="dpcep_pf">CEP:</label>
													<input id="dpcep_pf" type="text" name="dpcep_pf" class="form-control form-control-sm">
												</div>
												
												<div class="form-group">
													<input type="submit" value="Cadastrar" 
													class="btn btn-success">
												</div>
											</div>
										</div>
										</form>	
									</div>
								</div>
<!--Término Cadastrar-->								
<!-- Editar-->
								<div id="card_editar" class="collapse" data-parent="#accordion">
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
														<label for="sexo">Sexo:</label>
															<select id="sexo" class="custom-select custom-select-md" name="editsexo_pf">
																<option value="<?php echo $sexo_pf;?>"><?php echo $sexo_pf;?></option>
																<option value="Masculino">Masculino</option>
																<option value="Feminino">Feminino</option>
															</select>
													</div>
													<div class="form-group">
														<label for="estadocivil">Estado Civil:</label>
															<select id="estadocivil" class="custom-select custom-select-md" name="editestadocivil_pf">
																<option value="<?php echo $estadocivil_pf;?>"><?php echo $estadocivil_pf;?></option>
																<option value="Solteiro">Solteiro</option>
																<option value="Casado">Casado</option>
																<option value="Divorciado">Divorciado</option>
																<option value="Viúvo">Viúvo</option>
															</select>
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
														<label for="estado">Estado:</label>
															<select id="estado" class="custom-select custom-select-md" name="editendereco_estado_pf">
																<option value="<?php echo $endereco_estado_pf;?>"><?php echo $endereco_estado_pf;?></option>
																<option value="AC">ACRE</option>
																<option value="AL">ALAGOAS</option>
																<option value="AP">AMAPÁ</option>
																<option value="AM">AMAZONAS</option>
																<option value="BA">BAHIA</option>
																<option value="CE">CEARÁ</option>
																<option value="DF">DISTRITO FEDERAL</option>
																<option value="ES">ESPÍRITO SANTO</option>
																<option value="GO">GOIÁS</option>
																<option value="MA">MARANHÃO</option>
																<option value="MT">MATO GROSSO</option>
																<option value="MS">MATO GROSSO DO SUL</option>
																<option value="MG">MINAS GERAIS</option>
																<option value="PA">PARÁ</option>
																<option value="PB">PARAÍBA</option>
																<option value="PR">PARANÁ</option>
																<option value="PE">PERNAMBUCO</option>
																<option value="PI">PIAUÍ</option>
																<option value="RN">RIO GRANDE DO NORTE</option>
																<option value="RS">RIO GRANDE DO SUL</option>
																<option value="RJ">RIO DE JANEIRO</option>
																<option value="RO">RONDÔNIA</option>
																<option value="RR">RORAIMA</option>
																<option value="SC">SANTA CATARINA</option>
																<option value="SP">SÃO PAULO</option>
																<option value="SE">SERGIPE</option>
																<option value="TO">TOCANTINS</option>
															</select>
													</div>
												<div class="form-group">
													<label for="editcep_pf">CEP:</label>
													<input id="editcep_pf" type="text" name="editcep_pf" class="form-control form-control-sm" 
													value="<?php echo $endereco_cep_pf;?>">
												</div>
												<div class="form-group">
													<input type="submit" value="Editar" 
													class="btn btn-warning">
												</div>
											</div>
										</div>	
										</form>	
									</div>
								</div>
<!--Término Editar-->
<!--Deletar-->
								<div id="card_deletar" class="collapse" data-parent="#accordion">
									<div class="card-body">
										<form method="POST" enctype="multipart/form-data" class="form justify-content-between">
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<input id="dpnome_pf" type="text" name="confimacao_deletar" class="form-control form-control-sm" placeholder="CPF: <?php echo $cpf;?>"> 
													</div>
													<div class="form-group">
														<input id="dpnome_pf" type="text" name="confimacao_deletar" class="form-control form-control-sm" placeholder="Nome: <?php echo $nome_pf;?>"> 
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input id="dpnome_pf" type="text" name="confimacao_deletar" class="form-control form-control-sm" placeholder="RG: <?php echo $rg_pf;?>"> 
													</div>
													<div class="form-group">
														<input id="dpnome_pf" type="text" name="confimacao_deletar" class="form-control form-control-sm" placeholder="Data de Nascimento: <?php echo $nasc_pf3;?>"> 
													</div>
												</div>
											</div>
													Esse Procedimento é irreversível - Todo o conteúdo será excluído
													<hr>
													<div class="form-group">
														<label for="dpnome_pf">Informe sua senha:</label>
														<input id="dpnome_pf" type="password" name="senha" class="form-control form-control-sm"> 
													</div>	
											<div class="form-group">
												<input type="submit" value="Excluir" 
												class="btn btn-danger">
											</div>
										
										</form>
									</div>
								</div>



							</div>
						</div>
						<div class="col-lg-3" id="corpo2B">
							<div id ="alert_validacao"class="alert alert-sm alert-primary fade" 
							role="alert">
								<h6 class="alert-heading">Validação do CPF</h6>
								<div class="alert alert-body"><p>Informe o número do CPF e clique em verificar para validação no Banco de Dados.</p></div>
							</div> 
							<div id ="alert_cpf_cadastrado"class="alert alert-sm alert-warning fade" 
							role="alert">
								<h6 class="alert-heading">CPF já cadastrado</h6>
								<small>(<?php echo $validadoCPF;?>)</small>								
								<div class="alert alert-body"><p>O CPF informado já se encontra cadastrado em nosso sistema. Você poderá Editar os dados pessoais ou Deletar o cadastro</p></div>
							</div> 
							<div id ="alert_cpf_incorreto"class="alert alert-sm alert-danger fade" 
							role="alert">
								<h6 class="alert-heading">CPF incorreto</h6>
								<small>(<?php echo $validadoCPF;?>)</small>								
								<div class="alert alert-body"><p>O CPF deve conter 11 números. Não informe caracteres especiais</p></div>
							</div>
							<div id ="alert_cpf_nao_cadastrado"class="alert alert-sm alert-success fade" 
							role="alert">
								<h6 class="alert-heading">CPF Não Cadastrado</h6>
								<small>(<?php echo $validadoCPF;?>)</small>								
								<div class="alert alert-body"><p>O CPF informado não consta em nosso Banco de Dados. Você cadastrar os dados pessoais deste CPF</p></div>
							</div>
							<div id ="verificador_cadastro_pf"class="alert alert-sm alert-primary fade" 
							role="alert">
								<h6 class="alert-heading">Inicio do cadastro</h6>
								<small>(<?php echo $validadoCPF;?>)</small>								
								<div class="alert alert-body"><p>Os itens com (*) são obrigatórios</p>
									<p>Os demais itens poderão ser preenchidos pelo usuário</p></div>
							</div>
							<div id ="verificador_edit_pf"class="alert alert-sm alert-primary fade" 
							role="alert">
								<h6 class="alert-heading">Edição de cadastro</h6>
								<small>(<?php echo $validadoCPF;?>)</small>								
								<div class="alert alert-body"><p>Os itens com (*) são obrigatórios</p>
									<p>Alterando o e-mail, novo código de validação será encaminhado ao usuário</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



