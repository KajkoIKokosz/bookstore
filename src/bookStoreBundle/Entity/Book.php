<?php

namespace bookStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity(repositoryClass="bookStoreBundle\Repository\BookRepository")
 */
class Book implements \JsonSerializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Author", type="string", length=255)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var int
     * @Assert\GreaterThan(50, message="niepoprawna ilosc stron");
     * @ORM\Column(name="page", type="integer")
     */
    private $page;

    /**
     * @var int
     * @Assert\GreaterThan(1950)
     * @ORM\Column(name="publishYear", type="integer")
     */
    private $publishYear;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct() {
        $this->id = -1;
        return $this;
    }
    
    /**
     * Set author
     *
     * @param string $author
     * @return Book
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set page
     *
     * @param integer $page
     * @return Book
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return integer 
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set publishYear
     *
     * @param integer $publishYear
     * @return Book
     */
    public function setPublishYear($publishYear)
    {
        $this->publishYear = $publishYear;

        return $this;
    }

    /**
     * Get publishYear
     *
     * @return integer 
     */
    public function getPublishYear()
    {
        return $this->publishYear;
    }

    public function jsonSerialize() {
        return array(
            'title'=>  $this->title,
            'author'=> $this->author,
            'pages'=> $this->page,
            'publishYear'=> $this->publishYear
        );
    }

}
