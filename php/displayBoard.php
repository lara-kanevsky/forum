<?php
    function displayBoard($board){
        require __DIR__ . '/getPosts.php';
        $db = mysqli_connect("localhost", "lara", "dongato", "sigmapower");
        $query = "SELECT id, title, fecha, content, creator, parent FROM $board";
        $result = mysqli_query($db, $query);
        getPosts($board);
    };
?>