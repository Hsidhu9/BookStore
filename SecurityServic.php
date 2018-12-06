<?php
require_once 'dbconnection.php';


class SecurityServic
{
   
    private $firstname = "";
    private $lastname = "";
    private $email = "";
    private $username = "";
    private $password = "";
    
    public function __construct($username, $password)
    {
        
        $this->username = $username;
        $this->password = $password;
        
        
    }
    
    
    

    public function authenticate()
    {
        
        $dbConnection = new dbconnection();
        $conn = $dbConnection->createConn();
       if ($conn->connect_error) 
       {
           die("Connection failed: " . $conn->connect_error);
       } 
       else 
       {
           echo"could not connect try again";
       }
       
       $sql = "SELECT * FROM users WHERE username = '$this->username' and password = '$this->password'";
       
       $result = mysqli_query($conn, $sql);
       if($result->num_rows > 0)
       {
            while($row = $result->fetch_assoc())
           {
              $id = $row["id"];
              $username = $row["username"];
           } 
          session_start();
           $_SESSION["userid"] = $id;
           $_SESSION["username"] = $username;
           return true;
       }
       else {
          echo "No Result";
          return false;
       }
       $this->CloseConn($conn);
    }
    
    public function register($firstname, $lastname, $email, $username, $password)
    
    {
        
        $dbConnection = new dbconnection();
        $conn = $dbConnection->createConn();
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        else
        {
            echo"db connection successful";
        }
        
        $sql = "INSERT INTO users (firstname, lastname, email, username, password)
VALUES ('$firstname', '$lastname', '$email', '$username', '$password');";
        
        if (mysqli_query($conn, $sql)) {
            
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
        $this->CloseConn($conn);
        
    }
    function CloseConn($conn)
    {
        $conn-> close();
        echo "close";
    }
    
   
}
?>

