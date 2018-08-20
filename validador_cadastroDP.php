<?php
require "configuracoes.php";


	if(isset($_SESSION['usuario']) && empty($_SESSION['usuario'])== false){
       $usuario_autentic= addslashes($_SESSION['usuario']);
        $sql="SELECT * FROM usuarios WHERE usuario='$usuario_autentic'";
        $sql= $pdo->query($sql);
        $dados = $sql->fetch();
        $usuario_status=$dados['usuario_status'];
		if($usuario_status=="Validado"){
			?><script>$(document).ready(function(){
			$('#cadastrar_unidade').addClass('active').removeClass('disabled');});</script>
			<?php }    	
    }else{
    }
//Cadastro novo usuário
if(isset($_POST['dpnome_pf']) && ($_POST['dpnome_pf'] != "")){
	if(isset($_POST['dpcpf']) && ($_POST['dpcpf'] != "")){
		if(isset($_POST['dprg_pf']) && ($_POST['dprg_pf'] != "")){
			if(isset($_POST['dpemail_pf']) && ($_POST['dpemail_pf'] != "")){
				if(isset($_POST['dptelefone_pf']) && ($_POST['dptelefone_pf'] != "")){
					if(isset($_POST['dpendereco_rua_pf']) && ($_POST['dpendereco_rua_pf'] != "")){
						if(isset($_POST['dpendereco_numero_pf']) && ($_POST['dpendereco_numero_pf'] != "")){
							if(isset($_POST['dpendereco_bairro_pf']) && ($_POST['dpendereco_bairro_pf'] != "")){
								if(isset($_POST['dpendereco_cidade_pf']) && ($_POST['dpendereco_cidade_pf'] != "")){
									if(isset($_POST['dpendereco_estado_pf']) 
										&& ($_POST['dpendereco_estado_pf'] != "")){
										if(isset($_POST['dpsenha']) && ($_POST['dpsenha'] != "")){
											if(isset($_POST['dpconfirma_senha']) 
												&& ($_POST['dpconfirma_senha'] != "")){
												if(($_POST['dpsenha'])==($_POST['dpconfirma_senha'])){
												$cpf=addslashes($_POST['dpcpf']);
													if(strlen ($cpf)==11){
													$cpf=addslashes($_POST['dpcpf']);
														if(is_numeric($cpf)){
														$email_pf=addslashes($_POST['dpemail_pf']);
															if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $email_pf)){
																if(isset($_POST['dpcep_pf']) 
																	&& ($_POST['dpcep_pf'] != "")){
																$cep_pf=addslashes($_POST['dpcep_pf']);
																	if(preg_match('/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/', $cep_pf)){
																	$telefone_pf=addslashes($_POST['dptelefone_pf']);	
																		if(preg_match('/^[0-9]{4,5}([- ]?[0-9]{4})?$/', $telefone_pf)){
																			if(isset($_POST['dpnasc_pf']) 
																				&& ($_POST['dpnasc_pf'] != "")){
//Verificação de CPF e E-mail no banco de dados 
	$sql="SELECT * FROM pessoafisica WHERE cpf='$cpf'";
	$sql=$pdo->query($sql);

		if ($sql->rowCount() > 0){
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> CPF já cadastrado - Clique em Esqueci a Senha ou Retorne
				</div>
			<div class='modal-footer modal-fluid justify-content-between'>
				<button class='btn btn-danger btn-sm' data-dismiss='modal' onclick='history.go(-1)''>
					Retornar ao Cadastro
				</button>
				<a class='btn btn-info btn-sm' href='esqueci.php' data-dismiss='modal'>Esqueci a Senha</a>
			</div>
		</div>	
	</div>
</div>
<script>$('#erro').modal('show')</script>";

		}else{
				$sql="SELECT * FROM pessoafisica WHERE email_pf='$email_pf'";
				$sql=$pdo->query($sql);
			if ($sql->rowCount() > 0){
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> E-mail já cadastrado - Clique em Esqueci a Senha ou retorne
				</div>
			<div class='modal-footer justify-content-between'>
				<button class='btn btn-danger btn-sm' data-dismiss='modal' onclick='history.go(-1)''>
					Retornar ao Cadastro
				</button>
				<a class='btn btn-info btn-sm' href='esqueci.php' data-dismiss='modal'>Esqueci a Senha</a>
			</div>
		</div>	
	</div>
</div>
<script>$('#erro').modal('show')</script>";
			}else{
//Criação da Pasta Pessoa Fisica
	$cpf = addslashes($_POST['dpcpf']);
	mkdir("pessoafisica/$cpf");
	mkdir("pessoafisica/$cpf/DocumentosPessoais");
//Inicio da Inclusão de dados
	$data_criacao = date("Y/m/d H:i:s");
	$nome_pf = addslashes($_POST['dpnome_pf']);
	$email_pf = addslashes($_POST['dpemail_pf']);
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
	$senha = md5(addslashes($_POST['dpsenha']));
	$nasc_pf = addslashes($_POST['dpnasc_pf']);
	$validacao = "Falta validar";

	            $sql="INSERT INTO pessoafisica SET nome_pf='$nome_pf', rg_pf='$rg_pf', 
	            email_pf='$email_pf', telefone_pf='$telefone_pf', endereco_rua_pf='$endereco_rua_pf', 
	            endereco_numero_pf='$endereco_numero_pf', nasc_pf='$nasc_pf', 
	            endereco_complemento_pf='$endereco_complemento_pf', 
	            endereco_bairro_pf='$endereco_bairro_pf', endereco_cidade_pf='$endereco_cidade_pf', 
	            endereco_estado_pf='$endereco_estado_pf', endereco_cep_pf='$endereco_cep_pf', cpf='$cpf'";
                $sql=$pdo->query($sql);

                $sql="INSERT INTO usuarios SET usuario='$cpf', usuario_status='$validacao', senha='$senha', 
                data_criacao='$data_criacao'";
                $sql=$pdo->query($sql); 

			echo"<div class='alert alert-lg alert-success alert dismissible show' role='alert' id='AlertaCadastro'>
			Cadastro realizado com sucesso!
			<button class='close' data-dismiss='alert' aria-label='fechar'>
			<span aria-hidden='true'>&times;</span>
			</button> 
			</div>";
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
	$cabecalho .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
	$cabecalho .= "From: ".$emailsender.$quebra_linha;
	$cabecalho .= "Return-Path: ".$emailsender.$quebra_linha;
	$cabecalho .=  "Reply-To: ".$email_pf.$quebra_linha;
	$cabecalho .=  "X-Mailer: PHP/".phpversion();

	mail($emaildestinatario, $assuntoconfirma, $corpo, $cabecalho, "-r". $emailsender);
// Mandando e-mail de validação 
$id_pf = $pdo->lastInsertId();
$md5_id = md5($id_pf);
$link = 'http://www.totalville101.com.br/valida_email.php?valida='.$md5_id;
$assuntovalida = "Total Ville 101 - Valide de Cadastro";
$mensagemvalida = "<h3>Prezado(a) ".$nome_pf."</h3><p>Clique no link abaixo para confirmar seu cadastro em nosso sistema:</p><p>Clique: ".$link;

mail($email_pf, $assuntovalida, $mensagemvalida, $cabecalho, "-r". $emailsender);


//Inserção de Imagem 
					if(isset($_FILES['dpimagem_pf']) && ($_FILES['dpimagem_pf'] != "")){
					$imagem_pf = $_FILES['dpimagem_pf'];
						if(isset($imagem_pf['tmp_name']) && ($imagem_pf['tmp_name'] != "")){
 						if(($imagem_pf['type']=='image/png') OR ($imagem_pf['type']== "image/jpeg")){
	 						if($imagem_pf['type']=='image/png'){

								//Guardando a Imagem na Pasta
								$imagem_pf = $_FILES['dpimagem_pf'];
								$image_temp	= $imagem_pf['tmp_name'];
								move_uploaded_file($image_temp, 'pessoafisica/'.$cpf.'/imagem_pf_'.$cpf.'');

									//Covertendo para JPG
									$filename = 'pessoafisica/'.$cpf.'/imagem_pf_'.$cpf.'';
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
									$arquivo_antigo = 'pessoafisica/'.$cpf.'/imagem_pf_'.$cpf.'';
									unlink($arquivo_antigo);
									//Criar Imagem Mini 
									$imagem_pf = 'pessoafisica/'.$cpf.'/imagem_pf_'.$cpf.'.jpg';			
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
									imagejpeg($image_new, 'pessoafisica/'.$cpf.'/mini_imagem-'.$cpf.'.jpg', 100);					
									//Término Criar Imagem MIni
							}
							else{
								//Guardando a Imagem na Pasta
								$imagem_pf = $_FILES['dpimagem_pf'];
								$image_temp	= $imagem_pf['tmp_name'];
								move_uploaded_file($image_temp, 'pessoafisica/'.$cpf.'/imagem_pf_'.$cpf.'.jpg');
									//Criar Imagem Mini 
									$imagem_pf = 'pessoafisica/'.$cpf.'/imagem_pf_'.$cpf.'.jpg';			
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
									imagejpeg($image_new, 'pessoafisica/'.$cpf.'/mini_imagem-'.$cpf.'.jpg', 100);					
									//Término Criar Imagem MIni

							}
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
Foi encaminhado para '.$email_pf.' o link de confirmação.<br><br> 
Para alterar seu e-mail cadastrado faça seu login e retorne aos seus Dados Pessoais<br><br>
</div>
<div class="modal-footer justify-content-between">
<button class="btn btn-primary" data-toggle="modal" data-target="#login" data-dismiss="modal">Login</button>
<button class="btn btn-danger" data-dismiss="modal">Fechar</button>
</div>
</div>	
</div>
</div>
</div>';
//Término Cornifrmação de Cadastro
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
Foi encaminhado para '.$email_pf.' o link de confirmação.<br><br> 
Para alterar seu e-mail cadastrado faça seu login e retorne aos seus Dados Pessoais<br><br>
</div>
<div class="modal-footer justify-content-between">
<button class="btn btn-primary" data-toggle="modal" data-target="#login" data-dismiss="modal">Login</button>
<button class="btn btn-danger" data-dismiss="modal">Fechar</button>
</div>
</div>	
</div>
</div>
</div>';

if($validacao == "Falta validar"){ ?><script>$(document).ready(function(){
$('#confirmacao').modal('show');});</script>
<?php }

						}
					}
//Inserindo Modal de Validação
if($validacao == "Falta validar"){ ?><script>$(document).ready(function(){
$('#confirmacao').modal('show');});</script>
<?php }
			}
		}
//Término da Inclusão de dados
																			}else{
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> Data de Nascimento não informado
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
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> Número de telefone incorreto
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
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> CEP de residência incorreto
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
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> CEP de residência não informado
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
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> E-mail informado inválido
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
														}
														else{
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> Informe seu CPF somente números
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
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> CPF cadastrado incorreto
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
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> Confirmação de senha incorreta
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
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> Confirme sua senha
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
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> Senha não informada
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
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> Estado não informado
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
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> Cidade não informada
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
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> Bairro/Satélite não informado
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
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> Numero de residencia não informado
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
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> Rua/Setor/Quadra não informado
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
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> Telefone não informado
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
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> E-mail não informado
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
echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> RG não informado
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

echo"
<div class='container-fluid'>
	<div class='modal fade' id='erro'>
		<div class='modal-dialog modal-dialog-centered modal-sm'> 
			<div class='modal-content'>
				<div class='modal-body'>
<b>Erro:</b> CPF não informado
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

}

?>