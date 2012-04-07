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
* Descri��o:   Respons�vel pelo retorno e grava��o de dados no Banco de Dados, tabela Expenditure
* ------------------------------------------------------------------------------------------------------------------------
* DADOS DO ARQUIVO
* ------------------------------------------------------------------------------------------------------------------------
* Nome:        editarDespesa.php
* Descri��o:   Clase para inserir dados de modifica��o da despesa
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

$idDespesa = $_POST['idDespesa'];

$subCategoria = new Sub_Categories();
$functionsSub_Categories = new FunctionsSub_Categories();
$functionsAccounts = new FunctionsAccounts();

$despesa = new Expenditure(null, $subCategoria);


// Fun��es do Doctrine
$accountRepo = $entityManager->getRepository("Accounts");
$accountsResult = $accountRepo->findAll();

$subCategoriesRepo = $entityManager->getRepository("Sub_Categories");
$subCategoriesResult = $subCategoriesRepo->findAll();


$expendituresRepo = $entityManager->getRepository("Expenditure");
$expendituresResult = $expendituresRepo->findBy(array('id' => $idDespesa));

$id = 0;
$quantia = '';
$criacao = '';
$modificacaoAnterior = '';
$descricaoDespesa = '';

foreach ($expendituresResult as $expenditures)
{
	$id = $expenditures->getId();
	$quantia = $expenditures->getAmmount();
	$criacao = $expenditures->getCreated();
	$modificacaoAnterior = $expenditures->getModified();
	$descricaoDespesa = $expenditures->getDescription();
}
?>

<html>
	<head>
		<title>Finance-37571: Edi��o de Despesa:</title>
	</head>
	<body>
	<form action="resultEditarDespesa.php" method="post" name="form">
		<h1 align="center">Edi��o de Despesa:</h1>
		<p align="center" />
			<table border=2>
				<tr>
					<td><label>ID:</label></td>
					<td><input type="text" size="10px" name="idDespesa" readonly="readonly" value="<?php echo $id ?>" /></td>
				</tr>
				
				<tr>
					<td><label style="color:red; " >Quantia:</label></td>
					<td><input type="text" size="50px" name="quantiaDespesa" value="<?php echo $quantia ?>" /></td>
				</tr>
				
				<tr>
				<td style="color:red; " >Sub-Categoria:</td>
				<td colspan="3">
					<select name="idSubCategoria">
					<option />
					<?php
					 $functionsSub_Categories->listarSubCategorias($subCategoriesResult);
					 ?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="color:red; " >Conta: </td>
				<td colspan="3">
					<select name="nomeConta">
						<option />
						<?php $functionsAccounts->exibirListaSelectContas($accountsResult);?>
					</select>
				</td>
			</tr>
				
				<tr>
					<td><label>Data de Cria��o:</label></td>
					<td><input type="text" size="50px" name="despesaCriada" readonly="readonly"  value="<?php echo $criacao ?>" /></td>
				</tr>
				
				<tr>
					<td><label>Data de Modifica��o:</label></td>
					<td><input type="text" size="50px" name="despesaModificada" readonly="readonly"  value="<?php echo $modificacaoAnterior ?>" /></td>
				</tr>
				
				<tr>
				<td style="color:red; " ><label align="center">Descri��o da Despesa:</label></td>
				<td colspan="3"><textarea style="width: 400px; height: 200px;" name="descricaoDespesa" id="descricaoDespesa" value="<?php echo $descricaoDespesa ?>" > </textarea></td>
			</tr>
				
			</table>
			
			<p align="right">
			<label style="color:red ">Aviso! <br> Somente campos em vermelho podem ser editados.</label>
			</p>
	
	<p align="center">
	<button type="submit"> Enviar</button>
	</p>
	
	</form>
	</body>
	<footer style="position: fixed; right: 3px; bottom: 0px;">
		Gustavo Souza Gon�alves - 37571 <br> Marco Aur�lio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>

</html>