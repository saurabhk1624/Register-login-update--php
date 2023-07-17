<?php
include("connnection.php");
$fn=$_GET['fn'];
$ln=$_GET['ln'];
$em=$_GET['em'];
$pn=$_GET['pn'];
$gn=$_GET['gn'];

$conn=mysqli_connect("localhost","root","Saurabh@24","user");
if(!$conn)
{
   echo "connection failed";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Details</title>
    <style>
     

      
      body
     {
     margin: 0;
     padding: 0;
     background-color:antiquewhite;
     font-family: 'Arial';
     }
     .fname{
     width: 300px;
     height: 30px;
     border: none;
     border-radius: 3px;
     padding-left: 8px;
     }
     label{
     color:black;
     font-size: 17px;
    }
    h1{
     text-align: center;
     color: #277582;
     padding: 20px;
     }
     .card{
        /* width:300px;
        height:300px; */
        
        width: 382px;
        
        margin: auto; 
        margin: 20 0 0 450px;
        padding: 80px;
        background-color:#08ffd1;
        border-radius: 15px ;
        

    
     }
     .bt{
     width: 300px;
      height: 30px;
     border: none;
     border-radius: 17px;
     padding-left: 7px;
     color: blue;


     }
     #email{
     width: 300px;
     height: 30px;
     border: none;
     border-radius: 3px;
     padding-left: 8px;  
     }
     #fname{
     width: 300px;
     height: 30px;
     border: none;
     border-radius: 3px;
     padding-left: 8px;
     }
     #lname{
      width: 300px;
      height: 30px;
      border: none;
      border-radius: 3px;
     padding-left: 8px;
    } 
     #phoneno{
      width: 300px;
      height: 30px;
      border: none;
      border-radius: 3px;
      padding-left: 8px;
     }


    </style>    
</head>
<body>
   <h1><b>Update Details<b></h1>
    <div  class="card"   >
    
    <form action="admin.php "   method="Post"  >
       <label><b>First Name</b>
         <br>
       </label>
        <input type="text" id="fname" name="fname" value="<?php echo "$fn"?>" placeholder="first name">
        <br><br>
        <label><b>Last Name</b>
         <br>
       </label>
        <input type="text"  id="lname"    name="lname" value="<?php echo "$ln"?>" placeholder="last name">
        <br><br>
        <label for="email" required>Email</label>
        <br>
        <input type="text" id="email" name="email" value="<?php echo "$em"?>"  placeholder="Enter your email">
        <br>
        <br>
        <label for="phone no" required>Phone no</label>
        <br>
        <input type="digits" id="phoneno" name ="phoneno" value="<?php echo "$pn"?>"   placeholder="Enter your phone no">
        <br>
        <br>
        <p  >Gender</p>
        <label for="male">Male</label>
        <input type="radio"  id="male" name="gender" value="<?php echo "$gn"?>" >
        <br>
        <label for="female" >Female</label>
        <input type="radio"  id="female" name="gender"   >
        <br>
        <br> 
        <button class="bt" name="submit"    type="submit">Update</button>





    </form>





   </div>


</body>
</html>
 

<?php  
// error_reporting(E_ALL);
// ini_set('display_errors',1);
// if(!$conn)
// {
//    echo "connection failed";
// }
// $fname=$_POST['fname'];
// $lname=$_POST['lname'];
// $email=$_POST['email'];
// $phoneno=$_POST['phoneno'];
// $gender=$_POST['gender'];
// $edit=1;
// $fname1    = preg_match('@[0-9]@', $fname);
// $fname2= preg_match('/[_@#$%^&]/', $fname);
// $lname1    = preg_match('@[0-9]@', $lname);
// $lname2= preg_match('/[_@#$%^&]/', $lname);
// $phone1 = preg_match('@[A-Z]@', $phoneno);
// $phone2 = preg_match('@[a-z]@', $phoneno);
// $phone3 = preg_match('/[_@#$%^&]/', $phoneno);


  
//    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//       echo "<script> alert(  'Invalid email format')
      
//             </script><br>";
//     }
   
//    else{

//        if($fname1||$fname2||$lname1||$lname2){
//          echo "<script>alert('Name not correct')
        
//          </script><br>";
   
//        }
//        else if($phone1||$phone2||$phone3||strlen($phoneno)!=10){
//          echo "<script>alert('Phoneno not valid')
         
//             </script><br>";
   
//       }
//       else{
//                 $query1="UPDATE task1 SET Edit='$edit' WHERE email='$email'";
//                $data1=mysqli_query($conn,$query1);
//                 $query="UPDATE task1 SET fname='$fname' ,lname='$lname' ,phoneno='$phoneno',gender='$gender' WHERE email='$email' AND Edit='$edit'" ;  
//                 $data=mysqli_query($conn,$query);
//                 if($data)
//                 {
//                   echo "<script> alert('Record Updated')
//                   window.location.href='login.html';
//                   </script><br>";
//                 }
//       }
   
//    }
// $query2="UPDATE task1 SET Edit=0 WHERE email='$email'";
// $data2=mysqli_query($conn,$query2);
// mysqli_close($conn);
// if($_POST['submit'])
// {
// window.location.href='login.html';
// window.location.href=''
//;
// window.location.href='login.html';
// window.location.href='login.html'
// ?>











