<?php

session_start();

include('connect.php');
if(isset($_POST['LogEmailInput']) && !empty($_POST['LogEmailInput']) && isset($_POST['LogPassInput']) && !empty($_POST['LogPassInput'])){

$LogEmail=$_POST['LogEmailInput'];

$LogPassword=$_POST['LogPassInput'];

$qry="SELECT * From users Where UserEmail='$LogEmail' && UserPassword='$LogPassword' ";

$c=mysqli_query($conn, $qry);

$result=mysqli_query($conn,$qry);

$num = mysqli_num_rows($result);




if($num == 1)
{
    while($rows = $result ->fetch_assoc()){
        $ActiveUserAz = $rows['UserAz'];
        $ActiveUserName = $rows['UserName'];
        $ActiveUserFullName = $rows['UserFullName'];
        $ActiveUserEmail = $rows['UserEmail'];
        $ActiveUserPassword = $rows['UserPassword'];
        $ActiveUserMobile = $rows['UserMobile'];
        $ActiveUserPhoto = $rows['UserPhoto'];
        $ActiveUserType = $rows['Type'];
    }

$_SESSION['UserAz'] = $ActiveUserAz;
$_SESSION['UserName'] = $ActiveUserName;
$_SESSION['UserFullName'] = $ActiveUserFullName;
$_SESSION['UserEmail'] = $ActiveUserEmail;
$_SESSION['UserMobile'] = $ActiveUserMobile;
$_SESSION['UserPassword'] = $ActiveUserPassword;
$_SESSION['UserPhoto'] = $ActiveUserPhoto;
$_SESSION['Type'] = $ActiveUserType;

    if($ActiveUserEmail==$LogEmail && $ActiveUserPassword==$LogPassword){
        if($ActiveUserType == 1){
            header("Location: ../admin/admin.php");
        }else{
            header("Location: ../includes/user.php");
        }

    } else {
        echo  
        '<script>alert("A felhasználó név vagy a jelszó hibás!")</script>';
        }

}
else
{
echo
exit('<script>alert("A felhasználó név vagy a jelszó hibás!") history.back();</script>');

}

}
$conn->close();
?>