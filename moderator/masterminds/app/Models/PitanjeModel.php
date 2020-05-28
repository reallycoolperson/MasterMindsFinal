<?php

namespace App\Models;

use CodeIgniter\Model;

class PitanjeModel extends Model
{

    protected $table = 'pitanje';
    protected $primaryKey = 'idPitanja';
    protected $returnType = 'object';
    protected $allowedFields = [
                                "idPitanja",
                                "tekstPitanja",
                                "tacan",
                                "netacan1",
                                "netacan2",
                                "netacan3",
                                "idKP", //id korisnika koji je ubacio pitanje
                                "idKat" // id kategorije pitanja
                            ];

    public function nadji_poslednjiId()
    {
        $rows = $this->findAll();
        return count($rows);
    }
    
    public function nadji_pitanja($idModeratora)
    {
         return $this->where('idKP',$idModeratora)->findAll();
    }

    public function izbrisipitanje($tekst)
    {
     $pitanje=$this->where('tekstPitanja',$tekst)->find();
     $this->delete($pitanje->idPitanja);
    }
    
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
  function get_pitanja($ukupno,$id)
  {
    $this->select('*');
    $this->where('idKP',$id);
    $query = $this->get($ukupno);
    return $query->getResult();
  }//end_dohvati_pitanja

 
 
}
