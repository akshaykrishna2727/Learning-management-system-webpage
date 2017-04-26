<?php
    
$servername="localhost";
$username="root";
$password="database";

$uname=$fname=$lname=$pword=$cpword=$date=$email="";
$unameErr=$$fnameErr=$lnameErr=$pwordErr=$dateErr=$cpwordErr=$emailErr=$pmatchErr="";

$conn = mysql_connect($servername,$username,$password);

if($conn)
    die("Connection failed",mysql_error($conn));
elseif($_SERVER["REQUEST_METHOD"]=="POST")
    {   
        if(empty($_POST($fname)))
            $fnameErr = "First Name is Required";
        else 
            $fname = test_input($_POST["fname"]);
        if(empty($_POST($lname)))
            $lnameErr = "Last Name is Required";
        else 
            $lname = test_input($_POST["lname"]);
        if(empty($_POST($uname)))
            $unameErr = "User Name is Required";
        else 
            $uname = test_input($_POST["uname"]);
        if(empty($_POST($date)))
            $dateErr = "Date is Required";
        else 
            $date = test_input($_POST["date"]);
        if(empty($_POST($email)))
            $emailErr = "Email Id is Required";
        else 
            $email = test_input($_POST["email"]);
        if(empty($_POST($pword)))
            $pwordErr = "Password is Required";
        else 
            $pword = test_input($_POST["pword"]);
        if(empty($_POST($cpword)))
            $cpwordErr = "Confirm Password is Required";
        else 
            $cpword = test_input($_POST["cpword"]);
        if($pword!=$cpword)
            $pmatchErr = "Passwords donot match"
    }
$sql = "CREATE DATABASE iwp";
if(!mysql_query($conn,$sql))
    echo "Query couldn't be processed";
else
    echo "Database has been created";

$sql1 = "CREATE TABLE signup (FNAME CHAR(20),LNAME CHAR(20),USERNAME VARCHAR(30),EMAIL VARCHAR(30),DATE DATE,PASS VARCHAR(30))";
if(!mysql_query($conn,$sql1))
    echo "Table is not created";
else
    echo "Table signup created successfully";

$conn->close();
?>
    