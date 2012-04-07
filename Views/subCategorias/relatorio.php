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
* Descri��o:   Relat�rio de Categorias
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

// Inst�ncia de classes
$pageMaker = new PageMaker();
$functionsSub_Categories = new FunctionsSub_Categories();
$categoria = new Categories();

$categoriesRepo = $entityManager->getRepository("Categories");

$categoriesResult = $categoriesRepo->findAll();

$subCategoria = new Sub_Categories($categoria);

$subCategoriesRepo = $entityManager->getRepository("Sub_Categories");
$listSubCategories = $subCategoriesRepo->findAll();

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Relat�rio de Sub-Categoria:</title>
</head>

<body>
<a href="../">Voltar para menu principal</a>
	<form action="" name="form" method="post">
		<h1 align="center">Sub-Categorias que foram cadastradas:</h1>
		<br>
		<table align="center" border=2>

			<tr>
				<td>ID</td>
				<td>Nome</td>
				<td>Cria��o</td>
				<td>Modifica��o</td>
			</tr>
			
	<?php $functionsSub_Categories->listarTodasSubCategorias($listSubCategories);?>
	
</table>
	</form>
</body>
<?php $pageMaker->printFooter();?>
</html>
