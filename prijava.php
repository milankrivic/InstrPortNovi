<?php
include("baza.php");

if(session_id()==""){
	session_start();
}

	if(isset($_POST['KorIme'])){

		$korisnik=$_POST['KorIme']; 
		$sifra=$_POST['Lozinka'];
                $sifra= md5($sifra);

		if(!empty($korisnik) && !empty($sifra)){

			$query="SELECT KorIme, Ime, Prezime FROM korisnik WHERE KorIme='$korisnik' AND Sifra='$sifra' and Aktivan = 1";
			$izvrsi=SpojiNaBazu($query);
			if(mysqli_num_rows($izvrsi)!=0){
				
				list($korime,$ime,$prezime)=mysqli_fetch_array($izvrsi);
				
				$_SESSION['aktivni_korisnik']=$korime;
				$_SESSION['aktivni_korisnik_ime']=$ime." ".$prezime;	
                                $_SESSION["prvi"]=date("d.m.Y H:i:s");
			}
			else
			{
				$_SESSION["poruka"]="Neispravni podaci za prijavu!";
				header("Location:index.php");
				return false;
			}

		}
		
		header("Location:index.php");
	} 
	

?>

