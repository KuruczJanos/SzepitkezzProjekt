<div class="row user navbar navbar-expand-lg navbar-light">
    <a class="col text-secondary user d-flex ">
        <img src="<?php echo $_SESSION['UserPhoto']?>" width="100" height="100" class="d-inline-block align-top" alt="">
        <h3>Hello <?php echo " " . $_SESSION['UserFullName'];?></h3>
    </a> 
    <div class="col mx-auto justify-content-between" style="">
            <form class="ml-lg-auto" action="../includes/logout.php">
                <button type="submit" class="btn btn-primary btn-block"><h5>Kijelentkezés</h5></button>
            </form>
            <button class="btn btn-primary btn-block" id="showAdsUploadForm"><h5>Feltöltés</h5></button>
            <button type="button" class="btn btn-primary  btn-block" data-toggle="modal" data-target="#ProfileUpdateModal"><h5>Profilom</h5></button>
    </div>
    
</div>