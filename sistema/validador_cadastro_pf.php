<?php
require "../configuracoes.php";

$foto_pf="";

if(isset($_POST['validar_cpf']) && ($_POST['validar_cpf'] != "")){
	$validadoCPF=addslashes($_POST['validar_cpf']);
	if(strlen ($validadoCPF)==11){
		$validadoCPF=addslashes($_POST['validar_cpf']);
		$sql="SELECT * FROM pessoafisica WHERE cpf='$validadoCPF'";
		$sql=$pdo->query($sql);
		if ($sql->rowCount() > 0){
	        $dados_pf = $sql->fetch();
			$nome_pf = $dados_pf['nome_pf'];
			$email_pf = $dados_pf['email_pf'];
			$cpf = $dados_pf['cpf'];
			$rg_pf = $dados_pf['rg_pf'];
			$telefone_pf = $dados_pf['telefone_pf'];
			$endereco_rua_pf = $dados_pf['endereco_rua_pf'];
			$endereco_numero_pf = $dados_pf['endereco_numero_pf'];
			$endereco_complemento_pf = $dados_pf['endereco_complemento_pf'];
			$endereco_bairro_pf = $dados_pf['endereco_bairro_pf'];
			$endereco_cidade_pf = $dados_pf['endereco_cidade_pf'];
			$endereco_estado_pf = $dados_pf['endereco_estado_pf'];
			$endereco_cep_pf = $dados_pf['endereco_cep_pf'];
			$validadoCPF = $dados_pf['cpf'];
			$sexo_pf =$dados_pf['sexo_pf'];
			$estadocivil_pf= $dados_pf['estadocivil_pf'];			
			$nasc_pf = date($dados_pf['nasc_pf']);
			list($ano, $mes, $dia) = explode('-', $nasc_pf);
			$nasc_pf2 = mktime(0,0,0, $mes, $dia, $ano);
			$nasc_pf3 = date("d/m/Y", $nasc_pf2);
			$foto_pf = $dados_pf['foto_pf'];		
			if(isset($foto_pf) && ($foto_pf != "")){
				?><script>$(document).ready(function(){
				document.getElementById('fotoCPF').style.display = 'block';});</script>
				<?php
			}else{

			}
			?><script>$(document).ready(function(){
			document.getElementById('alert_validacao').style.display = 'none';});</script>
			<?php 	
			?><script>$(document).ready(function(){
			document.getElementById('alert_cpf_nao_cadastrado').style.display = 'none';});</script>
			<?php 	
			?><script>$(document).ready(function(){
			document.getElementById('alert_cpf_incorreto').style.display = 'none';});</script>
			<?php 	
			?><script>$(document).ready(function(){
			$('#alert_cpf_cadastrado').addClass('show');});</script>
			<?php
			?><script>$(document).ready(function(){
			$('#botao_editar').addClass('btn-warning');
			$('#botao_editar').removeAttr('disabled');});</script>
			<?php 
			?><script>$(document).ready(function(){
			$('#botao_deletar').addClass('btn-danger');
			$('#botao_deletar').removeAttr('disabled');});</script>
			<?php 
			?><script>$(document).ready(function(){
			$('#botao_imprimir').addClass('btn-dark');
			$('#botao_imprimir').removeAttr('disabled');});</script>
			<?php 
		}else{
			?><script>$(document).ready(function(){
			document.getElementById('alert_validacao').style.display = 'none';});</script>
			<?php 	
			?><script>$(document).ready(function(){
			document.getElementById('alert_cpf_cadastrado').style.display = 'none';});</script>
			<?php 	
			?><script>$(document).ready(function(){
			document.getElementById('alert_cpf_incorreto').style.display = 'none';});</script>
			<?php 	
			?><script>$(document).ready(function(){
			$('#alert_cpf_nao_cadastrado').addClass('show');});</script>
			<?php
			?><script>$(document).ready(function(){
			$('#botao_cadastrar').addClass('btn-success');
			$('#botao_cadastrar').removeAttr('disabled');});</script>
			<?php 
		}
	}else{
		?><script>$(document).ready(function(){
		document.getElementById('alert_validacao').style.display = 'none';});</script>
		<?php
		?><script>$(document).ready(function(){
		document.getElementById('alert_cpf_cadastrado').style.display = 'none';});</script>
		<?php
		?><script>$(document).ready(function(){
		document.getElementById('alert_cpf_nao_cadastrado').style.display = 'none';});</script>
		<?php 	
		?><script>$(document).ready(function(){
		$('#alert_cpf_incorreto').addClass('show');});</script>
		<?php
		?><script>$(document).ready(function(){
		$('#validar_cpf').removeAttr('disabled');});</script>
		<?php
		?><script>$(document).ready(function(){
		$('#botao_verificar').addClass('btn-primary');
		$('#botao_verificar').removeAttr('disabled');});</script>
		<?php 
	}
}else{
	?><script>$(document).ready(function(){
	$('#validar_cpf').removeAttr('disabled');});</script>
	<?php 	
	?><script>$(document).ready(function(){
	document.getElementById('alert_cpf_incorreto').style.display = 'none';});</script>
	<?php
	?><script>$(document).ready(function(){
	document.getElementById('alert_cpf_cadastrado').style.display = 'none';});</script>
	<?php
	?><script>$(document).ready(function(){
	document.getElementById('alert_cpf_nao_cadastrado').style.display = 'none';});</script>
	<?php 	
	?><script>$(document).ready(function(){
	$('#alert_validacao').addClass('show');});</script>
	<?php 
	?><script>$(document).ready(function(){
	$('#botao_verificar').addClass('btn-primary');
	$('#botao_verificar').removeAttr('disabled');});</script>
	<?php 
}

