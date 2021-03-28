<?php
# Get the header for the page.
require_once 'partials/connection.php';

# Connect to the database.
include_once 'partials/header.php';

$error = [];

if (isset($_POST['submit'])){
    $fullname = filter_var(htmlspecialchars(trim($_POST['fullname'])), FILTER_SANITIZE_STRING);
    $username = filter_var(htmlspecialchars(trim($_POST['username'])), FILTER_SANITIZE_STRING);
    $email = filter_var(htmlspecialchars(trim($_POST['email'])), FILTER_VALIDATE_EMAIL);
    $password = filter_var(htmlspecialchars(trim($_POST['password'])), FILTER_SANITIZE_STRING);
    $password_confirm = filter_var(htmlspecialchars(trim($_POST['password_confirm'])), FILTER_SANITIZE_STRING);

    # Encrypting password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    # Inserting data into the users table
    if (!empty($fullname)){
        if (!empty($username)){
            if (!empty($email)){
                if ($password === $password_confirm){
                    if (strlen($password) >= 8){
                        $stmt = $connect -> prepare('INSERT INTO `users` (`name`, `email`, `username`, `password`) VALUES (?, ?, ?, ?)');
                        $stmt -> execute(array($fullname, $email, $username, $hashed_password));
                    }else{
                        echo 'You password is too short. It must be more than seven characters';
                    }
                }else{
                    echo 'Your passwords do not much';
                }
            }else{
                echo 'Enter a valid email';
            }

        }else{
            echo 'Enter username';
        }
    }else{
        echo 'Enter your name';
    }   
}else{
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
    include_once 'partials/footer.php';
