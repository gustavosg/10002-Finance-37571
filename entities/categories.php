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
* Nome:        Categories.php
* Descrição:   Entidade de mapeamento para Categories
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/

/** @Entity **/
class Categories {

	// Fields

	/** @Id @GeneratedValue @Column(type="integer") **/
	protected $id;

	/** @Column(type="string") **/
	protected $name;

	/** @Column **/
	protected $created;

	/** @Column **/
	protected $modified;

	/** @OneToMany(targetEntity="Sub_Categories", mappedBy="category") */
	protected  $subCategory;
	
	// Construtor:
	public function  __construct($id = null, $name = null){
		$this->id = $id;
		$this->name=$name;		
	}
	
	// Modificadores de acesso:

	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id= $id;
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
	
	public function getSubCategory(){
		return $this->subCategory;
	}

	public function __toString(){
		return "Informações da Categoria: <br /> ID: [".($this->id==null?"-":$this->id)."], Nome: " . $this->name . " , Criado em: ". $this->created . " , Modificado em: ". $this->modified . " . " ;
	}
}
?>