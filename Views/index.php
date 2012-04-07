<?php 
require_once '../bootstrap.php';
$pageMaker = new PageMaker();


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Escolha a opera��o</title>
</head>
<body>
	<h1 align="center">Seja bem vindo ao sistema Finance-37571</h1>

	<h2 align="center">Escolha a opera��o desejada:</h2>

	<table align="center" border="2" rules="all" width=800px>
		<thead>
			<tr>
				<th colspan="2" style="font-size: x-large;">Op��es</th>
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
				<td><a href="orcamentos.php">Or�amentos</a></td>
				<td><a href="items_orcamentos.php">Items de Or�amentos</a></td>
			</tr>
		</tbody>

		<thead>
			<tr>
			<th colspan="2" style="font-size: x-large;">Relat�rios personalizados: </th>
			</tr>
		</thead>

		<tbody>
		<tr>
			<td><a href="relatorioPersonalizado/relatorioTotalPrevisto.php">Total previsto (or�amento)</a></td>
			<td><a href="relatorioPersonalizado/relatorioGastoMes.php">Valor gasto em um m�s/Gasto extratificado por m�s</a></td>
		</tr>
		<tr>
			<td><a href="relatorioPersonalizado/relatorioSaldoMes.php">Saldo em determinado m�s</a></td>
			<td><a href="relatorioPersonalizado/relatorioGastoCategoriaMes.php">Gastos por categoria em um determinado m�s</a></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><a href="relatorioPersonalizado/relatorioGastoContaMes.php">Gastos por conta em um determinado m�s</a></td>
		</tr>
		
		</tbody>

	</table>
	
</body>
<?php 
$pageMaker->printFooter();
?>
</html>