<html>
    <head>
        <!-- Ana Blazic,Ana Saponjic -->
        <title>Igrac</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/stil.css'); ?>">


	<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

        <script>

        $(document).ready(function(){

            $("#kategorije_meni").hide(); //na pocetku

          $("a[id='trening_link']").click(function(){ //klikom na trening
            $("#osnovni_meni").hide();

            $("#kategorije_meni").fadeToggle("slow");
          });

         $("a[id='nazad']").click(function(){ // vrati osnovni_meni
                 $("#kategorije_meni").hide();
           $("#osnovni_meni").show();
          });


        });

        function ocijeni()
        {
         prompt("Ocenite nas!", "Komentar...");
        }
        </script>


    </head>
    <body>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-3'>
                    <p id='par1'>Ulogovan registrovani korisnik</p>

                    <br>
                    <br>
                    <br>

                  <img src="<?php echo base_url('slike/logo_master.png'); ?>" style = "width: '100%'; margin-top: 30px; " >  </div>
                <div class='col-sm-5 text-center ' id='osnovni_meni'>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    <a href='#' class='linkovi' id='trening_link'>TRENING</a>
                    <br>

                    <a href ="<?= site_url("Takmicenje/takmicenjePrikaz")?>" class='linkovi'>TAKMICENJE</a>
                    <br>
                    <a href='<?php echo base_url('Igrac/istorijaRezultata'); ?>' class='linkovi'>REZULTATI</a>
                    <br>
                    <a href='<?php echo base_url('Igrac/rang'); ?>' class='linkovi'>RANG LISTA</a>
                    <br>
                    <!--**************************************************************-->
                    <a href ="<?= site_url("Home/odjava")?>" class='linkovi' onclick='ocijeni()'>ODJAVA</a>
                    <br>
                </div>
                <div class='col-sm-5 text-center ' id='kategorije_meni'>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>


                    <a href ="<?= site_url("Trening/treningPrikaz/8")?>" class='linkovi' id="biologija">BIOLOGIJA</a>
                    <br>
                    <a href ="<?= site_url("Trening/treningPrikaz/7")?>" class='linkovi' id="istorija">ISTORIJA</a>
                    <br>
                    <a href ="<?= site_url("Trening/treningPrikaz/3")?>" class='linkovi' id="geografija">GEOGRAFIJA</a>
                    <br>
                    <a href ="<?= site_url("Trening/treningPrikaz/4")?>" class='linkovi' id="matematika">PRIRODNE NAUKE</a>
                    <br>
                    <a href ="<?= site_url("Trening/treningPrikaz/2")?>" class='linkovi' id="muzika">MUZIKA</a>
                    <br>
                    <a href ="<?= site_url("Trening/treningPrikaz/9")?>" class='linkovi' id="umetnost">UMETNOST</a>
                    <br>

                    <a href ="<?= site_url("Trening/treningPrikaz/6")?>" class='linkovi' id="sport">SPORT</a>
                    <br>

                    <a href ="<?= site_url("Trening/treningPrikaz/5")?>" class='linkovi' id="filmovi">FILMOVI</a>
                    <br>
                    <a href ="<?= site_url("Trening/treningPrikaz/1")?>"  class='linkovi' id="serije">SERIJE</a>
                    <br>
                    <a href='#' class='linkovi' id="nazad">Nazad </a>


                </div>
                <div class='col-sm-4' style = "color: white;">
                    <br>
					<br>
					<br>
					<br>

					<br>
                    <h2><i>Steknite znanje na zabavan nacin</i></h2>
                    <p id='p1'>
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

                    <p>

                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
