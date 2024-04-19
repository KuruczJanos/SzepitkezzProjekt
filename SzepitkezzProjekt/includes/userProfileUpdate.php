<?php
session_start();
include('connect.php');

if(isset($_POST['UpdateButton'])) {
    $UserAzUP = $_SESSION['UserAz'];
    $UserPasswordUP = $_SESSION['UserPassword'];

    
    if(!empty($_POST['UpdateUserMobile']) ) {
        $UpdateUserMobile = $_POST['UpdateUserMobile'];
        $UPDATEMOBILE = "UPDATE users SET UserMobile = ? WHERE UserAz = ?";
        $stmt = $conn->prepare($UPDATEMOBILE);
        $stmt->bind_param('ss', $UpdateUserMobile, $UserAzUP);
        $stmt->execute();
        $stmt->close();
        exit("<script>alert('Sikeres telefon módositás!'); window.location.href = 'user.php';</script>");
    }

    
    if(!empty($_POST['UpdateUserPassword']) && !empty($_POST['UpdateUserRePassword'])) {
        $UpdateUserPassword = $_POST['UpdateUserPassword'];
        $UpdateUserRePassword = $_POST['UpdateUserRePassword'];

       
        if($UpdateUserPassword == $UpdateUserRePassword) {
            $UPDATEPASSWORD = "UPDATE users SET UserPassword = ? WHERE UserAz = ?";
            $stmt = $conn->prepare($UPDATEPASSWORD);
            $stmt->bind_param('ss', $UpdateUserPassword, $UserAzUP);
            $stmt->execute();
            $stmt->close();
            exit("<script>alert('Sikeres módositás!'); window.location.href = 'user.php';</script>");
        } else {

            exit("<script>alert('A jelszavak nem egyeznek!'); window.location.href = 'user.php';</script>");
        }
    }

    
    if(isset($_FILES['UserPhotoUpload']) && !empty($_FILES['UserPhotoUpload']['name'])) {
        $ImgDirectory = "../img/users/";
        $ImgFileName = uniqid() . "_" . basename($_FILES["UserPhotoUpload"]["name"]);
        $ImgFileURL = $ImgDirectory . $ImgFileName;

        
        $ImgFileType = strtolower(pathinfo($ImgFileURL, PATHINFO_EXTENSION));
        if($ImgFileType == "jpg" || $ImgFileType == "png" || $ImgFileType == "jpeg" || $ImgFileType == "gif") {
        
            $oldUserPhoto = $_SESSION['UserPhoto'];

            if($oldUserPhoto && file_exists($oldUserPhoto)) {
                unlink($oldUserPhoto);
            }

           
            move_uploaded_file($_FILES["UserPhotoUpload"]["tmp_name"], $ImgFileURL);
            $UPDATEPHOTO = "UPDATE users SET UserPhoto = ? WHERE UserAz = ?";
            $stmt = $conn->prepare($UPDATEPHOTO);
            $stmt->bind_param('ss', $ImgFileURL, $UserAzUP);
            $stmt->execute();
            $stmt->close();
            $_SESSION['UserPhoto'] = $ImgFileURL;
            exit("<script>alert('Sikeres profilkép módositas!'); window.location.href = 'user.php';</script>");
        } else {
            exit("<script>alert('Csak JPG, JPEG, PNG & GIF fájlokat lehet feltölteni!'); window.location.href = 'user.php';</script>");
            
        }
    }

    exit("<script>alert('A megadott jelszavak nem egyeznek!'); window.location.href = 'user.php';</script>");
}
?>
