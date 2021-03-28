<?php
require_once 'partials/connection.php';
include_once 'partials/header.php';


if (isset($_POST['submit'])){
    $username = filter_var(htmlspecialchars(trim($_POST['username'])), FILTER_SANITIZE_STRING);
    $password = filter_var(htmlspecialchars(trim($_POST['password'])), FILTER_SANITIZE_STRING);

    # Encrypting password
    $stmt = $connect -> prepare('SELECT `password` FROM `users` WHERE `username` = (?)');
    $stmt -> execute(array($username));
    $rows = $stmt->fetchAll();

    foreach ($rows as $row){  
        if(password_verify($password, $row['password'])){
            echo 'Welcome';
        }else{
            echo '<div class="container alert alert-danger">Username or password may be incorrect</div>';
            lginhtml();
        }
    }

    
    echo '<br>';
    

              
}else{
    lginhtml();
}

include_once 'partials/footer.php';