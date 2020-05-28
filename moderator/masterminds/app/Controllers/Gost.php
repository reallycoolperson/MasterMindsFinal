<?php

namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Models\ModeratorModel;
use App\Models\IgracModel;

class Gost extends BaseController {

/////////////////////////////////////////////////LOGIN -> igrac ili moderator///    
    protected function prikaz($page, $data) {
        $data['controller'] = 'Gost';
        echo view($page, $data);
    }

    public function login() {
        $this->prikaz('login', []);
    }

    public function loginSubmit() {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $kModel = new KorisnikModel();
            $k = $kModel->nadji_username($this->request->getVar('username'));
            if (empty($k))
                echo "ne postoji";
            else {
                if ($k[0]->password != $this->request->getVar('password'))
                    echo 'Pogresna lozinka';
                else { //prijavi moderatora 
                    $mModel = new ModeratorModel();
                    $m = $mModel->nadji_moderatora($k[0]->idKorisnika);

                    if (!empty($m)) {
                        $this->session->set('moderator', $m[0]);
                        return redirect()->to(site_url('Moderator/home'));
                    } else { //prijavi igraca
                        $iModel = new IgracModel();
                        $i = $iModel->nadji_igraca($k[0]->idKorisnika);

                        if (!empty($i)) {
                            $this->session->set('igrac', $i[0]);
                            return redirect()->to(site_url('Igrac/home'));
                        } else
                            echo "nema ga ni u moderatorima ni u igracima";
                    }
                }
            }
        }
    }

}
