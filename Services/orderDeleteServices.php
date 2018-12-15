<?php
require_once '../orderHandler.php';


if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
$orderHandler = new orderHandler();
$ok= $orderHandler->deleteOrder($id);
if ($ok == TRUE)
{
    header("Location: ../Views/ShowOrder_Admin.php");
}
else {
    echo "Something went wrong";
}