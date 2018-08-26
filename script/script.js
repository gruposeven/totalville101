function acionaCadastro(){
	document.getElementById('alert_cpf_nao_cadastrado').style.display = 'none';
	$('#verificador_cadastro_pf').addClass('show');
}
function acionaEdit(){
	document.getElementById('alert_cpf_cadastrado').style.display = 'none';
	document.getElementById('verificador_cadastro_pf').style.display = 'none';
	$('#verificador_edit_pf').addClass('show');
}

function checkCadastro(){
		var cadastroNomePF = document.getElementById("dpnome_pf").value;
		var cadastroRGPF = document.getElementById("dprg_pf").value;

	if(cadastroNomePF == ""){
			alert("Erro: Informe o nome corretamente");
			return false;
	}else{
		if(cadastroNomePF.length < 3 ){
			alert("Erro: Informe o nome completo");
			return false;
		}else{
			if(cadastroRGPF == ""){
				alert("Erro: Informe o RG corretamente");
				return false;
			}else{
				if(cadastroRGPF.length < 3 ){
					alert("Erro: Informe o RG completo");
					return false;
				}else{
				return true;
				}
			}
		}		
	}
}
function checkEdit(){
	var editNomePF = document.getElementById("editnome_pf").value;
	var editRGPF = document.getElementById("editrg_pf").value;

	if(editNomePF == ""){
			alert("Erro: Informe o nome corretamente");
			return false;
	}else{
		if(editNomePF.length < 3 ){
			alert("Erro: Informe o nome completo");
			return false;
		}else{
			if(editRGPF == ""){
				alert("Erro: Informe o RG corretamente");
				return false;
			}else{
				if(editRGPF.length < 3 ){
					alert("Erro: Informe o RG completo");
					return false;
				}else{
				return true;
				}
			}
		}		
	}
}
