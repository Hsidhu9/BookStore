<?php
require_once 'dbconnection.php';


class SecurityServic
{
   
    private $firstname = "";
    private $lastname = "";
    private $email = "";
    private $username = "";
    private $password = "";
    private $role = "";
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
       
       
       $sql = "SELECT * FROM users WHERE username = '$this->username' and password = '$this->password'";
       
       $result = mysqli_query($conn, $sql);
       if($result->num_rows > 0)
       {
            while($row = $result->fetch_assoc())
           {
              $id = $row["id"];
              $username = $row["username"];
              $role = $row["role"];
           } 
          session_start();
           $_SESSION["userid"] = $id;
           $_SESSION["username"] = $username;
           $_SESSION["role"] = $role;
           return true;
       }
       else {
          echo "No Result";
          return false;
       }
       $this->CloseConn($conn);
    }
    
    public function register($firstname, $lastname, $email, $username, $password, $address1, $address2,$city, $state, $zip, $country)
    
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
        $user_id = 0;
        $sql = "INSERT INTO users (firstname, lastname, email, username, password)
VALUES ('$firstname', '$lastname', '$email', '$username', '$password');";
        
        if (mysqli_query($conn, $sql)) {
            $user_id = $conn->insert_id;
            echo $user_id;
            $addressquery = 
            "insert into address(Address1, Address2, City, State, zip, Country, user_id) values('$address1', '$address2', '$city', '$state', '$zip', '$country', '$user_id')";
            if($conn->query($addressquery))
            {
                echo $addressquery;
                $this->CloseConn($conn);
                return true;
            }
                
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
        
        
    }
    function CloseConn($conn)
    {
        $conn-> close();
        echo "close";
    }
    
    
   
}
?>

