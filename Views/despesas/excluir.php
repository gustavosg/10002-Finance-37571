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
* Nome:        excluir.php
* Descri��o:   Exclui informa��es de despesa
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// instancia de classes
$pageMaker = new PageMaker();
$functionsExpenditures = new FunctionsExpenditures();

// Fun��es do Doctrine
$expenditureRepo = $entityManager->getRepository("Expenditure");
$expenditureResult = $expenditureRepo->findAll();



?>

<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Excluir Despesas:</title>
</head>

<body>
<form action="resultExcluir.php" name="form" method="post">
	<h1 align="center">Entre com as informa��es:</h1>
	<br>
	<p align="center">

			<table border=2>
		
				<tr>
					<td><label align="center">Despesas:</label></td>
					<td>
					<select name="idDespesa">
						<option />
					<?php
					$functionsExpenditures->listarDespesasSelect($expenditureResult);
					?>
					</select>
					</td>
				</tr>
		
			</table>
	</p>
	<br>
	<p align="center">
		<button type="submit" value="submit" name="Enviar"
			>Enviar</button>
	</p>
	</form>
</body>
<?php 
$pageMaker->printFooter();
?>
</html>