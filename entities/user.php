<?php
/** @Entity **/
class User {

	/** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    /** @Column(type="string") **/
    protected $name;

    public function getName(){return $this->name;}
    public function setName($name){$this->name = $name;}
    
    public function toString(){
    	return "[".($this->id==null?"-":$this->id)."] " . $this->name;
    }
}
?>