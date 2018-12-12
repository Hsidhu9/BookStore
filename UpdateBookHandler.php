<?php
require_once 'Services/BookService.php';
session_start();

$id = $_POST['id'];
$title= $_POST['title'];
$cost = $_POST["cost"];
$isbn = $_POST["isbn"];
$author_firstname = $_POST["author_firstname"];
$author_lastname = $_POST["author_lastname"];
$publisher_firstname = $_POST["publisher_firstname"];
$publisher_lastname = $_POST["publisher_lastname"];

$UpdatedBookProperties = array();
$UpdateAuthorProperties = array();
$UpdatePublisherProperties = array();

$bookService = new BookService();
$previousBook = $bookService->getBookById($id);


if ($previousBook->getTitle() != $title)
{
    if(array_key_exists("title", $UpdatedBookProperties)){
        $UpdatedBookProperties["title"] = $title;
    }
    else{
        $UpdatedBookProperties = $UpdatedBookProperties + array("title" => $title);
    }
}

if ($previousBook->getCost() != $cost)
{
    if(array_key_exists("cost", $UpdatedBookProperties)){
        $UpdatedBookProperties["cost"] = $cost;
    }
    else{
        $UpdatedBookProperties = $UpdatedBookProperties + array("cost" => $cost);
    }
}

if ($previousBook->getISBN() != $isbn)
{
    if(array_key_exists("isbn", $UpdatedBookProperties)){
        $UpdatedBookProperties["isbn"] = $isbn;
    }
    else{
        $UpdatedBookProperties = $UpdatedBookProperties + array("isbn" => $isbn);
    }
}

if ($previousBook->getAuthorFirstName() != $author_firstname)
{
    if(array_key_exists("author_firstname", $UpdatedBookProperties)){
        $UpdatedBookProperties["author_firstname"] = $author_firstname;
    }
    else{
        $UpdatedBookProperties = $UpdatedBookProperties + array("author_firstname" => $author_firstname);
    }
}

if ($previousBook->getAuthorLastName() != $author_lastname)
{
    if(array_key_exists("author_lastname", $UpdatedBookProperties)){
        $UpdatedBookProperties["author_lastname"] = $author_lastname;
    }
    else{
        $UpdatedBookProperties = $UpdatedBookProperties + array("author_lastname" => $author_lastname);
    }
}

if ($previousBook->getPublisherFirstName() != $publisher_firstname)
{
    if(array_key_exists("publisher_firstname", $UpdatedBookProperties)){
        $UpdatedBookProperties["publisher_firstname"] = $publisher_firstname;
    }
    else{
        $UpdatedBookProperties = $UpdatedBookProperties + array("publisher_firstname" => $publisher_firstname);
    }
}

if ($previousBook->getPublisherLastName() != $publisher_lastname)
{
    if(array_key_exists("publisher_lastname", $UpdatedBookProperties)){
        $UpdatedBookProperties["publisher_lastname"] = $publisher_lastname;
    }
    else{
        $UpdatedBookProperties = $UpdatedBookProperties + array("publisher_lastname" => $publisher_lastname);
    }
}


$ok = $bookService->UpdateBook($id, $UpdatedBookProperties);


if($ok == true)
{
    header("Location: Views/admin.php");
}
else{
    echo "book not updated";
}

?>
