<?php
require "../configuracoes.php";

$foto_pf="";

if(isset($_POST['validar_cpf']) && ($_POST['validar_cpf'] != "")){
	$cpf=addslashes($_POST['validar_cpf']);
	if(strlen ($cpf)==11){

		$cpf=addslashes($_POST['validar_cpf']);
		
		$sql="SELECT * FROM pessoafisica WHERE cpf='$cpf'";

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
			
			$nasc_pf = date($dados_pf['nasc_pf']);
			list($ano, $mes, $dia) = explode('-', $nasc_pf);
			$nasc_pf2 = mktime(0,0,0, $mes, $dia, $ano);
			$nasc_pf3 = date("d/m/Y", $nasc_pf2);
			$foto_pf = $dados_pf['foto_pf'];		

?><script>$(document).ready(function(){
document.getElementById('fotoCPF').style.display = 'block';});</script>
<?php 	
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
if(isset($_POST['deletar_cadastro']) && ($_POST['deletar_cadastro'] != "")){
echo"oi";
}else{

}
//Cadastro novo usuário

