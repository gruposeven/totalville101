<html>
	<head>
		<title>Total Ville 101</title>
		<meta charset="UTF-8">
		<meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">

		<?php
		require "configuracoes.php";
		?>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="biblioteca/normalize.css">

		<link rel="shortcut icon" type="text/css" href="imagens/sistema.ico">

		<script type="text/javascript" src="biblioteca/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="script/script1.js"></script>

		<body>
			<!-- CABEÇALHO-->
			<header>
				<div class="Menucontainer">
					<div class="logo">
					<img src="imagens/novologo.jpg">
					</div>
					<div class="menu">
						<nav>
							<div class="menu_mobile">
								<div class="menu_mobile_linha">
								</div>
								<div class="menu_mobile_linha">
								</div>
								<div class="menu_mobile_linha">
								</div>
							</div>
							<ul>
								<li class="active"><a href="./"> Home</a></li>
								<li><a href="reserva.php"> Reservas</a></li>
								<li><a href="contas.php"> Prestação de Contas</a></li>
								<li><a href="atas.php"> Assembléias</a></li>
								<li><a href="documentos/ConvencaoRegistrada.pdf" target="_blank"> Convenção </a></li>
								<li><a href="documentos/RegimentoInterno.pdf" target="_blank"> Regimento</a></li>
								<li><a href="negociacoes.php"> Negociações </a></li>
							</ul>
						</nav>
					</div>
				</div>
			</header>
			<div class="sessao">
