<?php
ob_start();
require_once './templates/header.php';
require_once './lib/connection.php';
require_once './posts/Post.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $user = $_POST["email"];
    $pass = $_POST["pass"];
    $post = new Post();
    $result = $post->getByOneUser($user);
    if(!empty($result))
    {
        if($result[0]['user_email'] == $user and password_verify($pass,$result[0]['user_pass'])){
            header('Location:painel.php');
            
        }else
        {
            echo "<script>alert('Usuário ou senha invalida!')</script>";
        }

    }else   
    {
        echo "<script>alert('Usuário não cadastrado')</script>";
    }   
}
ob_end_flush();
?>
<style>
    .container3 {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 300px;
        text-align: center;
    }

    .container3 h2 {
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

    .signup-option {
        margin-top: 15px;
        text-align: center;
    }

    .signup-option p {
        margin: 0;
    }

    .signup-option a {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
    }
</style>



<div class="container3">
    <h2>Tela de Login</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="pass" required>
        </div>
        <div class="form-group">
            <button type="submit">Entrar</button>
        </div>
    </form>
    <div class="signup-option">
        <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
    </div>
</div>

<?php
require_once './templates/footer.php';
