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
		<title>Finance-37571: Edi��o de Conta:</title>
	</head>
	<body>
	<form action="resultEditarConta.php" method="post" name="form">
		<h1 align="center">Edi��o de Conta:</h1>
		<p align="center" />
			<table >
				<tr>
					<td><label>ID:</label></td>
					<td><input type="text" size="10px" name="idConta" readonly="readonly" value="<?php echo $id ?>" /></td>
				</tr>
				
				<tr>
					<td><label style="color:red; " >Nome:</label></td>
					<td><input type="text" size="50px" name="nomeConta" value="<?php echo $nome ?>" /></td>
				</tr>
				
				<tr>
					<td><label>Data de Cria��o:</label></td>
					<td><input type="text" size="50px" name="contaCriada" readonly="readonly"  value="<?php echo $criacao ?>" /></td>
				</tr>
				
				<tr>
					<td><label>Data de Modifica��o:</label></td>
					<td><input type="text" size="50px" name="contaModificada" readonly="readonly"  value="<?php echo $modificacaoAnterior ?>" /></td>
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
		Gustavo Souza Gon�alves - 37571 <br> Marco Aur�lio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>

</html>