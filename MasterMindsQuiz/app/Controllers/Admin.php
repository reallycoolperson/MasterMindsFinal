<?php namespace App\Controllers;
use App\Models\ZahtevModeratoraModel;
use App\Models\ModeratorModel;
use App\Models\KorisnikModel;
use App\Models\PitanjeModel;
use App\Models\KomentarModel;
use App\Models\IgracModel;

/**
* Admin – klasa za administratorske aktivnosti
*
* @version 1.0
*/
class Admin extends BaseController
{
//////////////////////////////////////////PRIKAZI////////////////////////////////////////////////////

/**
     * index funkcija koja prikazuju administratorsku pocetnu stranicu
     *
     * @return View
*/
	public function index()
	{
		echo view('stranice/administrator.php');
	}//end_index

	public function home()
	{
		echo view('stranice/administrator.php');
	}//end_index



	/**
	     * zahtjevi_prikaz funkcija za prikaz zahtjeva onih koji su se registrovali kao moderatori
	     *
	     * @return View
	*/
	public function zahtjevi_prikaz()
	{
		$ZahtjeviModel = new ZahtevModeratoraModel();
		$zahtjevi = $ZahtjeviModel->dohvati_zahtjeve();
		echo view ('stranice/admin_registruj_mod.php', ['zahtjevi' => $zahtjevi]);

	}//end_zahtjevi_prikaz



	/**
			 * moderatori_prikaz funkcija za prikaz svih moderatora
			 *
			 * @return View
	*/
  public function moderatori_prikaz()
  {
   $ModeratorModel = new ModeratorModel();
	 $moderatori = $ModeratorModel->dohvati_moderatore();
	 echo view('stranice/admin_ukloni_mod.php', ['moderatori' => $moderatori]);
  }//end_moderatori_prikaz



	/**
			 * pitanja_prikaz funkcija za prikaz svih pitanja moderatora
			 *
			 * @return View
	*/
  public function pitanja_prikaz()
	{
		$PitanjaModel = new PitanjeModel();
		$pitanja = $PitanjaModel->dohvati_pitanja(-1);
		echo view("stranice/admin_pitanja_mod.php", ['pitanja' => $pitanja]);
	}//end_pitanja_prikaz



	/**
			 * komentari_prikaz funkcija za prikaz svih komentara igraca
			 *
			 * @return View
	*/
  public function komentari_prikaz()
	{
		$KomentariModel = new KomentarModel();
		$komentari = $KomentariModel->dohvati_komentare(-1);
		echo view("stranice/admin_komentari_kor.php", ['komentari' => $komentari]);
	}//end_komentari_prikaz



	/**
			 * obavjesti_prikaz funkcija za prikaz stranice za slanje maila i resetovanje poena
			 *
			 * @return View
	*/
	public function obavjesti_prikaz()
	{
			echo view("stranice/admin_obavjesti_kor.php");
	}



	/**
			 * ukloni_prikaz funkcija za prikaz stranice za pretragu i uklanjanje igraca
			 *
			 * @return View
	*/
	public function ukloni_prikaz()
	{
		echo view("stranice/admin_ukloni_kor.php");
	}//end_ukloni_prikaz



//////////////////////////////////////////////ZAHTJEVI////////////////////////////////////////////////
/**
      * delete_zahtjev funkcija za brisanje zahtjeva moderatora iz tabele
      *
      * @return string
*/
	public function delete_zahtjev()
	{
		if(isset($_POST['del_id']))
		{
		$id = $_POST['del_id'];
		$ZahtjeviModel = new ZahtevModeratoraModel();
		$ZahtjeviModel->obrisi_zahtjev($id);
		echo "sve je poslo po planu ".$id;
	  }
  }//end_delete_zathjev



