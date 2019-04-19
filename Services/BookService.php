<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'C:\MAMP\htdocs\Milestone1\dbconnection.php';
require_once 'C:\MAMP\htdocs\Milestone1\Models\Book.php';

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
        
        $query = "select books.id, books.title, books.cost, books.isbn, authors.author_firstname, books.authors_id, books.publishers_id,
authors.author_lastname, publishers.publisher_firstname, publishers.publisher_lastname     from books join authors on books.authors_id = authors.id 
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
                $book->setAuthorId($row["authors_id"]);
                $book->setPublisherId($row["publishers_id"]);
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
        $title = $book->getTitle();
        $isbn = $book->getISBN();
        $cost = $book->getcost();
        $author_id = $book->getAuthorId();
        $publisher_id = $book->getPublisherId();
        $query = "INSERT INTO books (title, cost, isbn, authors_id, publishers_id)
                  VALUES ('$title', '$cost', '$isbn', '$author_id', '$publisher_id' );";
        echo $query;
        if (mysqli_query($conn, $query)) {
            
            return true;
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
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
        
        $query = "select books.id, books.title, books.cost, books.isbn, authors.author_firstname, books.authors_id, books.publishers_id,
authors.author_lastname, publishers.publisher_firstname, publishers.publisher_lastname     from books join authors on books.authors_id = authors.id 
																join publishers on books.publishers_id = publishers.id where books.id = '$id'";
        $result = mysqli_query($conn, $query);
        $book = new Book();
        if($result->num_rows== 1)
        {
            while($row = $result->fetch_assoc()) 
            {     
                $book->setId($row["id"]);
                $book->setCost($row["cost"]);
                $book->setTitle($row["title"]);
                $book->setISBN($row["isbn"]);
                $book->setAuthorId($row["authors_id"]);
                $book->setPublisherId($row["publishers_id"]);
               $book->setAuthorFirstName($row["author_firstname"]);
               $book->setAuthorLastName($row["author_lastname"]);
               $book->setPublisherFirstName($row["publisher_firstname"]);
               $book->setPublisherLastName($row["publisher_lastname"]);
            }
        }
        else {
            echo"No Product Found";
        }
        return $book;
    }
    function UpdateBook(int $id, array $UpdatedBookProperties)
    {
        //echo $id;
        $previousBook =$this->getBookById($id);
        
        $x = $previousBook->getAuthorId();
        $p = $previousBook->getPublisherId();
        $dbConnection = new dbconnection();
        $conn = $dbConnection->createConn();
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        
        
        //check if the author properties are changed
        if(array_key_exists("author_firstname", $UpdatedBookProperties)){
            $fn = $UpdatedBookProperties["author_firstname"];
            
            $query = "update authors set author_firstname = '$fn' where id = '$x' ";
            echo $query;
            if (mysqli_query($conn, $query)) {
                
                
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
                return false;
            }
        }
        if(array_key_exists("author_lastname", $UpdatedBookProperties)){
            $ln = $UpdatedBookProperties["author_lastname"];
            
            $query = "update authors set author_lastname = '$ln' where id = '$x' ";
            echo $query;
            if (mysqli_query($conn, $query)) {
                
                
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
                return false;
            }
        }
        if(array_key_exists("publisher_firstname", $UpdatedBookProperties)){
            $pfn = $UpdatedBookProperties["publisher_firstname"];
            
            $query = "update publishers set publisher_firstname = '$pfn' where id = '$p' ";
            echo $query;
            if (mysqli_query($conn, $query)) {
                
               
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
                return false;
            }
        }
        if(array_key_exists("publisher_lastname", $UpdatedBookProperties)){
            $pln = $UpdatedBookProperties["publisher_lastname"];
            
            $query = "update publishers set publisher_lastname = '$pln' where id = '$p' ";
            echo $query;
            if (mysqli_query($conn, $query)) {
                
                
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
                return false;
            }
        }
        
        if(array_key_exists("title", $UpdatedBookProperties)){
            $newtitle = $UpdatedBookProperties["title"];
            
            $query = "update books set title = '$newtitle' where id = '$id' ";
            echo $query;
            if (mysqli_query($conn, $query)) {
                
                
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
                return false;
            }
        }
        
        if(array_key_exists("cost", $UpdatedBookProperties)){
            $newcost = $UpdatedBookProperties["cost"];
            
            $query = "update books set cost = '$newcost' where id = '$id' ";
            echo $query;
            if (mysqli_query($conn, $query)) {
                
                
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
                return false;
            }
        }
        
        if(array_key_exists("isbn", $UpdatedBookProperties)){
            $newisbn = $UpdatedBookProperties["isbn"];
            
            $query = "update books set isbn = '$newisbn' where id = '$id' ";
            echo $query;
            if (mysqli_query($conn, $query)) {
                
                
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
                return false;
            }
        }
        return true;
        
    }

    function deleteBook(int $id){
        $dbConnection = new dbconnection();
        $conn = $dbConnection->createConn();
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $query = "delete from books where id = '$id'";
        if (mysqli_query($conn, $query)) {
            $conn->close();
            return true;
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
            $conn->close();
            return false;
        }
       
    }
    
    function findByTitle($n){
        $db = new dbconnection();
        $conn = $db->createConn();
        $like_n = "%".$n."%";
        $query = "select books.id, books.title, books.cost, books.isbn, author_firstname, author_lastname, publisher_firstname, publisher_lastname from books join authors on books.authors_id = authors.id join publishers on books.publishers_id = publishers.id 
where books.title like '$like_n';";
       
        $result = mysqli_query($conn, $query);
        
        $searched_books = array();
        
        if($result->num_rows > 0)
        {
            $i = 0;
            while($row = $result->fetch_assoc())
            {
                
                $kitab = new Book();
                $kitab->setId($row["id"]);
                $kitab->setCost($row["cost"]);
                $kitab->setTitle($row["title"]);
                $kitab->setISBN($row["isbn"]); 
                $kitab->setAuthorFirstName($row["author_firstname"]);
                $kitab->setAuthorLastName($row["author_lastname"]);
                $kitab->setPublisherFirstName($row["publisher_firstname"]);
                $kitab->setPublisherLastName($row["publisher_lastname"]);
                $searched_books[$i] = $kitab;
                $i++;
                
            }
        }
        else {
            echo"No Product Found";
        }
        return $searched_books;
        
    }
}