<?php
			session_start();
			if(isset($_SESSION['usuario']) && empty($_SESSION['usuario'])== false){

                    $usuario= addslashes($_SESSION['usuario']);
                    $sql="SELECT * FROM pessoafisica WHERE cpf='$usuario'";
                    $sql= $pdo->query($sql);
                    $dados = $sql->fetch();
                    $cpf=$dados['cpf'];
                    $nome_pf=$dados['nome_pf'];
                    
                    
                        echo''.$nome_pf.' CPF: '.$cpf.'';
                        echo'<a href="logout_servidor.php"><button class="botao_sair" id="botao_sair">Sair</button></a>';

                    }else{
                        echo'Usuário não autenticado';
                        echo'<a href="login.php"><button class="botao_sair" id="botao_sair">Login</button></a>';

                    }
          ?>
                
			</div>
			<!-- BANNER-->
			<section id="banner">

			</section>
			<!-- CORPO-->
			<section id="corpo">
				<div class="Corpocontainer">
					<article>
						<a href="reserva.php"><div class="Articleopcoes">
							<div class="projeto_titulo">Reserva de Churrasqueira 
								</div>
								<div class="projeto_linha">
								</div>
								<div class="projeto_imagem">
									<img src="imagens/churrasqueira.jpg">
								</div>
								<div class="projeto_texto">
									Realize a reserva de churrasqueira sem burocracia e com pagamento facilitado
									por cartão de crédito ou com pagamento na próxima taxa condominial.
								</div>	
							</div></a>	
						
						<a href="atas.php"><div class="Articleopcoes">
							<div class="projeto_titulo">Assembleia Mista Online 
								</div>
								<div class="projeto_linha">
								</div>
								<div class="projeto_imagem">
									<img src="imagens/assembleia.png">
								</div>
								<div class="projeto_texto">
									Participar e votar em Assembléia de Condomínio nunca ficou tão fácil. 
									Com seu cadastro devidamente atualizado, você poderá participar de assembleias sem sair de casa.
								</div>	
							</div></a>
						
						<a href="reserva.php"><div class="Articleopcoes">
							<div class="projeto_titulo">Reserva do Salão de Festa
								</div>
								<div class="projeto_linha">
								</div>
								<div class="projeto_imagem">
									<img src="imagens/salaodefesta.jpg">
								</div>
								<div class="projeto_texto">
								Realize a reserva do Salão de Festa sem burocracia e com pagamento facilitado
								por cartão de crédito ou com pagamento na próxima taxa condominial.
								</div>	
							</div></a>
						
						<a href="negociacoes.php"><div class="Articleopcoes">
							<div class="projeto_titulo">Negociações
								</div>
								<div class="projeto_linha">
								</div>
								<div class="projeto_imagem">
									<img src="imagens/negociacao.jpg">
								</div>
								<div class="projeto_texto">
								Negocie suas taxas condominiais em atraso sem burocracia e com parcelamentos em até 12x. 
								Pagamentos por cartão de crédito ou diretamente em boletos.	
								</div>	
							</div></a>
						<a href="eel.php" target="_blank"><div class="Articleopcoes">
							<div class="projeto_titulo">Educação Esporte e Lazer
								</div>
								<div class="projeto_linha">
								</div>
								<div class="projeto_imagem">
									<img src="imagens/eel.jpg">
								</div>
								<div class="projeto_texto">
									Projeto exclusivo para Quadra 101 com atividades de esporte, cursos e eventos.
									<br> Levando mais saúde e Qualidade de Vida para dentro do nosso condomínio
								</div>	
							</div></a>
						<a href="classificados.php"><div class="Articleopcoes">
							<div class="projeto_titulo">Classificados
								</div>
								<div class="projeto_linha">
								</div>
								<div class="projeto_imagem">
									<img src="imagens/classificados.jpg">
								</div>
								<div class="projeto_texto">
									Ofereça gratuitamente para vizinhança seus serviços e produtos e aumente sua renda.
									Condôminos, o melhor produtos pode estar ao lado de sua casa. Conheça mais...
								</div>	
							</div></a>
					</article>
					<aside>
						<div class="Asideopcoes">
							<div class="projeto_titulo">Documentos
							</div>
							<div class="projeto_linha">
							</div>
							<div class="projeto_filiadas">
									<a href="documentos/ConvencaoRegistrada.pdf" target="_blank"><div class="filiadas">
										<b><center>Convenção Coletiva</center></b>
										<img src="imagens/convencao.png">
									</div></a>
									<a href="documentos/RegimentoInterno.pdf" target="_blank"><div class="filiadas">
										<b><center>Regimento Interno</center></b>
										<img src="imagens/pasta3.png">
									</div></a>
									<a href="documentos/orcamento2018.pdf" target="_blank"><div class="filiadas">
										<b><center>Planej. Orçamentário</center></b>
										<img src="imagens/planejamento.png">
									</div>
									<a href="atas.php"><div class="filiadas">
										<b><center>Atas de Assembléia</center></b>
										<img src="imagens/assembleia2.png">
									</div></a>
									<a href="sindico.php"><div class="filiadas">
										<b><center>Responsável Legal</center></b>
										<img src="imagens/responsavel.png">
									</div></a>
									<a href="contratos.php"><div class="filiadas">
										<b><center>Contratos Vigentes</center></b>
										<img src="imagens/contratos.png">
									</div></a>
								</div>
							
						</div>		
						<div class="Asideopcoes">
							<div class="projeto_titulo">Prestação de Contas
							</div>
							<div class="projeto_linha">
							</div>
							<div class="projeto_filiadas">
									<a href="receitas.php"><div class="filiadas">
										<b><center>Receitas</center></b>
										<img src="imagens/grafica.jpg">
									</div></a>
									<a href="despesas.php"><div class="filiadas">
										<b><center>Despesas</center></b>
										<img src="imagens/despesas.png">
									</div></a>
									<a href="extra.php"><div class="filiadas">
										<b><center>Taxa Extra</center></b>
										<img src="imagens/grafica2.png">
									</div></a>
									<a href="fopag.php"><div class="filiadas">
										<b><center>Folha de Pagamento</center></b>
										<img src="imagens/folhapg2.png">
									</div></a>
									<a href="inadimplencia.php"><div class="filiadas">
										<b><center>Inadimplência</center></b>
										<img src="imagens/inadimplencia.png">
									</div></a>
									<a href="fundo.php"><div class="filiadas">
										<b><center>Fundo de Reserva</center></b>
										<img src="imagens/fundoreserva.jpg">
									</div></a>
								</div>

						</div>
					

					</aside>
				</div>
			</section>
			<!-- Rodapé-->
			<footer>
				<div class="Menucontainer">
					<div class="contatos">
							<div class="projeto_titulo">Endereço
							</div>
							<div class="projeto_linha">
							</div>
							<div class="enderecos">
							Rua 600 Lote 601 Quadra 101 Setor Meirelles Santa Maria, Distrito Federal <br>
							Telefone: <a href="tel:61-3395-6155">(61) 3395-6155</a>
								</div>
						
					</div>
					<div class="departamentos">
							<div class="projeto_titulo">Departamentos
							</div>
							<div class="projeto_linha">
							</div>
								<a href="mailto:kelita.farias@totalville101.com.br">Síndico</a>
								<a href="mailto:admnistracao@totalville101.com.br">Administração</a>
								<a href="mailto:conselho.fiscal@totalville101.com.br">Conselho Fiscal</a>
					</div>
				</div>
			</footer>
			<div class="copyright">
				© Copyright 2017-2018 totalville101.com.br - All Rights Reserved
			</div>	











