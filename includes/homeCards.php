<?php
    echo '
            
                <div class="card">
                
                    
                    <img src="'.$row['ServiceImgURL'] .'" alt="Kép 1">
                            
                            <form action="../includes/checkpost.php" id="listServiceForm"  name="listServiceForm" method="post" enctype="multipart/form-data">
                            <input type="submit" name="listService" class="btn btn-secondary btn-block" value="'. $row["ServiceName"] .'">
                            </form>
                            
                    
            </div>
            '
;

?>

