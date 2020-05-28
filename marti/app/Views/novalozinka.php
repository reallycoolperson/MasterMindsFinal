<!-- Implementacija: Martina Markovic 0672/17-->
<!DOCTYPE html>
<html>
    <head>
        <title> Master Mind Nova lozinka </title>
        <link rel='stylesheet' type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
    </head> 
    <body>
        <div class="loginBox" style ="height:360px;">
            <img src="<?php echo base_url('slike/pink.png'); ?>" class="user">
            <div class = "naslov_mastermind"> <h2> Nova lozinka </h2></div>
            <form action="<?= base_url('Igrac/resetLink') ?>" method="post">
             
                <input type="password" name = "password1" id="pass1" required="required" placeholder="Unesite novu lozinku">
             
                <input type="password" name = "password2" id="pass2" required="required" placeholder="Potvrdite novu lozinku">
  
                <input type="submit" name = "" value="Zapamti lozinku">
                <div class = 'words_login'> 
                    <a href ="<?php echo base_url('Gost/login'); ?>"> Nazad</a> </div>
            </form>
        </div>
</body>
</html>