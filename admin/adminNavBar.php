<link rel="stylesheet" href="../styles/admin.css">
<nav class="admin navbar navbar-expand-lg navbar-dark">
    <a class="text-secondary user navbar-brand">
        <img src="<?php echo $_SESSION['UserPhoto']?>"  class="d-inline align-top" alt="">
         <h1>Üdv! <br> <?php echo " " . $_SESSION['UserFullName'];?> </h1> 
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            <form class="navbar-nav ml-auto" action="../includes/logout.php">
            <button type="submit" class="mr-lg-4 mr-sm-0 btn btn-primary  logoutbtn"><h4>Kijelentkezés</h4>
            </button></form>

        </div>
    </div>
</nav>