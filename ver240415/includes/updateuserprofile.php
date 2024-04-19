<?php

session_start();
include('connect.php');

if(isset($_POST['UpdateButton'])){

    $UpdateUserMobile = $_POST['UpdateUserMobile'];
    $UpdateUserPassword = $_POST['UpdateUserPassword'];
    $UpdateUserRePassword = $_POST['UpdateUserRePassword'];
    $UserAzUP = $_SESSION['UserAz'];
    $UserPasswordUP = $_SESSION['UserPassword'];

if($UpdateUserMobile != $_SESSION['UserMobile']){
    $UPDATEMOBILE = "UPDATE users SET UserMobile = (?) WHERE UserAz = '$UserAzUP'  ";
    $stmt = $conn->prepare($UPDATEMOBILE);
    $stmt -> bind_param('s', $UpdateUserMobile);
    $stmt -> execute();
    $stmt -> close();
}else{
}
if($UpdateUserPassword != $UserPasswordUP && $UpdateUserPassword==$UpdateUserRePassword){
    $UPDATEPASSWORD = "UPDATE users SET UserPassword = (?) WHERE UserAz = '$UserAzUP'  ";
    $stmt = $conn->prepare($UPDATEPASSWORD);
    $stmt -> bind_param('s', $UpdateUserPassword);
    $stmt -> execute();
    $stmt -> close();
}else{        echo  
    '<script>alert("A megadott jelszavak nem egyeznek!") history.back();</script>';
}
header ('Location: ../includes/user.php');

}