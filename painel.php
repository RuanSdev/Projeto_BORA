<?php
require_once './lib/connection.php';
require_once './posts/Post.php'; 
    
$post = new Post();
$rows = $post->getAll();
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $post->deleteByOnePost($id);   
}
?>


<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <div class="sair">
        <a href="login.php">Sair</a>
    </div>

<h2>Listar Posts</h2>
<table>
    <tr>
        <th>id</th>
        <th>title</th>
        <th>description</th>
        <th>tag</th>
        <td colspan="2">Opções</td>
    </tr>
    <?php
    foreach ( $rows as $key => $row) {
    ?>
        <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['title']?></td>
            <td><?php echo $row['description']?></td>
            <td><?php echo $row['tags']?></td>
            
            <td>
                <a href="#">Alterar</a>
            </td>
            <td>
                <a href="painel.php?id=<?php echo $row['id']?>">Excluir</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
</body>
</html>