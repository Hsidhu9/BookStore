<?php
require_once 'Services/BookService.php';

$bookService = new BookService();

echo print_r($bookService->findByTitle("database"), true);