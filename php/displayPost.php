<?php
    function displayPost($board, $post_id){
        $db = mysqli_connect("localhost", "lara", "dongato", "sigmapower");
        $query = "SELECT id, title, fecha, content, creator, parent, img_name FROM $board WHERE id=$post_id";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);
        $thread_id= $row['id'];
        echo '
        <div class="thin-brd thread">
        <img class="thread-image" src="'.$row['img_name'].'">
        <h3 class="thread-title">'.$row['title'].'</h3>
        <span class="date-prv">'.$row['fecha'] .'</span>
        <p class="thread-content-prv">'.$row['content'].'</p>
        </div>
        ';
        $query = "SELECT * FROM $board WHERE parent=$post_id";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);
        
        while($row = mysqli_fetch_array($result)){
            echo '
            <div class="thin-brd thread">
            <img class="thread-image" src="'.$row['img_name'].'">
            <h3 class="thread-title">'.$row['title'].'</h3>
            <span class="date-prv">'.$row['fecha'] .'</span>
            <p class="thread-content-prv">'.$row['content'].'</p>
            </div>
            ';
        };
        header('Location:http://localhost/paginovich/boardexample.php?board='.$board.'&thread_id='.$thread_id.'');
    };
   
?>