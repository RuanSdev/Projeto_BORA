<?php 
if(!isset($_GET["id"])){
    header('location:index.php');
}
require_once './posts/Post.php';
require_once './lib/connection.php';
require_once './templates/header.php';

$post = new Post();
$row = $post->getByOne($_GET["id"]);
if(!empty($row))
{
    foreach($row as $value)
    {
        echo "<h1>$value[title]</h1>";
        echo " <img src=./img/$value[img] class= imgpost>";
        echo "<p>$value[description]</p>";
        echo "Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae magnam rerum omnis consectetur iste magni, quos, quo error placeat sapiente illum cum officiis illo consequuntur hic dolore consequatur libero. Aut.";
    }
}else 
{
    echo "Not found!";
    
}

include_once("./templates/footer.php");