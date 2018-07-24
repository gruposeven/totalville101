<html>
	<head>
		<title>Total Ville 101</title>
		<meta charset="UTF-8">
		<meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">		
		<?php
		require "configuracoes.php";
		?>
<!--Icone-->
		<link rel="shortcut icon" type="text/css" href="imagens/sistema.ico">
<!--Bibliotecas-->
		<link rel="stylesheet" type="text/css" href="biblioteca/normalize.css">
		<script type="text/javascript" src="biblioteca/jquery-3.2.1.min.js"></script>
<!--Estilo-->
		<link rel="stylesheet" type="text/css" href="css/styleLogin.css">
<!--javascript-->
		<script type="text/javascript" src="script/scriptLogin.js"></script>
		<script type="text/javascript" src="script/verificadorLogin.js"></script>
<!--Corpo-->
		<body>
			<div id = "body_autenticacao" class="body_autenticacao">
				<div class="body_autenticacao_inicio">
						<img src="imagens/novologo.jpg">
				</div>
				<div class="body_autenticacao_inicio_validador">
					<?php
					require "validador.php";
					?>
				</div>

				<div class="body_autenticacao_meio">
					<form id="autenticacao_form" method="POST" onsubmit="return validarAutenticacao()">
						<input type="number" name="usuario" id="autenticacaoUsuario"class="autenticacao_campo"  maxlength="11" placeholder="Usuario" 
							onfocus="focoUsuario()" autocomplete="off"><br>
						<input type="password" name="senha" id="autenticacaoSenha"class="autenticacao_campo" placeholder="Senha" maxlength="6"
							onfocus="focoSenha()" autocomplete="off"><br>
						<input type="submit" class="autenticacao_submit" value="Entrar">
					</form>
					<form id="novoCadastro_form" method="POST" onsubmit="return validarCadastro()">
						<input onfocus="focoNomePF()"id="cadastroNomePF" type="text" name="nome_pf" class="autenticacao_campo" placeholder="Nome" autocomplete="off"><br>
						<input onfocus="focoSobrenomePF()"id="cadastroSobrenomePF" type="text" name="sobrenome_pf" class="autenticacao_campo" placeholder="Sobrenome" autocomplete="off"><br>
						<input onfocus="focoEmail()"id="cadastroEmailPF" type="email" name="email_pf" class="autenticacao_campo" placeholder="E-mail" autocomplete="off"><br>
						<input onfocus="focoCadastroCPF()" id="cadastroUsuario" type="number" name="NovoUsuario" class="autenticacao_campo" maxlength="11" placeholder="CPF" autocomplete="off"><br>
						<input onfocus="focoCadastroSenha()"id="cadastroSenha" type="password" name="Novasenha" class="autenticacao_campo" placeholder="Senha" maxlength="6"autocomplete="off"><br>
						<input type="submit" id="submit_cadastro" class="autenticacao_submit" value="Cadastro">
					</form>
					<form id="esqueciSenha_form" method="POST" onsubmit="return validarEsqueci()">
						<input onfocus="focoUsuario()" type="text" name="esqueciUsuario" id="esqueciUsuario" class="autenticacao_campo" placeholder="CPF"  maxlength="11" autocomplete="off"><br>
						<input onfocus="focoEmail()"type="email" name="esqueciEmail" id="esqueciEmail" class="autenticacao_campo" placeholder="E-mail" autocomplete="off"><br>
						<input type="submit" id="submit_esqueci" class="autenticacao_submit" value="Nova Senha">
					</form>
				</div>
				<div class="body_autenticacao_fim">
					<div class="body_autenticacao_fim_direito">
						<img src="imagens/assistente1.png">
					</div>
					<div id="assistente"class= "body_autenticacao_fim_esquerdo">
						<h4> Sistema Total Ville - Quadra 101</h4>
						Serei sua assistente virtual e irei te auxiliar em que precisar... 
					</div>
				</div>
			</div>
			<div class="body_opcoes">
				<button id="body_opcoes_novo" onclick="AcessarNovoCadastro()" class="body_opcoes_novo">Cadastre-se
				</button>
				<button id="body_opcoes_autenticacao" onclick="AcessarAutenticacao()" class="body_opcoes_autenticacao">Autenticação
				</button>
				<button id="body_opcoes_esqueci" onclick="AcessarEsqueciSenha()"class="body_opcoes_esqueci">Esqueci Senha
				</button>
			</div>			
		</body>
	</head>
</html>