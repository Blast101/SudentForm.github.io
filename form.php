<?php include("connection.php");
      error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD operations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data"> 
            <!-- # is for same page -->
            <div class="title">Registration Form</div>
            <div class="form">
                <div class="input_field" >
                    <label >Upload Image</label>
                    <input type="file" name='uploadfile' style="width:100%"/>

                </div>

                <div class="input_field">
                    <label >First Name</label>
                    <input type="text" class='input' name="fname" required>
                </div>
    
                 <div class="input_field">
                    <label >Last Name</label>
                    <input type="text" class='input' name="lname" required>
                </div>
    
                 <div class="input_field">
                    <label >Password</label>
                    <input type="text" class='input' name="password" required>
                </div>
    
                 <div class="input_field">
                    <label >Conferm Password</label>
                    <input type="text" class='input' name="conpassword" required>
                </div>
    
                 <div class="input_field">
                    <label >Gender</label>
                    <div class=selectbox>
    
                        <select name="gender" id="" required>
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
    
                <div class="input_field">
                    <label >Enter Email</label>
                    <input type="text" class='input' name="email" required>
                </div>
    
                <div class="input_field">
                    <label >Phone Number</label>
                    <input type="text" class='input' name="phone" required>
                </div>

                <div class="input_field">
                    <label style="margin-right:100px">Caste</label>
                    <input type="radio" name='r1' value='General' required><label style="margin-left:5px">General</label>
                    <input type="radio" name='r1' value='OBC' required><label style="margin-left:5px">OBC</label>
                    <input type="radio" name='r1' value='SC'  required><label style="margin-left:5px">SC</label>
                    <input type="radio" name='r1' value='ST' required><label style="margin-left:5px">ST</label>

                </div>

                <div class="input_field">
                    <label style="margin-right:100px">Languages</label>
                    <input type="checkbox" name='l1[]' value='hindi'><label style="margin-left:5px">Hindi</label>
                    <input type="checkbox" name='l1[]' value='urdu' ><label style="margin-left:5px">Urdu</label>
                    <input type="checkbox" name='l1[]' value='english'><label style="margin-left:5px">English</label>

                </div>
    
                <div class="input_field">
                    <label >Address</label>
                   <textarea name="address" id="" class='textarea' required></textarea>
                </div>
    
                 <div class="input_field terms">
                    <label class =check>
                        <input type="checkbox" name="" id="" required>
                        <span class='checkmark'></span>
                    </label>
                    <p>Agree to terms and conditions</p>
                </div>
                
                <div class="input_field">
                    <input type="submit" value="register" class='btn' name="submit">
                </div>
                
            </div>
        </form>
    </div>
</body>
</html>

<?php
    if($_POST['submit'])  
    {
        $file_name = $_FILES["uploadfile"]["name"];
        $temp_name = $_FILES["uploadfile"]["tmp_name"];
        $folder = "images/".$file_name;
        move_uploaded_file($temp_name,$folder);
      

        $f_name      = $_POST['fname'];
        $l_name      = $_POST['lname'];
        $password    = $_POST['password'];
        $cpassword   = $_POST['conpassword'];
        $gender      = $_POST['gender'];
        $email       = $_POST['email'];
        $phone       = $_POST['phone'];
        $cast        = $_POST['r1'];
        $lang        = $_POST['l1'];
        $lang1       = implode(",",$lang); //converting array to string
        echo $lang1;
        $address     = $_POST['address'];

        if($f_name != "" && $f_name != "" && $password != "" && $cpassword != "" && $gender != "" && $email != "" && $phone != "" && $address != "")
        {

        $query = "INSERT INTO form (img,fname,lname,password,cpassword,gender,email,phone,cast,lang,address) 
                VALUES('$folder','$f_name','$l_name','$password','$cpassword','$gender','$email','$phone','$cast','$lang1','$address')";

        $data = mysqli_query($con,$query);

        if($data)
        {
           // echo "Data inserted into database";
        }
        else
        {
            echo "Failed ";
        }
        
        
        }
        else
        {
            echo "<script>alert('Please enter data');</script>";        
        }
}
?>








               












