<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'dbconnection.php';
require_once 'Models/Book.php';

class HomeHandler{
    
   public $Products = array();
   
    
    function getProductsFromDB()
    {
         
        
        $dbConnection = new dbconnection();
        $conn = $dbConnection->createConn();
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $query = "select  * from books join authors, publishers ";
        $result = mysqli_query($conn, $query);
        
        if($result->num_rows > 0)
        {
            $i = 0;
           while($row = $result->fetch_assoc())
             {
                  
                  $book = new Book();
                  $book->setCost($row["cost"]);
                  $book->setTitle($row["title"]);
                  $book->setISBN($row["isbn"]);
                  
                 
                  
                  $Products[$i] = $book;
                  
                  $i++;
                  
            /* echo "id: " . $row["idUsers"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";*/
             } 
             
             
        }
        else {
            echo"No Product Found";
        }
        return $Products;
    }

    public $books = array();
    
    
    function takeOrder(Book $book)
    {
        $a = count($this->books);
        echo $a;
        if($a > 0)
        {
            echo  $book->getTitle();
            $this->books[$a] = $book;
        }
        else {
            echo $book->getTitle();
            $this->books[0] = $book;
        }
        
        
    }
}
?>

