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
		foreach($infoCategory as $result) {
			echo "<option value='".$result->getId()."' >".$result->getName()."</option>";
		}
	}

	/**
	* Lista categorias cadastradas em objetos do tipo radio button.
	* @param Object List entity type $categories
	*/
	function listarCategoriasEdicao($categoriesResult){
		foreach ($categoriesResult as $result)
		{
			echo "<tr>";
			echo "<td> <input type=RADIO name='nomeCategoria' value='".$result->getName()."'></td>";
			echo "<td>".$result->getId()."</td>";
			echo "<td>". $result->getName(). "</td>";
			echo "</tr>";
		}
	}
	
	/**
	 * Lista Categorias em formato Table
	 * @param entity $Categories
	 */
	function listarTodasCategorias($categories){
		foreach ($categories as $result){
			echo "<tr>";
			echo "<td>".$result->getId()."</td>";
			echo "<td>". $result->getName(). "</td>";
			echo "<td>". $result->getCreated() . "</td>";
			echo "<td>". $result->getModified(). "</td>";
			echo "</tr>";
		}
	}

}
?>