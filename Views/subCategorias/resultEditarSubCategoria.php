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
* Nome:        resultEditarSubCategoria.php
* Descri��o:   Classe para executar resultado de edi��o de SubCategoria
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        29/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

//TODO Gustavo: parei nesta edi��o!

$categoria = new Categories();

$idSubCategoria = $_POST['idSubCategoria'];

$nomeSubCategoria = $_POST['nomeSubCategoria'];

$subCategoriaCriada = $_POST['dataCriada'];
$subCategoriaModificada = $_POST['dataModificada'];

//Verifica se a subCategoria j� fora modificada previamente. Caso contr�rio, seta a data de modifica��o para o momento atual.
if (!isset($subCategoriaModificada))
	$subCategoriaModificada = date("Y/m/d H:i:s");

$subCategoria = new Sub_Categories($categoria, $nomeSubCategoria);

echo $subCategoria;

$subCategoria->setName($nomeSubCategoria);
$subCategoria->setCreated($subCategoriaCriada);
$subCategoria->setModified($subCategoriaModificada);

$entityManager->merge($subCategoria);
$entityManager->flush();

?>

<html>
	<head>
		<title>Finance-37571: Resultado de edi��o de SubCategoria:</title>
	</head>
	<body>
	
		<h1 align="center">Edi��o de SubCategoria:</h1>
		<p align="center" />
	
	
	</body>
	<footer style="position: fixed; right: 3px; bottom: 0px;">
		Gustavo Souza Gon�alves - 37571 <br> Marco Aur�lio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>

</html>