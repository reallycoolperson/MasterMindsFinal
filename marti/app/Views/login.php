<!-- Prototip: Ana Blazic,Ana Saponjic-->
<!-- Implementacija: Martina Markovic 0672/17-->
<!DOCTYPE html>
<html>
    <head>
        <title> Master Mind Login </title>
        <link rel='stylesheet' type="text/css" href="<?php echo base_url('css/stil.css'); ?>">


    </head>


    <body>
        <div class="loginBox">

            <img src="<?php echo base_url('slike/pink.png'); ?>" class="user">
            <div class = "naslov_mastermind"> <h2> Master Minds </h2></div>
            <form action="<?= base_url('Gost/loginSubmit') ?>" method="post">
                <p>Korisnicko ime</p>
                <input type="text" name = "username" placeholder="Unesite Korisnicko ime">
                <p>Lozinka</p>
                <input type="password" name = "password" placeholder="Unesite Lozinku">
                <input type="submit" name = "" value="Uloguj se">
                <div class = 'words_login'> <p>Zaboravili ste lozinku?  <a href="<?= base_url('Igrac/zaboravljenalozinka');?>"> Promijeni lozinku </a> </p>
                    <p> Nemate nalog?  <a href="registruj.html"> Registracija</a> </p>
                    <p> Zelite biti moderator?   <a href="registruj_moderatora.html"> Registracija moderatora</a>  </p>
                    <br />
            </form>
            <div class = 'words_login'>
                &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href ="gost.html">          Nastavi kao gost</a>
            </div>
        </div>
    </div>
</body>


</html>
