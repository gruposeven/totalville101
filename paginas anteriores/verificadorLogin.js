//Autenticação de Usuário

function validarAutenticacao(){
	var autenticacaoUsuario = document.getElementById("autenticacaoUsuario").value;
	var autenticacaoSenha = document.getElementById("autenticacaoSenha").value;

	if (autenticacaoUsuario.length !=11){
		alert("Usuário informado incorretamente. Informe seu CPF de 11 números ");
		return false;
	}else{
		if (autenticacaoUsuario != parseInt(autenticacaoUsuario)){
			alert("CPF incorreto. Informe novamente seus dados");
		}else{
			if (autenticacaoSenha.length <6){
				alert("Senha informada incorretamente. Informe sua senha de 6 dígitos ");
				return false;
			}else{
				return true;
			}	
		}
	}
}
//Cadastro de Novo Usuário	

function validarCadastro(){
	var cadastroNomePF = document.getElementById("cadastroNomePF").value;
	var cadastroSobrenomePF = document.getElementById("cadastroSobrenomePF").value;
	var cadastroEmailPF = document.getElementById("cadastroEmailPF").value;
	var cadastroUsuario = document.getElementById("cadastroUsuario").value;
	var cadastroSenha = document.getElementById("cadastroSenha").value;

	if(cadastroNomePF == ""){
		alert("Informe seu nome corretamente");
		return false;
	}else{
		if(cadastroSobrenomePF ==""){
			alert("Informe seu sobrenome corretamente");
			return false;
		}else{
			if(cadastroEmailPF ==""){
				alert("Informe seu E-mail corretamente");
				return false;
			}else{
				if(cadastroUsuario.length < 11){
					alert("Informe seu Usuário com seu CPF de 11 números");
					return false;
				}else{
					if(cadastroSenha.length < 6){
						alert("Informe sua senha com 6 dígitos");
						return false;
					}else{

					}
				}
			}
		}		
	}
}	

//Esqueci a Senha
function validarEsqueci(){
	var esqueciUsuario = document.getElementById("esqueciUsuario").value;
	var esqueciEmail = document.getElementById("esqueciEmail").value;

	if(esqueciUsuario.length < 11){
		alert("Informe seu Usuário com seu CPF de 11 números");
		return false;
	}else{
		if(esqueciEmail ==""){
			alert("Informe seu E-mail corretamente");
			return false;
		}else{
				alert("Seus dados foram enviados. Será encaminhado e-mail com a sua nova senha.");
				return true;
			}
	}
}
//fechamento da função validar

	