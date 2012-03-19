<?php
//------------------------------------------------------------------------------------------------------------------------
// DADOS DO SISTEMA
//------------------------------------------------------------------------------------------------------------------------
// Nome:		Finance-37571
// �rea:		Finan�as
//------------------------------------------------------------------------------------------------------------------------
// DADOS DA APLICA��O
//------------------------------------------------------------------------------------------------------------------------
// Nome:        SQL
// Descri��o:   Respons�vel pelo retorno e grava��o de dados no Banco de Dados, tabela Budgets
//------------------------------------------------------------------------------------------------------------------------
// DADOS DO ARQUIVO
//------------------------------------------------------------------------------------------------------------------------
// Nome:        crudBudgets.php
// Descri��o:   Realiza as opera��es de CRUD na tabela Budgets
// Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
// Data:        20/02/2012
//------------------------------------------------------------------------------------------------------------------------
// CONTROLE DE VERS�O
//------------------------------------------------------------------------------------------------------------------------
//	|   Data			| Autor					| Modifica��o
//	|	29/02/2012		| Gustavo				| Ajustando instru��es SQL
//	|   04/03/2012		| Gustavo				| Adicionado exclus�o em tabelas filhas
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
		
		//Instanciando classe de Conex�o
		$this->dao= new DAO();
		
		$this->budget = 'Budget1';
		$this->id = '1';
		$this->executeFunction = 1;
		
		switch ($this->executeFunction){
			case 1:{
				echo "Executando m�todo de cria��o.";
				echo "<br>";
				$this->create($this->budget);
				break;
			}
			case 2:{
				echo "Executando m�todo de leitura.";
				echo "<br>";
				$this->read($this->budget);
				break;
			}
			case 3:{
				echo "Executando m�todo de atualiza��o.";
				echo "<br>";
				$this->update($this->budget);
				break;
			}
			case 4:{
				echo "Executando m�todo de remo��o.";
				echo "<br>";
				$this->delete($this->id);
				break;
			}
			default:{
				echo "Executando m�todo de leitura.";
				echo "<br>";
				$this->read($this->budget);
				break;
			}
		}
		
	}

	/// <summary>
	/// Cria um novo Or�amento
	/// </summary>
	/// <param budget="budget">Nome do Or�amento</param>
	public function create($budget){
		$this->budget = $budget;

		//Abrindo Conex�o:
		$this->dao->openConnection();

		//Passagem da instru��o sql e execu��o no banco de dados.
		$this->query = "INSERT INTO budgets (name, created) VALUES('".$this->budget."', '".date("Y/m/d H:i:s")."')";
		$this->result = mysql_query($this->query) or die(mysql_error());

		//Retorna ao usu�rio o resultado.
		$linhasAfetadas = mysql_affected_rows();
		
		if ($linhasAfetadas != 0)
		echo "Registros inclu�dos com sucesso. <br>";
		else
		echo "Erro encontrado, favor reportar erro.";
		
		//Fechando Conex�o
		$this->dao->closeConnection();
	}

	/// <summary>
	/// Busca informa��es de um Or�amento
	/// </summary>
	/// <param budget="budget">Nome do Or�amento</param>
	/// <returns>Informa��o retornada</returns>
	public function read($budget){
		$this->budget = $budget;

		//Abrindo Conex�o:
		$this->dao->openConnection();

		//Passagem da instru��o sql e execu��o no banco de dados.
		$this->query =("SELECT * FROM budgets WHERE name = '".$this->budget."'");
		$this->result = mysql_query($this->query) or die(mysql_error());

		//Imprime resultado
		while ($this->return = mysql_fetch_array($this->result)){
			echo "<br>Id:". $this->return[0];
			echo "<br>Nome:".$this->return[1];
			echo "<br>Criado:".$this->return[2];
			echo "<br>Modifica��o: ".$this->return[3];
		}
		
		//Fechando Conex�o
		$this->dao->closeConnection();
	}

	/// <summary>
	/// Atualiza o or�amento informado
	/// </summary>
	/// <param budget="budget">Nome do Or�amento</param>
	/// <returns>Atualiza��o do or�amento</returns>
	public function update($budget){

		$this->budget = $budget;

		//Abrindo Conex�o:
		$this->dao->openConnection();

		//Passagem da instru��o sql e execu��o no banco de dados.
		$this->query = "UPDATE budgets SET name = '".$this->budget."', modified = '".date("Y/m/d H:i:s")."'";
		$this->result = mysql_query($this->query) or die(mysql_error());

		$linhasAfetadas = mysql_affected_rows();

		//Fechando Conex�o:
		$this->dao->closeConnection();

		//Confere resultado e informa ao usu�rio.
		if ($linhasAfetadas != 0)
		echo "Registros alterados!";
		else
		echo "Erro encontrado, favor reportar erro.".mysql_error();
	}

	/// <summary>
	/// Deleta o or�amento informado
	/// </summary>
	/// <param budget="budget">Nome do Or�amento</param>
	/// <returns>Remo��o do or�amento</returns>
	public function delete($id){
		$this->id = $id;
		
		//Abrindo Conex�o:
		$this->dao->openConnection();
		
		//Apagando em cascata nas tabelas filhas
		$this->query = "DELETE FROM budget_records where budget_id = '".$this->id."'";
		mysql_query($this->query) or die(mysql_error());
		
		echo "".$this->query;
		
		$this->query = "";
		
		//Passagem da instru��o sql e execu��o no banco de dados.
		$this->query = "DELETE FROM budgets WHERE id = '".$this->id."'";
		$this->result = mysql_query($this->query) or die(mysql_error());
		
		echo "<br>";
		echo "Query executada: ".$this->query;
		echo "<br>";
		
		$linhasAfetadas = mysql_affected_rows();

		//Fechando Conex�o:
		$this->dao->closeConnection();

		//Confere resultado e informa ao usu�rio.
		if ($linhasAfetadas != 0)
		echo "Registros deletados!";
		else
		echo "N�o h� registro para exclus�o.".mysql_error();
	}
}

?>