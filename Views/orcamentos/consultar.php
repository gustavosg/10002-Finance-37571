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
* Nome:        consultar.php
* Descri��o:   Tela de consulta de categorias
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Inst�ncia de classes
$pageMaker = new PageMaker();
$functionsBudgets = new FunctionsBudgets();

// Fun��es do Doctrine
$budgetsRepo = $entityManager->getRepository("Budgets");
$budgetsResult = $budgetsRepo->findAll();

?>

<html>
	<head>
		<title>Finance-37571: Consultar Or�amentos:</title>
	</head>

	<body>
		<form action="resultConsultar.php" name="form" method="post">
			<h1 align="center">Selecione o or�amento:</h1>
			<br>
			<p align="center">
				<table border=2>
					<tr>
						<td>Or�amento:</td>
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
