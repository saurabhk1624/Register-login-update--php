<?php
include("connection.php");
// error_reporting(E_ALL);
// ini_set('display_errors',1);
error_reporting(E_ALL);
ini_set('display_errors',1);
$conn=mysqli_connect("localhost","root","Saurabh@24","user");
if(!$conn)
{
   echo "connection failed";
}
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$phoneno=$_POST['phoneno'];
$gender=$_POST['gender'];
$edit=1;
$fname1    = preg_match('@[0-9]@', $fname);
$fname2= preg_match('/[_@#$%^&]/', $fname);
$lname1    = preg_match('@[0-9]@', $lname);
$lname2= preg_match('/[_@#$%^&]/', $lname);
$phone1 = preg_match('@[A-Z]@', $phoneno);
$phone2 = preg_match('@[a-z]@', $phoneno);
$phone3 = preg_match('/[_@#$%^&]/', $phoneno);


  
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "<script> alert(  'Invalid email format')
           window.location.href='update.php'
            </script><br>";
    }
   
   else{

       if($fname1||$fname2||$lname1||$lname2){
         echo "<script>alert('Name not correct')
         window.location.href='update.php'
         </script><br>";
   
       }
       else if($phone1||$phone2||$phone3||strlen($phoneno)!=10){
         echo "<script>alert('Phoneno not valid')
         window.location.href='update.php'
            </script><br>";
   
      }
      else{
                $query1="UPDATE task1 SET Edit='$edit' WHERE email='$email'";
               $data1=mysqli_query($conn,$query1);
                $query="UPDATE task1 SET fname='$fname' ,lname='$lname' ,phoneno='$phoneno',gender='$gender' WHERE email='$email' AND Edit='$edit'" ;  
                $data=mysqli_query($conn,$query);
                if($data)
                {
                  echo "<script> alert('Record Updated')
                  window.location.href='login.html';
                  </script><br>";
                }
      }
   
   }
$query2="UPDATE task1 SET Edit=0 WHERE email='$email'";
$data2=mysqli_query($conn,$query2);
mysqli_close($conn);



// $conn=mysqli_connect("localhost","root","Saurabh@24","user");
// $eamil=$_GET['email'];
// $pass=$_GET['password'];
// $sql= "SELECT * FROM task1 WHERE email='$eamil' AND password='$pass' AND Status='1'";
//  $result = mysqli_query($conn, $sql);

// if(mysqli_num_rows($result)>0){
// $ad="SELECT * FROM task1 WHERE Remove=0";
//                     if($result1 = mysqli_query($conn, $ad)){
//                         if(mysqli_num_rows($result1)>0){
//                             echo "<table border='1'>

//                                   <tr>
//                                   <th>Fname</th>
//                                   <th>Lname</th>
//                                   <th>Email</th>
//                                   <th>Phoneno</th>
//                                   <th>Gender</th>

//                                   <th>Edit</th>
//                                   <th>Delete</th>

//                                   </tr>";

                   
//                           while($row = mysqli_fetch_assoc($result1)){ 
                            
                           
//                             echo "<tr>";

//                             echo "<td>" . $row['fname'] . "</td>";
                          
//                             echo "<td>" . $row['lname'] . "</td>";
                          
//                             echo "<td>" . $row['email'] . "</td>";
                          
//                             echo "<td>" . $row['phoneno'] . "</td>";

//                             echo "<td>" . $row['gender'] . "</td>";

//                             echo "<td> <button><a href='update.php?fn=$row[fname]&ln=$row[lname]&em=$row[email]&pn=$row[phoneno]&gn=$row[gender]'>Edit </a></button></td>";

//                             echo "<td> <button><a href='delete.php?fn=$row[fname]&ln=$row[lname]&em=$row[email]&pn=$row[phoneno]&gn=$row[gender]'>Delete </a></button></td>";

                            


                          
//                             echo "</tr>";
                            
                               
//                            }
//                            echo "</table>";
//                         } 
//                     }
// }
// mysqli_close($conn);
                    ?>                    