<?php
    include ('connect.php');

        $stmt = $conn->prepare("SELECT * FROM services");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
                        
                        while($row = $result->fetch_assoc()) {
                          
                            include ('../includes/homeCards.php');
                           
                        }
                       
                        } else {
                        echo "Nincs elérhető adat.";
                        }
                        $stmt->close();
                        $conn->close();
?> 
     