<?php

namespace App\Models;

use CodeIgniter\Model;

class RezultatiModel extends Model
{

    protected $table = 'rezultati';
    protected $primaryKey = 'idrezultati';
    protected $returnType = 'object';
    protected $allowedFields = ['idrezultati',
                                'poeni',
                                'datum',
                                'idKRez' //id korisnika
                            ];

    public function nadji_rezultateigraca($idIgraca)
    {
        return $this->where('idKRez', $idIgraca)->findAll();
    }

    //ukupni poeni su u tabeli igrac
}
