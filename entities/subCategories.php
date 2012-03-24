<?php
/*------------------------------------------------------------------------------------------------------------------------
 * DADOS DO SISTEMA
* ------------------------------------------------------------------------------------------------------------------------
* Nome:		Finance-37571
* Сrea:		Finanчas
* ------------------------------------------------------------------------------------------------------------------------
* DADOS DA APLICAЧУO
* ------------------------------------------------------------------------------------------------------------------------
* Nome:        SQL
* Descriчуo:   Responsсvel pelo retorno e gravaчуo de dados no Banco de Dados, tabela Account
* ------------------------------------------------------------------------------------------------------------------------
* DADOS DO ARQUIVO
* ------------------------------------------------------------------------------------------------------------------------
* Nome:        SubCategories.php
* Descriчуo:   Entidade de mapeamento para SubCategories
* Autor:       37571 Gustavo Souza Gonчalves & 38441 Marco Aurщlio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSУO
* ------------------------------------------------------------------------------------------------------------------------*/

/** @Entity **/
class SubCategories {

	// TODO Gustavo: Este mapeamento me deixou bem confuso, como serс feito?
	/** @Id @GeneratedValue @Column(type="integer") 
	 * @OneToMany(targetEntity="Expenditure), @OneToMany(targetEntity="BudgetRecords)
	 * Enter description here ...
	 * @var IntegerType:: **/
	protected $id;

	/** @ManyToOne(targetEntity="Categories", inversedBy="id")**/
	protected $categoryId;

	/** @Column(type="string") **/
	protected $name;

	/** @Column(type="datetime") **/
	protected $created;

	/** @Column(type="datetime") **/
	protected $modified;

	// TODO Gustavo: fazer constructor.
	public function __construct(Categories $categoryId){
			$this->categoryId = $categoryId;
	}

	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id= $id;
	}

	public function getCategoryId(){
		return $this->categoryId;
	}
	public function setCategoryId($categoryId){
		$this->categoryId= $categoryId;
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

	public function toString(){
		return "[".($this->id==null?"-":$this->id)."] " . $this->name . " , ". $this->created . " , ". $this->modified . " . " ;
	}
}
?>