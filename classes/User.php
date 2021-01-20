<?php 
include 'Database.php';

class User extends Database{
   
    public function register($fname,$lname,$username,$password){
        // $sql = "INSERT INTO users(f_name,l_name,username,password) VALUES('$fname','$lname','$username','$password')";
        // $result = $this->conn->query($sql);

        if($this->conn->query("INSERT INTO users(f_name,l_name,username,password) VALUES('$fname','$lname','$username','$password')") == TRUE){
            header('location:login.php');

            }else{
                die('error'.$this->conn->error);
            }


    }
    public function login($username,$password){
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result =$this->conn->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $_SESSION['login_id'] = $row['user_id'];

            header('location:homepage.php');

        }else{
            die('error'.$this->conn->error);
        }
    }
    
    
    public function getLoggedInUser($sessionID){
        $sql = "SELECT * FROM users WHERE user_id = '$sessionID'";
        $result = $this->conn->query($sql);

        if($result == FALSE){
            echo "no data generated";
        }else{
            return $result->fetch_assoc();
        }
    }

    public function addPost($content,$userID){
        $sql = "INSERT INTO posts(user_id,post_content)VALUES('$userID','$content')";
        $result = $this->conn->query($sql);

        if($result == TRUE){
            header('location:homepage.php');
        }else{
            echo "error in posting!";
        }
    }

    public function getAllPost(){
        $sql = "SELECT * FROM posts ORDER BY post_id DESC";
        $result = $this->conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo "<br>";
                echo "<br>";
                $name = $this->getLoggedInUser($row['user_id']);
                echo $name['f_name'];
                echo "<br>";
                echo "<br>";
                echo $row['post_content'];
                echo "<br>";
                echo "<br>";
            }
        }else{
            echo "no post added yet";
        }
    }

}




?>