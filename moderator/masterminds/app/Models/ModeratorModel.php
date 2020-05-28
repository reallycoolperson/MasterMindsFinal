<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeratorModel extends Model
{
    protected $table = 'moderator';
    protected $primaryKey = 'idKM';
    protected $returnType = 'object';
    protected $allowedFields = ['idKatMod',
                                'email',
                                'idKM',
                                'ime',
                                'prezime',
                                'biografija'
                            ];

    public function nadji_email($email)
    {
        return $this->where('email', $email)->findAll();
    }

    public function nadji_moderatora($idModeratora)
    {
        return $this->where('idKM', $idModeratora)->findAll();
    }

    public function nadji_idKategorije($idModeratora)
    {
        $results = $this->where('idKM', $idModeratora)->findAll();
        return $results[0]->idKatMod;
    }

}
