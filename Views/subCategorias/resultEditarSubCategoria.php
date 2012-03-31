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
* Nome:        resultEditarSubCategoria.php
* Descrição:   Classe para executar resultado de edição de SubCategoria
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        29/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Informações da tela anterior
$idSubCategoria = $_POST['idSubCategoria'];
$idCategoria = $_POST['idCategoria'];
$nomeSubCategoria = $_POST['nomeSubCategoria'];
$subCategoriaCriada = $_POST['dataCriada'];
$subCategoriaModificada = $_POST['dataModificada'];

//Verifica se a subCategoria já fora modificada previamente. Caso contrário, seta a data de modificação para o momento atual.
if (!isset($subCategoriaModificada))
	$subCategoriaModificada = date("Y/m/d H:i:s");

$categoria = new Categories();

$subCategoria = new Sub_Categories(null , $nomeSubCategoria);



$subCategoria->setId($idSubCategoria);
$subCategoria->setName($nomeSubCategoria);
$subCategoria->setCreated($subCategoriaCriada);
$subCategoria->setModified($subCategoriaModificada);

print_r($subCategoria);

$entityManager->merge($categoria);
$entityManager->flush();

?>

<html>
	<head>
		<title>Finance-37571: Resultado de edição de SubCategoria:</title>
	</head>
	<body>
	
		<h1 align="center">Edição de SubCategoria:</h1>
		<p align="center" />
	
	
	</body>
	<footer style="position: fixed; right: 3px; bottom: 0px;">
		Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>

</html>