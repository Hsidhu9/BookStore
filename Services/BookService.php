<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'C:\MAMP\htdocs\Milestone1\dbconnection.php';
require_once 'C:\MAMP\htdocs\Milestone1\Models/Book.php';

class BookService{
    
    function __construct(){
        
    }
    
    function getAllBooks()
    {
        $books = array();
        $dbConnection = new dbconnection();
        $conn = $dbConnection->createConn();
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $query = "select books.id, books.title, books.cost, books.isbn, authors.author_firstname, authors.author_lastname, publishers.publisher_firstname, publishers.publisher_lastname     from books join authors on books.authors_id = authors.id 
																join publishers on books.publishers_id = publishers.id;";
        $result = mysqli_query($conn, $query);
        
        if($result->num_rows > 0)
        {
            $i = 0;
            while($row = $result->fetch_assoc())
            {
                
                $book = new Book();
                $book->setId($row["id"]);
                
                $book->setCost($row["cost"]);
                $book->setTitle($row["title"]);
                $book->setISBN($row["isbn"]); 
                $book->setAuthorFirstName($row["author_firstname"]);
                $book->setAuthorLastName($row["author_lastname"]);
                $book->setPublisherFirstName($row["publisher_firstname"]);
                $book->setPublisherLastName($row["publisher_lastname"]);
                $books[$i] = $book;              
                $i++;
                
            }   
        }
        else {
            echo"No Product Found";
        }
        return $books;
    }
    
    function addBook(Book $book)
    {
        $dbConnection = new dbconnection();
        $conn = $dbConnection->createConn();
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $query = "INSERT INTO books (title, cost, isbn)
                  VALUES ('$book->getTitle()', '$book->getCost()', '$book->getISBN()');";
        
        if (mysqli_query($conn, $sql)) {
            
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
        $conn->close();
    }
    
    
    function getBookById(int $id)
    {
        $dbConnection = new dbconnection();
        $conn = $dbConnection->createConn();
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $query = "Select * from books where id = '$id'";
        $result = mysqli_query($conn, $query);
        $book = new Book();
        if($result->num_rows == 1)
        {
            while($row = $result->fetch_assoc()) 
            {             
                $book->setCost($row["cost"]);
                $book->setTitle($row["title"]);
                $book->setISBN($row["isbn"]);
               
            }
        }
        else {
            echo"No Product Found";
        }
        return $book;
    }
}