<?php namespace App\Models;

use CodeIgniter\Model;

/**
* PitanjeModel – klasa za izvrsavanje upita nad tabelom pitanje
*
* @version 1.0
*/
class PitanjeModel extends Model
{
    protected $table      = 'pitanje';
    protected $primaryKey = 'idPitanja';
    protected $returnType = 'array';
    protected $allowedFields = ['idPitanja','tekstPitanja','tacan', 'netacan1','netacan2','netacan3','nivo','idKP','idKat'];

    /**
          * obrisi_pitanje funkcija za brisanje pitanja iz baze
          *
          * @param int $id
          * @return void
    */
      function obrisi_pitanje($id)
      {
       $this->where('idPitanja', $id);
       $this->delete();
     }//end_obrisi_pitanje


     /**
           * dohvati_pitanja funkcija za dohvatanje odredjenog broja pitanja iz baze
           *
           * @param int $ukupno
           * @return rows
     */
      function dohvati_pitanja($ukupno)
      {
        if($ukupno!=0)
        {
        $this->select('*');
        $this->join('korisnik', 'pitanje.idKP = korisnik.idKorisnika');
        if($ukupno > -1) $query = $this->get($ukupno);
        else $query = $this->get();
        return $query->getResult();
        }
        return null;
      }//end_dohvati_pitanja
}//end_PitanjaModel
