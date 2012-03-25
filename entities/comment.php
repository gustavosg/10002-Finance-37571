<?php
/** @Entity */
class Comment {
    /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    /** @Column(type="text") **/
    protected $comment;
    /**
     * @ManyToOne(targetEntity="Post", inversedBy="comments")
     **/
    protected $post;

    public function __construct(Post $post, $text){
        $this->post = $post;
        $this->comment = $text;
    }
    
    public function getComment(){return $this->comment;}
    
    public function getPost(){return $this->post;}
}

?>