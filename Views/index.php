<?php 
require_once '../bootstrap.php';
$pageMaker = new PageMaker();


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Escolha a operação</title>
</head>
<body>
	<h1 align="center">Seja bem vindo ao sistema Finance-37571</h1>

	<h2 align="center">Escolha a operação desejada:</h2>

	<table align="center" border="2" rules="all" width=800px>
		<thead>
			<tr>
				<th colspan="2" style="font-size: x-large;">Opções</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td width="50%"><a href="contas.php"> Contas</a></td>
				<td><a href="categorias.php">Categorias</a></td>
			</tr>
			<tr>
				<td><a href="sub_categorias.php">Sub-Categorias</a></td>
				<td><a href="despesas.php">Despesas</a></td>
			</tr>
			<tr>
				<td><a href="orcamentos.php">Orçamentos</a></td>
				<td><a href="items_orcamentos.php">Items de Orçamentos</a></td>
			</tr>
		</tbody>

		<thead>
			<tr>
			<th colspan="2" style="font-size: x-large;">Relatórios personalizados: </th>
			</tr>
		</thead>

		<tbody>
		<tr>
			<td><a href="relatorioPersonalizado/relatorioTotalPrevisto.php">Total previsto (orçamento)</a></td>
			<td><a href="relatorioPersonalizado/relatorioGastoMes.php">Valor gasto em um mês/Gasto extratificado por mês</a></td>
		</tr>
		<tr>
			<td><a href="relatorioPersonalizado/relatorioSaldoMes.php">Saldo em determinado mês</a></td>
			<td><a href="relatorioPersonalizado/relatorioGastoCategoriaMes.php">Gastos por categoria em um determinado mês</a></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><a href="relatorioPersonalizado/relatorioGastoContaMes.php">Gastos por conta em um determinado mês</a></td>
		</tr>
		
		</tbody>

	</table>
	
</body>
<?php 
$pageMaker->printFooter();
?>
</html>