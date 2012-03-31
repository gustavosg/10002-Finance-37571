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
* Nome:        editarSubCategoria.php
* Descrição:   Classe para executar resultado de edição de SubCategoria
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        29/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';


// Capturando informações da tela anterior
$nomeSubCategorias = $_POST['nomeSubCategorias'];

// Declaração de classes
$categoria = new Categories();

$functionsCategories = new FunctionsCategories();
$functionsSub_Categories = new FunctionsSub_Categories();
$pageMaker = new PageMaker();

// Declaração de variáveis
$id = 0;
$nome = '';
$criacao = '';
$modificacaoAnterior = '';


// Funções do Doctrine
$categoriesRepo = $entityManager->getRepository("Categories");
$categoriesResult = $categoriesRepo->findAll();

foreach ($categoriesResult as $categories)
	$categoria = $categories;

$subCategoria = new Sub_Categories($categoria, $nomeSubCategorias);

$subCategorieRepo = $entityManager->getRepository("Sub_Categories");
$subCategoriesResult = $subCategorieRepo->findBy(array('name' => $subCategoria->getName()));

// Capturando informações complementares
foreach ($subCategoriesResult as $subCategorie)
{
	$id = $subCategorie->getId();
	$nome = $subCategorie->getName();
	$criacao = $subCategorie->getCreated();
	$modificacaoAnterior = $subCategorie->getModified();
	$categoria = $subCategorie->getCategory();
}

?>

<html>
	<head>
		<title>Finance-37571: Edição de SubCategoria:</title>
	</head>
	<body>
	<form action="resultEditarSubCategoria.php" method="post" name="form">
		<h1 align="center">Edição de SubCategorias:</h1>
		
		<h2 align="center">Dados da Sub-Categoria</h2>
		<p align="center" />
			<table border=2 width=600px >
				<tr>
					<td><label>ID:</label></td>
					<td><input type="text" size="10px" name="idSubCategoria" readonly="readonly" value="<?php echo $id ?>" /></td>
				</tr>
				
				<tr>
					<td><label style="color:red; " >Nome:</label></td>
					<td><input type="text" size="50px" name="nomeSubCategoria" value="<?php echo $nome ?>" /></td>
				</tr>
				
				<tr>
					<td><label>Data de Criação:</label></td>
					<td><input type="text" size="50px" name="dataCriada" readonly="readonly"  value="<?php echo $criacao ?>" /></td>
				</tr>
				
				<tr>
					<td><label>Data de Modificação:</label></td>
					<td><input type="text" size="50px" name="dataModificada" readonly="readonly"  value="<?php echo $modificacaoAnterior ?>" /></td>
				</tr>
				
			</table>
		
		<h2 align="center">Dados da Categoria relacionada</h2>
			
			<p align="center">
			
			<table border=2 width=600px>
			<tr>
			<td width="160px"  style="color:red; ">Categoria: </td>
			<td><select name="idCategoria" >
				<option />
				<?php 
				foreach($categoriesResult as $categorie) {
					// Compara se a Categoria pertence à sub Categoria, se sim, seleciona o registro correspondente.
					if ($categorie->getId() == $subCategoria->getCategory()->getId())
						echo "<option SELECTED value=".$categorie->getId().">".$categorie->getName()."</option>";
					else 
						echo "<option >".$categorie->getName()."</option>";
				};
				?>
				</select></td>
			</tr>
			</table>
			
							
			</p>
			
			
	
	<p align="center">
	<button type="submit"> Enviar</button>
	</p>
	
	<p align="right">
			<label style="color:red ">Aviso! <br> Somente campos em vermelho podem ser editados.</label>
			</p>
			
	</form>
	</body>
	
	<?php $pageMaker->printFooter();?>

</html>