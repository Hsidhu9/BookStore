<?php

class order {
    
    private  $orderId = "";
    private $OrderNumber = "";
    private $OrderDate = "";
    private $address_id = "";
    private $bookId = "";
    
    /**
     * @return string
     */
    public function getAddress_id()
    {
        return $this->address_id;
    }

    /**
     * @param string $address_id
     */
    public function setAddress_id($address_id)
    {
        $this->address_id = $address_id;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->OrderNumber;
    }

    /**
     * @return string
     */
    public function getOrderDate()
    {
        return $this->OrderDate;
    }

    

    /**
     * @return string
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @param string $OrderNumber
     */
    public function setOrderNumber($OrderNumber)
    {
        $this->OrderNumber = $OrderNumber;
    }

    /**
     * @param string $OrderDate
     */
    public function setOrderDate($OrderDate)
    {
        $this->OrderDate = $OrderDate;
    }

    /**
     * @param string $OrderQuantity
     */
    public function setOrderQuantity($OrderQuantity)
    {
        $this->OrderQuantity = $OrderQuantity;
    }

    /**
     * @param string $bookId
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
    }

    /**
     * @param string $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    
}