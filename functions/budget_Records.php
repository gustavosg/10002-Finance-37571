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
* Nome:        Budget_Records.php
* Descrição:   Funções para Budget_Records
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
class FunctionsBudget_Records{
	
	/**
	* Lista items de orçamentos em formato Select List Box
	* @param entity $BudgetRecords
	*/
	function listarItemsOrcamentosSelect($budgetRecordsResult){
		foreach($budgetRecordsResult as $result) {
			echo "<option value=".$result->getId()." >Quantia: ".$result->getAmmount().", Relacionado à Orçamento: ".$result->getBudget()->getName() ."</option>";
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
	* Lista items de orçamentos em formato Table Row
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