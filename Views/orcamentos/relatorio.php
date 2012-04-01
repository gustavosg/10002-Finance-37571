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
* Nome:        relatorio.php
* Descri��o:   Relat�rio de Or�amentos
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

// Instanciando classes 
$orcamento = new Budgets();
$functionsBudgets = new FunctionsBudgets();
$pageMaker = new PageMaker();

// Fun��es do Doctrine
$budgetsRepo = $entityManager->getRepository("Budgets");
$budgetsResult = $budgetsRepo->findAll();

?>

<!DOCTYPE html>
<html>
	<head>
	<script type="text/javascript" src="../scripts/functions.js"></script>
	<meta charset="ISO-8859-1">
	<title>Finance-37571: Cadastramento de Or�amentos:</title>
	</head>
	
	<body>
		<a href="../">Voltar para menu principal</a>
	<form action="" name="form" method="post">
		<h1 align="center">Or�amentos que foram cadastrados:</h1>
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
