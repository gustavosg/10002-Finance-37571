<?php
/*------------------------------------------------------------------------------------------------------------------------
* DADOS DO SISTEMA
* ------------------------------------------------------------------------------------------------------------------------
* Nome:		Finance-37571
* �rea:		Finan�as
* ------------------------------------------------------------------------------------------------------------------------
* DADOS DA APLICA��O
* ------------------------------------------------------------------------------------------------------------------------
* Nome:        SQL
* Descri��o:   Respons�vel pelo retorno e grava��o de dados no Banco de Dados, tabela Account
* ------------------------------------------------------------------------------------------------------------------------
* DADOS DO ARQUIVO
* ------------------------------------------------------------------------------------------------------------------------
* Nome:        resultEditarConta.php
* Descri��o:   Classe para executar resultado de edi��o de Conta
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        27/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

$idConta = $_POST['idConta'];
ECHO $idConta;
$nomeConta = $_POST['nomeConta'];
$contaCriada = $_POST['contaCriada'];
$contaModificada = date("Y/m/d H:i:s");

$conta = new Accounts($idConta, null);

$conta->setName($nomeConta);
$conta->setCreated($contaCriada);
$conta->setModified($contaModificada);

$entityManager->merge($conta);
$entityManager->flush();

?>

<html>
	<head>
		<title>Finance-37571: Resultado de edi��o de Conta:</title>
	</head>
	<body>
	
		<h1 align="center">Edi��o de Conta:</h1>
		<p align="center" />
	
	
	</body>
	<footer style="position: fixed; right: 3px; bottom: 0px;">
		Gustavo Souza Gon�alves - 37571 <br> Marco Aur�lio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>

</html>