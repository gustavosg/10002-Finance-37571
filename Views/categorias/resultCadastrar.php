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

// Declara��o de vari�veis
$idCategoria = 0;

?>

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
			
			?>
			
			<h1 align="center">Categoria Cadastrada:</h1>
			
			<p align=center>
			<?php 
			
			$categoriesRepo = $entityManager->getRepository("Categories");
			$categoriesResult = $categoriesRepo->findBy(array('name' => $nomeCategoria));
			
			foreach ($categoriesResult as $result)
				$idCategoria = $result->getId();
			$categoria->setId($idCategoria);
			echo $categoria;
			?>
	</p>
		</form>
	</body>
<?php $pageMaker->printFooter();?>
</html>
