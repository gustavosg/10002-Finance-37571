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
* Nome:        Categories.php
* Descri��o:   Fun��es para  Categories
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
class FunctionsCategories{

	/**
	 * Lista Categorias em formato Select List Box
	 * @param entity $Categories
	 */
	function listarCategorias($infoCategory){
		foreach($infoCategory as $categories) {
			echo "<option value='".$categories->getId()."' >".$categories->getName()."</option>";
		}
	}

	/**
	 * Lista Categorias em formato Table
	 * @param entity $Categories
	 */
	function listarTodasCategorias($categories){
		foreach ($categories as $categorie){
			echo "<tr>";
			echo "<td>".$categorie->getId()."</td>";
			echo "<td>". $categorie->getName(). "</td>";
			echo "<td>". $categorie->getCreated() . "</td>";
			echo "<td>". $categorie->getModified(). "</td>";
			echo "</tr>";
		}
	}

	/**
	 * Imprime informa��es da categoria
	 * @param entity $Categories
	 */
	function exibirRegistro($categoriesResult){
		foreach ($categoriesResult as $categoria)
		echo $categoria();
	}
}
?>