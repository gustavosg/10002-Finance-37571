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

	/**
	 * Retorna todas as contas registradas, em formato table.
	 * @param Object List entity type $accounts
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
	 * Lista contas cadastradas em objetos do tipo radio button.
	 * @param Object List entity type $accounts
	 */
	function listarContasEdicao($accountsResult){
		foreach ($accountsResult as $account)
		{
			echo "<tr>";
			echo "<td> <input type=RADIO name='nomeConta' value='".$account->getName()."'></td>";
			echo "<td>".$account->getId()."</td>";
			echo "<td>". $account->getName(). "</td>";
			echo "</tr>";
		}
	}

	/**
	 * Retorna Nome da Conta em formato Option para ListBox (<Select>)
	 * @param Object List entity type $accounts
	 */
	function exibirListaSelectContas($accountsResult){
		foreach ($accountsResult as $result)
		echo "<option value=".$result->getId().">".$result->getName()."</option>";
	}

}
?>