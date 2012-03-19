<?php
//------------------------------------------------------------------------------------------------------------------------
// DADOS DO SISTEMA
//------------------------------------------------------------------------------------------------------------------------
// Nome:		Finance-37571
// Área:		Finanças
//------------------------------------------------------------------------------------------------------------------------
// DADOS DA APLICAÇÃO
//------------------------------------------------------------------------------------------------------------------------
// Nome:        SQL
// Descrição:   Responsável pelo retorno e gravação de dados no Banco de Dados, tabela Budgets
//------------------------------------------------------------------------------------------------------------------------
// DADOS DO ARQUIVO
//------------------------------------------------------------------------------------------------------------------------
// Nome:        crudBudgets.php
// Descrição:   Realiza as operações de CRUD na tabela Budgets
// Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
// Data:        20/02/2012
//------------------------------------------------------------------------------------------------------------------------
// CONTROLE DE VERSÃO
//------------------------------------------------------------------------------------------------------------------------
//	|   Data			| Autor					| Modificação
//	|	29/02/2012		| Gustavo				| Ajustando instruções SQL
//	|   04/03/2012		| Gustavo				| Adicionado exclusão em tabelas filhas
//------------------------------------------------------------------------------------------------------------------------

include 'dao.php';

$instance = new crudBudgets();

class crudBudgets{
	private  $dao;
	private $budget;
	private $id;
	
	private $result;
	private $query;
	private $return;
	
	private $executeFunction;	

	/// <summary>
	/// Construtor
	/// </summary>
	public function __construct(){
		
		//Instanciando classe de Conexão
		$this->dao= new DAO();
		
		$this->budget = 'Budget1';
		$this->id = '1';
		$this->executeFunction = 1;
		
		switch ($this->executeFunction){
			case 1:{
				echo "Executando método de criação.";
				echo "<br>";
				$this->create($this->budget);
				break;
			}
			case 2:{
				echo "Executando método de leitura.";
				echo "<br>";
				$this->read($this->budget);
				break;
			}
			case 3:{
				echo "Executando método de atualização.";
				echo "<br>";
				$this->update($this->budget);
				break;
			}
			case 4:{
				echo "Executando método de remoção.";
				echo "<br>";
				$this->delete($this->id);
				break;
			}
			default:{
				echo "Executando método de leitura.";
				echo "<br>";
				$this->read($this->budget);
				break;
			}
		}
		
	}

	/// <summary>
	/// Cria um novo Orçamento
	/// </summary>
	/// <param budget="budget">Nome do Orçamento</param>
	public function create($budget){
		$this->budget = $budget;

		//Abrindo Conexão:
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query = "INSERT INTO budgets (name, created) VALUES('".$this->budget."', '".date("Y/m/d H:i:s")."')";
		$this->result = mysql_query($this->query) or die(mysql_error());

		//Retorna ao usuário o resultado.
		$linhasAfetadas = mysql_affected_rows();
		
		if ($linhasAfetadas != 0)
		echo "Registros incluídos com sucesso. <br>";
		else
		echo "Erro encontrado, favor reportar erro.";
		
		//Fechando Conexão
		$this->dao->closeConnection();
	}

	/// <summary>
	/// Busca informações de um Orçamento
	/// </summary>
	/// <param budget="budget">Nome do Orçamento</param>
	/// <returns>Informação retornada</returns>
	public function read($budget){
		$this->budget = $budget;

		//Abrindo Conexão:
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query =("SELECT * FROM budgets WHERE name = '".$this->budget."'");
		$this->result = mysql_query($this->query) or die(mysql_error());

		//Imprime resultado
		while ($this->return = mysql_fetch_array($this->result)){
			echo "<br>Id:". $this->return[0];
			echo "<br>Nome:".$this->return[1];
			echo "<br>Criado:".$this->return[2];
			echo "<br>Modificação: ".$this->return[3];
		}
		
		//Fechando Conexão
		$this->dao->closeConnection();
	}

	/// <summary>
	/// Atualiza o orçamento informado
	/// </summary>
	/// <param budget="budget">Nome do Orçamento</param>
	/// <returns>Atualização do orçamento</returns>
	public function update($budget){

		$this->budget = $budget;

		//Abrindo Conexão:
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query = "UPDATE budgets SET name = '".$this->budget."', modified = '".date("Y/m/d H:i:s")."'";
		$this->result = mysql_query($this->query) or die(mysql_error());

		$linhasAfetadas = mysql_affected_rows();

		//Fechando Conexão:
		$this->dao->closeConnection();

		//Confere resultado e informa ao usuário.
		if ($linhasAfetadas != 0)
		echo "Registros alterados!";
		else
		echo "Erro encontrado, favor reportar erro.".mysql_error();
	}

	/// <summary>
	/// Deleta o orçamento informado
	/// </summary>
	/// <param budget="budget">Nome do Orçamento</param>
	/// <returns>Remoção do orçamento</returns>
	public function delete($id){
		$this->id = $id;
		
		//Abrindo Conexão:
		$this->dao->openConnection();
		
		//Apagando em cascata nas tabelas filhas
		$this->query = "DELETE FROM budget_records where budget_id = '".$this->id."'";
		mysql_query($this->query) or die(mysql_error());
		
		echo "".$this->query;
		
		$this->query = "";
		
		//Passagem da instrução sql e execução no banco de dados.
		$this->query = "DELETE FROM budgets WHERE id = '".$this->id."'";
		$this->result = mysql_query($this->query) or die(mysql_error());
		
		echo "<br>";
		echo "Query executada: ".$this->query;
		echo "<br>";
		
		$linhasAfetadas = mysql_affected_rows();

		//Fechando Conexão:
		$this->dao->closeConnection();

		//Confere resultado e informa ao usuário.
		if ($linhasAfetadas != 0)
		echo "Registros deletados!";
		else
		echo "Não há registro para exclusão.".mysql_error();
	}
}

?>