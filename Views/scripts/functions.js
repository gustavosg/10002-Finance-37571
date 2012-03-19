function atualizaRelogio(){
		momentoAtual = new Date();
		hora = momentoAtual.getHours();
		minuto = momentoAtual.getMinutes();
		segundo = momentoAtual.getSeconds();
		horaImpressa = showFilled(momentoAtual.getHours()) + ":" + showFilled(momentoAtual.getMinutes()) + ":" + showFilled(momentoAtual.getSeconds());
		
		document.getElementById("Clock").value = horaImpressa;
		document.form.Clock.value = horaImpressa;
		setTimeout("atualizaRelogio()",1000);
	}

function showFilled(Value) 
{
	return (Value > 9) ? "" + Value : "0" + Value;
}

function limparCamposContas(){
	document.getElementById('nomeConta').value = '';
	
}

function verificarCampos(){
	var matricula = document.getElementById('matricula').value;
	var password = document.getElementById('password').value;
	
	if ((matricula.length != 6)&& (password.length != 4)){
		alert('Favor verificar se digitou corretamente matrícula e senha!');
	}
	else{
		document.form.action='salvarbatidas.php';
	}
	
}

function verificarCamposTeste(){
	var matricula = document.getElementById('matricula').value;
	var password = document.getElementById('password').value;
	
	if ((matricula.length != 6)&& (password.length != 4)){
		alert('Favor verificar se digitou corretamente matrícula e senha!');
	}
	else{
		document.form.action='salvarbatidasteste.php';
	}
	
}


function verificarCamposSalvarFunc(){
	var matricula = document.getElementById('matricula').value;
	var password = document.getElementById('password').value;
	
	if ((matricula.length != 6)&& (password.length != 4)){
		alert('Favor verificar se digitou corretamente matrícula e senha!');
	}
	else{
		document.form.action='salvarcadfuncionarios.php';
	}
	
}

function selecionaFuncionario(){
	var matricula = document.getElementById('selFuncionario').value;
	document.getElementById('matricula').value = matricula;
}


function alterarSenha(){
	var newpassword = document.getElementById('newpassword').value;
	var confirmpassword = document.getElementById('confirmpassword').value;
	
	if (newpassword != confirmpassword){
		alert('Favor verificar se digitou a mesma nova senha!');
	}
	else{
		document.form.action='salvarsenha.php';
	}
	
}