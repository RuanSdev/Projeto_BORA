<?php 
require_once './templates/header.php';
require_once './posts/Post.php';
require_once './lib/connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{ 
    $user = $_POST["email"];
    $pass = $_POST["pass"];
    $fullname = $_POST['fullname'];

    echo gettype($_REQUEST);die;
    $post = new Post();

    $result = $post->getByOneUser($user);
    if(empty($result))
    {
        $post->createUser($fullname,$user,$pass);
        echo "<script>alert('Usuário cadastrado com sucesso')</script>";
    }else 
    {
        echo "<script>alert('Usuário já cadastrado')</script>";
    }   
}
?>
 <style>
        

        .container2 {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .container2 h2 {
            margin: 0;
            padding: 10px 0;
        }

        .form-group {
            text-align: left;
            margin: 10px 0;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-group button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
<div class="container2">
        <h2>Cadastro de Acesso</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nome">Nome completo:</label>
                <input type="text" id="nome" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="pass" required>
            </div>
            <div class="form-group">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>

<?php 
require_once './templates/footer.php';