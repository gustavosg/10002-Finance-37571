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
* Descrição:   Insere informações para despesas
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

// Declaração de variáveis

// Para conta
$idConta = 0;
$nomeConta = '';
$dataCriacao=  '';
$dataModificacao = '';

// Para Categoria
$idCategoria = 0;

// Para subCategoria
$nomeSubCategoria = '';
$dataCriacaoSubCategoria = '';
$dataModificacaoSubCategoria = '';

// Capturando informações da tela anterior
$idSubCategoria = $_POST['idSubCategoria'];
$nomeConta = $_POST['nomeConta'];
$quantia = $_POST['quantia'];
$descricaoDespesa = $_POST['descricaoDespesa'];

// TODO Gustavo: Montar script que 'monta' a data e hora

$horaCompleto = $_POST['data'] . " " . $_POST['hora'];

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

$despesa->setAccount($conta);
$despesa->setDate($dataCriacao);
$despesa->setCreated(date("Y/m/d H:i:s"));
$despesa->setAmmount($quantia);
$despesa->setDescription($descricaoDespesa);


?>

<html>
	<head>
		<title>Finance-37571: Cadastramento de Despesa</title>
	</head>
	<body>
		<a href="../">Voltar para menu principal</a>
		<form action="" name="form" method="post">
			<h1 align="center">Despesa cadastrada:</h1>
				<?php

				echo $despesa;
				
					$entityManager->merge($despesa);
					$entityManager->flush();
				?>
		</form>
	</body>
	<?php $pageMaker->printFooter();?>
</html>
