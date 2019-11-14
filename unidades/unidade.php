<html>
	<head>
		<title>Total Ville 101</title>
		<meta charset="UTF-8">
		<meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">

		<?php
		require "../configuracoes.php";
		?>

		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../biblioteca/normalize.css">
		<link rel="shortcut icon" type="text/css" href="../imagens/sistema.ico">
		
		<script type="text/javascript" src="../script/script1.js"></script>
		<script type="text/javascript" src="../biblioteca/jquery-3.2.1.min.js"></script>

		<body>
			<!-- CABEÇALHO-->
			<header>
				<div class="Menucontainer">
					<div class="logo">
					<img src="../imagens/novologo.jpg">
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
								<li><a href="../reserva.php"> Reservas</a></li>
								<li><a href="../contas.php"> Prestação de Contas</a></li>
								<li><a href="../atas.php"> Assembléias</a></li>
								<li><a href="../documentos/ConvencaoRegistrada.pdf" target="_blank"> Convenção </a></li>
								<li><a href="../documentos/RegimentoInterno.pdf" target="_blank"> Regimento</a></li>
								<li><a href="../negociacoes.php"> Negociações </a></li>
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
                        echo'<a href="../logout_servidor.php"><button class="botao_sair" id="botao_sair">Sair</button></a>';

                    }else{
                        echo'Usuário não autenticado';
                        echo'<a href="../login.php"><button class="botao_sair" id="botao_sair">Login</button></a>';

                    }
          ?>
			
			<!-- BANNER-->
			<section id="banner">

			</section>
		</div>