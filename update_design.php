<?php 
    include("connection.php");
    // error_reporting(0);

    $id = $_GET['id'];

    $query  = " SELECT * FROM FORM where id='$id'"; 

    $data = mysqli_query($con,$query);

    $result =  mysqli_fetch_assoc($data);

     $lang = $result['lang'];
    //separating the strings into array
    
    $lang1 = explode(",",$lang);

    $file_name = $_FILES["uploadfile"]["name"];
    $temp_name = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/".$file_name;
//    echo $folder;
   move_uploaded_file($temp_name,$folder);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update design</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="#" method="POST"> 
            <!-- # is for same page -->
            <div class="title">Update Student details</div>
            <div class="form">
                <div class="input_field">
                    <label >Update Image</label>
                    
                    <input type="file" name='uploadfile' />
                    <?php 
                       echo "<img src = '".$result['img']."'  width='10%' style=margin:20px; border:5px solid brown;/>";
                    ?>
                </div>


                <div class="input_field">
                    <label >First Name</label>
                    <input type="text" class='input' value="<?php echo $result['fname'];?>"   name="fname" required>
                </div>
    
                 <div class="input_field">
                    <label >Last Name</label>
                    <input type="text" class='input'  value="<?php echo $result['lname'];?>" name="lname" required>
                </div>
    
                 <div class="input_field">
                    <label >Password</label>
                    <input type="text" class='input' value="<?php echo $result['password'];?>" name="password" required>
                </div>
    
                 <div class="input_field">
                    <label >Conferm Password</label>
                    <input type="text" class='input' value="<?php echo $result['cpassword'];?>" name="conpassword" required>
                </div>
    
                 <div class="input_field">
                    <label >Gender</label>
                    <div class=selectbox>
    
                        <select name="gender"  required>
                            <option value="">Select</option>

                            <option value="male"
                                <?php
                                    if($result['gender'] == "male")
                                    {
                                        echo "Male";
                                    }
                                ?>
                            >
                                Male</option>
                            <option value="female"
                            <?php
                                    if($result['gender'] == "female")
                                    {
                                        echo "Female";
                                    }
                                ?>
                            >
                            Female</option>
                        </select>
                    </div>
                </div>
    
                <div class="input_field">
                    <label >Enter Email</label>
                    <input type="text" class='input'  value="<?php echo $result['email'];?>" name="email" required>
                </div>
    
                <div class="input_field">
                    <label >Phone Number</label>
                    <input type="text" class='input'   value="<?php echo $result['phone'];?>" name="phone" required>
                </div>

                <div class="input_field">
                    <label style="margin-right:100px">Caste</label>
                    <input type="radio" name='r1' value='General' required
                      <?php 
                        if($result['cast'] == "General")
                        {
                            echo "checked";
                        }
                      ?>
                    ><label style="margin-left:5px">General</label>
                    <input type="radio" name='r1' value='OBC' required
                    <?php 
                        if($result['cast'] == "OBC")
                        {
                            echo "checked";
                        }
                      ?>
                    ><label style="margin-left:5px">OBC</label>
                    <input type="radio" name='r1' value='SC'  required
                    <?php 
                        if($result['cast'] == "SC")
                        {
                            echo "checked";
                        }
                      ?>
                    ><label style="margin-left:5px">SC</label>
                    <input type="radio" name='r1' value='ST' required
                    <?php 
                        if($result['cast'] == "ST")
                        {
                            echo "checked";
                        }
                      ?>
                    ><label style="margin-left:5px">ST</label>

                </div>

                <div class="input_field">
                    <label style="margin-right:100px">Languages</label>
                    <input type="checkbox" name='l1[]' value='hindi'
                        <?php
                          if(in_array("hindi", $lang1))
                          {
                            echo "checked";
                          }
                        ?>
                    ><label style="margin-left:5px">Hindi</label>
                    <input type="checkbox" name='l1[]' value='urdu' 
                        <?php
                          if(in_array("urdu",$lang1))
                          {
                            echo "checked";
                          }
                        ?>
                    ><label style="margin-left:5px">Urdu</label>
                    <input type="checkbox" name='l1[]' value='english'
                        <?php
                          if(in_array("english",$lang1))
                          {
                            echo "checked";
                          }
                        ?>
                    ><label style="margin-left:5px">English</label>

                </div>
    
                <div class="input_field">
                    <label >Address</label>
                   <textarea name="address" id="" class='textarea' required><?php echo $result['address'];?></textarea>
                </div>
    
                 <div class="input_field terms">
                    <label class =check>
                        <input type="checkbox" name="" id="" required>
                        <span class='checkmark'></span>
                    </label>
                    <p>Agree to terms and conditions</p>
                </div>
                
                <div class="input_field">
                    <input type="submit" value="Update details" class='btn' name="update">
                </div>
                
            </div>
        </form>
    </div>
</body>
</html>

<?php
    include("connection.php");
    if($_POST['update'])  
    {
        $f_name      = $_POST['fname'];
        $l_name      = $_POST['lname'];
        $password    = $_POST['password'];
        $cpassword   = $_POST['conpassword'];
        $gender      = $_POST['gender'];
        $email       = $_POST['email'];
        $phone       = $_POST['phone'];
        $cast        = $_POST['r1'];
        $lang        = $_POST['l1'];
        $lang1 = implode(",",$lang);

        $address     = $_POST['address'];

        

        // $query = " update set form where fname = '$f_name', lname='$l_name',password = '$password', cpassword='$cpassword'
        //           gender='$gender', email='$email', phone='$phone', address='$address' where id='$id' ";

            $query = " UPDATE `form` SET `fname`='$f_name',`lname`='$l_name',`password`='$password',
            `cpassword`='$cpassword',`gender`='$gender',`email`='$email',`phone`='$phone',`cast`='$cast',`lang`='lang1',`address`='$address' where `id`='$id' ";

        $data =  mysqli_query($con,$query);

        if($data)
        {
            echo "<script>alert('Record Updated');</script>";
            ?>
                <meta http-equiv="refresh" content = "0; url= http://localhost/CRUD/display.php"/>

            <?php
        }
        else
        {
            echo "Failed ";
        }
    }
?>








               












