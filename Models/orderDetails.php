<?php

class orderDetails {
    private $id = "";
    private $quantity = "";
    private $currentPrice = "";
    private $currentDescription = "";
    private $orderId = "";
    private $booksID = "";
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function getCurrentPrice()
    {
        return $this->currentPrice;
    }

    /**
     * @return string
     */
    public function getCurrentDescription()
    {
        return $this->currentDescription;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @return string
     */
    public function getBooksID()
    {
        return $this->booksID;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param string $currentPrice
     */
    public function setCurrentPrice($currentPrice)
    {
        $this->currentPrice = $currentPrice;
    }

    /**
     * @param string $currentDescription
     */
    public function setCurrentDescription($currentDescription)
    {
        $this->currentDescription = $currentDescription;
    }

    /**
     * @param string $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @param string $booksID
     */
    public function setBooksID($booksID)
    {
        $this->booksID = $booksID;
    }

}