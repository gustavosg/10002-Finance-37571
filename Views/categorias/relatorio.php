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

// Instanciando classes
$conta = new Categories();
$functionsCategories = new FunctionsCategories();
$pageMaker = new PageMaker();

// Funções do Doctrine
$repoCategories = $entityManager->getRepository("Categories");
$selectCategories = $repoCategories->findAll();

?>

<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="../scripts/functions.js"></script>
		<meta charset="ISO-8859-1">
		<title>Finance-37571: Relatório de Categoria:</title>
	</head>

	<body>
		<a href="../">Voltar para menu principal</a>
			<h1 align="center">Categorias que foram cadastradas:</h1>
			
			<table border='2' align="center">
				<tr>
					<td>ID: </td>
					<td>Nome:</td>
					<td>Criado em:</td>
					<td>Modificado em:</td>
				</tr>
	
			<?php $functionsCategories->listarTodasCategorias($selectCategories); ?>
			</table>
	</body>
	<?php $pageMaker->printFooter();?>
</html>
