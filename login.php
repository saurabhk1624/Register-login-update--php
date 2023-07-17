<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Details</title>
    <style>

table

{

border-style:solid;

border-width:2px;

border-color:black;
/* padding:20px; */
/* margin:350px 450px; */

}

</style>
</head>
<body>

</body>
</html>



<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
$eamil=$_POST['email'];
$pass=$_POST['password'];
// global $conn; 
$conn=mysqli_connect("localhost","root","Saurabh@24","user");
if(!$conn)
{
    die("Connection failed");
}
$hashpass=password_hash($pass,PASSWORD_BCRYPT);
$query="SELECT email FROM task1 WHERE email='$eamil'";
$res=mysqli_query($conn,$query);
$check = mysqli_fetch_array($res);
$query1="SELECT  password FROM task1 WHERE email='$eamil' ";
$res1=mysqli_query($conn,$query1);
$check1 = mysqli_fetch_array($res1);
// $row=mysqli_fetch_assoc($res);
// $pa=$row['password'];
$one=password_verify($pass,$check1['password']);
if(isset($check)){
    // if(mysqli_num_rows($res1)>0)
    // { 
        // $c=password_verify($pass,$row['password']);
           if($one==1)
           {
             
             $sql= "SELECT * FROM task1 WHERE email='$eamil'  AND Status='1'";
             $result = mysqli_query($conn, $sql);
             $sql1= "SELECT * FROM task1 WHERE email='$eamil'  AND Status='0' ";
             $result2 = mysqli_query($conn, $sql);
              
                if(mysqli_num_rows($result)>0){
                //    header("location:admin.php");
                //    exit();
                    $ad="SELECT * FROM task1 WHERE Remove=0";
                    if($result1 = mysqli_query($conn, $ad)){
                        if(mysqli_num_rows($result1)>0){
                            echo "<table border='5'>

                                  <tr>
                                  <th>Fname</th>
                                  <th>Lname</th>
                                  <th>Email</th>
                                  <th>Phoneno</th>
                                  <th>Gender</th>

                                  <th>Edit</th>
                                  <th>Delete</th>

                                  </tr>";

                   
                          while($row = mysqli_fetch_assoc($result1)){ 
                            
                           
                            echo "<tr>";

                            echo "<td>" . $row['fname'] . "</td>";
                          
                            echo "<td>" . $row['lname'] . "</td>";
                          
                            echo "<td>" . $row['email'] . "</td>";
                          
                            echo "<td>" . $row['phoneno'] . "</td>";

                            echo "<td>" . $row['gender'] . "</td>";

                            echo "<td> <button><a href='update.php?fn=$row[fname]&ln=$row[lname]&em=$row[email]&pn=$row[phoneno]&gn=$row[gender]'>Edit </a></button></td>";

                            echo "<td> <button><a href='delete.php?fn=$row[fname]&ln=$row[lname]&em=$row[email]&pn=$row[phoneno]&gn=$row[gender]'>Delete </a></button></td>";

                            


                          
                            echo "</tr>";
                            
                               
                           }
                           echo "</table>";
                        } 
                    }
                }
                
                else{
                    $user="SELECT * FROM task1 WHERE email='$eamil' ";
                  if($result3 = mysqli_query($conn, $user)){
                    if(mysqli_num_rows($result3)>0){
                        echo "<table border='1'>

                                  <tr>
                                  <th>fname</th>
                                  <th>lname</th>
                                  <th>email</th>
                                  <th>phoneno</th>
                                  <th>gender</th>
                                  </tr>";
               
                      while($row = mysqli_fetch_assoc($result3)){ 
                        
                        
                        echo "<tr>";

                            echo "<td>" . $row['fname'] . "</td>";
                          
                            echo "<td>" . $row['lname'] . "</td>";
                          
                            echo "<td>" . $row['email'] . "</td>";
                          
                            echo "<td>" . $row['phoneno'] . "</td>";

                            echo "<td>" . $row['gender'] . "</td>";
                          
                            echo "</tr>";
                      }
                      echo "</table>";
                      
                    }
                    }
                }
                
             }
           
           else{
            echo  "<script> alert('Wrong password') 
            window.location.href='login.html';
            </script><br>";
            // header("Location:index.php");
            // exit;
                    
           }
        // }

}
else{
    echo "<script> alert('Email not found') 
    window.location.href='login.html';
    </script><br>";
    // header("Location:index.php");
    // exit;
}

?>