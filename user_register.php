<?php
# Get the header for the page.
require_once 'partials/connection.php';

# Connect to the database.
include_once 'partials/header.php';

function reghtml(){
    echo '<div class="container">
        <h1>Register</h1>
        <form action="user_register.php" method="post">
            <input type="text" name="fullname" required id="" placeholder="Fullname">
            <br>
            <input type="text" name="username" required id="" placeholder="Username">
            <br>
            <input type="email" name="email" required id="" placeholder="Email">
            <br>
            <input type="password" name="password" required placeholder="password">
            <br>
            <input type="password" name="password_confirm" required placeholder="Password confirm">
            <br>
            <button type="submit" name="submit">Register</button>
        </form>
        <br>
            <p>Already a member. <a href="user_login.php">Login here...</a></p>
    </div> ';
}

$error = [];

if (isset($_POST['submit'])){
    $fullname = filter_var(htmlspecialchars(trim($_POST['fullname'])), FILTER_SANITIZE_STRING);
    $username = filter_var(htmlspecialchars(trim($_POST['username'])), FILTER_SANITIZE_STRING);
    $email = filter_var(htmlspecialchars(trim($_POST['email'])), FILTER_VALIDATE_EMAIL);
    $password = filter_var(htmlspecialchars(trim($_POST['password'])), FILTER_SANITIZE_STRING);
    $password_confirm = filter_var(htmlspecialchars(trim($_POST['password_confirm'])), FILTER_SANITIZE_STRING);

    # Encrypting password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    function check_exist($field){
        global $connect, $email, $username;
        
        $stmt = $connect -> prepare("SELECT ". $field ."  FROM users");
        $stmt->execute();
        $rows = $stmt->fetchAll();
        
        foreach ($rows as $row){
            if ($row[$field] === $email || $username){
                return true;
            }else{
                return false;
            }
        }
    }

    # Inserting data into the users table
    if (empty($fullname)){
        echo '<div class="container alert alert-danger">Enter your name.</div>';
        reghtml();
    }elseif (empty($username)){
        echo '<div class="container alert alert-danger">Enter a new username</div>';
        reghtml();
    }elseif(check_exist('username')){
        echo '<div class="container alert alert-danger">Username is not available.</div>';
        reghtml();
    }elseif (empty($email)){
        echo '<div class="container alert alert-danger">Enter a valid email</div>';
        reghtml();
    }elseif(check_exist('email')){
        echo '<div class="container alert alert-danger">Email is not available.</div>';
        reghtml();
    }elseif (!$password === $password_confirm){
        echo '<div class="container alert alert-danger" role="alert">
            Your passwords do not much
            </div>';
        reghtml();
    }elseif (!strlen($password) >= 8){
        echo '<div class="container alert alert-danger" role="alert">
            You password is too short. It must be more than seven characters
        </div>';
        reghtml();
    }else{
        $stmt = $connect -> prepare('INSERT INTO `users` (`name`, `email`, `username`, `password`) VALUES (?, ?, ?, ?)');
        $stmt -> execute(array($fullname, $email, $username, $hashed_password));
        echo '<div class="container alert alert-success"><h3>Registration successfull.</h3></div>';
    }               
}else{
    reghtml();
}
    include_once 'partials/footer.php';
