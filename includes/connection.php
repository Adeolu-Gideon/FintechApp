<?php
	
	$fName = "";
    $lName = "";
    $eMail = "";
    $phoneNo = "";
    $uBvn = "";
    $dOb = "";
    $uAddress = "";
    $uState = "";
    $passWord = "";
    $errors = array();

    //////////Establishing Database connection
    $db = mysqli_connect('localhost', 'root', '', 'customers');

    // if the registration button is clicked
    if(isset($_POST['register'])) {
        $fName = mysqli_real_escape_string($db, $_POST['fName']);
        $lName = mysqli_real_escape_string($db, $_POST['lName']);
        $eMail = mysqli_real_escape_string($db, $_POST['eMail']);
        $phoneNo = mysqli_real_escape_string($db, $_POST['phoneNo']);
        $uBvn = mysqli_real_escape_string($db, $_POST['uBvn']);
        $dOb = mysqli_real_escape_string($db, $_POST['dOb']);
        $uAddress = mysqli_real_escape_string($db, $_POST['uAddress']);
        $uState = mysqli_real_escape_string($db, $_POST['uState']);
        $passWord = mysqli_real_escape_string($db, $_POST['passWord']); 

    //Ensuring form fields are not empty
        if(empty($fName)) {
            array_push($errors, "first name is empty");
        }
        if(empty($lName)) {
            array_push($errors, "last name is empty");
        }
        if(empty($eMail)) {
            array_push($errors, "email is empty");
        }
        if(empty($phoneNo)) {
            array_push($errors, "phone number is empty");
        }
        if(empty($uBvn)) {
            array_push($errors, "BVN is empty");
        }
        if(empty($dOb)) {
            array_push($errors, "Date of birth is empty");
        }
        if(empty($uAddress)) {
            array_push($errors, "Address is empty");
        }
        if(empty($uState)) {
            array_push($errors, "State is empty");
        }
        if(empty($passWord)) {
            array_push($errors, "Password is empty");
        }

        //If there is no error, save user details into database
        if(count($errors) == 0) {
            $password = md5($passWord);
            $sql = "INSERT INTO `signup` (id, firstname, lastname, email, phonenumber, BVN, dob, address, state, password) 
            VALUES (NULL, '$fName', '$lName', '$eMail', '$phoneNo', '$uBvn', '$dOb', '$uAddress', '$uState', '$passWord')";
            mysqli_query($db, $sql);
        }
    }
?>