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
$idOrcamento = $_POST["idOrcamento"];

// Instanciando Classes
$pageMaker= new PageMaker();
$orcamento = new Budgets($idOrcamento);
$functionsBudgets = new FunctionsBudgets();

// Funções do Doctrine
$budgetsRepo = $entityManager->getRepository("Budgets");
$budgetsResult = $budgetsRepo->findBy(array ('id' => $idOrcamento));

?>

<html>
	<head>
		<title>Informações do Orçamento:</title>
	</head>
	<body>
	<a href="../">Voltar para menu principal</a>
		<h1 align="center">Orçamento solicitado:</h1>
	
		<p align="center">
		<table border=2>
			<tr>
				<td>Id:</td>
				<td>Nome:</td>
				<td>Criado em:</td>
				<td>Modificado em:</td>
			</tr>
				<?php
				 	$functionsBudgets->listarOrcamentosTable($budgetsResult);
				 ?>
		</table>
	</body>

	<?php $pageMaker->printFooter();?>

</html>