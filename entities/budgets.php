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
* Descri��o:   Entidade de mapeamento para Budgets
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        22/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
/** @Entity **/

class Budgets{
	
	/** @Id @GeneratedValue @Column(type="integer") @OneToMany(targetEntity="Budget_Records") @var integer **/
	protected $id;
	
	/** @Column(type="string") **/
	protected $name;
	
	/** @Column**/
	protected $created;
	
	/** @Column **/
	protected $modified;
	
	public function  __construct($id = null,$name = null){
		$this->id = $id;
		$this->name = $name;
	}
	
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}
	
	public function getName(){
		return $this->name;
	}
	public function setName($name){
		$this->name = $name;
	}

	public function getCreated(){
		return $this->created;
	}
	public function setCreated($created){
		$this->created= $created;
	}

	public function getModified(){
		return $this->modified;
	}
	public function setModified($modified){
		$this->modified= $modified;
	}
	
	public function __toString(){
		return "ID: [".($this->id==null?"-":$this->id)."], Nome: " . ($this->name ). " , Criado em: ". ($this->created ). " , Modificado em: ". ($this->modified ). " . " ;
	}
	
}

?>