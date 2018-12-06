<?php
class dbconnection
{
    private $servername  = "";
    private $username = "";
    private $password = "";
    private $db = "";
    
    
    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "123456789";
        $this->db = "mydb";
        
    }
    
    
    public function createConn()
    {
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->db);
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        } 
        return $conn;
    }
}
?>