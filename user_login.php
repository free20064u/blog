<?php

include_once 'partials/header.php';


    echo '<div class="container">
            <h1>Login</h1>
            <form action="users.php" method="post">
                <input type="text" name="username" id="" placeholder="username">
                <br>
                <input type="password" name="password" placeholder="password">
                <br>
                <button type="submit" name="submit">Login</button>
            </form>
            <br>
            <p>Not a member.<a href="user_register.php">Register here...</a></p>
    
        </div> ';


    include_once 'partials/footer.php';