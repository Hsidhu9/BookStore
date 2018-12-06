<?php

class order {
    
    private  $Id = "";
    private $OrderNumber = "";
    private $OrderDate = "";
    private $OrderQuantity = "";
    
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
    public function getOrderQuantity()
    {
        return $this->OrderQuantity;
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

}