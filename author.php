<?php

include_once 'partials/header.php';


if (isset($_POST['register'])){

    echo '<div class="container">
            <h1>Register</h1>
            <form action="author.php" method="post">
                <input type="text" name="fullname" id="" placeholder="Fullname">
                <br>
                <input type="text" name="username" id="" placeholder="Username">
                <br>
                <input type="text" name="email" id="" placeholder="Email">
                <br>
                <input type="password" name="password" placeholder="password">
                <br>
                <input type="password" name="password_confirm" placeholder="Password confirm">
                <br>
                <button type="submit" name="submit">Register</button>
            </form>
            <br>
                <p>Already an author. <a href="author.php">Login...</a></p>
        </div> ';

}else{
    echo '<div class="container">
            <h1>Login</h1>
            <form action="author.php" method="post">
                <input type="text" name="username" id="" placeholder="username">
                <br>
                <input type="password" name="password" placeholder="password">
                <br>
                <button type="submit" name="submit">Login</button>
            </form>
            <br>
            <form action="author.php" method="post">
                <p>Not an author Register here</p>
                <input type="hidden" name="register">
            <button type="submit">Register</button>
        </form>
        </div> ';
}

    include_once 'partials/footer.php';