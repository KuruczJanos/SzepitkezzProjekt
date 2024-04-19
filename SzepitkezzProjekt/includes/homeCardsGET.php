<?php
    include ('connect.php');

        $stmt = $conn->prepare("SELECT * FROM services");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
                        
                        while($row = $result->fetch_assoc()) {
                          echo '<div class=" ">';
                            include ('../includes/homeCards.php');
                           
                        }
                        echo "</div>";
                        } else {
                        echo "Nincs elérhető adat.";
                        }
                        $stmt->close();
                        $conn->close();
?> 
     