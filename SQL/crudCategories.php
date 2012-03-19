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
// Descri��o:   Respons�vel pelo retorno e grava��o de dados no Banco de Dados, tabela Categories
//------------------------------------------------------------------------------------------------------------------------
// DADOS DO ARQUIVO
//------------------------------------------------------------------------------------------------------------------------
// Nome:        crudCategories.php
// Descri��o:   Realiza as opera��es de CRUD na tabela Categories
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

$test = new crudCategories();

class crudCategories{
	private  $dao;
	private $name;
	private $categoryId;
	private $result;
	private $query;
	private $return;

	private $executeFunction;

	/// <summary>
	/// Construtor
	/// </summary>
	function __construct(){
		$this->dao= new DAO();

		$this->name = 'Category';
		$this->categoryId = 1;
		
		$this->executeFunction = 1;

		switch ($this->executeFunction){
			case 1:{
				echo "Executando m�todo de cria��o.";
				echo "<br>";
				$this->create($this->name);
				break;
			}
			case 2:{
				echo "Executando m�todo de leitura.";
				echo "<br>";
				$this->read($this->name);
				break;
			}
			case 3:{
				echo "Executando m�todo de atualiza��o.";
				echo "<br>";
				$this->update($this->name);
				break;
			}
			case 4:{
				echo "Executando m�todo de remo��o.";
				echo "<br>";
				$this->delete($this->categoryId);
				break;
			}
			default:{
				echo "Executando m�todo de leitura.";
				echo "<br>";
				$this->read($this->name);
				break;
			}
		}
	}

	/// <summary>
	/// Cria uma nova Categoria
	/// </summary>
	/// <param name="name">Nome da Categoria</param>
	public function create($name){
		$this->name = $name;

		//Abrindo Conex�o:
		$this->dao->openConnection();

		//Passagem da instru��o sql e execu��o no banco de dados.
		$this->query = "INSERT INTO categories (name, created) VALUES('".$this->name."' , '".date("Y/m/d H:i:s")."')";
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
	/// Busca informa��es de uma Categoria
	/// </summary>
	/// <param name="name">Nome da Categoria</param>
	/// <returns>Informa��o retornada</returns>
	public function read($name){
		$this->name = $name;
		
		//Abrindo Conex�o:
		$this->dao->openConnection();
		
		//Passagem da instru��o sql e execu��o no banco de dados.
		$this->query = ("SELECT * FROM categories WHERE NAME =".$name."");
		$this->result = mysql_query($this->query) or die(mysql_error());
		
		//Fechando Conex�o:
		$this->dao->closeConnection();
		
		//Imprime resultado
		while ($this->return = mysql_fetch_array($this->result)){
			echo "<br>Id:". $this->return[0];
			echo "<br>Nome:".$this->return[1];
			echo "<br>Criado:".$this->return[2];
			echo "<br>Modifica��o: ".$this->return[3];
		}
	}

	/// <summary>
	/// Atualiza a categoria informada
	/// </summary>
	/// <param name="name">Nome da Categoria</param>
	/// <returns>Atualiza��o da categoria</returns>
	public function update($name){
		$this->name = $name;

		//Abrindo Conex�o:
		$this->dao->openConnection();

		//Passagem da instru��o sql e execu��o no banco de dados.
		$this->query = "UPDATE categories SET name = ".$this->name.", modified = '".date("Y/m/d H:i:s")."'
			WHERE NAME = ".$this->name;

		echo "<br>";
		echo "Query executada: ".$this->query;
		echo "<br>";
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
	/// Deleta a categoria informada
	/// </summary>
	/// <param name="name">Nome da Categoria</param>
	/// <returns>Remo��o da categoria</returns>
	public function delete($id){
		$this->categoryId= $id;

		//Abrindo Conex�o:
		$this->dao->openConnection();

		//Apagando em cascata nas tabelas relacionadas
		$this->query = "DELETE FROM expenditure where sub_category_id = '".$this->categoryId."'";
		mysql_query($this->query) or die(mysql_error());
		
		//Apagando em cascata nas tabelas filhas
		$this->query = "DELETE FROM sub_categories where category_id = '".$this->categoryId."'";
		mysql_query($this->query) or die(mysql_error());
		
		$this->query = "";
		
		//Passagem da instru��o sql e execu��o no banco de dados.
		$this->query = ("DELETE FROM categories WHERE id = '".$this->categoryId."'") ;
		$this->result = mysql_query($this->query) or die(mysql_error());

		echo "<br>";
		echo "Query executada: ".$this->query;
		echo "<br>";
		
		$linhasAfetadas = mysql_affected_rows();

		//Fechando Conex�o:
		$this->dao->closeConnection();
		
		//Confere resultado e informa ao usu�rio.
		if ($linhasAfetadas != 0)
		echo "Registro deletados!";
		else
		echo "Erro encontrado, favor reportar erro.".mysql_error();
	}
}


?>