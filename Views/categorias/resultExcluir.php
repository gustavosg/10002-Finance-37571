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
* Nome:        resultEditarCategoria.php
* Descri��o:   Classe para executar resultado de edi��o de Categoria
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        27/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Recuperando informa��es da tela anterior
$idCategoria = $_POST['idCategoria'];

// Instanciando classes
$categoria = new Categories($idCategoria, null);
$categoriesRepo = $entityManager->getRepository("Categories");
$categoriesResult = $categoriesRepo->findBy(array ('id' => $idCategoria));
$pageMaker = new PageMaker();

//Definindo vari�veis
$nomeCategoria = '';
$criacaoCategoria = '';
$modificacaoCategoria = '';

foreach ($categoriesResult as $result)
{
	$nomeCategoria = $result->getName();
	$criacaoCategoria = $result->getCreated();
	$modificacaoCategoria = $result->getModified();
}

$categoria->setName($nomeCategoria);
$categoria->setCreated($criacaoCategoria);
$categoria->setModified($modificacaoCategoria);

?>

<html>
<head>
<title>Excluir categoria</title>
</head>
<body>

	<form action="">
		<a href="../">Voltar para menu principal</a>
		<?php

		$categoriesResult = $categoriesRepo->find($idCategoria);
			$entityManager->remove($categoriesResult);
			$entityManager->flush();
		?>
		
<h1 align="center">Categoria exclu�da!</h1>

		<p align=center>

		<?php 
		echo $categoria;
		?>

</p>
	</form>

</body>
<?php 
$pageMaker->printFooter();?>
</html>
