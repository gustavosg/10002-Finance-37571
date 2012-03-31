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
* Nome:        resultConsultar.php
* Descri��o:   Classe para consultar dados de conta
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        27/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once "../../bootstrap.php";

// Capturando vari�veis da tela anterior
$nomeOrcamento = $_POST["nomeOrcamento"];

// Instanciando Classes
$orcamento = new Budgets($nomeOrcamento);
$functionsBudgets = new FunctionsBudgets();
$pageMaker= new PageMaker();

// Fun��es do Doctrine
$budgetsRepo = $entityManager->getRepository("budgets");
$budgetsResult = $budgetsRepo->findBy(array ('name' => $orcamento->getName()));

?>

<html>
	<head>
		<title>Informa��es do Or�amento:</title>
	</head>
	<body>
	<h1 align="center">Or�amento solicitado:</h1>

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