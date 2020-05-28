<?php

namespace App\Controllers;

use App\Models\RezultatiModel;
use App\Models\IgracModel;
use App\Models\ModeratorModel;
use App\Models\KorisnikModel;

class Igrac extends BaseController {

    protected function prikaz($page, $data) {
        $data['controller'] = 'Igrac';
        $data['korisnik'] = $this->session->get('igrac'); // ko je korisnik
        echo view($page, $data);
    }

///////////////////////////////////////////////////////////////POCETNA/////////
    public function home() {
        $this->prikaz("igrac", []);
    }

    //////////////////////////////////////////////////////////ODJAVA////////////////
    public function logout() {
        $this->session->destroy();

        return redirect()->to(site_url('Gost/login'));
    }

    ///////////////////////////////////////////ISTORIJA REZULTATA///////////////
    public function istorijaRezultata() {
        $rModel = new RezultatiModel();
        $igrac = $this->session->get('igrac');
        $rezultati = $rModel->nadji_rezultateigraca($igrac->idKI);
        $this->prikaz("istorijaRezultata", ['rezultati' => $rezultati]);
    }

    ////////////////////////////////////////////RANG LISTA//////////////////////
    public function rang() {
        $iModel = new IgracModel();
        $najbolji = $iModel->najbolji();
        $kModel=new KorisnikModel();
        $usernames= $kModel->nadji_niz($najbolji);
        $this->prikaz("rang", ['najbolji' => $najbolji,
                               'usernames'=> $usernames]);

        }

    //////////////////////////////////////////ZABORAVLJENA LOZINKA//////////////
    public function zaboravljenalozinka() {
        $this->prikaz("zaboravljenalozinka", []);
    }

    public function emailSubmit($address, $subject, $message, $korisnik) {
$headers = "Reply-To: MasterMinds Oceans4 masterminds.kviz@gmail.com\r\n";
	 $headers .= "Return-Path: MasterMinds Oceans4 masterminds.kviz@gmail.com\r\n";
	 $headers .= "From:  masterminds.kviz@gmail.com" ."\r\n" ;
	 $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;

        if (mail($address, $subject, $message, $headers)) { 
      
         $this->prikaz("zaboravljenalozinka", ['notification'=>"{$korisnik->ime} provjerite email"]);
         } else {
                   $this->prikaz("zaboravljenalozinka", ['errors'=>" {$korisnik->ime} nije poslat email"]);
        }
    }

    public function reset() { //ulazi se sa mejla
       $data['tokan'] = $_GET['tokan'];
       $_SESSION['tokan']=$data['tokan'];
        $this->prikaz("novalozinka", []);
    }

    
    public function resetLink() {
        $email = $_POST['email'];
        $moderatorModel = new ModeratorModel();
        $moderatori = $moderatorModel->nadji_email($email);
        if (!empty($moderatori)) {
            $tokan = rand(1000, 9999);
                $kModel=new KorisnikModel();
                $kModel->postavi_tokanpassword($tokan, $moderatori[0]->idKM);
       echo     $message = "Molimo Vas da kliknete na <a href='".base_url('Igrac/reset?tokan=').$tokan."'> link </a> za promjenu lozinke<br>";
            $this->emailSubmit($email, 'Promjena lozinke', $message,$moderatori[0]);
       
        } else {
            $igracModel = new IgracModel();
            $igraci = $igracModel->nadji_email($email);
            if (!empty($igraci)) {
            if ($igraci[0]->blokirani == 0){   
                 $tokan = rand(1000, 9999);
                $kModel=new KorisnikModel();
                $kModel->postavi_tokanpassword($tokan, $igraci[0]->idKI);
         echo   $message = "Molimo Vas da kliknete na <a href='".base_url('Igrac/reset?tokan=').$tokan."'> link </a> za promjenu lozinke<br>";
            $this->emailSubmit($email, 'Promjena lozinke', $message, $igraci[0]);
            }else{ $this->prikaz("zaboravljenalozinka", ['errors'=>"Vi ste blokiran igrac"]);}
            
            } else {
                   $this->prikaz("zaboravljenalozinka", ['errors'=>"Netacan email"]);
            }
        }

     
    }
    
    public function zapamtinovulozinku(){
        $tokan=$_SESSION['tokan'];
        $password1=$_POST['password1'];
        $password2=$_POST['password2'];
        
        if ($password1 != $password2) 
        {
         $this->prikaz("novalozinka", ['errors'=>"Lozinke se ne poklapaju"]);    
        }
        else{
            $kModel= new KorisnikModel();
            $kModel->updatepassword($password1,$tokan);
        $this->prikaz("novalozinka", ['notification'=>" Lozinka je promijenjena!"]);
            
        }
    }

}
