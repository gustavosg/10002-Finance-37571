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
* Nome:        resultEditarDespesa.php
* Descrição:   Classe para executar resultado de edição de Despesa
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        27/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Definição de variáveis
$idDespesa = $_POST['idDespesa'];
$despesaCriada = $_POST['despesaCriada'];
$despesaModificada = date("Y/m/d H:i:s");

// Capturando informações da tela anterior
$idSubCategoria = $_POST['idSubCategoria'];
$nomeConta = $_POST['nomeConta'];
$quantiaDespesa = $_POST['quantiaDespesa'];
$descricaoDespesa = $_POST['descricaoDespesa'];

// Instancia de classes

// NOTA: pra fazer a porcaria do doctrine funcionar tive que instanciar as classes em outros locais também... 
// Para pegar os objetos corretamente.

$pageMaker = new PageMaker();
$categoria = new Categories();

// Funções do Doctrine
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
		<title>Finance-37571: Resultado de edição de Despesa:</title>
	</head>
	<body>
	<a href="../">Voltar para menu principal</a>
		<h1 align="center">Edição de Despesa:</h1>
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