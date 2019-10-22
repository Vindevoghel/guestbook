<?php
declare(strict_types=1);

class HomeController
{
    public function render()
    {
        $guestBook = new GuestBook();
        $allMessages = $guestBook->getMessages();
        require 'View/home.php';
    }

    public function formChecker()
    {
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

        if (isset($title) && isset($message) && isset($name) && isset($date)) {
            $guestBookMessage = new Message($title, $message, $name, $date);
            var_dump($guestBookMessage);
            $guestBookMessage->addToJson();
        }
    }
}