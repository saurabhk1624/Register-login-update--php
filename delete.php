<?php 
include("connnection.php");
$fn=$_GET['fn'];
$ln=$_GET['ln'];
$em=$_GET['em'];
$pn=$_GET['pn'];
$gn=$_GET['gn'];
$remove=1;

$conn=mysqli_connect("localhost","root","Saurabh@24","user");
$query="UPDATE task1 SET Remove='$remove' WHERE email='$em' AND Status=0";
$data=mysqli_query($conn,$query);
$sql= "SELECT * FROM task1  WHERE  Remove=0 ";
$result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result)>0){
      echo "<table border='1'>
         <tr>
        <th>Fname</th>
        <th>Lname</th>
        <th>Email</th>
        <th>Phoneno</th>
        <th>Gender</th>
 
        
 
         </tr>";
 
                    
    
        while($row = mysqli_fetch_assoc($result)){ 
                            
                           
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
        echo "<script> alert('Deleted successfully') 
        
        </script>";       
        // header("Location:admin.php");     
        // exit();           
 mysqli_close($conn);      
?>
<!-- window.location.href='' -->