	/**
	      * insert_zahtjev funkcija za prihvatanje zahtjeva moderatora uz azuriranje tabele korisnika
				* i tabele moderatora pritom se brise zahtjev iz tabele zahtjeva
	      *
	      * @return void
	*/
	public function insert_zahtjev()
	{
    if(isset($_POST['ins_id']))
		{
			$id = $_POST['ins_id'];
			$ZahtjeviModel = new ZahtevModeratoraModel();
			$ModeratorModel = new ModeratorModel();
			$KorisnikModel = new KorisnikModel();
			$moderator = $ZahtjeviModel->find($id);
			$max_id = $KorisnikModel->max_korisnik_id() + 1;

			$dataKor = [
		 'idKorisnika'	=> $max_id,
		 'username' => $moderator['username'],
		 'password' => $moderator['password'],
		 'uloga'  => 'moderator',
		 'aktivan' => '0',
		 'obrisan' => '0'
			];
			$KorisnikModel->insert($dataKor);


			$dataMod = [
		 'idKM'	=> $max_id,
		 'idKatMod' => $moderator['idKatZah'],
		 'biografija'=> $moderator['biografija'],
		 'email'    =>  $moderator['email'],
		 'ime' =>   $moderator['ime'],
		 'prezime' => $moderator['prezime']
			];
		 $ModeratorModel->insert($dataMod);

		 $ZahtjeviModel->obrisi_zahtjev($id);
		}
	}//end_insert_zahtjev



	/**
				* dohvati_zahtjeve funkcija za dohvatanje svih zahtjeva onih koji su registrovali za moderatora
				*
				* @return json
	*/
   public function dohvati_zahtjeve()
	 {
		 $ZahtjeviModel = new ZahtevModeratoraModel();
		 $zahtjevi = $ZahtjeviModel->dohvati_zahtjeve();
		 echo json_encode($zahtjevi);
	 }//end_dohvati_zathjeve




///////////////////////////////MODERATORI/////////////////////////////////////////////////////////////
/**
			* delete_moderator funkcija za brisanje moderatora, u tabeli korisnik azurira se polje obrisan
			*
			* @return void
*/
   public function delete_moderator()
  {
		if(isset($_POST['mod_id']))
		{
	  $id = $_POST['mod_id'];
    $KorisnikModel = new KorisnikModel();
	  $KorisnikModel->obrisi_moderatora($id);
    }
  }//end_delete_moderator




	/**
				* dohvati_moderatore funkcija za dohvatanje svih moderatora
				*
				* @return json
	*/
		public function dohvati_moderatore()
	{
			$ModeratorModel = new ModeratorModel();
		 	$moderatori = $ModeratorModel->dohvati_moderatore();
			echo json_encode($moderatori);
  }//end_dohvati_moderatore


//////////////////////////////////////PITANJA////////////////////////////////////////////////////////

/**
			* prikazi_vise_pitanja funkcija za dohvatanje odredjenog broja pitanja
			*
			* @return json
*/

public function prikazi_vise_pitanja()
{
	if(isset($_POST['ukupno']))
	{
	$ukupno = $_POST['ukupno'];
	$PitanjaModel = new PitanjeModel();
	$pitanja = $PitanjaModel->dohvati_pitanja($ukupno);
	echo json_encode($pitanja);
  }
}//end_prikazi_vise_pitanja


/**
			* ukupno_pitanja funkcija za dohvatanje ukuonog broja pitanja
			*
			* @return int
*/
public function ukupno_pitanja()
{
	$PitanjaModel = new PitanjeModel();
	$pitanja = $PitanjaModel->findAll();
	$broj = count($pitanja);
	echo $broj;
}//end_ukupno_pitanja


/**
			* obrisi_pitanje funkcija za brisanje pitanja i vracanje odredjenog broja pitanja(bez tog)
			*
			* @return json
*/
public function obrisi_pitanje()
{
	if(isset($_POST['pit_id']))
	{
	$id = $_POST['pit_id'];
	$ukupno = $_POST['ukupno_broj'];
	$PitanjaModel = new PitanjeModel();
	$PitanjaModel->obrisi_pitanje($id);
	$pitanja = $PitanjaModel->dohvati_pitanja($ukupno);
	echo json_encode($pitanja);
  }
}//end_obrisi_pitanje

//////////////////////////////////////////////////KOMENTARI//////////////////////////////////////////

/**
			* prikazi_vise_komentara funkcija za dohvatanje odredjenog broja komentara
			*
			* @return json
*/
  public function prikazi_vise_komentara()
  {
   if(isset($_POST['ukupno_kom']))
   {
   $ukupno = $_POST['ukupno_kom'];
	 $KomentariModel = new KomentarModel();
   $komentari = $KomentariModel->dohvati_komentare($ukupno);
   echo json_encode($komentari);
   }
 }//end_prikazi_vise_komentara

 /**
 			* ukupno_komentara funkcija za dohvatanje ukupnog broja komentara
 			*
 			* @return int
 */
  public function ukupno_komentara()
  {
   	$KomentariModel = new KomentarModel();
		$komentari = $KomentariModel->findAll();
		$broj = count($komentari);
		echo $broj;
  }//end_ukupno_komentara


