
<?php
require "configuracoes.php";

	if(isset($_SESSION['usuario']) && empty($_SESSION['usuario'])== false){

        $usuario_autentic= addslashes($_SESSION['usuario']);
        $sql="SELECT * FROM pessoafisica WHERE cpf='$usuario_autentic'";
        $sql= $pdo->query($sql);
        $dados = $sql->fetch();
        $cpf_autentic=$dados['cpf'];
        $nome_pf_autentic=$dados['nome_pf'];

	        echo''.$nome_pf_autentic.' ';
	        echo'<a class= "btn btn-outline-primary btn-sm" href="../logout_servidor.php">Sair
	        </a>';

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

