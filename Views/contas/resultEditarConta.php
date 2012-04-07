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
* Nome:        resultEditarConta.php
* Descrição:   Classe para executar resultado de edição de Conta
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        27/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Capturando informações da tela anterior
$idConta = $_POST['idConta'];
$nomeConta = $_POST['nomeConta'];
$contaCriada = $_POST['contaCriada'];
$contaModificada = date("Y/m/d H:i:s");

//Instância de classes
$conta = new Accounts($idConta, null);
$pageMaker = new PageMaker();

// Definindo valores
$conta->setName($nomeConta);
$conta->setCreated($contaCriada);
$conta->setModified($contaModificada);

?>

<html>
	<head>
		<title>Finance-37571: Resultado de edição de Conta:</title>
	</head>
	<body>
	
	<a href="../">Voltar para menu principal</a>
		<h1 align="center">Informações editadas:</h1>
		<p align="center" />
	
	
	<?php 
	echo $conta;
	//Gravação
	$entityManager->merge($conta);
	$entityManager->flush();
	?>
	
	</body>
<?php $pageMaker->printFooter();?>

</html>