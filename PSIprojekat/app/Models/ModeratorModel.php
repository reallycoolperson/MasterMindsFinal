<?php namespace App\Models;

use CodeIgniter\Model;

/**
* ModeratorModel – klasa za izvrsavanje upita nad tabelom moderator
*
* @version 1.0
*/
class ModeratorModel extends Model
{
    protected $table      = 'moderator';
    protected $primaryKey = 'idKM';
    protected $returnType = 'array';
    protected $allowedFields = ['idKM','idKatMod','biografija', 'ime','prezime','email'];


    /**
        * dohvati_moderatore funkcija za dohvatanje svih moderatora iz baze
        *
        * @return int
    */
    function dohvati_moderatore()
    {
      $this->select('*');
      $this->join('korisnik', 'moderator.idKM = korisnik.idKorisnika');
      $this->join('kategorija', 'moderator.idKatMod = kategorija.idKategorije');
      $this->where('obrisan =', '0');
      $query = $this->get();
      return $query->getResult();
    }//end_dohvati_moderatore

}//end_ModeratorModel
