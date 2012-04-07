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
* Descri��o:   Excluir Sub Categorias
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        07/04/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Inst�ncia de classes
$pageMaker = new PageMaker();
$functionsSub_Categories = new FunctionsSub_Categories();

$subCategoriesRepo = $entityManager->getRepository("Sub_Categories");
$subCategoriesResult = $subCategoriesRepo->findAll();

?>

<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Excluir Sub-Categoria:</title>
</head>

<body>
<form action="resultExcluir.php" name="form" method="post">
	<h1 align="center">Sub-Categoria � Excluir:</h1>
	<br>
	<p align="center">
	
	<table border=2>
	<tr>
		<td>Sub-Categoria: </td>
		<td>
		<select name="idSubCategoria">
			<option />
			<?php 
				$functionsSub_Categories->listarSubCategorias($subCategoriesResult);
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
//Imprime o Footer da p�gina
$pageMaker->printFooter();

?>
</html>
