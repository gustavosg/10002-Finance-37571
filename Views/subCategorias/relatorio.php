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
* Descrição:   Relatório de Categorias
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

// Instância de classes
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
<title>Finance-37571: Relatório de Sub-Categoria:</title>
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
				<td>Criação</td>
				<td>Modificação</td>
			</tr>
			
	<?php $functionsSub_Categories->listarTodasSubCategorias($listSubCategories);?>
	
</table>
	</form>
</body>
<?php $pageMaker->printFooter();?>
</html>
