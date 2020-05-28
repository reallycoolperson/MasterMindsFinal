<html>

      <!-- Ana Blazic,Ana Saponjic -->
    <head>
        <title>  Registracija Igraca </title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
    </head>


    <body>
	<div class="regBox">

            <img src="<?php echo base_url('slike/pink.png')?>" class="user">
            <div class = "naslov_mastermind"> <h2> Master Minds </h2></div>
            <form method="post" action="<?= site_url("Home/registrujIgraca")?>" size = "100%">
                <table size = "100%" align = "center">
                    <tr>
                        <td> <p>Korisnicko ime &nbsp &nbsp </p>  </td>
                        <td> <input type="text"  value="<?php if(!empty($_SESSION['username1'])) echo $_SESSION['username1']; $_SESSION['username1']=""; ?>" name = "reg_username" placeholder="Unesite Korisnicko Ime" required> </td>

                    </tr>
                    <tr>
                        <td>
                            <p style="font-size:11px" style="background-color:white">

                            <?php if(!empty($_SESSION['username']))
                               echo $_SESSION['username'];
                                $_SESSION['username']="";
                            ?>


                        </p>
                        </td>


                    </tr>

                    <tr>
                        <td> <p>Ime </p> </td>
                        <td> <input type="text" value="<?php if(!empty($_SESSION['ime1'])) echo $_SESSION['ime1']; $_SESSION['ime1']=""; ?>" name = "reg_ime" placeholder="Unesite Ime" required></td>
                    </tr>

                    <tr>
                        <td><p>Prezime </p></td>
                        <td><input type="text" value="<?php if(!empty($_SESSION['prezime1'])) echo $_SESSION['prezime1']; $_SESSION['prezime1']=""; ?>" name = "reg_prezime" placeholder="Unesite Prezime" required> </td>
                     </tr>

                     <tr>
                        <td><p>E-mail </p> </td>
                        <td><input type="email" name = "reg_email" placeholder="Unesite E-mail" required> </td>
                     </tr>
                     <tr>
                        <td>
                            <p style="font-size:11px" style="background-color:white">

                            <?php if(!empty($_SESSION['email']))
                               echo $_SESSION['email'];
                                $_SESSION['email']="";
                            ?>


                        </p>
                        </td>


                    </tr>
                      <tr>
                        <td>  <p>Lozinka </p> </td>
                        <td> <input type="password" name = "reg_lozinka" placeholder="Unesite Lozinku" required> </td>
                     </tr>

                     <tr> </tr>
                        <td colspan = "2">
                            <input type="submit" name = "klik_reg" value="Registruj se" >

                     <tr>
                        <td colspan = "2">
                         <div class = 'words_login'>
                                <a href="<?= site_url("Home/index")?>"> Nazad</a>
                                 </p>
                        </td>
                     </tr>
                </table>

        </form>
    </div>

    </body>


</html>
