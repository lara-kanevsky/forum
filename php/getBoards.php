<?php
    function getBoards(){
        $db = mysqli_connect("localhost", "lara", "dongato", "sigmapower");
        $query = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE (TABLE_NAME <> 'users' AND TABLE_SCHEMA = 'sigmapower' AND TABLE_NAME <> 'board_info')";
        $result = mysqli_query($db, $query);
        while($table = mysqli_fetch_array($result)){
            echo('<li><a href="'.strtok($_SERVER['REQUEST_URI'], '?').'?board='.$table[0]. '">'.$table[0]. '</a></li>');
        }
    };
?>