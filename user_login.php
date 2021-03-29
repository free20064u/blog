<?php
require_once 'partials/connection.php';
include_once 'partials/header.php';


function lginhtml(){
	echo '<div id="main-wrapper">
            <div class="container">
                <div class="row gtr-200">
                    <div class="col-12 col-12-medium">
                        <h1>Login</h1>
                        <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
                            <input type="text" name="username" id="" placeholder="username">
                            <br>
                            <input type="password" name="password" placeholder="password">
                            <br>
                            <button type="submit" name="submit">Login</button>
                        </form>
                        <br>
                        <p>Not a member.<a href="user_register.php">Register here...</a></p>
                    </div>
                </div>
            </div>
        </div> ';

}

if (isset($_POST['submit'])){
    $username = filter_var(htmlspecialchars(trim($_POST['username'])), FILTER_SANITIZE_STRING);
    $password = filter_var(htmlspecialchars(trim($_POST['password'])), FILTER_SANITIZE_STRING);

    # Encrypting password
    $stmt = $connect -> prepare('SELECT `password` FROM `users` WHERE `username` = (?)');
    $stmt -> execute(array($username));
    $rows = $stmt->fetchAll();

    foreach ($rows as $row){  
        if(password_verify($password, $row['password'])){
            $_SESSION['username'] = $username;
            header('Location:index.php');
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