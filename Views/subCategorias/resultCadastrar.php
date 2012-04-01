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
* Descri��o:   Insere informa��es para Categories
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/

require_once "../../bootstrap.php";

// Capturando informa��es da tela anterior
$idCategoria = $_POST['idCategoria'];
$nomeSubCategoria = $_POST['nomeSubCategoria'];

// Declara��o de vari�veis 
$nomeCategoria = '';
$criacaoCategoria = '';
$modificacaoCategoria = '';

// Instanciando classes
$pageMaker = new PageMaker();
$categoria = new Categories($idCategoria, null);
$subCategoria = new Sub_Categories($categoria, $nomeSubCategoria);

// Fun��es do Doctrine
$categoriesRepo = $entityManager->getRepository("Categories");
$categoriesResult = $categoriesRepo->findBy(array('id' => $idCategoria));

foreach ($categoriesResult as $categorie)
{
	$nomeCategoria = $categorie->getName();
	$criacaoCategoria = $categorie->getCreated();
	$modificacaoCategoria = $categorie->getModified();
}

$categoria->setName($nomeCategoria);
$categoria->setCreated($criacaoCategoria);
$categoria->setModified($modificacaoCategoria);

$subCategoria->setName($nomeSubCategoria);
$subCategoria->setCreated(date("Y/m/d H:i:s"));

?>

<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="../scripts/functions.js"></script>
		<meta charset="ISO-8859-1">
		<title>Finance-37571: Cadastramento de SubCategoria:</title>
	</head>

	<body>
	<a href="../">Voltar para menu principal</a>
		<form action="" name="form" method="post">
			<h1 align="left">SubCategoria Cadastrada!</h1>
			
			<?php 
			echo $subCategoria->__toString();

			$entityManager->merge($subCategoria);
			$entityManager->flush();
			?>
		</form>
	</body>
<?php 
$pageMaker->printFooter();
?>
</html>
