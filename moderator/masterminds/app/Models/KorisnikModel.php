<?php

namespace App\Models;

use CodeIgniter\Model;

class KorisnikModel extends Model
{
    protected $table = 'korisnik';
    protected $primaryKey = 'idKorisnika';
    protected $returnType = 'object';
    protected $allowedFields = ['idKorisnika',
                                'uloga',
                                'username',
                                'password',
                                "aktivan"
                            ];

    public function nadji_korisnika($idKorisnika)
    {
        return $this->where('idKorisnika', $idKorisnika)->findAll();
    }
    public function nadji_niz($najbolji)
    {
        $usernames=Array();
        $i=0;
        foreach ($najbolji as $igrac)
        {
           $usernames[$i]=$this->nadji_korisnika($igrac->idKI)[0]->username;
           $i++;
        }
        
        return $usernames;
    }

    public function nadji_username($username)
    {
        return $this->where('username', $username)->findAll();
    }

    public function nadji_password($password)
    {
        return $this->where('password', $password)->findAll();
    }

}
