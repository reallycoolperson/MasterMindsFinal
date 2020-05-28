<?php namespace App\Models;

use CodeIgniter\Model;

/**
* KorisnikModel – klasa za izvrsavanje upita nad tabelom korisnik
*
* @version 1.0
*/
class KorisnikModel extends Model
{
    protected $table      = 'korisnik';
    protected $primaryKey = 'idKorisnika';

    protected $returnType     = 'array';

    protected $allowedFields = ['idKorisnika', 'username','password','uloga','aktivan'];


    /**
      * max_korisnik_id funkcija za trazenje najveceg id-a korisnika
      *
      * @return int
     */
     function max_korisnik_id()
     {
      $this->selectMax('idKorisnika');
      $query = $this->get();
      $row = $query->getRow();
      if($row!==null)
      {
       return $row->idKorisnika;
      }
      else return 0;
    }//end_max_korisnik_id



    /**
        * obrisi_moderatora funkcija za brisanje moderatora iz tabele korisnik
        *
        *@param int $id
        *@return void
    */
    function obrisi_moderatora($id)
    {
     $sql = "UPDATE korisnik SET obrisan = ? WHERE idKorisnika = ?";
     $this->query($sql, [1, $id]);
     }//end_obrisi_moderatora



}//end_KorisnikModel
