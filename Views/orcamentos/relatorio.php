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
* Nome:        relatorio.php
* Descrição:   Relatório de Orçamentos
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

// Instanciando classes 
$orcamento = new Budgets();
$functionsBudgets = new FunctionsBudgets();
$pageMaker = new PageMaker();

// Funções do Doctrine
$budgetsRepo = $entityManager->getRepository("Budgets");
$budgetsResult = $budgetsRepo->findAll();

?>

<!DOCTYPE html>
<html>
	<head>
	<script type="text/javascript" src="../scripts/functions.js"></script>
	<meta charset="ISO-8859-1">
	<title>Finance-37571: Cadastramento de Orçamentos:</title>
	</head>
	
	<body>
		<a href="../">Voltar para menu principal</a>
	<form action="" name="form" method="post">
		<h1 align="center">Orçamentos que foram cadastrados:</h1>
		<br>
			<table border=1 align=center>
				<tr>
					<td>ID: </td>
					<td>Nome:</td>
					<td>Criado em:</td>
					<td>Modificado em:</td>
				</tr>
					<?php $functionsBudgets->listarOrcamentos($budgetsResult); ?>
					
			</table>
	
		</form>
	</body>
	<?php $pageMaker->printFooter();?>
</html>
