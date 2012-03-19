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
// Descri��o:   Respons�vel pelo retorno e grava��o de dados no Banco de Dados, tabela SubCategories
//------------------------------------------------------------------------------------------------------------------------
// DADOS DO ARQUIVO
//------------------------------------------------------------------------------------------------------------------------
// Nome:        crudSubCategories.php
// Descri��o:   Realiza as opera��es de CRUD na tabela SubCategories
// Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
// Data:        20/02/2012
//------------------------------------------------------------------------------------------------------------------------
// CONTROLE DE VERS�O
//------------------------------------------------------------------------------------------------------------------------
//	|   Data			| Autor					| Modifica��o
//	|	29/02/2012		| Gustavo				| Ajustando instru��es SQL
//
//------------------------------------------------------------------------------------------------------------------------

include 'dao.php';

$instance = new crudSubCategories();

class crudSubCategories{
	private  $dao;
	private $categoryId;
	private $subCategory;
	
	private $result;
	private $query;

	
	private $executeFunction;
	
	/// <summary>
	/// Construtor
	/// </summary>
	public function __construct(){
		$this->dao= new DAO();
		
		$this->categoryId = 1;
		$this->subCategory = 'SubCategory1';
		
		$this->executeFunction = 1;
		
		switch ($this->executeFunction){
			case 1:{
				echo "Executando m�todo de cria��o.";
				echo "<br>";
				$this->create($this->categoryId, $this->subCategory);
				break;
			}
			case 2:{
				echo "Executando m�todo de leitura.";
				echo "<br>";
				$this->read($this->subCategory);
				break;
			}
			case 3:{
				echo "Executando m�todo de atualiza��o.";
				echo "<br>";
				$this->update($this->categoryId, $this->subCategory);
				break;
			}
			case 4:{
				echo "Executando m�todo de remo��o.";
				echo "<br>";
				$this->delete($this->subCategory);
				break;
			}
			default:{
				echo "Executando m�todo de leitura.";
				echo "<br>";
				$this->read($this->subCategory);
				break;
			}
		}
		
  	}

  	/// <summary>
  	/// Cria uma nova SubCategoria
  	/// </summary>
  	/// <param subCategory="subCategory">Nome da SubCategoria</param>
	public function create($categoryId, $subCategory){
		$this->categoryId = $categoryId;
		$this->subCategory = $subCategory;
		
		//Abrindo Conex�o:
		$this->dao->openConnection();
		
		//Passagem da instru��o sql e execu��o no banco de dados.
		$this->query = "INSERT INTO sub_Categories (category_id, name, created) VALUES
			('".$this->categoryId."', '".$this->subCategory."', '".date("Y/m/d H:i:s")."')";
		$this->result = mysql_query($this->query) or die(mysql_error());
		
		//Retorna ao usu�rio o resultado.
		$linhasAfetadas = mysql_affected_rows();
		
		if ($linhasAfetadas != 0)
		echo "Registro inclu�do!";
		else
		echo "Erro encontrado, favor informar erro acima.";
		
		//Fecha Conex�o
		$this->dao->closeConnection();
	}
	
	/// <summary>
	/// Busca informa��es de uma SubCategoria
	/// </summary>
	/// <param subCategory="subCategory">Nome da SubCategoria</param>
	/// <returns>Informa��o retornada</returns>
	public function read($subCategory){
		$this->subCategory = $subCategory;
		
		//Abrindo Conex�o:
		$this->dao->openConnection();

		//Passagem da instru��o sql e execu��o no banco de dados.
		$this->query = "SELECT * FROM sub_Categories WHERE name = '".$this->subCategory."'";
		$this->result = mysql_query($this->query) or die(mysql_error());
		
		echo "Query ".$this->query;
		//Fechando Conex�o:
		$this->dao->closeConnection();
		
		//Imprime resultado
		while ($this->return = mysql_fetch_array($this->result)){
			echo "<br>Id:". $this->return[0];
			echo "<br>Id da Categoria :".$this->return[1];
			echo "<br>Nome:".$this->return[2];
			echo "<br>Criado: ".$this->return[3];
			echo "<br>Modificado: ".$this->return[4];
		}
	}

	/// <summary>
	/// Atualiza a subCategoria informada
	/// </summary>
	/// <param subCategory="subCategory">Nome da SubCategoria</param>
	/// <returns>Atualiza��o dasubCategoria</returns>	
	public function update($categoryId, $subCategory){
		$this->categoryId = $categoryId;
		$this->subCategory = $subCategory;
		
		//Abrindo Conex�o:
		$this->dao->openConnection();
		
		//Passagem da instru��o sql e execu��o no banco de dados.
		$this->query = "UPDATE sub_Categories SET category_id = ".$this->categoryId.", name = '".$this->subCategory."',
			modified = '".date("Y/m/d H:i:s")."' where name = '".$this->subCategory."'";
		
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
	/// Deleta a subCategoria informada
	/// </summary>
	/// <param subCategory="subCategory">Nome da SubCategoria</param>
	/// <returns>Remo��o da subCategoria</returns>
	public function delete($subCategory){
		$this->subCategory = $subCategory;
		
		//Abrindo Conex�o:		
		$this->dao->openConnection();
		
		//Passagem da instru��o sql e execu��o no banco de dados.
		$this->query = "DELETE FROM sub_Categories WHERE name = '".$this->subCategory."'";
		$this->result = mysql_query($this->query) or die(mysql_error());
		
		$linhasAfetadas = mysql_affected_rows();
	
		echo "<br>";
		echo "Query executada: ".$this->query;
		echo "<br>";
		
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