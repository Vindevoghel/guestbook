<?php


declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);
session_start();
require 'Model/Message.php';
require 'Model/GuestBook.php';
require 'Controller/HomeController.php';


$controller = new HomeController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->formChecker();
}
$controller->render();


?>

