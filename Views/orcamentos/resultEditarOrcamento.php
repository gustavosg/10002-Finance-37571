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

// Capturando informações da tela anterior
$idOrcamento = $_POST['idOrcamento'];
$nomeOrcamento = $_POST['nomeOrcamento'];
$dataCriacao = $_POST['orcamentoCriada'];

// Instanciando classes
$orcamento = new Budgets($idOrcamento, $nomeOrcamento);
$functionsBudgets = new FunctionsBudgets();
$pageMaker = new PageMaker();

// Definição de valores
$orcamento->setId($idOrcamento);
$orcamento->setName($nomeOrcamento);
$orcamento->setCreated($dataCriacao);
$orcamento->setModified(date("Y/m/d H:i:s"));



?>

<html>
	<head>
		<title>Finance-37571: Resultado de edição de Conta:</title>
	</head>
	<body>
	<a href="../">Voltar para menu principal</a>
	
		<h1 align="center">Edição de Conta:</h1>
		<p align="center" />
	
	<?php 
	
	echo $orcamento;
	
	// Funções do Doctrine
	$entityManager->merge($orcamento);
	$entityManager->flush();
	
	?>
	
	</body>
	<?php 
	$pageMaker->printFooter();
	?>

</html>