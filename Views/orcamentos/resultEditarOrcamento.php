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
$idOrcamento = $_POST['idOrcamento'];
$nomeOrcamento = $_POST['nomeOrcamento'];
$dataCriacao = $_POST['orcamentoCriada'];

// Instanciando classes
$orcamento = new Budgets($idOrcamento, $nomeOrcamento);
$functionsBudgets = new FunctionsBudgets();
$pageMaker = new PageMaker();

// Defini��o de valores
$orcamento->setId($idOrcamento);
$orcamento->setName($nomeOrcamento);
$orcamento->setCreated($dataCriacao);
$orcamento->setModified(date("Y/m/d H:i:s"));



?>

<html>
	<head>
		<title>Finance-37571: Resultado de edi��o de Conta:</title>
	</head>
	<body>
	<a href="../">Voltar para menu principal</a>
	
		<h1 align="center">Edi��o de Conta:</h1>
		<p align="center" />
	
	<?php 
	
	echo $orcamento;
	
	// Fun��es do Doctrine
	$entityManager->merge($orcamento);
	$entityManager->flush();
	
	?>
	
	</body>
	<?php 
	$pageMaker->printFooter();
	?>

</html>