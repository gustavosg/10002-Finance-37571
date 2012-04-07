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
* Nome:        Budget_Records.php
* Descri��o:   Fun��es para Budget_Records
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
class FunctionsBudget_Records{
	
	/**
	* Lista items de or�amentos em formato Select List Box
	* @param entity $BudgetRecords
	*/
	function listarItemsOrcamentosSelect($budgetRecordsResult){
		foreach($budgetRecordsResult as $result) {
			echo "<option value=".$result->getId()." >Quantia: ".$result->getAmmount().", Relacionado � Or�amento: ".$result->getBudget()->getName() ."</option>";
		}
	}
	
	/**
	* Lista items de orcamento cadastradas em objetos do tipo radio button.
	* @param Object List entity type $budgetRecordss
	*/
	function listarItemsOrcamentoEdicao($budgetRecordssResult){
		foreach ($budgetRecordssResult as $result)
		{
			echo "<tr>";
			echo "<td> <input type=RADIO name='idItemOrcamento' value='".$result->getId()."'></td>";
			echo "<td>".$result->getId()."</td>";
			echo "<td>". $result->getAmmount(). "</td>";
			echo "<td>". $result->getCreated(). "</td>";
			echo "</tr>";
		}
	}
	
	/**
	* Lista items de or�amentos em formato Table Row
	* @param entity $BudgetRecords
	*/
	function listarItemsOrcamentoTable($budgetRecordsResult){
		foreach ($budgetRecordsResult as $result)
		{
			echo "<tr>";
			echo "<td>".$result->getId()."</td>";
			echo "<td>".$result->getAmmount()."</td>";
			echo "<td>".$result->getCreated()."</td>";
			echo "<td>".$result->getModified()."</td>";
			echo "<td>".$result->getBudget()."</td>";
			echo "<td>".$result->getSubCategory()."</td>";
			echo "</tr>";
		}
	}
}
?>