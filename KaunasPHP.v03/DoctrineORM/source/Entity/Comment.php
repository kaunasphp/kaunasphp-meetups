<?php
namespace Entity;

/**
 * @Entity(repositoryClass="Repository\CommentRepository")
 * @Table(name="comments")
 **/
class Comment {
    
    /** 
     * @Id
     * @Column(type="integer") 
     * @GeneratedValue 
     **/
    protected $id;
    
    /**
     * @Column(type="text")
     */
    protected $text;

    /**
     * @ManyToOne(targetEntity="Author", inversedBy="comments")
     */
    protected $author;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Comment
     */
    public function setText($text)
    {
        $this->text = $text;
    
        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set author
     *
     * @param \Entity\User $author
     * @return Comment
     */
    public function setAuthor(\Entity\User $author = null)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }
}