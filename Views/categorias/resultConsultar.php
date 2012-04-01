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
* Nome:        resultConsultar.php
* Descrição:   Exibe informações de consulta de Categories
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once "../../bootstrap.php";

// Capturando informações da tela anterior
$nomeCategoria = $_POST['nomeCategoria'];

// Instanciando classes
$pageMaker = new PageMaker();
$categoria = new Accounts(null, $nomeCategoria);
$functionsCategories = new FunctionsCategories();

// Funções do Doctrine
$categoryRepo = $entityManager->getRepository("Categories");
$categories = $categoryRepo->findBy(array ('name' => $categoria->getName()));

?>

<html>
	<head>
		<title>Informações da Categoria:</title>
	</head>
	<body>
		
		<h1 align="center">Categoria solicitada:</h1>

		<table border=2 align="center">
			<tr>
				<td>Id:</td>
				<td>Nome:</td>
				<td>Criado em:</td>
				<td>Modificado em:</td>
			</tr>
			<?php $functionsCategories->listarTodasCategorias($categories);?>
		</table>
	</body>
	
	<?php $pageMaker->printFooter();?>
</html>
