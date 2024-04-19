<?php
  
    echo '
        <div class="card">
            <div class="card-deck ">
                <img src="' . $row["StoreImageURL"] . '" class="card-img-top" alt="..." style="width: 25rem;"  >
                <div class="card-body">
                    <h3 class="card-title">' . $row["StoreName"] . '</h3>
                    <h4 class="card-text">
                        '. $row["StoreEmail"] .'<br>
                        '. $row["StoreMobile"] .'<br>
                        '. $row["StoreAddress"] .'<br>
                        '. $row["StoreDescription"] .'<br>
                    </h4>
                </div>
                <div class="card-footer">
                    <small class="text-muted">'. $row["LastModifyDate"] .'</small><br>
                    <a href="#" class="btn btn-primary mt-2"><h4>Módositás</h4></a>
                    <a href="#" class="btn btn-primary mt-2"><h4>Törlés</h4></a>
                    <a href="#" class="btn btn-primary mt-2"><h4>Üzenet</h4></a>
                </div>
        </div>
        </div><br>';

?>
