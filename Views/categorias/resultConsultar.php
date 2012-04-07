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
* Nome:        resultConsultar.php
* Descri��o:   Exibe informa��es de consulta de Categories
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once "../../bootstrap.php";

// Capturando informa��es da tela anterior
$idCategoria = $_POST['idCategoria'];

// Instanciando classes
$pageMaker = new PageMaker();
$categoria = new Accounts($idCategoria, null);
$functionsCategories = new FunctionsCategories();

// Fun��es do Doctrine
$categoryRepo = $entityManager->getRepository("Categories");
$categoriesResult = $categoryRepo->findBy(array ('id' => $idCategoria));
?>

<html>
	<head>
		<title>Informa��es da Categoria:</title>
	</head>
	<body>
		<a href="../">Voltar para menu principal</a>
		<h1 align="center">Categoria solicitada:</h1>

		<table border=2 align="center">
			<tr>
				<td>Id:</td>
				<td>Nome:</td>
				<td>Criado em:</td>
				<td>Modificado em:</td>
			</tr>
			<?php $functionsCategories->listarTodasCategorias($categoriesResult);?>
		</table>
	</body>
	
	<?php $pageMaker->printFooter();?>
</html>
