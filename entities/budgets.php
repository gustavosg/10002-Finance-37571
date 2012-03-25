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
* Nome:        Budgets.php
* Descrição:   Entidade de mapeamento para Budgets
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        22/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
/** @Entity **/

class Budgets{
	
	/** @Id @GeneratedValue @Column(type="integer") @OneToMany(targetEntity="BudgetRecords") @var integer **/
	protected $id;
	
	/** @Column(type="string") **/
	protected $name;
	
	/** @Column**/
	protected $created;
	
	/** @Column **/
	protected $modified;
	
	
	// TODO Gustavo: Continuar construtor de Budgets
	public function  __construct($name = null){
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
	
	public function ToString(){
		return "ID: [".($this->id==null?"-":$this->id)."], Nome: " . $this->name . " , Criado em: ". $this->created . " , Modificado em: ". $this->modified . " . " ;
	}
	
}

?>