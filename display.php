<html>
  <head>
    <title>Display</title>
    <style>
        body
        {
          background:beige;

        }
        table
        {
          background-color:white;
        }

        .update,.delete
        {
          background-color:green;
          color:white;
          border:0;
          outline:none;
          border-radius:5px;
          height:23px;
          width:100px;
          font-weight:bold;
          cursor: pointer;
          margin:0px;
          outline:3px solid green;
        }

        .delete
        {
          background-color:red;
          outline:3px solid red;
        }
    </style>
  </head>
<?php 
    include("connection.php");

     error_reporting(0);

    $query  = " SELECT * FROM FORM "; 

    $data = mysqli_query($con,$query);

    $total  = mysqli_num_rows($data);

    //converts data into array

   // echo $total;



    if($total != 0)
    {
      ?>

      <h2 align=center><mark>Displaying All records</mark></h2>
      <center>

      
      <table border=1 cellspacing=7 width=90%>
        <tr>
          <th width=5%>ID</th>
          <th width=5%>Images</th>
          <th width=5%>First Name</th>
          <th width=5%>Last Name</th>
          <th width=5%>Gender</th>
          <th width=10%>Email</th>
          <th width=10%>Phone No</th>
          <th width=5%>Caste</th>
          <th width=10%>Languages</th>
          <th width=20%>Address</th>
          <th width=20%>Operations</th>

        </tr>
     

      <?php
      while($result =  mysqli_fetch_assoc($data))
      {
        echo " 
        <tr>
        <td style='text-align:center'>".$result['id']."</td>
        <td><img src = '".$result['img']."' heigt='100px' width='100px'</td>
        <td style='text-align:center'>".$result['fname']." </td>
        <td style='text-align:center'>".$result['lname']."</td>
        <td style='text-align:center'>".$result['gender']."</td>
        <td style='text-align:center'>".$result['email']."</td>
        <td style='text-align:center'>".$result['phone']."</td>
        <td style='text-align:center'>".$result['cast']."</td>
        <td style='text-align:center'>".$result['lang']."</td>
        <td style='text-align:center'>".$result['address']."</td>

       

        <td style='text-align:center'>
          <a href='update_design.php?id=$result[id]'>
          <input type='submit' value='update' class='update'/>
        </a>

        <a href='delete.php?id=$result[id]'>
        <input type='submit' value='delete' class='delete' onclick='return checkdelete()' />
        </a>
      </td>


      </tr>
              ";
      }
      //  echo "Table has record ";
    }
    else
    {
        echo "No record found ";
    }
?>
 </table>
 </center>
    
 <script>
    function checkdelete()
    {
        return confirm('Are you sure want to delete your data ?');
    }
 </script>

<script>
        function getFullscreenElement() {
            return document.fullscreenElement
                || document.webkitFullscreenElement
                || document.mozFullscreenElement
                || document.msFullscreenElement;
        }

        function toggleFullscreen() {
            if (getFullscreenElement()) {
                document.getFullscreenElement();
            }
            else {
                document.documentElement.requestFullscreen().catch(console.log);
            }
        }
        document.addEventListener("dblclick", () => {
            toggleFullscreen();
        });

    </script>


















