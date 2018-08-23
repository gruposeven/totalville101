<?php
require "configuracoes.php";

	if(isset($_SESSION['usuario']) && empty($_SESSION['usuario'])== false){

        $usuario_autentic= addslashes($_SESSION['usuario']);
        $sql="SELECT * FROM pessoafisica WHERE cpf='$usuario_autentic'";
        $sql= $pdo->query($sql);
        $dados = $sql->fetch();
        $cpf_autentic=$dados['cpf'];
        $nome_pf_autentic=$dados['nome_pf'];
        $email_autentic=$dados['email_pf'];


	        echo''.$nome_pf_autentic.' ';
	        echo'<a class= "btn btn-outline-primary btn-sm" href="../logout_servidor.php">Sair
	        </a>';

        $sql="SELECT * FROM usuarios WHERE usuario='$cpf_autentic'";
        $sql= $pdo->query($sql);
        $dados_usuario = $sql->fetch();
        $usuario_status = $dados_usuario['usuario_status'];
        $cod_valida = $dados_usuario['cod_valida'];

		if($usuario_status == "Falta validar"){
	        $email_autentic=$dados['email_pf'];
	        $cpf_autentic=$dados['cpf'];
	        $nome_pf_autentic=$dados['nome_pf'];
            $cod_valida = $dados_usuario['cod_valida'];

			if(isset($_POST['codigo_validacao']) && empty($_POST['codigo_validacao'])== false){
	        $email_autentic=$dados['email_pf'];
	        $cpf_autentic=$dados['cpf'];
	        $nome_pf_autentic=$dados['nome_pf'];
            $cod_valida = $dados_usuario['cod_valida'];
			$codigo_validacao = addslashes($_POST['codigo_validacao']);

				if($codigo_validacao == $cod_valida){
		        $email_autentic=$dados['email_pf'];
				$usuario_status_novo = "Validado";
		        $cpf_autentic=$dados['cpf'];

	            $sql="UPDATE usuarios SET usuario_status='$usuario_status_novo' WHERE usuario='$cpf_autentic'";
                $sql=$pdo->query($sql);

//Enviando E-mail para o Administrador
				$emailsender = "suporte@totalville101.com.br";

				/* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. */
				
				if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
				elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
				else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");


				$emaildestinatario = "administracao@totalville101.com.br";
				$assuntoconfirma = "Cadastro Validado";
				$corpo = "<p>E-mail: ".$email_autentic."</p><p>CPF:".$cpf_autentic."</p><p>Status: ".$usuario_status_novo;

				$cabecalho = "MIME-Version: 1.1".$quebra_linha;
				$cabecalho .= "Content-type: text/html; charset=UTF-8".$quebra_linha;
				$cabecalho .= "From: ".$emailsender.$quebra_linha;
				$cabecalho .= "Return-Path: ".$emailsender.$quebra_linha;
				$cabecalho .=  "Reply-To: ".$email_autentic.$quebra_linha;
				$cabecalho .=  "X-Mailer: PHP/".phpversion();

				mail($emaildestinatario, $assuntoconfirma, $corpo, $cabecalho, "-r". $emailsender);

				header("Refresh:0");

				}else{
           		echo "<br>Código de Validação incorreto";
				}
			}
			echo
			'<div class="modal fade" id="faltaValidar">
				<div class="modal-dialog modal-dialog-centered modal-sm"> 
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-titulo">Validação de Cadastro</h5>
							<button class="close" data-dismiss="modal">
								<span>&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>O seu cadastro ainda não foi validado</p>
							<p>Foi encaminhado para <b>'.$email_autentic.'</b> o seu código de validação, informe no campo abaixo.</p>
							<form method="POST" class="justify-content-around">
								<div class="form-group">
									<label for="codigoValida">Código de Validação:</label>
									<input id="codigoValida" type="password" name="codigo_validacao" class="form-control 
									form-control-sm text-align-center"> 	
								</div>
								<div class="form-group"><center>
									<input type="submit" value="Validar" class="btn btn-primary"></center>
								</div>
							</form>
						</div>
						<div class="modal-footer justify-content-between">
							<a href="cadastro.php"class="btn btn-success"target="_blank">Altere E-mail</a>
							<button class="btn btn-danger" data-dismiss="modal">
							Validar Depois
							</button>
						</div>
					</div>	
				</div>
			</div>
			<script>$("#faltaValidar").modal("show")</script>';
		
		}else{
		
		}
        






    }else{
        echo'Usuário não autenticado ';
        echo'<button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#login">Login</button>';

    }


//Autenticação

if(isset($_POST['login_usuario']) && ($_POST['login_usuario'] != "") 
	&& isset($_POST['login_senha']) && ($_POST['login_senha'] != "")){
	$login_usuario = addslashes($_POST['login_usuario']);
	$login_senha = md5(addslashes($_POST['login_senha']));
	$ip_usuario = addslashes($_SERVER["REMOTE_ADDR"]);
	$acesso = date("Y/m/d H:i:s");

	$sql="SELECT * FROM usuarios WHERE usuario='$login_usuario' AND senha='$login_senha'";
	$sql=$pdo->query($sql);

	if($sql->rowCount() > 0){

		$dados=$sql->fetch();
		$usuario_aut=$dados['usuario'];

		$_SESSION['usuario']= $dados['usuario'];
		$_SESSION['usuario_status']=$dados['usuario_status'];

		$sql="SELECT * FROM pessoafisica WHERE cpf='$usuario_aut'";
		$sql=$pdo->query($sql);

		if($sql->rowCount() > 0){
		
				$dados_pf=$sql->fetch();

				$_SESSION['nome_pf']=$dados_pf['nome_pf'];
				$_SESSION['email_pf']=$dados_pf['email_pf'];

				$sql="INSERT INTO acesso_sistema SET acesso='$acesso', ip_usuario='$ip_usuario', 
				usuario='$usuario_aut'";
				$pdo->query($sql);

				header("Refresh:0");

		}else{

		echo "Cadastro Pessoa Física não encontrado";

		}

	
	}else{

	echo "<br><small>Dados Inválidos!</small>";	

	}

}else{

}
//Habilitação de cadastro
	if(isset($_SESSION['usuario_status']) && empty($_SESSION['usuario_status'])== false){
       $usuario_status= addslashes($_SESSION['usuario_status']);
        if(($usuario_status=="Validado") OR ($usuario_status=="Programador")){
			?><script>$(document).ready(function(){
			$('#cadastrar_unidade').addClass('active').removeClass('disabled');});</script>
			<?php }
    }
//Habilitação de sistema
	if(isset($_SESSION['usuario_status']) && empty($_SESSION['usuario_status'])== false){
       $usuario_status= addslashes($_SESSION['usuario_status']);
        if(($usuario_status=="Sindico") OR ($usuario_status=="Programador") OR ($usuario_status=="Gerente")
        	OR ($usuario_status=="Administradora") OR ($usuario_status=="Administrativo")){
			?><script>$(document).ready(function(){
			$('#cadastro_pessoa_fisica').removeClass('disabled');
				document.getElementById('cadastro_pessoa_fisica').style.color = 'blue';
				document.getElementById('cadastro_pessoa_fisica').style.backgroundColor = '#F2F2F2';});</script>


			<?php }

    }

