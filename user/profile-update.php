<?php
 
 session_start();
 include "../includes/db.php";
 if(isset($_POST['updateProfile']))
 {
    $username=$_SESSION['username'];
    $fName= mysqli_real_escape_string($conn, $_POST['fName']);
    $lName=  mysqli_real_escape_string($conn, $_POST['lName']);
    $uAddress=  mysqli_real_escape_string($conn, $_POST['uAddress']);
    $uState=  mysqli_real_escape_string($conn, $_POST['uState']);
    $select= "select * from users where username='$username'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['username'];
    if($res === $username)
    {
   
       $update = "update users set fName='$fName',lName='$lName',uAddress='$uAddress',uState='$uState' where username='$username'";
       $sql2=mysqli_query($conn,$update);
if($sql2)
       { 
           /*Successful*/
           header('location:settings.php');
       }
       else
       {
           /*sorry your profile is not updated*/
           header('location:settings.php');
       }
    }
    else
    {
        /*sorry your id is not match*/
        header('location:settings.php');
    }
 }
?>