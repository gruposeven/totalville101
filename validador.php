
<?php
require "configuracoes.php";


//Cadastro novo usuário

if(isset($_POST['nome_pf']) && ($_POST['nome_pf'] != "") 
	&& isset($_POST['sobrenome_pf']) && ($_POST['sobrenome_pf'] != "")
	&& isset($_POST['email_pf']) && ($_POST['email_pf'] != "")
	&& isset($_POST['NovoUsuario']) && ($_POST['NovoUsuario'] != "")
	&& isset($_POST['Novasenha']) && ($_POST['Novasenha'] != "")){

	$data_criacao = date("Y/m/d H:i:s");
	$nome_pf = addslashes($_POST['nome_pf']);
	$sobrenome_pf = addslashes($_POST['sobrenome_pf']);
	$email_pf = addslashes($_POST['email_pf']);
	$NovoUsuario = addslashes($_POST['NovoUsuario']);
	$Novasenha = md5(addslashes($_POST['Novasenha']));

	$sql="SELECT * FROM pessoafisica WHERE cpf='$NovoUsuario'";
	$sql=$pdo->query($sql);

		if ($sql->rowCount() > 0){
			echo "CPF já cadastrado no sistema<br>Acesse ?Esqueci a Senha";
		}else{
				$sql="SELECT * FROM pessoafisica WHERE email_pf='$email_pf'";
				$sql=$pdo->query($sql);

			if ($sql->rowCount() > 0){

				echo "E-mail já cadastrado no sistema<br>Acesse ?Esqueci a Senha";
			}else{

				$sql="INSERT INTO pessoafisica SET nome_pf='$nome_pf', sobrenome_pf='$sobrenome_pf', email_pf='$email_pf', cpf='$NovoUsuario'";
				$sql=$pdo->query($sql);

				$sql="INSERT INTO usuarios SET usuario='$NovoUsuario', senha='$Novasenha', data_criacao='$data_criacao'";
				$sql=$pdo->query($sql);	

				echo "Cadastro realizado com sucesso!";

			}
		}
}else{

}	
//Autenticação

if(isset($_POST['usuario']) && ($_POST['usuario'] != "") && isset($_POST['senha']) && ($_POST['senha'] != "")){
	$usuario = addslashes($_POST['usuario']);
	$senha = md5(addslashes($_POST['senha']));
	$ip_usuario = addslashes($_SERVER["REMOTE_ADDR"]);
	$acesso = date("Y/m/d H:i:s");


$sql="SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'";
$sql=$pdo->query($sql);

	if($sql->rowCount() > 0){

			$dados=$sql->fetch();
			$usuario_aut=$dados['usuario'];

			$_SESSION['usuario']= $dados['usuario'];

			$sql="SELECT * FROM pessoafisica WHERE cpf='$usuario_aut'";
			$sql=$pdo->query($sql);
			if($sql->rowCount() > 0){

				$dados_pf=$sql->fetch();

				$_SESSION['nome_pf']=$dados_pf['nome_pf'];
				$_SESSION['sobrenome_pf']=$dados_pf['sobrenome_pf'];
				$_SESSION['email_pf']=$dados_pf['email_pf'];
				$_SESSION['usuario']=$dados_pf['cpf'];
				$_SESSION['categoria_pf']=$dados_pf['categoria_pf'];

			

				$sql="INSERT INTO acesso_sistema SET acesso='$acesso', ip_usuario='$ip_usuario', usuario='$usuario_aut'";
				$pdo->query($sql);

			}else{

				echo "Seus dados não estão de acordo com o Banco de Dados";	
			}

			header("Location: index.php");

		}else{
		echo "Usuário e/ou senha não confere.<br>Tente novamente.";
		}

}else{

}
