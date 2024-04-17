<?php
  
    echo '   
        <div class="card">
            <div class="card-deck">
                <img src="' . $row["UserPhoto"] . '" class="card-img-top" alt="..." style="width: 25rem;"  >
                <div class="card-body">
                    <h3 class="card-title">Felhasználó Azonositó: ' . $row["UserAz"] . '</h3>
                    <h4 class="card-text">
                        Felhasználó neve: '. $row["UserName"] .'<br>
                        Teljes neve: '. $row["UserFullName"] .'<br>
                        Jelszava: '. $row["UserPassword"] .'<br>
                        Email cime: '. $row["UserEmail"] .'<br>
                        Telefonszáma: '. $row["UserMobile"] .'<br>
                        Profil tipusa: '. $row["Type"] .'<br>
                        Helyreállitási kód: '. $row["ResetCode"] .'<br>
                    </h4>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Regisztráció dátuma</small><br>
                    <a href="#" class="btn btn-primary mt-2"><h4>Módositás</h4></a>
                    <a href="#" class="btn btn-primary mt-2"><h4>Törlés</h4></a>
                    <a href="#" class="btn btn-primary mt-2"><h4>Üzenet</h4></a>
                </div>

        </div>
        </div><br>';

?>