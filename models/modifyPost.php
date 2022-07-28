<?php 

declare(strict_types=1);

if(isset($_POST['title']))
{
    $AddPost = new CRUDPost;
    $AddPost->modifyPost();
}
else
{

    $postQuery = 'SELECT * FROM posts WHERE id = \'' . $postId . '\'';

    $Post = Db::fetch($postQuery, 'posts');

    
    

    $categoryQuery = 'SELECT name FROM category WHERE id = \'' . $Post->category_id . '\'';

    $Category = Db::fetch($categoryQuery, 'category');

    $_SESSION['postId'] = $Post->id;



}



