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
* Nome:        consultar.php
* Descrição:   Tela de consulta de categorias
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Instância de classes
$pageMaker = new PageMaker();
$functionsBudgets = new FunctionsBudgets();

// Funções do Doctrine
$budgetsRepo = $entityManager->getRepository("Budgets");
$budgetsResult = $budgetsRepo->findAll();

?>

<html>
	<head>
		<title>Finance-37571: Consultar Orçamentos:</title>
	</head>

	<body>
		<form action="resultConsultar.php" name="form" method="post">
			<h1 align="center">Selecione o orçamento:</h1>
			<br>
			<p align="center">
				<table border=2>
					<tr>
						<td>Orçamento:</td>
						<td>
						<select name="idOrcamento">
						<option />
							<?php
							 	$functionsBudgets->listarOrcamentosSelect($budgetsResult);
							 ?>
						</select>
						</td>
					</tr>
				</table>
		
			</p>
			<p align="center">
				<button type="submit" value="submit" name="Enviar">Enviar</button>
			
		</form>
	</body>
	<?php 
		$pageMaker->printFooter();
	?>
</html>
