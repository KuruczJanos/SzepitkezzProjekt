<?php
    include ('../includes/connect.php');

        $stmt = $conn->prepare("SELECT * FROM ads");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
                        
            while($row = $result->fetch_assoc()) {
                            
                include ('../admin/adminShowAds.php');
                            
            }
                        
        } else {
        echo "Nincs elérhető adat.";
        }
    $stmt->close();
    $conn->close();
?> 