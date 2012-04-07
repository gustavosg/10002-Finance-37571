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
* Nome:        resultEditarDespesa.php
* Descri��o:   Classe para executar resultado de edi��o de Despesa
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        27/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Defini��o de vari�veis
$idDespesa = $_POST['idDespesa'];
$despesaCriada = $_POST['despesaCriada'];
$despesaModificada = date("Y/m/d H:i:s");

// Capturando informa��es da tela anterior
$idSubCategoria = $_POST['idSubCategoria'];
$nomeConta = $_POST['nomeConta'];
$quantiaDespesa = $_POST['quantiaDespesa'];
$descricaoDespesa = $_POST['descricaoDespesa'];

// Instancia de classes

// NOTA: pra fazer a porcaria do doctrine funcionar tive que instanciar as classes em outros locais tamb�m... 
// Para pegar os objetos corretamente.

$pageMaker = new PageMaker();
$categoria = new Categories();

// Fun��es do Doctrine
$accountsRepo = $entityManager->getRepository("Accounts");

$accountsResult  = $accountsRepo->findBy(array('name'=>$nomeConta));

foreach ($accountsResult as $result)
{
	$idConta = $result->getId();
	$dataCriacao = $result->getCreated();
	$dataModificacao = $result->getModified();
}

$conta = new Accounts( $idConta, $nomeConta);
$conta->setId($idConta);
$conta->setCreated($dataCriacao);
$conta->setModified($dataModificacao);

$subCategoriesRepo = $entityManager->getRepository("Sub_Categories");
$subCategoriesResult = $subCategoriesRepo->findBy(array('id'=>$idSubCategoria));

foreach ($subCategoriesResult as $result){
	$nomeSubCategoria = $result->getName();
	$dataCriacaoSubCategoria = $result->getCreated();
	$dataModificacaoSubCategoria = $result->getModified();
	$categoria = $result->getCategory();
}

$subCategoria = new Sub_Categories($categoria);

$subCategoria->setName($nomeSubCategoria);
$subCategoria->setCreated($dataCriacaoSubCategoria);
$subCategoria->setModified($dataModificacaoSubCategoria);

$despesa = new Expenditure($conta, $subCategoria);

$despesa->setId($idDespesa);
$despesa->setAccount($conta);
$despesa->setDate($dataCriacao);
$despesa->setCreated(date("Y/m/d H:i:s"));
$despesa->setAmmount($quantiaDespesa);
$despesa->setDescription($descricaoDespesa);
?>
<html>
	<head>
		<title>Finance-37571: Resultado de edi��o de Despesa:</title>
	</head>
	<body>
	<a href="../">Voltar para menu principal</a>
		<h1 align="center">Edi��o de Despesa:</h1>
		<p align="center" />
	
	<?php 
		echo $despesa;
		
		$entityManager->merge($despesa);
		$entityManager->flush();
	?>
	</body>
	<?php 
		$pageMaker->printFooter();
	?>
</html>