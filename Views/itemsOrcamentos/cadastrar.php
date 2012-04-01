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
* Nome:        resultCadastrar.php
* Descrição:   Insere informações para Categories
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/


require_once '../../bootstrap.php';

$itemsOrcamento = new BudgetRecords();
$functionsCategories = new FunctionsCategories();
$functionsSub_Categories = new FunctionsSub_Categories();
$subCategoria = new Sub_Categories();

$categoriesRepo = $entityManager->getRepository("Categories");
$categoriesResult = $categoriesRepo->findAll();

// TODO Gustavo: Parei no cadastro de Items de Orçamento

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Cadastramento de Items no Orçamento:</title>
</head>

<body>
<form action="" name="form" method="post">
	<h1 align="center">Entre com as informações:</h1>
	<br>
	<p align="center">
		<label align="center">Orçamentos:</label> 
		
		<table align="center" border=2>
			<tr>
				<td><label>Selecione uma sub categoria: </label></td>
				<td><select name="idCategoria">
						<option />
						<?php $functionsSub_Categories->listarSubCategorias($subCategoriesResult)?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Nome da Sub-Categoria:</label></td>
				<td><?php $functionsCategories->listarCategorias($categoriesResult)?></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="text" size="100"
			maxlength="50" name="NomeItemOrcamento" id="NomeItemOrcamento" /></td>
			</tr>

		


		</table>
		
		
	</p>
	<br>
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
	Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
