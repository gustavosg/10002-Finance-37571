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

// Capturando informa��es da tela anterior
$idConta = $_POST['idConta'];
$nomeConta = $_POST['nomeConta'];
$contaCriada = $_POST['contaCriada'];
$contaModificada = date("Y/m/d H:i:s");

//Inst�ncia de classes
$conta = new Accounts($idConta, null);
$pageMaker = new PageMaker();

// Definindo valores
$conta->setName($nomeConta);
$conta->setCreated($contaCriada);
$conta->setModified($contaModificada);

?>

<html>
	<head>
		<title>Finance-37571: Resultado de edi��o de Conta:</title>
	</head>
	<body>
	
	<a href="../">Voltar para menu principal</a>
		<h1 align="center">Informa��es editadas:</h1>
		<p align="center" />
	
	
	<?php 
	echo $conta;
	//Grava��o
	$entityManager->merge($conta);
	$entityManager->flush();
	?>
	
	</body>
<?php $pageMaker->printFooter();?>

</html>