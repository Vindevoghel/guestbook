<?php
session_start();
require 'Post.php';
require 'GuestBook.php';

function whatIsHappening()
{
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['title'])) {
        $_SESSION['title'] = 'Title is required';
    } else {
        $title = test_input($_POST['title']);
        $_SESSION['title'] = $title;
    }

    if (empty($_POST['message'])) {
        $_SESSION['message'] = 'Message is required';
    } else {
        $message = test_input($_POST['message']);
        $_SESSION['message'] = $message;
    }

    if (empty($_POST['name'])) {
        $_SESSION['name'] = 'Name is required';
    } else {
        $name = test_input($_POST['name']);
        $_SESSION['name'] = $name;
    }

    $date = date('Y-m-d H:i:s');
    $_POST['date'] = $date;

    if (isset($title) && isset($message) && isset($name) && isset($date)){
        $guestBookMessage = new Post($title, $message, $name, $date);
        var_dump($guestBookMessage);
    }

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guestbook</title>
</head>
<body>

<form method="post">
    Author name:<br>
    <input type="text" name="name" value=<?php echo $_SESSION['name'] ?>><br>
    Title:<br>
    <input type="text" name="title" value=<?php echo $_SESSION['title'] ?>><br>
    <textarea name="message" rows="10" cols="30"><?php echo $_SESSION['message'] ?></textarea>
    <input type="submit" value="Submit">
</form>
<?php whatIsHappening(); ?>
</body>