//Cadastro novo usuário
if(isset($_POST['dpnome_pf']) && ($_POST['dpnome_pf'] != "")){
	if(isset($_POST['dprg_pf']) && ($_POST['dprg_pf'] != "")){
	$cpf = addslashes($_POST['dpcpf']);
	mkdir("../pessoafisica/$cpf");
	mkdir("../pessoafisica/$cpf/DocumentosPessoais");

	$data_criacao = date("Y/m/d H:i:s");
	$nome_pf = addslashes($_POST['dpnome_pf']);
	$cpf = addslashes($_POST['dpcpf']);
	$rg_pf = addslashes($_POST['dprg_pf']);
	$telefone_pf = addslashes($_POST['dptelefone_pf']);
	$endereco_rua_pf = addslashes($_POST['dpendereco_rua_pf']);
	$endereco_numero_pf = addslashes($_POST['dpendereco_numero_pf']);
	$endereco_complemento_pf = addslashes($_POST['dpendereco_complemento_pf']);
	$endereco_bairro_pf = addslashes($_POST['dpendereco_bairro_pf']);
	$endereco_cidade_pf = addslashes($_POST['dpendereco_cidade_pf']);
	$endereco_estado_pf = addslashes($_POST['dpendereco_estado_pf']);
	$endereco_cep_pf = addslashes($_POST['dpcep_pf']);
	$senha = md5($cpf);
	$nasc_pf = addslashes($_POST['dpnasc_pf']);
	$sexo_pf = addslashes($_POST['dpsexo_pf']);
	$estadocivil_pf = addslashes($_POST['dpestadocivil_pf']);
	$validacao = "Falta validar";
	$cod_valida = rand(100, 999);

    $sql="INSERT INTO pessoafisica SET nome_pf='$nome_pf', rg_pf='$rg_pf', 
    telefone_pf='$telefone_pf', endereco_rua_pf='$endereco_rua_pf', 
    endereco_numero_pf='$endereco_numero_pf', nasc_pf='$nasc_pf', 
    endereco_complemento_pf='$endereco_complemento_pf', 
    endereco_bairro_pf='$endereco_bairro_pf', sexo_pf='$sexo_pf', estadocivil_pf='$estadocivil_pf', endereco_cidade_pf='$endereco_cidade_pf', 
    endereco_estado_pf='$endereco_estado_pf', endereco_cep_pf='$endereco_cep_pf', cpf='$cpf'";
    $sql=$pdo->query($sql);

    $sql="INSERT INTO usuarios SET usuario='$cpf', cod_valida='$cod_valida', senha='$senha', usuario_status='$validacao', 
    data_criacao='$data_criacao'";
    $sql=$pdo->query($sql); 

	echo"<div class='alert alert-lg alert-success alert dismissible show' role='alert' id='AlertaCadastro'>
	Cadastro realizado com sucesso!
	<button class='close' data-dismiss='alert' aria-label='fechar'>
	<span aria-hidden='true'>&times;</span>
	</button> 
	</div>";
		if(isset($_FILES['dpimagem_pf']) && ($_FILES['dpimagem_pf'] != "")){
		$imagem_pf = $_FILES['dpimagem_pf'];
			if(isset($imagem_pf['tmp_name']) && ($imagem_pf['tmp_name'] != "")){
				if(($imagem_pf['type']=='image/png') OR ($imagem_pf['type']== "image/jpeg")){
					if($imagem_pf['type']=='image/png'){
					//Guardando a Imagem na Pasta
					$imagem_pf = $_FILES['dpimagem_pf'];
					$image_temp	= $imagem_pf['tmp_name'];
					move_uploaded_file($image_temp, '../pessoafisica/'.$cpf.'/imagem_pf_'.$cpf.'');

					//Covertendo para JPG
					$filename = '../pessoafisica/'.$cpf.'/imagem_pf_'.$cpf.'';
					$image = imagecreatefrompng($filename);
					$bg = imagecreatetruecolor(imagesx($image), imagesy($image));
					imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
					imagealphablending($bg, TRUE);
					imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
					imagedestroy($image);
					$quality = 50;  
					imagejpeg($bg, $filename . ".jpg", $quality);
					imagedestroy($bg);
					//Apaga o arquivo antigo
					$arquivo_antigo = '../pessoafisica/'.$cpf.'/imagem_pf_'.$cpf.'';
					unlink($arquivo_antigo);
					//Criar Imagem Mini 
					$imagem_pf = '../pessoafisica/'.$cpf.'/imagem_pf_'.$cpf.'.jpg';			
						$width = 100;
					$height = 100;
					list($width_original, $height_original) = getimagesize($imagem_pf);
					$ratio = $width_original / $height_original;
						if($width / $height > $ratio){
							$width = $height * $ratio;
						}else{
								$height = $width / $ratio;
						}
					$image_new = imagecreatetruecolor($width, $height);
					$image_original = imagecreatefromjpeg($imagem_pf);
					imagecopyresampled($image_new, $image_original, 0, 0, 0, 0, $width, $height, $width_original, $height_original);
					imagejpeg($image_new, '../pessoafisica/'.$cpf.'/mini_imagem-'.$cpf.'.jpg', 100);					
		            $sql="UPDATE pessoafisica SET foto_pf='$foto_pf' WHERE cpf='$cpf'";
	                $sql=$pdo->query($sql);
					}else{
						//Guardando a Imagem na Pasta
						$imagem_pf = $_FILES['dpimagem_pf'];
						$image_temp	= $imagem_pf['tmp_name'];
						move_uploaded_file($image_temp, '../pessoafisica/'.$cpf.'/imagem_pf_'.$cpf.'.jpg');
						//Criar Imagem Mini 
						$imagem_pf = '../pessoafisica/'.$cpf.'/imagem_pf_'.$cpf.'.jpg';			
						$width = 100;
						$height = 100;
						list($width_original, $height_original) = getimagesize($imagem_pf);
						$ratio = $width_original / $height_original;
							if($width/$height > $ratio){
								$width = $height * $ratio;
							}else{
									$height = $width / $ratio;
							}
						$image_new = imagecreatetruecolor($width, $height);
						$image_original = imagecreatefromjpeg($imagem_pf);
						imagecopyresampled($image_new, $image_original, 0, 0, 0, 0, $width, $height, $width_original, $height_original);
						imagejpeg($image_new, '../pessoafisica/'.$cpf.'/mini_imagem-'.$cpf.'.jpg', 100);
						$foto_pf='/mini_imagem-'.$cpf.'.jpg';

			            $sql="UPDATE pessoafisica SET foto_pf='$foto_pf' WHERE cpf='$cpf'";
		                $sql=$pdo->query($sql);
						//Término Criar Imagem MIni
						//Confirmação de Cadastro
						echo '<div class="container-fluid">
						<div class="modal fade show" id="confirmacao">
						<div class="modal-dialog modal-dialog-centered modal-md"> 
						<div class="modal-content">
						<div class="modal-header modal-header-sm">
						<img src="pessoafisica/'.$cpf.'/mini_imagem-'.$cpf.'.jpg" class="img-fluid img-thumbnail float-right">
						<h5 class="modal-titulo">Cadastro Realizado!!!</h5>
						<button class="close" data-dismiss="modal">
						<span>&times;</span>
						</button>
						</div>
						<div class="modal-body">
						Criado em: '.$data_criacao.'<br>
						Nome: '.$nome_pf.'<br>
						CPF: '.$cpf.'<br>
						RG: '.$rg_pf.'
						</div>
						<div class="modal-footer justify-content-between">
						<button class="btn btn-danger" data-dismiss="modal">Fechar</button>
						</div>
						</div>	
						</div>
						</div>
						</div>';
						//Término Confirmação de Cadastro com imagem 
					}
				}else{
					echo"
					<div class='container-fluid'>
					<div class='modal fade' id='erro'>
					<div class='modal-dialog modal-dialog-centered modal-sm'> 
					<div class='modal-content'>
					<div class='modal-body'>
					<b>Erro:</b> Imagem não compatível (JPG /PNG)
					</div>
					<div class='modal-footer justify-content-between'>
					<button class='btn btn-danger' data-dismiss='modal' onclick='history.go(-1)''>
					Retornar ao Cadastro
					</button>
					</div>
					</div>	
					</div>
					</div>
					<script>$('#erro').modal('show')</script>";
				}
			}else{
				echo"<div class='alert alert-lg alert-warning alert dismissible show' role='alert' id='AlertaCadastro'>
				Imagem não arquivada!
				<button class='close' data-dismiss='alert' aria-label='fechar'>
				<span aria-hidden='true'>&times;</span>
				</button> 
				</div>";
				//Modal de confirmação sem imagem
				echo '<div class="container-fluid">
				<div class="modal fade show" id="confirmacao">
				<div class="modal-dialog modal-dialog-centered modal-md"> 
				<div class="modal-content">
				<div class="modal-header modal-header-sm">
				<h5 class="modal-titulo">Cadastro Realizado!!!</h5>
				<button class="close" data-dismiss="modal">
				<span>&times;</span>
				</button>
				</div>
				<div class="modal-body">
				Criado em: '.$data_criacao.'<br>
				Nome: '.$nome_pf.'<br>
				CPF: '.$cpf.'<br>
				RG: '.$rg_pf.'
				</div>
				<div class="modal-footer justify-content-between">
				<button class="btn btn-danger" data-dismiss="modal">Fechar</button>
				</div>
				</div>	
				</div>
				</div>
				</div>';
					if($validacao == "Falta validar"){ ?><script>$(document).ready(function(){
					$('#confirmacao').modal('show');});</script><?php
					}
			}
			//Inserindo Modal de Validação
				if($validacao == "Falta validar"){ ?><script>$(document).ready(function(){
				$('#confirmacao').modal('show');});</script>
				<?php }
		}else{
			echo"<div class='alert alert-lg alert-warning alert dismissible show' role='alert' id='AlertaCadastro'>
			Imagem não arquivada!
			<button class='close' data-dismiss='alert' aria-label='fechar'>
			<span aria-hidden='true'>&times;</span>
			</button> 
			</div>";
		}

		if(isset($_POST['dpemail_pf']) && ($_POST['dpemail_pf'] != "")){
			$email_pf=addslashes($_POST['dpemail_pf']);
			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $email_pf)){
				$sql="SELECT * FROM pessoafisica WHERE email_pf='$email_pf'";
				$sql=$pdo->query($sql);
				if ($sql->rowCount() > 0){
					echo"
					<div class='modal fade' id='erro'>
						<div class='modal-dialog modal-dialog-centered modal-sm'> 
							<div class='modal-content'>
								<div class='modal-body'>
								<b>Erro:</b> E-mail já cadastrado - Valide novamente o CPF para informar outro e-mail
								</div>
								<div class='modal-footer justify-content-between'>
									<button class='btn btn-danger' data-dismiss='modal' onclick='history.go(-1)''>
									Retornar
									</button>
								</div>
							</div>	
						</div>
					</div>
					<script>$('#erro').modal('show')</script>";

				}else{
					$email_pf=addslashes($_POST['dpemail_pf']);
		            $sql="UPDATE pessoafisica SET email_pf='$email_pf' WHERE cpf='$cpf'";
	                $sql=$pdo->query($sql);

					//E-mail de novo cadastro realizado 
					$emailsender = "suporte@totalville101.com.br";

					/* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. */
					if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
					elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
					else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");


					$emaildestinatario = "administracao@totalville101.com.br";
					$assuntoconfirma = "Cadastro Realizado";
					$corpo = "<p>Nome: ".$nome_pf."</p><p>E-mail: ".$email_pf."</p><p>CPF:".$cpf."</p><p>Criado em: ".$data_criacao."</p><p>Status: ".$validacao;
					$cabecalho = "MIME-Version: 1.1".$quebra_linha;
					$cabecalho .= "Content-type: text/html; charset=UTF-8".$quebra_linha;
					$cabecalho .= "From: ".$emailsender.$quebra_linha;
					$cabecalho .= "Return-Path: ".$emailsender.$quebra_linha;
					$cabecalho .=  "Reply-To: ".$email_pf.$quebra_linha;
					$cabecalho .=  "X-Mailer: PHP/".phpversion();
					//Mandando e-mail para Administrador
					mail($emaildestinatario, $assuntoconfirma, $corpo, $cabecalho, "-r". $emailsender);
					// Mandando e-mail de validação 
					$assuntovalida = "Total Ville 101 - Valide de Cadastro";
					$mensagemvalida = "<h3>Prezado(a) ".$nome_pf."</h3>
					<p>O seu cadastro em nosso sistema foi realizado com sucesso pelo Administrador</p>
					<p>Usuário: ".$cpf."</p>
					<p>Senha Temporária: ".$cpf."</p>
					<p>Código de Validação: ".$cod_valida."</p>
					<p>Faça seu login em nosso site e logo em seguida informe o código de validação para concluir seu cadastro</p>
					<p>Para alterar a sua senha temporária acesse a página CADASTRO, faça o seu login e altere em Dados Pessoais</p>
					<p>Não deixe de atualizar o seu cadastro completando seus dados pessoais</p>
					<p>Administração";

					mail($email_pf, $assuntovalida, $mensagemvalida, $cabecalho, "-r". $emailsender);
				}
			}else{
				echo"
				<div class='modal fade' id='erro'>
					<div class='modal-dialog modal-dialog-centered modal-sm'> 
						<div class='modal-content'>
							<div class='modal-body'>
							<b>Erro:</b> E-mail informado incorreto - Valide novamente o CPF para cadastrar
							</div>
							<div class='modal-footer justify-content-between'>
								<button class='btn btn-danger btn-sm' data-dismiss='modal'>
								Retornar
								</button>
							</div>
						</div>	
					</div>
				</div>
		<script>$('#erro').modal('show')</script>";
			}
		}
	}else{
		echo"RG Incorreto";
	}

}else{

}
