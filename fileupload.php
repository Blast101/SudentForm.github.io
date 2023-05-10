<?php 
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>File upload</title>
</head>
<body>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name='uploadfile'/>
        <br>
        <br>
        <input type="submit" name=submit value='upload file'>
        
    </form>
</body>
</html>

<?php 
   // "name" and "tmp_name is provided by PHP
    
   $file_name = $_FILES["uploadfile"]["name"];
   $temp_name = $_FILES["uploadfile"]["tmp_name"];
   $folder = "images/".$file_name;
//    echo $folder;
   move_uploaded_file($temp_name,$folder);
 
   echo "<img src='$folder' width='100px' height='100px'> ";

//   print_r($_FILES["uploadfile"]); //print array value
?>
<!-- <img src="images/pubg.png" alt="" width='100px' height='100px'> -->




















