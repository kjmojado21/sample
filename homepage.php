<?php 
include 'user_action.php';
$loginID = $_SESSION['login_id'];
$currentUser = $Sns->getLoggedInUser($loginID);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Hello: <?php echo $currentUser['f_name'].' '.$currentUser['l_name'] ?>!
    <form action="user_action.php" method="post">
    POST SOMETHING!
    <br>
    
    <input type="text" name="user_post" id="">
    <br>
    <button type="submit" name="post">POST!</button>
    </form>



    <br>
    OTHER USER'S POST!

    <?php 
        $Sns->getAllPost();
    ?>
</body>
</html>