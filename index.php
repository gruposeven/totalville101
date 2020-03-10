<html>
	<head>
		<title>Total Ville 101</title>
		<meta charset="UTF-8">
		<meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">

		<?php
		require "configuracoes.php";

		
		session_start();
			if(isset($_SESSION['usuario']) && empty($_SESSION['usuario'])== false){

                    $usuario= addslashes($_SESSION['usuario']);
                    $sql="SELECT * FROM pessoafisica WHERE cpf='$usuario'";
                    $sql= $pdo->query($sql);
                    $dados = $sql->fetch();
                    $cpf=$dados['cpf'];
                    $nome_pf=$dados['nome_pf'];
                    $categoria_pf=$dados['categoria_pf'];}
		
		?>
		
	</head>

		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="biblioteca/normalize.css">
		<link rel="shortcut icon" type="text/css" href="imagens/sistema.ico">
		
		<script type="text/javascript" src="script/script1.js"></script>
		<script type="text/javascript" src="biblioteca/jquery-3.2.1.min.js"></script>

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
								<li><a href="http://www.sistema.totalville101.com.br" target="_blank"> Reservas</a></li>
								<li><a href="../assembleias.php"> Assembléias</a></li>
								<li><a href="../documentos/ConvencaoRegistrada.pdf" target="_blank"> Convenção </a></li>
								<li><a href="../regimento.php" target="_blank"> Regimento</a></li>
								<li><a href="../eel.php" target="_blank"> Esporte</a></li>
								<li><a href="../eventos.php" target="_blank"> Eventos</a></li>
								<?php
								if(isset($_SESSION['usuario']) && empty($_SESSION['usuario'])== false){
									if($categoria_pf == 1){
										echo'<li><a href="../sistema/diretoria.php"> Diretoria </a></li>';
										}else{
											if($categoria_pf > 1 AND $categoria_pf < 10){
											echo'<li><a href="../sistema/administrativo.php"> Administrativo </a></li>';	
												}else{
													if($categoria_pf >= 10){
													echo'<li><a href="../sistema/esp_condomino.php">Espaço do Condômino</a></li>';
												}
											}
										}
									}else{
										echo'<li><a href="login.php">Login</a></li>';
									}
								?>
							</ul>
						</nav>
					</div>
				</div>
			</header>
			<div class="sessao">
<?php
			
			if(isset($_SESSION['usuario']) && empty($_SESSION['usuario'])== false){

                    $usuario= addslashes($_SESSION['usuario']);
                    $sql="SELECT * FROM pessoafisica WHERE cpf='$usuario'";
                    $sql= $pdo->query($sql);
                    $dados = $sql->fetch();
                    $cpf=$dados['cpf'];
                    $nome_pf=$dados['nome_pf'];
                    $categoria_pf=$dados['categoria_pf'];
                    
                    
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
						<a href="http://www.sistema.totalville101.com.br" target="_blank"><div class="Articleopcoes">
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
						
						
						<a href="http://www.sistema.totalville101.com.br" target="_blank"><div class="Articleopcoes">
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
						<a href="eventos.php"><div class="Articleopcoes">
							<div class="projeto_titulo">Festas e Eventos
								</div>
								<div class="projeto_linha">
								</div>
								<div class="projeto_imagem">
									<img src="imagens/eventos.jpg">
								</div>
								<div class="projeto_texto">
									Acompanhe os eventos realizados em seu condomínio e confira as fotos e vídeos das festas
									<br>Cadastre sua participação nos próximos eventos
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
									<a href="documentos/previsao2019_2020.pdf" target="_blank"><div class="filiadas">
										<b><center>Planej. Orçamentário</center></b>
										<img src="imagens/planejamento.png">
									</div>
									<a href="assembleias.php"><div class="filiadas">
										<b><center>Atas de Assembléia</center></b>
										<img src="imagens/assembleia2.png">
									</div></a>
									<a href="http://www.g7condominios.com.br" target="_blank"><div class="filiadas">
										<b><center>Administração</center></b>
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
									<a href="http://www.sistema.totalville101.com.br" target="_blank"><div class="filiadas">
										<b><center>Receitas</center></b>
										<img src="imagens/grafica.jpg">
									</div></a>
									<a href="http://www.sistema.totalville101.com.br" target="_blank"><div class="filiadas">
										<b><center>Despesas</center></b>
										<img src="imagens/despesas.png">
									</div></a>
									<a href="http://www.sistema.totalville101.com.br" target="_blank"><div class="filiadas">
										<b><center>Taxa Extra</center></b>
										<img src="imagens/grafica2.png">
									</div></a>
									<a href="http://www.sistema.totalville101.com.br" target="_blank"><div class="filiadas">
										<b><center>Folha de Pagamento</center></b>
										<img src="imagens/folhapg2.png">
									</div></a>
									<a href="http://www.sistema.totalville101.com.br" target="_blank"><div class="filiadas">
										<b><center>Inadimplência</center></b>
										<img src="imagens/inadimplencia.png">
									</div></a>
									<a href="http://www.sistema.totalville101.com.br" target="_blank"><div class="filiadas">
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
								<a href="mailto:sindico@totalville101.com.br">Síndico</a>
								<a href="mailto:admnistracao@totalville101.com.br">Administração</a>
								<a href="mailto:conselho.fiscal@totalville101.com.br">Conselho Fiscal</a>
					</div>
				</div>
			</footer>
			<div class="copyright">
				© Copyright 2017-2018 totalville101.com.br - All Rights Reserved
			</div>	











