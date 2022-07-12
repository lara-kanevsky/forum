<?php
    //function to get the posts
    function getPosts($board){
        $db = mysqli_connect("localhost", "lara", "dongato", "sigmapower");
        $query = "SELECT * FROM $board ORDER BY fecha DESC LIMIT 20";
        $result = mysqli_query($db, $query); //here is a table thet will reperesent those last 20 poost
        while($row = mysqli_fetch_array($result)){ //for every row in the result table
            if(!isset($row['parent'])){
            echo '
            <div class="thread-prv thin-brd">
                <a href="boardexample.php?board='.$board.'&thread_id='.$row['id'].'"><img src="'. $row["img_name"].'" class="thread-image-prv thin-brd" ></a>
                <h3 class="thread-title">'.$row['title'].'</h3><br>
                <span class="date-prv">'.$row['fecha'] .'</span>
                <p class="thread-content-prv">'.$row['content'].'</p>
          	</div>';
            };
       	};
    };
    
?>

