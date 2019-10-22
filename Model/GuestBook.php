<?php


class GuestBook
{
    private $posts = [];

    public function getMessages(): array
    {
        $json = json_decode(file_get_contents("Data/posts.json"), true);
        if (!empty($json)) {
            foreach ($json AS $postsJson) {
                array_push($this->posts, new Message($postsJson['title'], $postsJson['message'],
                    $postsJson['name'], $postsJson['date']));
            }
        }
        return array_reverse($this->posts);
    }


}