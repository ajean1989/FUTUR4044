<?php 

declare(strict_types=1);

if(isset($_POST['title']))
{
    $AddPost = new AddPost;
    $AddPost->modifyPost();
}
else
{

    $postQuery = 'SELECT * FROM posts WHERE id = \'' . $postId . '\'';

    $Post = Db::fetch($postQuery, 'posts');

    
    //Test::var_dump($Post->category_id);

    $categoryQuery = 'SELECT name FROM category WHERE id = \'' . $Post->category_id . '\'';

    $Category = Db::fetch($categoryQuery, 'category');

    $_SESSION['postId'] = $Post->id;



}



