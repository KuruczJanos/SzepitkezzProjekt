<?php

include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (isset($_FILES["newImage"]["tmp_name"])&& isset($_POST["storeName"]) && isset($_POST["storeEmail"]) && isset($_POST["storeMobile"]) && isset($_POST["serviceType"]) && isset($_POST["storeAddress"]) && isset($_POST["storeDescription"])) {
     
        if (!empty($_FILES["newImage"]["error"]) == UPLOAD_ERR_OK) {
            $oldImagePath = $_POST["adModifyIdImg"];  
            $newImageName =uniqid() . "_" . basename($_FILES["newImage"]["name"]);
            $newImagePath = "../img/ads/";
            $NewImgURL = $newImagePath . $newImageName;
            move_uploaded_file($_FILES["newImage"]["tmp_name"], $NewImgURL);
            $sql = "UPDATE ads SET StoreImageURL = '$NewImgURL' WHERE StoreImageURL = '$oldImagePath'";
            if ($conn->query($sql) === TRUE) { echo "A kép sikeresen módosítva!";
                                        
                                        unlink($oldImagePath); // Fájl törlése a szerverről

                } else { echo "Hiba történt a kép módosítása során: " . $conn->error;
                         }
            } else {
                $storeName = $_POST["storeName"];
                $storeEmail = $_POST["storeEmail"];
                $storeMobile = $_POST["storeMobile"];
                $serviceType = $_POST["serviceType"];
                $storeAddress = $_POST["storeAddress"];
                $storeDescription = $_POST["storeDescription"];
                $storeAdAz = $_POST["adModifyId"];
                $storeModifiedDate = date("Y-m-d H:i:s");
                  
                
                
                $sql = "UPDATE ads SET ";
                if (!empty($storeName)) {
                    $sql .= "StoreName = '$storeName', ";
                }
                if (!empty($storeEmail)) {
                    $sql .= "StoreEmail = '$storeEmail', ";
                }
                if (!empty($storeMobile)) {
                    $sql .= "StoreMobile = '$storeMobile', ";
                }
                if (!empty($serviceType)) {
                    $sql .= "ServiceType = '$serviceType', ";
                }
                if (!empty($storeAddress)) {
                    $sql .= "StoreAddress = '$storeAddress', ";
                }
                if (!empty($storeDescription)) {
                    $sql .= "StoreDescription = '$storeDescription', ";
                }
                $sql .= "LastModifyDate = '$storeModifiedDate', ";
                
                $sql = rtrim($sql, ", "); 
                $sql .= "WHERE AdAz = ? "; 
             
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $_POST['adModifyId']);
                
                        
                    if ($stmt->execute()) {
                       
                        $stmt->close();
                        exit ("<script>alert('Az adatok sikeresen frissitve!.'); window.location.href = 'user.php';</script>");
                        echo $_POST["storeEmail"];
                        echo $storeEmail;
                        print_r($_POST);
                    }  else {
                        echo "Hiba történt az adatok frissítése során: " . $conn->error;
                    
                    } 
            } 
    } else{
        echo "Hiányzó adatok az űrlapról.";
    }
}
$conn->close();
?>
