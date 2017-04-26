<?php
    
$servername='localhost:3306';
$username='akshaykrishna';
$password='database';

$uname=$fname=$lname=$pword=$cpword=$date=$email="";
$unameErr=$fnameErr=$lnameErr=$pwordErr=$dateErr=$cpwordErr=$emailErr=$pmatchErr="";

$conn = mysqli_connect($servername,$username,$password);

if(!$conn)
    {die("Connection failed".mysqli_connect_error());}
    
$sql = "CREATE DATABASE iwp";

if(!(mysqli_query($conn,$sql)))
    echo "Database is not created";
else
    echo "Database iwp created successfully";

$sql1 = "CREATE TABLE signup (FNAME CHAR(20),LNAME CHAR(20),USERNAME VARCHAR(30),EMAIL VARCHAR(30),DATE DATE,PASS VARCHAR(30))";

if(!(mysqli_query($conn,$sql1)))
    echo "Table is not created";
else
    echo "Table signup created successfully";

if($_SERVER["REQUEST_METHOD"]=="POST")  
        if(empty($_POST["$fname"]) and !(preg_match("[a-zA-Z]$",$fname)))
            $fnameErr = "First Name is Required";
        else 
            $fname = test_input($_POST["fname"]);
        if(empty($_POST["$lname"]) and !(preg_match("[a-zA-Z]$",$fname)))
            $lnameErr = "Last Name is Required";
        else 
            $lname = test_input($_POST["lname"]);
        if(empty($_POST["$uname"]) and !(preg_match("[a-zA-Z]$",$fname)))
            $unameErr = "User Name is Required";
        else 
            $uname = test_input($_POST["uname"]);
        if(empty($_POST["$date"]))
            $dateErr = "Date is Required";
        else 
            $date = test_input($_POST["date"]);
        if(empty($_POST["$email"]))
            $emailErr = "Email Id is Required";
        elseif(!(filter_var($email,FILTER_VALIDATE_EMAIL)))
            $email = test_input($_POST["email"]);
        if(empty($_POST["$pword"]) and !(preg_match("/*[a-zA-Z]$/",$fname)))
            $pwordErr = "Password is Required";
        else 
            $pword = test_input($_POST["pword"]);
        if(empty($_POST["$cpword"]) and !(preg_match("/*[a-zA-Z]$/",$fname)))
            $cpwordErr = "Confirm Password is Required";
        else 
            $cpword = test_input($_POST["cpword"]);
        if($pword!=$cpword)
            $pmatchErr = "Passwords donot match";
            
            function test_input($arg) {
                    $arg = trim($arg);
                    $arg = stripslashes($arg);
                    $arg = htmlspecialchars($arg);
                }


?>