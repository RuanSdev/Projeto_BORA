<?php 
require_once './templates/header.php';
require_once './lib/connection.php';
require_once './posts/Post.php';
$post = new Post();
$row = $post->getAllCategories();
if(isset($_GET["id"]))
{
    $categoryid = intval($_GET["id"]);
    $row = $post->getByOneCategories($categoryid);
    
    if(empty($row))
    {
        echo "Post not found!";
    }
    else
    {
        foreach( $row as $value)
        {
            echo "<div class=categories>";
            echo "<h1>$value[title]</h1>";
            echo " <img src=./img/$value[img] class= imgcategories>";
            echo "<p>$value[description]</p>";
            echo "</div>";
        }
    }
}

else{
    foreach($row as $value)
    {
        echo "<a href=?id=$value[id_categories]>$value[name_categories]</a><br>";
    }
}


require_once './templates/footer.php';

