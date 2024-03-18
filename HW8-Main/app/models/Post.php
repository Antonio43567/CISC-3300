<?php

namespace app\models;

class Post
{
    public function getAllPosts() {
        return [
            [
                'id' => '1',
                'title' => 'a title',
                'views' => '100'
            ],
            [
                'id' => '2',
                'title' => 'a second title',
                'views' => '250'
            ]
        ];
    }
}