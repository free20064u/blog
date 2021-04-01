<?php 
function search_user($username){
    global $connect;
    $stmt = $connect -> prepare('SELECT `password`, `status` FROM `users` WHERE `username` = (?)');
    $stmt -> execute(array($username));
    $rows = $stmt->fetchAll();
}
