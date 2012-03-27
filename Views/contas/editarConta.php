<?php
require_once '../../bootstrap.php';

$nomeConta = $_POST['nomeConta'];

$conta = new Accounts(null, $nomeConta);

$accountRepo = $entityManager->getRepository("Accounts");
$accountsResult = $accountRepo->findBy(array('name' => $conta->getName()));

$id = 0;
$nome = '';
$criacao = '';
$modificacaoAnterior = '';
$modificacao = date("Y/m/d H:i:s");

foreach ($accountsResult as $account)
{
	$id = $account->getId();
	$nome = $account->getName();
	$criacao = $account->getCreated();
	$modificacaoAnterior = $account->getModified();
}
?>

<html>
	<head>
		<title>Finance-37571: Edição de Conta:</title>
	</head>
	<body>
	<form action="resultEditarConta.php" method="post">
		<h1 align="center">Edição de Conta:</h1>
		<p align="center" />
			<table >
				<tr>
					<td><label>ID:</label></td>
					<td><input type="text" size="10px" readonly="readonly" disabled="disabled" value="<?php echo $id ?>" /></td>
				</tr>
				
				<tr>
					<td><label style="color:red; " >Nome:</label></td>
					<td><input type="text" size="50px" value="<?php echo $nome ?>" /></td>
				</tr>
				
				<tr>
					<td><label>Data de Criação:</label></td>
					<td><input type="text" size="50px" readonly="readonly" disabled="disabled" value="<?php echo $criacao ?>" /></td>
				</tr>
				
				<tr>
					<td><label>Data de Modificação:</label></td>
					<td><input type="text" size="50px" readonly="readonly" disabled="disabled" value="<?php echo $modificacaoAnterior ?>" /></td>
				</tr>
				
			</table>
			
			<p align="right">
			<label style="color:red ">Aviso! <br> Somente campos em vermelho podem ser editados.</label>
			</p>
	
	<p align="center">
	<button type="submit"> Enviar</button>
	</p>
	
	</form>
	</body>
	<footer style="position: fixed; right: 3px; bottom: 0px;">
		Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>

</html>