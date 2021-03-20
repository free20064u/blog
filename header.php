<?php

include "all_page_function.php";

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" >
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfs blogs</title>
</head>
<body>
<header>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="https://avatars.githubusercontent.com/u/76535763?s=460&u=9b768e1cd93fb131b032bd6de262f6e9f6c3b92c&v=48" width="30" height="30" class="d-inline-block align-top" alt="">My Blog
        </a>
        <ul class="nav nav-pills">

    <?php
        foreach ($tab_links as $tab_link){
            echo '<li class="nav-item"><a class="nav-link" href="#">' . $tab_link . '</a></li>';
        }
    ?>
        </ul>
        <form class="form-inline pull-xs-right">
            <input class="form-control" type="text" placeholder="Search">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>
</nav>

</header>
<main>