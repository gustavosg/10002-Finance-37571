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
* Nome:        Editar.php
* Descrição:   Classe de Edição para SubCategorias
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

$categoria = new Categories();

$subCategoria = new Sub_Categories($categoria);

$subCategorieRepo = $entityManager->getRepository("Sub_Categories");
$subCategoriesResult = $subCategorieRepo->findAll();

$functionsSub_Categories = new FunctionsSub_Categories();

?>

<html>

	<head>
		<title>Finance-37571: Edição de SubCategorias:</title>
		<script type="text/javascript" src="../../functions/functions.js"></script>
	</head>

	<body>
	<form action="editarSubCategoria.php" method="post">
		<h1 align="center">Seleção de SubCategorias para edição:</h1>
		
		<table align="center" border="2" style="table-layout: auto; position: static; float: inherit;">
			<tr>
				<td>Seleção:</td>
				<td width="50px">ID:</td>
				<td width="150px">SubCategorias:</td>
			</tr>

			<?php $functionsSub_Categories->editarSubCategoria($subCategoriesResult); ?>
			
		</table>
	<p align="center">
		<button type="submit" value="submit" name="Alterar"	>Alterar</button>
	
	</p>
	</form>
	</body>
	<footer style="position: fixed; right: 3px; bottom: 0px;">
		Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>

</html>