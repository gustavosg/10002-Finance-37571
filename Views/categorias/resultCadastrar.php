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
* Descrição:   Classe de resultado do cadastramento de dados de Categories
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once "../../bootstrap.php";

// Capturando informações da tela anterior
$nomeCategoria = $_POST['nomeCategoria'];

// Instanciando classes
$categoria = new Categories();
$functionsCategories = new FunctionsCategories();
$pageMaker = new PageMaker();

?>

<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="../scripts/functions.js"></script>
		<meta charset="ISO-8859-1">
	<title>Finance-37571: Cadastramento de Categoria:</title>
	</head>

	<body>
	<a href="../">Voltar para menu principal</a>
		<form action="" name="form" method="post">
			
			<?php 
			
			// Funções do Doctrine
			$categoria->setName($nomeCategoria);
			$categoria->setCreated(date("Y-m-d H:i:s"));
			
			$entityManager->persist($categoria);
			$entityManager->flush();
			
			// O titulo e o código a seguir só será executado se o flush for concluído com exito.
			
			?>
			
			<h1 align="center">Categoria Cadastrada:</h1>
			<?php 
			
			$categoriesRepo = $entityManager->getRepository("Categories");
			$categoriesResult = $categoriesRepo->findAll();
			
			$functionsCategories->exibirRegistro($categoriesResult);
			?>
	
		</form>
	</body>

<?php $pageMaker->printFooter();?>

</html>
