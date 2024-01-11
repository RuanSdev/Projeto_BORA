<?php
class Post{
    private DbConnect $dbConnect;


    public function __construct()
    {
        $this->dbConnect = new DbConnect;
    }

    public function getAll()
    {

        $sql = "SELECT * FROM posts";

        $result = $this->dbConnect->getConnection()->query($sql);

        $row =  $result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function getByOne( int $id)
    {
        
        $sql = "SELECT * FROM posts WHERE id = $id";
        $result = $this->dbConnect->getConnection()->query($sql);

        $row =  $result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    
    public function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        $result =$this->dbConnect->getConnection()->query($sql);
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function getByOneCategories(int $id)
    {
        $sql = "SELECT * FROM posts WHERE categories_id = '$id'";
        $result = $this->dbConnect->getConnection()->query($sql);
        $row = $result ->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    
    public function getByOneUser($user_email)
    {
        $sql = "SELECT user_email , user_pass FROM user_blog WHERE user_email = '$user_email'";
        $result = $this->dbConnect->getConnection()->query($sql);
        $row = $result ->fetchAll(PDO::FETCH_ASSOC);
        return $row;

    }

    public function createUser($fullname,$user_email,$user_pass)
    {
        $crip_pass = password_hash($user_pass,PASSWORD_DEFAULT);
        $sql = "INSERT INTO user_blog(fullname,user_email,user_pass) VALUES('$fullname','$user_email','$crip_pass')";
        $result = $this->dbConnect->getConnection()->query($sql);
        return $result;
    }

    public function deleteByOnePost($id)
    {
        $sql = "DELETE  FROM posts WHERE id = '$id'";
        $result = $this->dbConnect->getConnection()->query($sql);
    }

}