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
					<!-- CORPO-->
				<section id="corpo">
					<div class="Corpocontainer">
						<!-- Artigos-->
						<article>
							<a href="documentos/Contrato_AeS.pdf" target="_blank"><div class="Articleopcoes">
								<div class="projeto_titulo">Contrato - Administradora
								</div>
								<div class="projeto_linha">
								</div>
								<div class="projeto_imagem">
									<img src="imagens/grafica2.png">
								</div>
								<div class="projeto_texto">
									 
								</div>	
							</div></a>	
							
							<a href="documentos/contrato_centro_sul.pdf" target="_blank"><div class="Articleopcoes">
								<div class="projeto_titulo">Contrato - Terceirização 
								</div>
								<div class="projeto_linha">
								</div>
								<div class="projeto_imagem">
									<img src="imagens/folhapg.png">
								</div>
								<div class="projeto_texto">
									Contrato finalizado em 31 de Julho de 2018
								</div>	
							</div></a>
	
							<a href="documentos/CONTRATO_HIDRUS.pdf" target="_blank"><div class="Articleopcoes">
								<div class="projeto_titulo">Contrato - Medição de Água
								</div>
								<div class="projeto_linha">
								</div>
								<div class="projeto_imagem">
									<img src="imagens/grafica.jpg">
								</div>
								<div class="projeto_texto">
									 
								</div>	
							</div></a>	

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


