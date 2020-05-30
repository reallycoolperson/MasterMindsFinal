<?php

namespace App\Controllers;

use App\Models\RezultatModel;
use App\Models\IgracModel;
use App\Models\ModeratorModel;
use App\Models\KorisnikModel;

class Igrac extends BaseController {

    protected function prikaz($page, $data) {
        $data['controller'] = 'Igrac';
        $data['korisnik'] = $this->session->get('igrac'); // ko je korisnik
        echo view("stranice/$page", $data);
    }

///////////////////////////////////////////////////////////////POCETNA/////////
    public function home() {
        $this->prikaz("igrac", []);
    }

    public function index() {
        $this->prikaz("igrac", []);
    }



    ///////////////////////////////////////////ISTORIJA REZULTATA///////////////
    public function istorijaRezultata() {
        $rModel = new RezultatModel();
        $igrac = $this->session->get('igrac');
        $rezultati = $rModel->nadji_rezultateigraca($igrac['idKI']);
        $this->prikaz("mod_istorijarezultata", ['rezultati' => $rezultati]);
    }

    ////////////////////////////////////////////RANG LISTA//////////////////////
    public function rang() {
        $iModel = new IgracModel();
        $najbolji = $iModel->najbolji();
        $kModel=new KorisnikModel();
        $usernames= $kModel->nadji_niz($najbolji);
        $this->prikaz("mod_ranglista", ['najbolji' => $najbolji,
                               'usernames'=> $usernames]);

        }

}
