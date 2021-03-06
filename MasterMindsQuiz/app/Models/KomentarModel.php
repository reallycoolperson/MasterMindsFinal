<?php namespace App\Models;
use CodeIgniter\Model;




/**
* KomentarModel – klasa za izvrsavanje upita nad tabelom komentar
*
* @version 1.0
*/
class KomentarModel extends Model
{
        protected $table      = 'komentar';
        protected $primaryKey = 'idKomentara';
        protected $returnType = 'array';

        /**
          * dohvati_komentare funkcija koja dohvata odredjen broj komentara korisnika
          *
          * @param int $ukupno
          * @return rows
        */
        function dohvati_komentare($ukupno)
        {
          if($ukupno!=0)
          {
          $this->select('*');
          $this->join('igrac', 'komentar.idKKom = igrac.idKI');
          $this->join('korisnik', 'igrac.idKI = korisnik.idKorisnika');
          $this->orderBy('username');
          if($ukupno > -1) $query = $this->get($ukupno);
          else $query = $this->get();
          return $query->getResult();
          }
          return null;
        }//end_dohvati_komentare


}//end_KomentarModel
