<?php
require_once 'C:\MAMP\htdocs\Milestone1\Services\BookService.php';
require_once 'C:\MAMP\htdocs\Milestone1\Models\Book.php';

class Cart{
    private $userid;
    private $items = array();
    private $subtotals = array();
    private $total_price;
    
    
    function __construct($userId){
        $this->userid = $userId;
        $this->items = array();
        $this->subtotals = array();
        $this->total_price = 0;
        
    }
    
    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

   
    public function getItems()
    {
        return $this->items;
    }

    
    public function getSubtotals()
    {
        return $this->subtotals;
    }

    /**
     * @return number
     */
    public function getTotal_price()
    {
        return $this->total_price;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @param Ambigous <multitype:, number> $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @param Ambigous <multitype:, number> $subtotals
     */
    public function setSubtotals($subtotals)
    {
        $this->subtotals = $subtotals;
    }

    /**
     * @param number $total_price
     */
    public function setTotal_price($total_price)
    {
        $this->total_price = $total_price;
    }

    function addItem($prod_id){
        if(array_key_exists($prod_id, $this->items)){
            
            $this->items[$prod_id] += 1;
        }
        else{
            $this->items = $this->items + array($prod_id => 1);
        }
    }
    
    function updateItem($prod_id, $new_qty)
    {
        if(array_key_exists($prod_id, $this->items)){
            $this->items[$prod_id] = $new_qty;
        }
        else{
            $this->items = $this->items + array($prod_id => $new_qty);
        }
        
        if($this->items[$prod_id] == 0)
        {
            unset($this->items[$prod_id]);
        }
    }
    
    function calculate_total()
    {
        
        $book_service = new BookService();
//         $subtotals_array = array();
        
        $total = 0;
        foreach($this->items as $book_id => $qty)
        {
            $book = $book_service->getBookById($book_id);
            
            $total = $total + ($book->getCost() * $qty);
            
            
//             $product_subtotal = (float)$book->getcost() * $qty;
             
//             //$subtotals_array = $subtotals_array + array($book=>$product_subtotal);
//             $this->total_price = $this->total_price + $product_subtotal;
            
        }
        $this->total_price = $total;
       return $this->total_price;
        
        //$this->subtotals = $subtotals_array;
    }
}