<?php

class Book{
    private $Id;
    private $Title;
    private $Cost;
    private $ISBN;
    private $OrderId;
    private $AuthorId;
    private $PublisherId;
    private $PublisherFirstName;
    private $PublisherLastName;
    private $AuthorFirstName;
    private $AuthorLastName;
    
    /**
     * @return mixed
     */
    public function getPublisherFirstName()
    {
        return $this->PublisherFirstName;
    }

    /**
     * @return mixed
     */
    public function getPublisherLastName()
    {
        return $this->PublisherLastName;
    }

    /**
     * @return mixed
     */
    public function getAuthorFirstName()
    {
        return $this->AuthorFirstName;
    }

    /**
     * @return mixed
     */
    public function getAuthorLastName()
    {
        return $this->AuthorLastName;
    }

    /**
     * @param mixed $PublisherFirstName
     */
    public function setPublisherFirstName($PublisherFirstName)
    {
        $this->PublisherFirstName = $PublisherFirstName;
    }

    /**
     * @param mixed $PublisherLastName
     */
    public function setPublisherLastName($PublisherLastName)
    {
        $this->PublisherLastName = $PublisherLastName;
    }

    /**
     * @param mixed $AuthorFirstName
     */
    public function setAuthorFirstName($AuthorFirstName)
    {
        $this->AuthorFirstName = $AuthorFirstName;
    }

    /**
     * @param mixed $AuthorLastName
     */
    public function setAuthorLastName($AuthorLastName)
    {
        $this->AuthorLastName = $AuthorLastName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->Cost;
    }

    /**
     * @return mixed
     */
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->OrderId;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->AuthorId;
    }

    /**
     * @return mixed
     */
    public function getPublisherId()
    {
        return $this->PublisherId;
    }

    /**
     * @param mixed $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @param mixed $Title
     */
    public function setTitle($Title)
    {
        $this->Title = $Title;
    }

    /**
     * @param mixed $Cost
     */
    public function setCost($Cost)
    {
        $this->Cost = $Cost;
    }

    /**
     * @param mixed $ISBN
     */
    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;
    }

    /**
     * @param mixed $OrderId
     */
    public function setOrderId($OrderId)
    {
        $this->OrderId = $OrderId;
    }

    /**
     * @param mixed $AuthorId
     */
    public function setAuthorId($AuthorId)
    {
        $this->AuthorId = $AuthorId;
    }

    /**
     * @param mixed $PublisherId
     */
    public function setPublisherId($PublisherId)
    {
        $this->PublisherId = $PublisherId;
    }

    
    
    
    
}