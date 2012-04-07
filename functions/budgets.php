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
* Nome:        Budgets.php
* Descri��o:   Fun��es para Budgets
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
class FunctionsBudgets{

	/**
	* Lista or�amentos em formato Select List Box
	* @param entity $Budgets
	*/
	function listarOrcamentosSelect($budgetsResult){
		foreach($budgetsResult as $budget) {
			echo "<option value=".$budget->getId()." >".$budget->getName()."</option>";
		}
	}
	
	/**
	* Lista or�amento cadastrado em objetos do tipo radio button.
	* @param Object List entity type $budgets
	*/
	function listarOrcamentosEdicao($budgetsResult){
		foreach ($budgetsResult as $result)
		{
			echo "<tr>";
			echo "<td> <input type=RADIO name='idOrcamento' value='".$result->getId()."'></td>";
			echo "<td>".$result->getId()."</td>";
			echo "<td>". $result->getName(). "</td>";
			echo "</tr>";
		}
	}
	
	/**
	 * Exibe dados de or�amento
	 * @param Object List entity type $budgets
	 */
	function exibirRegistro($budgetsResult){
		foreach ($budgetsResult as $budget){
			echo "Informa��es do orcamento: <br />";
			echo "Id do orcamento: ".$budget->getId(). "<br />";
			echo "Nome : ". $budget->getName(). "<br />";
			echo "Criado em: ". $budget->getCreated() . "<br />";
			echo "Modificado em: ". $budget->getModified(). "<br />";
			echo "<br>";
		}
	}

	/**
	 * Retorna todas as contas registradas, em formato table.
	 * @param Object List entity type $budgets
	 */
	function listarOrcamentosTable($budgetsResult){
		foreach ($budgetsResult as $budget){
			echo "<tr>";
			echo "<td>".$budget->getId()."</td>";
			echo "<td>". $budget->getName(). "</td>";
			echo "<td>". $budget->getCreated() . "</td>";
			echo "<td>". $budget->getModified(). "</td>";
			echo "</tr>";
		}
	}

}
?>