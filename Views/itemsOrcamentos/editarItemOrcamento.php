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
* Nome:        editarItemOrcamento.php
* Descrição:   Classe para inserir dados de modificação da itemOrcamento
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Instância de classes
$pageMaker = new PageMaker();
$functionsBudgets = new FunctionsBudgets();
$functionsSub_Categories = new FunctionsSub_Categories();

$idItemOrcamento = $_POST['idItemOrcamento'];

$itemOrcamento = new Accounts(null, $idItemOrcamento);

$subCategoriesRepo = $entityManager->getRepository("Sub_Categories");
$subCategoriesResult= $subCategoriesRepo->findAll();

$budgetsRepo = $entityManager->getRepository("Budgets");
$budgetsResult = $budgetsRepo->findAll();

$accountRepo = $entityManager->getRepository("Budget_Records");
$accountsResult = $accountRepo->findBy(array('id' => $idItemOrcamento));

$id = 0;
$quantia = '';
$criacao = '';
$modificacaoAnterior = '';

foreach ($accountsResult as $account)
{
	$id = $account->getId();
	$quantia = $account->getAmmount();
	$criacao = $account->getCreated();
	$modificacaoAnterior = $account->getModified();
}
?>

<html>
	<head>
		<title>Finance-37571: Edição de ItemOrcamento:</title>
	</head>
	<body>
	<form action="resultEditarItemOrcamento.php" method="post" name="form">
		<h1 align="center">Edição de Item de Orçamento:</h1>
		<p align="center" />
			<table border=2>
				<tr>
					<td><label>ID:</label></td>
					<td><input type="text" size="10px" name="idItemOrcamento" readonly="readonly" value="<?php echo $id ?>" /></td>
				</tr>
				
				<tr>
					<td><label style="color:red; " >Nome:</label></td>
					<td><input type="text" size="50px" name="quantiaItemOrcamento" value="<?php echo $quantia?>" /></td>
				</tr>
				
					<tr>
				<td><label>Selecione uma sub categoria: </label></td>
				<td><select name="idSubCategoria">
						<option />
						<?php $functionsSub_Categories->listarSubCategorias($subCategoriesResult)?>
					</select>
				</td>
				</tr>
				<tr>
					<td><label>Selecione um Orçamento:</label></td>
					<td>
					<select name="idOrcamento">
					<option />
					
					<?php $functionsBudgets->listarOrcamentosSelect($budgetsResult);?>
					</select>
					</td>
				</tr>
				<tr>
					<td><label>Data de Criação:</label></td>
					<td><input type="text" size="50px" name="itemOrcamentoCriada" readonly="readonly"  value="<?php echo $criacao ?>" /></td>
				</tr>
				
				<tr>
					<td><label>Data de Modificação:</label></td>
					<td><input type="text" size="50px" name="itemOrcamentoModificada" readonly="readonly"  value="<?php echo $modificacaoAnterior ?>" /></td>
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
	<?php 
	$pageMaker->printFooter();
	
	?>

</html>