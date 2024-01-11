<?php
require_once './templates/header.php';
require_once './lib/connection.php';
require_once './posts/Post.php';
$post = new Post();
$row = $post->getAll();
?>
<main>
    <div class="container">
        <?php foreach($row as $key =>$rows):?>
            <div>
                <a href="post.php?id=<?php echo $rows['id']?>"><?php echo $rows['title']?></a>
                <a href="post.php?id=<?php echo $rows['id']?>"><img src="./img/<?php echo $rows['img']?>" alt="" class="img"></a>
                <p><?php echo $rows['description']?></p>
                <a href="post.php?id=<?php echo $rows['id']?>"><?php echo $rows['tags']?></a>
            </div>
        <?php endforeach; ?>
    </div>
</main>
<?php
include_once("templates/footer.php")
?>