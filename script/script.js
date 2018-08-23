function acionaCadastro(){
	document.getElementById('alert_cpf_nao_cadastrado').style.display = 'none';
	$('#verificador_cadastro_pf').addClass('show');
}
function checkForm(){
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