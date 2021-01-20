<?php 
include 'classes/User.php';
$Sns = new User;

if(isset($_POST['register'])){
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['uname'];
    $password = $_POST['pword'];

    $Sns->register($firstname,$lastname,$username,$password);

    

}elseif(isset($_POST['login'])){
    $uname = $_POST['username'];
    $pword = $_POST['password'];

    $Sns->login($uname,$pword);
}elseif(isset($_POST['post'])){
    $post = $_POST['user_post'];
    $id = $_SESSION['login_id'];

    $Sns->addPost($post,$id);
}



?>