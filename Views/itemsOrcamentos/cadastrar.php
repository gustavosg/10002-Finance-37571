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
* Nome:        cadastrar.php
* Descri��o:   tela para inserir informa��es de categories
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

$itemsOrcamento = new BudgetRecords();
$functionsBudgets = new FunctionsBudgets();
$functionsSub_Categories = new FunctionsSub_Categories();
$subCategoria = new Sub_Categories();

$subCategoriesRepo = $entityManager->getRepository("Sub_Categories");
$subCategoriesResult= $subCategoriesRepo->findAll();

$budgetsRepo = $entityManager->getRepository("Budgets");
$budgetsResult = $budgetsRepo->findAll();

// TODO Gustavo: Parei no cadastro de Items de Or�amento

?>

<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Cadastramento de Items no Or�amento:</title>
</head>

<body>
<form action="resultCadastrar.php" name="form" method="post">
	<h1 align="center">Entre com as informa��es:</h1>
	<h2 align="center">Or�amentos:</h2>
	<p align="center">
		 
		<table align="center" border=2>
			<tr>
				<td><label>Selecione uma sub categoria: </label></td>
				<td><select name="idSubCategoria">
						<option />
						<?php $functionsSub_Categories->listarSubCategorias($subCategoriesResult)?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Selecione um Or�amento:</label></td>
				<td>
				<select name="idOrcamento">
				<option />
				
				<?php $functionsBudgets->listarOrcamentosSelect($budgetsResult);?></td>
				</select>
			</tr>

			<tr>
				<td><label>Quantia:</label></td>
				<td><input type="text" size="100" maxlength="50" name="Quantia" /></td>
			</tr>
		</table>
	</p>
	<p align="center">
		<button type="submit" value="submit" name="Enviar"
			>Enviar</button>

		<button type="button" value="Limpar" name="Limpar"
			onclick="limparCamposOrcamentoss()">Limpar</button>
		<br>
	</p>
	</form>
</body>
<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gon�alves - 37571 <br> Marco Aur�lio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
