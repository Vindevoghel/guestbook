<?php
declare(strict_types=1);
class HomeController
{
    public function render (){
        $guestBook = new GuestBook();
        $allMessages = $guestBook->getMessages();
        require 'View/home.php';
    }
}