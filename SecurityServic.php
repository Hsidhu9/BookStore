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
        
        // Set autocommit to off
        mysqli_autocommit($conn,FALSE);
        
        $sql = "INSERT INTO users (firstname, lastname, email, username, password)
VALUES ('$firstname', '$lastname', '$email', '$username', '$password')";
        
        if ($conn->query($sql) === true) {
            echo $conn->insert_id;
            $user_id = $conn->insert_id;
            
            $addressquery = 
            "insert into address(address1, address2, city, state, zipcode, country, users_id)
values('$address1', '$address2', '$city', '$state', '$zip', '$country', '$user_id')";
            if($conn->query($addressquery) === false)
            {
                echo "address is not inserted";
                mysqli_rollback($conn);
               
                $this->CloseConn($conn);
                return false;
            }
            
        }
        else{
            mysqli_rollback($conn);
            echo "user is not inserted";
            $this->CloseConn($conn);
            return false;
        }
        
        mysqli_commit($conn);
        $conn->close();
        return true;
        
        
    }
    function CloseConn($conn)
    {
        $conn-> close();
        echo "close";
    }
    
    
   
}
?>

