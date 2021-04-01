<?php
require_once 'partials/connection.php';
include_once 'partials/header.php';

unset($_SESSION['username']);
unset($_SESSION['status']);

if (isset($_SESSION['username'])){
    echo 'session is set';
}else{
    header('Location: index.php');
}
