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
* Nome:        resultConsultar.php
* Descrição:   Classe para consultar dados de conta
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        27/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once "../../bootstrap.php";

// Capturando variáveis da tela anterior
$nomeOrcamento = $_POST["nomeOrcamento"];

// Instanciando Classes
$orcamento = new Budgets($nomeOrcamento);
$functionsBudgets = new FunctionsBudgets();
$pageMaker= new PageMaker();

// Funções do Doctrine
$budgetsRepo = $entityManager->getRepository("budgets");
$budgetsResult = $budgetsRepo->findBy(array ('name' => $orcamento->getName()));

?>

<html>
	<head>
		<title>Informações do Orçamento:</title>
	</head>
	<body>
	<h1 align="center">Orçamento solicitado:</h1>

	<p align="center">
	<table border=2>
		<tr>
			<td>Id:</td>
			<td>Nome:</td>
			<td>Criado em:</td>
			<td>Modificado em:</td>
		</tr>
			<?php $functionsBudgets->listarOrcamentos($budgetsResult);?>
		</table>
	</body>

	<?php $pageMaker->printFooter();?>

</html>