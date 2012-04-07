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
* Nome:        resultExcluir.php
* Descri��o:   Excluir Sub Categorias
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        07/04/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Definindo vari�veis:
$nomeSubCategoria = '';
$dataCriacao = '';
$dataModificacao = '';

// Capturando informa��es da tela anterior 
$idSubCategoria = $_POST['idSubCategoria'];

// Inst�ncia de classes
$categoria = new Categories();
$pageMaker = new PageMaker();

$subCategoria = new Sub_Categories($categoria,null);

// Fun��es do Doctrine
$subCategoriesRepo = $entityManager->getRepository("Sub_Categories");
$subCategoriesResult = $subCategoriesRepo->findBy(array ('id' => $idSubCategoria));

foreach ($subCategoriesResult as $result)
{
	$idSubCategoria = $result->getId();
	$nomeSubCategoria = $result->getName();
	$dataCriacao = $result->getCreated();
	$dataModificacao = $result->getModified();
	$categoria = $result->getCategory();	
}

$subCategoria->setId($idSubCategoria);
$subCategoria->setName($nomeSubCategoria);
$subCategoria->setCreated($dataCriacao);
$subCategoria->setModified($dataModificacao);
$subCategoria->setCategory($categoria);

?>
<html>
	<head>
		<title>Excluir subCategoria</title>
	</head>
	<body>
	<a href="../">Voltar para menu principal</a>
	
		<form action="">
			<h1 align="center">SubCategoria exclu�da!</h1>
			
			<p align=center>
			<?php 
	
				$subCategoriesResult = $subCategoriesRepo->find($idSubCategoria);
				$entityManager->remove($subCategoriesResult);
				
				$entityManager->flush();
				echo $subCategoria;
			?>
			</p>
		</form>
	</body>
	<?php 
	$pageMaker->printFooter();
	?>
</html>
