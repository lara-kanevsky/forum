<?php
        $db = mysqli_connect("localhost", "lara", "dongato", "sigmapower");

        echo"insert post working";
        //Conseguir el:
        //Titulo del post:
        $title = $_POST['title'];
        //El contenido:
        $content = $_POST['content'];
        //El board al que pretenece:
        $actBoard = $_POST['actBoard'];
        
        $thread_id = $_POST['thread_id'];
        $path = $_FILES['image']['name'];

        //Tengo que crear el post y despues ponerle la imagen,
        //De esa forma puedo nombrar a la imgen con el id del post autogenerado
        $query = "INSERT INTO $actBoard (title, content) 
        VALUES('$title', '$content') ";
        mysqli_query($db, $query);//Generar el post con image vacio



        $query = "SELECT id FROM $actBoard ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);


        //$lastid = mysqli_fetch_all($id);
        
        $ext = pathinfo($path, PATHINFO_EXTENSION);

        var_dump($_FILES);
        var_dump($query);
        
        move_uploaded_file($_FILES['image']['tmp_name'], "../images/".$row['id'].'.'.$ext);
        $cosa = ('images/'.$row['id'].'.'.$ext);
        $rowid = $row['id'];
        $query = "UPDATE $actBoard SET img_name = '$cosa' WHERE id='$rowid'";
        mysqli_query($db, $query);
        if(isset($thread_id)){
                $query = "UPDATE $actBoard SET parent = '$thread_id' WHERE id='$rowid'";
                mysqli_query($db, $query);
                header('Location: http://localhost/paginovich/boardExample.php?board='.$actBoard.'&thread_id='.$thread_id);
        }else{
                header('Location: http://localhost/paginovich/boardExample.php?board='.$actBoard);
        }
        //$target_dir = "images/";
	//7$file = $_FILES['image']['name'];
	//$path = pathinfo($file);
	//$filename = $path['filename'];
	//$ext = $path['extension'];
	//$temp_name = $_FILES['my_file']['tmp_name'];
	//$path_filename_ext = $target_dir.$filename.".".$ext;
        //move_uploaded_file($temp_name,$path_filename_ext);
        //Conseguir la imagen
        //$imgFileTmp = pathinfo($_FILES['image']['name']);

        //move_uploaded_file($_FILES['image']['name'], "images/");


        //echo $img;

        //$ext = $imgFileTmp['extension'];//Conseguir la extencion
        
        //$target = 'images/'.$newname;
       // move_uploaded_file( $_FILES['image']['newname'], $target);//Poner la imagen subida en la carpeta
        //rename($img, $target);
        //No hace falta guardar la imagen en el post, porque ya se referencian con el id


        
?>