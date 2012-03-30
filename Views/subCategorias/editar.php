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
* Nome:        Editar.php
* Descri��o:   Classe de Edi��o para SubCategorias
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
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
		<title>Finance-37571: Edi��o de SubCategorias:</title>
		<script type="text/javascript" src="../../functions/functions.js"></script>
	</head>

	<body>
	<form action="editarSubCategoria.php" method="post">
		<h1 align="center">Sele��o de SubCategorias para edi��o:</h1>
		
		<table align="center" border="2" style="table-layout: auto; position: static; float: inherit;">
			<tr>
				<td>Sele��o:</td>
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
		Gustavo Souza Gon�alves - 37571 <br> Marco Aur�lio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>

</html>