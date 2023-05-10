<?php 
    include("connection.php");
    $id = $_GET['id'];

    $query =" DELETE FROM form where id='$id' ";
    $data = mysqli_query($con,$query);

    if($data)
    {
        echo "<script>alert('Record Deleted');</script>";
        ?>
            <meta http-equiv="refresh" content = "0; url= http://localhost/CRUD/display.php"/>

        <?php
    }
    else
    {
        echo "<script>alert('Failed to  Delete');</script>";

    }
?>