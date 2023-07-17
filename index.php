<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    /* script{
      background-color:black;
    } */
  </style>
</head>
<body>
  
</body>
</html>


<?php
error_reporting(E_ALL);
ini_set('display_errors',1);


$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$phoneno=$_POST['phoneno'];
$gender=$_POST['gender'];
$password=$_POST['password'];
$confirmpassword=$_POST['cpassword'];  
$hashpass=password_hash($password, PASSWORD_BCRYPT);
// $hashcpass=password_hash($confirmpassword, PASSWORD_BCRYPT);



$conn=mysqli_connect("localhost","root","Saurabh@24","user");

if(!$conn)
{
    die("Connection failed");
}
// $uppercase = preg_match('@[A-Z]@', $password);
// $lowercase = preg_match('@[a-z]@', $password);
// $number    = preg_match('@[0-9]@', $password);
// $specialChars = preg_match('/[_@#$%^&]/', $password);
//  if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8 || strlen($password)>15){

//   echo "<script> alert(' Not valid password') </script><br>";
// }
// else{

$sql="INSERT INTO task1 (fname,lname,email,phoneno,gender,password) VALUES('$fname','$lname','$email','$phoneno','$gender','$hashpass')";

$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('/[_@#$%^&]/', $password);
$fname1    = preg_match('@[0-9]@', $fname);
$fname2= preg_match('/[_@#$%^&]/', $fname);
$lname1    = preg_match('@[0-9]@', $lname);
$lname2= preg_match('/[_@#$%^&]/', $lname);
$phone1 = preg_match('@[A-Z]@', $phoneno);
$phone2 = preg_match('@[a-z]@', $phoneno);
$phone3 = preg_match('/[_@#$%^&]/', $phoneno);

$r="SELECT email FROM task1 WHERE email='$email'";
$result = mysqli_query($conn, $r);

if(mysqli_num_rows($result)>0)
{
    $s=mysqli_fetch_assoc($result);
    if($email==isset($s['email']))
     {
     echo "<script> alert('Email already registered')
          window.location.href='register.html';
          </script>";
      //  header("Location:register.html");
      //  exit();
     }

}
else 
{
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script> alert(  'Invalid email format') 
    window.location.href='register.html';
    </script><br>";
  }
  else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8 || strlen($password)>15){

      echo "<script> alert(' Not valid password') 
      window.location.href='register.html';
      </script><br>";
      // header(Location:index.php);
  }
  else if(!password_verify($confirmpassword,$hashpass)){
    
    
      echo "<script> alert('password and confirm password not same')
       window.location.href='register.html';
       </script><br>";
  }
  else if($fname1||$fname2||$lname1||$lname2){
      echo "<script>alert('Name not correct')
      window.location.href='register.html';
      </script><br>";

  }
  else if($phone1||$phone2||$phone3||strlen($phoneno)!=10){
      echo "<script>alert('Phoneno not valid')
      window.location.href='register.html';
      </script><br>";

  }
   

  else{
   $res=mysqli_query($conn,$sql);
    if($res){
      echo "<script> alert('Registration successful')
      window.location.href='login.html';
      </script>";
    }
    else{
    echo "<script> alert('Error')</script>";
    }
  } 
}
//}
mysqli_close($conn); 
// 
// |$phone2||$phone3||strlen($phoneno)!=10
// ||$phone2||$phone3||strlen($phoneno)!=10
?>