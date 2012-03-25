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
* Nome:        BudgetRecords.php
* Descrição:   Entidade de mapeamento para BudgetRecords
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        22/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
/** @Entity **/

class BudgetRecords{

	// Fields

	/** @Id @GeneratedValue @Column(type="integer") **/
	protected $id;

	/** @ManyToOne(targetEntity="Budgets") **/
	protected $budgetId;

	/** @ManyToOne(targetEntity="SubCategories") **/
	protected $subCategoryId;

	/** @Column(type="decimal") **/
	protected $ammount;

	/** @Column(type="datetime") **/
	protected $created;

	/** @Column(type="datetime") **/
	protected $modified;

	// Constructor

	// TODO Gustavo: Continuar construtor de BudgetRecords
	public function  __construct(Budgets $budgetId){
		$this->budgetId = $budgetId;
	}

	// Modificadores de acesso

	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}

	public function getBudgetId(){
		return $this->budgetId;
	}
	public function setBudgetId($budgetId){
		$this->budgetId = $budgetId;
	}

	public function getAmmount(){
		return $this->ammount;
	}
	public function setAmmount($ammount){
		$this->ammount = $ammount;
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
		return "[".($this->id==null?"-":$this->id)."] " . $this->budgetId . " , ". $this->ammount ." , ". $this->created . " , ". $this->modified . " . " ;
	}
}

?>