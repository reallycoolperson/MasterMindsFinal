<!-- Prototip: Martina Markovic,Marija Lalic -->
<!-- Implementacija: Martina Markovic 0672/17-->
<!DOCTYPE html>
<html>
    <head>
        <title> Master Mind Zaboravljena lozinka </title>
        <link rel='stylesheet' type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
    </head> 
    <body>
        <div class="loginBox" style ="height:330px;">
            <img src="<?php echo base_url('slike/pink.png'); ?>" class="user">
            <div class = "naslov_mastermind"> <h2> Vrati nalog </h2></div>
            <form action="<?= base_url('Igrac/resetLink') ?>" method="post">
                <p>E-mail</p>
                <input type="email" name = "email" id="email" required="required" placeholder="Unesite E-mail">
                <input type="submit" name = "" value="Posalji link">
                <div class = 'words_login'> 
                    <a href ="<?php echo base_url('Gost/login'); ?>"> Nazad</a> </div>
            </form>
        </div>
    </div>
</body>
</html>