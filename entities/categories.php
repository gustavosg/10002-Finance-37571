<?php
/** @Entity **/
class Categories {

	/** @Id @GeneratedValue @Column(type="integer") **/
	protected $id;

	/** @Column(type="string") **/
	protected $name;

	/** @Column(type="datetime") **/
	protected $created;

	/** @Column(type="datetime") **/
	protected $modified;

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


	public function toString(){
		return "[".($this->id==null?"-":$this->id)."] " . $this->name . " , ". $this->created . " , ". $this->modified . " . " ;
	}
}
?>