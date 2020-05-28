<?php

namespace App\Models;

use CodeIgniter\Model;

class IgracModel extends Model {

    protected $table = 'igrac';
    protected $primaryKey = 'idKI';
    protected $returnType = 'object';
    protected $allowedFields = ['poeni',
        'blokirani',
        'email',
        'idKI',
        'ime',
        'prezime'
    ];

    public function nadji_igraca($idIgraca) {
        return $this->where('idKI', $idIgraca)->findAll();
    }

    static function cmp($a, $b) {
        return ($a->poeni < $b->poeni);
    }

      public function nadji_email($email)
    {
        return $this->where('email', $email)->findAll();
    }

    
    public function najbolji() {

        $svi = $this->findAll();
        usort($svi, array($this, "cmp"));
        return $svi;
    }
 
}
