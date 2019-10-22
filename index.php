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
$controller->render();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (empty($_POST['title'])) {
        $_SESSION['title'] = 'Title is required';
    } else {
        $title = $_POST['title'];
        $_SESSION['title'] = $title;
    }

    if (empty($_POST['message'])) {
        $_SESSION['message'] = 'Message is required';
    } else {
        $message = $_POST['message'];
        $_SESSION['message'] = $message;
    }

    if (empty($_POST['name'])) {
        $_SESSION['name'] = 'Name is required';
    } else {
        $name = $_POST['name'];
        $_SESSION['name'] = $name;
    }

    $date = date('Y-m-d H:i:s');
    $_POST['date'] = $date;

    if (isset($title) && isset($message) && isset($name) && isset($date)){
        $guestBookMessage = new Message($title, $message, $name, $date);
        var_dump($guestBookMessage);
        $guestBookMessage->addToJson();
    }

}

?>

