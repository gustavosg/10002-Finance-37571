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
* Nome:        accounts.php
* Descrição:   Funções para Accounts
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
class FunctionsAccounts{

	/*
	 * Retorna todas as contas registradas, em formato table.
	*/
	function listarTodasContas($accountsResult){
		foreach ($accountsResult as $account)
		{
			echo "<tr>";
			echo "<td>".$account->getId()."</td>";
			echo "<td>". $account->getName(). "</td>";
			echo "<td>". $account->getCreated() . "</td>";
			echo "<td>". $account->getModified(). "</td>";
			echo "</tr>";
		}
	}

	/**
	 *
	 * Lista contas cadastradas em objetos do tipo radio button.
	 * @param $accountsResult = lista de contas obtidas em um select
	 */
	function listarContasEdicao($accountsResult){
		foreach ($accountsResult as $account)
		{
			echo "<tr>";
			echo "<td> <input type=RADIO name=selecaoConta id=selecaoConta value='".$account->getName()."'></input></td>";
			echo "<td>".$account->getId()."</td>";
			echo "<td>". $account->getName(). "</td>";
			echo "</tr>";
		}
	}

	function exibirListaSelectContas($accountsResult){
		foreach ($accountsResult as $result)
		echo "<option >".$result->getName()."</option>";
	}
}
?>