<!-- Prototip: Martina Markovic,Marija Lalic -->
<!-- Implementacija: Martina Markovic 0672/17-->
<!DOCTYPE html>
<html>
    <head>
         <title>Moderator home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel='stylesheet' type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
    </head>
    <body>
        <div class="container">
            <div class='row'>
                <div class='col-sm-3'>
                    <p id='par1'>Ulogovan moderator</p>
                    <br>
                    <br>
                    <br>
                    <img src="<?php echo base_url('slike/logo.png'); ?>" width='125%' >
                </div>
                <div class='col-sm-5 text-center ' id='osnovni_meni'>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <a href="<?php echo site_url('Moderator/dodajpitanje'); ?>" class='linkovi' >Dodaj pitanje </a>
                    <br>
                    <a href="<?php echo site_url('Moderator/izbrisipitanje'); ?>" class='linkovi' >Ukloni pitanje </a>
                    <br>
                    <a href="<?php echo site_url('Igrac/rang'); ?>" class='linkovi' >Rang lista </a>
                    <br>
                    <a href="<?php echo site_url('Moderator/logout'); ?>" class='linkovi'>ODJAVA</a>
                    <br>
                </div>
                <div class='col-sm-4' style = "color: white;">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <h2><i>Steknite znanje na zabavan nacin</i></h2>
                    <p id='p1' >
                        Sva pitanja i zadaci koji se postavljaju u kvizu preuzeti su iz zvanične literature, 
                        tako da je verodostojnost tačnih odgovora na najvišem nivou.
                    </p>
                    <p>
                        Ukoliko ste registrovani korisnik, imate mogucnost da unapredite svoje znanje u delu <b>trening</b> , pre nego sto se oprobate u
                        takmicenju. Ako ste samo gost, da biste vezbali, potrebno je da se registrujete.
                        <br>
                    </p>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </body>
</html>