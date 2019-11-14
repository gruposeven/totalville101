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
								<li><a href="../documentos/RegimentoInterno.pdf" target="_blank"> Regimento</a></li>
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
					<!-- CORPO-->
				<section id="corpo">
					<div class="Corpocontainer">
						<!-- Artigos-->
						<article>
							<a href="documentos/20_02_2016.pdf" target="_blank"><div class="Articleopcoes">
								<div class="projeto_titulo">20 de Fevereiro de 2016
								</div>
								<div class="projeto_linha">
								</div>
								<div class="projeto_imagem">
									<img src="imagens/negociacao.jpg">
								</div>
								<div class="projeto_texto">
									Pauta: Auditoria dos livros fiscais<br>
									Pauta: Taxa de Água e Esgoto<br>
									Pauta: Inadimplência 
								</div>	
							</div></a>	
							
							<a href="documentos/10_04_2016.pdf" target="_blank"><div class="Articleopcoes">
								<div class="projeto_titulo">10 de Abril de 2016
								</div>
								<div class="projeto_linha">
								</div>
								<div class="projeto_imagem">
									<img src="imagens/grafica2.png">
								</div>
								<div class="projeto_texto">
									Pauta: Prestação de Contas 2015<br>
									Pauta: Previsão Orçamentária 2016<br>
									Pauta:Eleição de Subsíndicos e Conselheiros Fiscais 
								</div>	
							</div></a>	
							<a href="documentos/20_05_2017.pdf" target="_blank"><div class="Articleopcoes">
								<div class="projeto_titulo">20 de Maio de 2017
								</div>
								<div class="projeto_linha">
								</div>
								<div class="projeto_imagem">
									<img src="imagens/responsavel.png">
								</div>
								<div class="projeto_texto">
									Pauta: Eleição Sindico(a) Biênio 2017/2019
								</div>	
							</div></a>	
							<a href="documentos/12_03_2017.pdf" target="_blank"><div class="Articleopcoes">
								<div class="projeto_titulo">12 de Março de 2017
								</div>
								<div class="projeto_linha">
								</div>
								<div class="projeto_imagem">
									<img src="imagens/grafica2.png">
								</div>
								<div class="projeto_texto">
									Pauta: Prestação de Conta 2016 <br>
									Pauta: Previsão Orçamentária 2017
								</div>	
							</div></a>	
							<a href="documentos/10_03_2018.pdf" target="_blank"><div class="Articleopcoes">
								<div class="projeto_titulo">10 de Março de 2018
								</div>
								<div class="projeto_linha">
								</div>
								<div class="projeto_imagem">
									<img src="imagens/grafica2.png">
								</div>
								<div class="projeto_texto">
								Pauta: Prestação de Conta 2017 <br>
								Pauta: Previsão Orçamentária 2018
									
								</div>	
							</div></a>	
							<a href="convocacoes.php" target="_blank"><div class="Articleopcoes">
								<div class="projeto_titulo">Próxima Assembléia (convocação)
								</div>
								<div class="projeto_linha">
								</div>
								<div class="projeto_imagem">
									<img src="imagens/assembleia.png">
								</div>
								<div class="projeto_texto">
									Pauta: Aprovação do modelo de cobertura estacionamento dos blocos de casa
								</div>	
							</div></a>	
						</article>
					</div>
				</section>		
					<!-- CORPO-->
					<section id="corpo">
						<div class="Corpocontainer">
							<article>
							<div class="Articleopcoes" id="atasAnteriores">
								<div class="projeto_titulo">Assembléias Anteriores (2012)
								</div>
								<a id="atasAntigas" href="documentos/24_07_2012.pdf" target="_blank">24 de Julho de 2012</a>
							</div>

							<div class="Articleopcoes" id="atasAnteriores">
								<div class="projeto_titulo">Assembléias Anteriores (2013)
								</div>
								<a id="atasAntigas" href="documentos/17_03_2013.pdf" target="_blank"> 17 de Março de 2013</a>
								<a id="atasAntigas" href="documentos/16_04_2013.pdf" target="_blank"> 16 de Abril de 2013</a>
								<a id="atasAntigas" href="documentos/26_05_2013.pdf" target="_blank"> 26 de Maio de 2013</a>
								<a id="atasAntigas" href="documentos/08_06_2013.pdf" target="_blank"> 08 de Junho de 2013</a>
								<a id="atasAntigas" href="documentos/29_06_2013.pdf" target="_blank"> 29 de Junho de 2013</a>
								<a id="atasAntigas" href="documentos/24_07_2013.pdf" target="_blank"> 24 de Julho de 2013</a>
								<a id="atasAntigas" href="documentos/01_08_2013.pdf" target="_blank"> 01 de Agosto de 2013</a>
								<a id="atasAntigas" href="documentos/17_08_2013.pdf" target="_blank"> 17 de Agosto de 2013</a>
								<a id="atasAntigas" href="documentos/27_09_2013.pdf" target="_blank"> 27 de Setembro de 2013</a>
								<a id="atasAntigas" href="documentos/26_10_2013.pdf" target="_blank"> 26 de Outubro de 2013</a>
								<a id="atasAntigas" href="documentos/23_11_2013.pdf" target="_blank"> 23 de Novembro de 2013</a>
							</div>
							<div class="Articleopcoes" id="atasAnteriores">
								<div class="projeto_titulo">Assembléias Anteriores (2015)
								</div>
								<a id="atasAntigas" href="documentos/26_01_2015.pdf" target="_blank">26 de Janeiro de 2015</a>
								<a id="atasAntigas" href="documentos/14_03_2015.pdf" target="_blank">14 de Março de 2015</a>
								<a id="atasAntigas" href="documentos/30_05_2015.pdf" target="_blank">30 de Maio de 2015</a>
								<a id="atasAntigas" href="documentos/10_09_2015.pdf" target="_blank">10 de Setembro de 2015</a>

							</div>
							</article>
						</div>
					</section>
<!--Rodapé-->
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
		</body>
	</head>
</html>
