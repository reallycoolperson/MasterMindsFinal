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

    ///////////////////////////////////email///////////////////////////////
    public function emailSubmit($address, $subject, $message) {

        $headers = "Reply-To: MasterMinds Oceans4 masterminds.kviz@gmail.com\r\n";
        $headers .= "Return-Path: MasterMinds Oceans4 masterminds.kviz@gmail.com\r\n";
        $headers .= "From:  masterminds.kviz@gmail.com" . "\r\n";
        $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";

        if (mail($address, $subject, $message, $headers)) {     //posle posalji mail neka ga vrati na Gost/login
            return view('login');
        } else {
            return view('zaboravljenalozinka');
        }
    }

//end_emailSubmit

    public function reset() { //ulazi se sa mejla
        $tokan = $_GET['tokan'];
        $this->prikaz("novalozinka", []);
    }

//DODATI NA STRANICI KAD EMAIL NE POSTOJI OBAVJESTENJE
    // mozda je email od igraca
    public function resetLink() {
        $email = $_POST['email'];
        //moramo vidjeti da li igrac ili moderator hoce da promijeni mejl
        $moderatorModel = new ModeratorModel();
        $moderatori = $moderatorModel->nadji_email($email);
        if (!empty($moderatori)) {
            echo "Exists mail u moderatorima " . $moderatori[0]->ime . "<br>";
            $tokan = rand(1000, 9999);
            $message = "Molimo Vas da kliknete na <a href='" . base_url('reset?tokan=') . $tokan . "'> link </a> za promjenu lozinke<br>";
            $this->emailSubmit($email, 'Promjena lozinke', $message);
        } else {
            $igracModel = new IgracModel();
            $igraci = $igracModel->nadji_email($email);
            if (!empty($igraci)) {
                echo "Exists mail u igracima " . $igraci[0]->ime . "<br>";
            } else {
                echo "ne postoji mejl<br>";
            }
        }

        //AKO JE BLOKIRAN NE MOZE
    }

    public function novalozinka() { //samo za provjeru dok ne proradi mejl
        $this->prikaz("novalozinka", []);
    }

}
