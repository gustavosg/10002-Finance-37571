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
* Descrição:   Relatório de Gasto por mês
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// instancia de classes
$pageMaker = new PageMaker();
$functionsExpenditures = new FunctionsExpenditures();

// funções do doctrine

// funções do doctrine - Query Personalizada

$month = 0;

?>

<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Relatório de Gasto por Mês:</title>
</head>

<body>
	<a href="../">Voltar para menu principal</a>
	<h1 align="center">Relatório de gasto por mês:</h1>

	<p align="center">
	
	
	<table border=2>

		<tr>
			<td>Mês:</td>
			<td>Quantia:</td>
		</tr>
		
				<?php 

				for ($month = 1; $month <=12; $month++){
					
					if (strlen($month) == 1)
						$month = '0'.$month;
					
					$query = "SELECT SUM(br.ammount) as total, br.created as data FROM budget_Records br where SUBSTRING(br.created, 6, 2) between '".$month."' and '".$month."'";
					$executeQuery= $entityManager->createQuery($query);
					$resultQuery = $executeQuery->getResult();
					
					$resultQuery = $executeQuery->getResult();
					
					foreach ($resultQuery as $result){
						echo "<tr>";
							echo "<td>".$result['data']."</td>";
							echo "<td>R$: ".$result['total']."</td>";
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
