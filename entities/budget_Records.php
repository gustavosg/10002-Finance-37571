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

class Budget_Records{

	// Fields
	/** @Id @GeneratedValue @Column(type="integer") **/
	protected $id;

	/** @ManyToOne(targetEntity="Budgets", cascade="all") **/
	protected $budget;

	/** @ManyToOne(targetEntity="Sub_Categories", cascade="all")
	 * * @JoinColumn(name="sub_category_id", referencedColumnName="id") 
	**/
	protected $subCategory;

	/** @Column(type="decimal",precision=6, scale=2) **/
	protected $ammount;

	/** @Column **/
	protected $created;

	/** @Column **/
	protected $modified;

	// Constructor
	public function  __construct(Budgets $budget = null, Sub_Categories $subCategory = null){
		$this->budget = $budget;
		$this->subCategory = $subCategory;
	}

	// Modificadores de acesso
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}

	public function getBudget(){
		return $this->budget;
	}
	public function setBudget(Budgets $budget){
		$this->budget = $budget;
	}

	public function getSubCategory(){
		return $this->subCategory;
	}
	public function setSubCategory(Sub_Categories $subCategory){
		$this->subCategory= $subCategory;
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

	public function __toString(){
		return "Informações do Item: <br /> ID: [".($this->id==null?"-":$this->id)."], Quantia: ". $this->ammount. " , Criado em: ". $this->created . " , Modificado em: ". $this->modified . "
		<br />
		 Orçamento: " . $this->budget. ",
		 <br />
		 SubCategoria: " . $this->subCategory . "	. " ;
	}
}

?>