	///////////////////////////////////EMAIL///////////////////////////////////////////////////
	/**
  			* ukupno_komentara funkcija za validaciju podataka i slanje maila
  			*
  			* @return View
  */
	public function emailSubmit()
 {

	 $rules = ['email'=>'required|valid_email', 'message'=>'required'];
	 $errors = [
	  'message' => [
	  'required' => 'Unesite poruku',
	              ],
	  'email'    => [
	         'required' => "Unesite mail",
	          'valid_email' => "Unesite validan mail",
	                ]
	    ];
	 if(!$this->validate($rules, $errors)){
	   $greska = $this->validator->getError('email');
	   $polje_email = "";
	   if($greska != "Unesite validan mail")  $polje_email=$this->request->getVar('email');
	    return  view('stranice/admin_obavjesti_kor.php',
	         ['errors'=>$this->validator->getErrors(),
	          'email' =>$polje_email,
	          'poruka' => $this->request->getVar('message')
	        ]);
	 }
	 $IgracModel=new IgracModel();
	 $igrac_email= $IgracModel->postoji_li_email($this->request->getVar('email'));
	 if($igrac_email==null)
	 {
	   return  view('stranice/admin_obavjesti_kor.php',
	        ['email_greska'=>'Unijeti e-mail ne odgovara nijednom igracu. Unesite postojeci email.',
	         'email' => '',
	         'poruka' => $this->request->getVar('message')
	       ]);
	 }

$to_email = $this->request->getVar('email');
$subject = "Kviz 'MasterMinds' Obavjestenje";
$body = $this->request->getVar('message');
$headers = "Reply-To: MasterMinds Oceans4 masterminds.kviz@gmail.com\r\n";
	 $headers .= "Return-Path: MasterMinds Oceans4 masterminds.kviz@gmail.com\r\n";
	 $headers .= "From:  masterminds.kviz@gmail.com" ."\r\n" ;
	 $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
if (mail($to_email, $subject, $body, $headers)) {
	return  view('stranice/admin_obavjesti_kor.php',
			 [
				 'poruka_success' => 'Poruka uspjesno poslata na '.$to_email. '!'
			]);
} else {
	return  view('stranice/admin_obavjesti_kor.php',
			 [
				 'poruka_error' => 'Poruka nije poslata, pokusajte ponovo!',
				 'email' =>$to_email,
				 'poruka' => $this->request->getVar('message')
			]);
}
}//end_emailSubmit



/**
			* reset_poeni funkcija za resetovanje poena
			*
			* @return String
*/
public function reset_poeni()
{
	$IgracModel = new IgracModel();
  $IgracModel->reset_poeni();
  return "Poeni svih igraca su uspjesno resetovani";
}//end_reset_poeni


///////////////////////////////////////UKLONI_KORISNIKA///////////////////////////////////
/**
			* pretraga_korisnika funkcija za trazenje korisnika
			*
			* @return json
*/
public function pretraga_korisnika()
{
	$IgracModel = new IgracModel();
	 if(isset($_POST['search']))
	 {
		   $txt = $_POST['search'];
	  	$igraci =  $IgracModel->dohvati_igrace($txt);
			echo json_encode($igraci);
	 }
}//end_pretrage_korisnika


/**
			* delete_igrac funkcija za brisanje igraca
			*
			* @return void
*/
public function delete_igrac()
{
	if(isset($_POST['kor_id_del']))
	{
		$id = $_POST['kor_id_del'];
		$IgracModel = new IgracModel();
		$igraci =  $IgracModel->obrisi_igraca($id);
		$this->pretraga_korisnika();
	}
}//end_delete_igrac

//////////////////////////////////////////////ODJAVA/////////////////////////////////////
   public function odjavi_admina()
   {
			$db= \Config\Database::connect();
			$builder=$db->table("korisnik");
			$builder->set('aktivan', '0', FALSE);
			$builder->where('username', $_SESSION['ulogovaniKorisnik']);
			$builder->update();
			$_SESSION['ulogovaniKorisnik']="";
			$_SESSION['tip_ulogovan']="";
			$_SESSION['admin']="";

			return $this->prikaz("login", []);
   }

	 public function prikaz($page,$data)
	 {
	 		echo view("stranice/$page",$data);
	 }

}//end_controller
