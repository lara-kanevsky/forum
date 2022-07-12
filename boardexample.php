<!DOCTYPE>
<html>
    <head>
        <title>SigmaPower</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <style><?php include('style.css')?></style>
        <script type="text/javascript" src="javascript.js"></script>
        <script><?php include('javascript.js')?></script>
    </head>
    <body>
        <header>
            <ul>
                <li>Sigma Power (drip) ~ </li>
                <?php 
                    require_once("./php/getBoards.php");
                    getBoards();
                ?>
            </ul>
        </header>
                    <?php 
                    $btn_name= "Make Post";
                    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    if(isset($_GET['thread_id'])){
                        $btn_name = "Reply";
                    };
                        echo '
                        <button type="button" onclick="document.getElementById(&#39;make-post-form&#39;).classList.remove(&#39;hidden&#39;) ">'.$btn_name.'</button>
                        <form action="php/insertPost.php" method="POST" class="thin-brd hidden" id="make-post-form" enctype="multipart/form-data">
                        <label><b>'.$btn_name.'</b></label><br>
                        <label>Title:</label><br>
                        <input type="text" name="title"><br>
                        <label>Content:</label><br>
                        <textarea name="content" rows="10" cols="50"></textarea><br>
                        <label>Choose image:</label>
                        <input type="file" name="image"  accept="image/*"><br>
                        <input type="hidden" name="actBoard" value="'.$_GET['board'].'">
                        <input type="hidden" name="thread_id" value="'.$_GET['thread_id'].'">
                        <input type="hidden" name="url" value="'.$actual_link.'">
                        <input type="submit" value="Submit"><br>
                        <button type="button" onclick="hideMakePost()">Minimize</button>
                    </form>';
                    
                    ?>
        
        <main class="thin-brd" >

            <div class="container" id="container" >
                <?php 
                
                require_once("./php/displayBoard.php");
                include_once("./php/hideBoard.php");
                include_once("./php/displayPost.php");
                    if (isset($_GET['board'])&& !(isset($_GET['thread_id']))) {
                        displayBoard($_GET['board']);
                    }else{
                        ob_start();
                        hideBoard();
                        if(isset($_GET['thread_id'])){
                            displayPost($_GET['board'],$_GET['thread_id']);
                        }
                    }
                    
                ?>
                
            </div>
            
        </main>
    </body>
</html>