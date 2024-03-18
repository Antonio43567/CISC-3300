<?php

namespace app\controllers;
use app\core\Controller;
use app\models\Post;


class PostController extends Controller
{
    public function submitPosts()
    {
        include './assets/views/posts/postsView.php';
    }

    public function validatePost()
    {
        $username = $_POST['username'] ? $_POST['username'] : false;
        $title = $_POST['title'] ? $_POST['title'] : false;
        $description = $_POST['description'] ? $_POST['description'] : false;
        $errors = [];

        //validate username 
        if ($username) {
            $username = htmlspecialchars($username, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);

            //validate text length
            if (strlen($username) < 2) {
                $errors['usernameShort'] = 'username is too short';
            }
        } else {
            $errors['requiredName'] = 'username is required';
        }

        // validate title 
        if ($title) {
            $title = htmlspecialchars($title, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);

            //validate text length
            if (strlen($title) < 2) {
                $errors['titleShort'] = 'title is too short';
            }
        } else {
            $errors['requiredTitle'] = 'title is required';
        }

        // validate description
        if ($description) {
            $description = htmlspecialchars($description, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);

            //validate text length
            if (strlen($description) < 2) {
                $errors['descriptionShort'] = 'description is too short';
            }
        } else {
            $errors['requiredDescription'] = 'description is required';
        }

        //if we have errors
        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        $returnData = [
            'name' => $username,
            'title' => $title,
            'description' => $description,
        ];
        echo json_encode($returnData);
        exit();
    }
}
