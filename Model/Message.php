<?php


class Message
{
    private $title;
    private $message;
    private $name;
    private $date;

    public function __construct($title, $message, $name, $date)
    {
        $this->title = $this->test_input($title);
        $this->message = $this->test_input($message);
        $this->name = $this->test_input($name);
        $this->date = $date;
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function addToJson()
    {
        $postArray = array(
            'title' => $this->title,
            'message' => $this->message,
            'name' => $this->name,
            'date' => $this->date
        );

        $jsonData = file_get_contents('Data/posts.json');
        $jsonArray = json_decode($jsonData, true);
        array_push($jsonArray, $postArray);
        $jsonData = json_encode($jsonArray, JSON_PRETTY_PRINT);


        if (file_put_contents('Data/posts.json', $jsonData)) {
            echo 'Data successfully saved';
        } else
            echo "error";
    }


    public function getTitle(): string
    {
        return $this->title;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDate(): string
    {
        return $this->date;
    }
}