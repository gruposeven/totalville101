
<?php
require "configuracoes.php";

	if(isset($_SESSION['usuario']) && empty($_SESSION['usuario'])== false){

        $usuario_autentic= addslashes($_SESSION['usuario']);
        $sql="SELECT * FROM usuarios WHERE usuario='$usuario_autentic'";
        $sql= $pdo->query($sql);
        $dados = $sql->fetch();
        $usuario_status=$dados['usuario_status'];

		if($usuario_status=="validado"){
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

	$sql="SELECT * FROM pessoafisica WHERE cpf='$cpf'";
	$sql=$pdo->query($sql);

		if ($sql->rowCount() > 0){
			echo"<div class='alert alert-lg alert-warning alert dismissible show' role='alert' id='AlertaCadastro'>
			CPF já cadastrado! <a href='esqueci.php' target='_blank'>Acesse Esqueci Senha</a>
			<button class='close' data-dismiss='alert' aria-label='fechar'>
			<span aria-hidden='true'>&times;</span>
			</button> 
			</div>";	
		}else{
				$sql="SELECT * FROM pessoafisica WHERE email_pf='$email_pf'";
				$sql=$pdo->query($sql);

			if ($sql->rowCount() > 0){

			echo"<div class='alert alert-lg alert-warning alert dismissible show' role='alert' id='AlertaCadastro'>
			E-mail já cadastrado! <a href='esqueci.php' target='_blank'>Acesse Esqueci Senha</a>
			<button class='close' data-dismiss='alert' aria-label='fechar'>
			<span aria-hidden='true'>&times;</span>
			</button> 
			</div>";	

			}else{

//Criação da Pasta Pessoa Fisica
			$cpf = addslashes($_POST['dpcpf']);
   mkdir("pessoafisica/$cpf");
   mkdir("pessoafisica/$cpf/DocumentosPessoais");

//Término da Criação das Pastas

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
	$validacao = "validar";

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
									echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
									Arquivo de Imagem não compatível!
									<button class='close' data-dismiss='alert' aria-label='fechar'>
									<span aria-hidden='true'>&times;</span>
									</button> 
									</div>";
 						}

						}else{
										echo"<div class='alert alert-lg alert-warning alert dismissible show' role='alert' id='AlertaCadastro'>
										Imagem não arquivada!
										<button class='close' data-dismiss='alert' aria-label='fechar'>
										<span aria-hidden='true'>&times;</span>
										</button> 
										</div>";

						}

					}
//Inserindo Modal de Validação
				if($validacao == "validar"){ ?><script>$(document).ready(function(){
							$('#confirmacao').modal('show');});</script>
			<?php }
			}
		}
//Término da Inclusão de dados
																			}else{
																				echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
																				Data de nascimento não informado!
																				<button class='close' data-dismiss='alert' aria-label='fechar'>
																				<span aria-hidden='true'>&times;</span>
																				</button> 
																				</div>";
																			}
																		}else{
																			echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
																			Telefone incorreto!
																			<button class='close' data-dismiss='alert' aria-label='fechar'>
																			<span aria-hidden='true'>&times;</span>
																			</button> 
																			</div>";	
																		}
																	}else{
																	echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
																	CEP incorreto!
																	<button class='close' data-dismiss='alert' aria-label='fechar'>
																	<span aria-hidden='true'>&times;</span>
																	</button> 
																	</div>";	
																	}
																}else{
																	echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
																	CEP não informado!
																	<button class='close' data-dismiss='alert' aria-label='fechar'>
																	<span aria-hidden='true'>&times;</span>
																	</button> 
																	</div>";
																}	
															}else{
															echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
															Seu e-mail é inválido!
															<button class='close' data-dismiss='alert' aria-label='fechar'>
															<span aria-hidden='true'>&times;</span>
															</button> 
															</div>";
															}
														}
														else{
															echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
															Informe seu CPF somente números!
															<button class='close' data-dismiss='alert' aria-label='fechar'>
															<span aria-hidden='true'>&times;</span>
															</button> 
															</div>";
														}
													}else{
														echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
														CPF cadastrado incorreto!
														<button class='close' data-dismiss='alert' aria-label='fechar'>
														<span aria-hidden='true'>&times;</span>
														</button> 
														</div>";
													}
												}else{
													echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert'>
													Senha confirmada incorreta!
													<button class='close' data-dismiss='alert' aria-label='fechar' id='AlertaCadastro'>
													<span aria-hidden='true'>&times;</span>
													</button> 
													</div>";
												}	
											}else{
												echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
												Confirme sua senha!
												<button class='close' data-dismiss='alert' aria-label='fechar'>
												<span aria-hidden='true'>&times;</span>
												</button> 
												</div>";
											}
										}else{
											echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
											Senha não informada!
											<button class='close' data-dismiss='alert' aria-label='fechar'>
											<span aria-hidden='true'>&times;</span>
											</button> 
											</div>";
										}									
									}else{
										echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
										Estado não informado!
										<button class='close' data-dismiss='alert' aria-label='fechar'>
										<span aria-hidden='true'>&times;</span>
										</button> 
										</div>";
									}
								}else{
									echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
									Cidade não informada!
									<button class='close' data-dismiss='alert' aria-label='fechar'>
									<span aria-hidden='true'>&times;</span>
									</button> 
									</div>";
								}
							}else{
								echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
								Bairro/Satélite não informado!
								<button class='close' data-dismiss='alert' aria-label='fechar'>
								<span aria-hidden='true'>&times;</span>
								</button> 
								</div>";
							}
						}else{
							echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
							Número não informado!
							<button class='close' data-dismiss='alert' aria-label='fechar'>
							<span aria-hidden='true'>&times;</span>
							</button> 
							</div>";
						}
					}else{
						echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
						Rua não informado!
						<button class='close' data-dismiss='alert' aria-label='fechar'>
						<span aria-hidden='true'>&times;</span>
						</button> 
						</div>";
					}
				}else{
					echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
					Telefone não informado!
					<button class='close' data-dismiss='alert' aria-label='fechar'>
					<span aria-hidden='true'>&times;</span>
					</button> 
					</div>";
				}
			}else{
				echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
				E-mail não informado!
				<button class='close' data-dismiss='alert' aria-label='fechar'>
				<span aria-hidden='true'>&times;</span>
				</button> 
				</div>";
			}
		}else{
			echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
			RG não informado!
			<button class='close' data-dismiss='alert' aria-label='fechar'>
			<span aria-hidden='true'>&times;</span>
			</button> 
			</div>";
		}
	}else{
		echo"<div class='alert alert-lg alert-danger alert dismissible show' role='alert' id='AlertaCadastro'>
		CPF não informado!
		<button class='close' data-dismiss='alert' aria-label='fechar'>
		<span aria-hidden='true'>&times;</span>
		</button> 
		</div>";
	}
}else{
	echo"<div class='alert alert-lg alert-primary alert dismissible show'role='alert' id='AlertaCadastro'>
		Vamos iniciar nosso cadastro!
		<button class='close' data-dismiss='alert' aria-label='fechar'>
		<span aria-hidden='true'>&times;</span>
		</button> 
		</div>";
}

