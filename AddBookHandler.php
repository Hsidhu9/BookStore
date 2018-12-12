<?php
require_once 'dbconnection.php';
require_once 'Services/BookService.php';

$title= $_POST['title'];
$cost = $_POST["cost"];
$isbn = $_POST["isbn"];
$author_firstname = $_POST["author_firstname"];
$author_lastname = $_POST["author_lastname"];
$publisher_firstname = $_POST["publisher_firstname"];
$publisher_lastname = $_POST["publisher_lastname"];



//add the author first

$dbConnection = new dbconnection();
$conn = $dbConnection->createConn();

$author_id = 0;

$sql = "INSERT INTO authors (author_firstname, author_lastname)
VALUES ('$author_firstname', '$author_lastname');";

echo $sql;
if ($conn->query($sql)) {
    $author_id = $conn->insert_id;
    echo $author_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    return false;
}

$query = "INSERT INTO publishers (publisher_firstname, publisher_lastname)
VALUES ('$publisher_firstname', '$publisher_lastname');";
echo $query;
$publisher_id = 0;
if (mysqli_query($conn, $query)) {
   $publisher_id = $conn->insert_id; 
    echo $publisher_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    return false;
}

$book = new Book();



$book->setAuthorId($author_id);
$book->setCost($cost);
$book->setISBN($isbn);
$book->setPublisherId($publisher_id);
$book->setTitle($title);

$bookService = new BookService();
$ok = $bookService->addBook($book);
if($ok)
{
    header("Location: Views/admin.php");
}
else{
    echo "something went wrong";
}
?>