<?php
namespace Entity;

/**
 * @Entity
 * @Table(name="authors")
 **/
class Author {
    
    /** 
     * @Id
     * @Column(type="integer") 
     * @GeneratedValue 
     **/
    protected $id;
    
    /**
     * @Column(type="string")
     */
    protected $name;
    
    /**
     * @OneToMany(targetEntity="Comment", mappedBy="author")
     */
    protected $comments = null;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set name
     *
     * @param string $name
     * @return Author
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add comments
     *
     * @param \Entity\Comment $comments
     * @return Author
     */
    public function addComment(\Entity\Comment $comments)
    {
        $this->comments[] = $comments;
    
        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Entity\Comment $comments
     */
    public function removeComment(\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}