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
* Nome:        resultCadastrar.php
* Descri��o:   Classe de resultado do cadastramento de dados de Categories
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once "../../bootstrap.php";

// Capturando informa��es da tela anterior
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
			
			// Fun��es do Doctrine
			$categoria->setName($nomeCategoria);
			$categoria->setCreated(date("Y-m-d H:i:s"));
			
			$entityManager->persist($categoria);
			$entityManager->flush();
			
			// O titulo e o c�digo a seguir s� ser� executado se o flush for conclu�do com exito.
			
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
