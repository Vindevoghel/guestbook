<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = date('Y-m-d H:i:s');
    $_POST['date'] = $date;
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
<h1>Guestbook</h1>
<h2>Please sign our guestbook!</h2>

<form method="post">
    Author name:<br>
    <input type="text" name="name" value=<?php //echo $_SESSION['name'] ?>><br>
    Title:<br>
    <input type="text" name="title" value=<?php //echo $_SESSION['title'] ?>><br>
    <textarea name="message" rows="10" cols="30"><?php //echo $_SESSION['message'] ?></textarea>
    <input type="submit" value="Submit">
</form>

<div>
    <?php

    if (count($allMessages) <20){
        $loopLength = count($allMessages);
    } else {
        $loopLength = 20;
    }

    for($i=0; $i<$loopLength; $i++):
    //foreach ($allMessages as $message):

    ?>
    <div>
        <h3><?php echo $allMessages[$i]->getTitle() ?></h3>
        <h4><?php echo $allMessages[$i]->getName() ?></h4>
        <p><?php echo $allMessages[$i]->getMessage() ?></p>
        <p><?php echo $allMessages[$i]->getDate() ?></p>

    </div>

    <?php endfor; ?>

</div>
<?php
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

whatIsHappening(); ?>
</body>
