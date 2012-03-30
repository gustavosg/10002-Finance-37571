<?php
/*------------------------------------------------------------------------------------------------------------------------
* DADOS DO SISTEMA
* ------------------------------------------------------------------------------------------------------------------------
* Nome:		Finance-37571
* Área:		Finanças
* ------------------------------------------------------------------------------------------------------------------------
* DADOS DA APLICAÇÃO
* ------------------------------------------------------------------------------------------------------------------------
* Nome:        SQL
* Descrição:   Responsável pelo retorno e gravação de dados no Banco de Dados, tabela Account
* ------------------------------------------------------------------------------------------------------------------------
* DADOS DO ARQUIVO
* ------------------------------------------------------------------------------------------------------------------------
* Nome:        resultEditarConta.php
* Descrição:   Classe para executar resultado de edição de Conta
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        27/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
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
		<title>Finance-37571: Resultado de edição de Conta:</title>
	</head>
	<body>
	
		<h1 align="center">Edição de Conta:</h1>
		<p align="center" />
	
	
	</body>
	<footer style="position: fixed; right: 3px; bottom: 0px;">
		Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>

</html>