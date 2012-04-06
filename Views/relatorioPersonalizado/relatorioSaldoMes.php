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
* Descri��o:   Relat�rio de Despesas
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// instancia de classes
$pageMaker = new PageMaker();
$functionsExpenditures = new FunctionsExpenditures();

// fun��es do doctrine

?>

<html>
	<head>
		<script type="text/javascript" src="../scripts/functions.js"></script>
		<meta charset="ISO-8859-1">
		<title>Finance-37571: Saldo por m�s:</title>
	</head>

	<body>
		<a href="../">Voltar para menu principal</a>
			<h1 align="center">Saldo por m�s:</h1>

	<p align="center">
			
			<table border=2>
			
			<tr>
				<td>M�s: </td>
				<td>Quantia:</td>
			</tr>

				<?php

				
				for ($month = 1; $month <=12; $month++){
						
					if (strlen($month) == 1)
					$month = '0'.$month;
						
					
					
					// TODO Gustavo: Conferir como fazer a subtra��o no doctrine
					$query = "SELECT SUM(br.ammount) as totalBR, SUM(ex.ammount) as totalEX , br.created as data
						FROM budget_Records br, expenditure ex 
						where SUBSTRING(br.created, 6, 2) = '".$month."' and SUBSTRING(br.created, 6, 2) = SUBSTRING(ex.created, 6, 2)";
					$executeQuery= $entityManager->createQuery($query);
					$resultQuery = $executeQuery->getResult();
						
					$resultQuery = $executeQuery->getResult();
						
					foreach ($resultQuery as $result){
						$value = $result['totalBR'] - $result['totalEX']  ;
						echo "<tr>";
						echo "<td>".$result['data']."</td>";
						echo "<td>R$: ".$value."</td>";
						echo "</tr>";
					}
				}
				
				
				?>			
			
			</table>
		</p>
	</body>
	<?php 
		$pageMaker->printFooter();
	?>

</html>
