<?php
include("header.php");

if(!isset($_SESSION["aktivni_korisnik"])){
    echo "<label for='poruka' class='poruka'>Neovlašten pristup!</label>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  $datum = test_input($_POST["Datum"]);    $datumpr=date("d.m.Y",strtotime($datum));
  $iznos = test_input($_POST["Iznos"]);
  $kamata = test_input($_POST["Kamata"]);    $brojmjeseci = test_input($_POST["BrojMjeseci"]);    if(!empty($_POST["IznosRekapitulacija"])){	   $iznosrekapitulacija = test_input($_POST["IznosRekapitulacija"]);  }  else  {	  $iznosrekapitulacija=0;  }   if(!empty($_POST["BrMjeseciKracaOtplata"])){	   $brmjesecikracaotplata = test_input($_POST["BrMjeseciKracaOtplata"]);  }  else  {	  $brmjesecikracaotplata=0;  }    ?><div class='rg-container' id="pocetak">	<table class='rg-table' summary='Hed'>		<caption class='rg-header'>			<span class='rg-hed'>Krediti</span>			<span class='rg-dek'>Ispis izračuna kredita za unesene vrijednosti:</span>		</caption>		<thead>			<tr>				<th class='number '>Iznos</th>				<th class='number '>Kamata</th>				<th class='number '>Broj mjeseci</th>				<th class='text '>Datum početka otplate</th>				<th class='number '>Iznos za rekapitulaciju</th>				<th class='number '>Broj mjeseci za kraću otplatu</th>			</tr>		</thead>		<tbody>				<?php		$mjesecnikamatnjak=$kamata/12;		$izracunR=1+($mjesecnikamatnjak/100);		$rata=$iznos*(pow($izracunR,$brojmjeseci)*($izracunR-1))/(pow($izracunR,$brojmjeseci)-1);		$ukupnovratiti=$brojmjeseci*$rata;		$ukupnokamate=$ukupnovratiti-$iznos;				?>				<tr class=''>					<td class='number ' data-title='Iznos:'><?php echo number_format($iznos,2,",",".")." kn"; ?></td>					<td class='number ' data-title='Kamata:'><?php echo $kamata; ?></td>					<td class='number ' data-title='Broj mjeseci:'><?php echo $brojmjeseci; ?></td>					<td class='text ' data-title='Datum početka otplate:'><?php echo $datumpr; ?></td>										<td class='text ' data-title='Rata:'><?php echo number_format($rata,2,",",".")." kn"; ?></td>										<td class='text ' data-title='Kamate:'><?php echo number_format($ukupnokamate,2,",",".")." kn";; ?></td>										<td class='text ' data-title='Ukupno vratiti:'><?php echo number_format($ukupnovratiti,2,",",".")." kn"; ?></td>					<td class='number ' data-title='Iznos za rekapitulaciju:'><?php echo number_format($iznosrekapitulacija,2,",",".")." kn"; ?></td>					<td class='number ' data-title='Broj mjeseci za kraću otplatu:'><?php echo $brmjesecikracaotplata; ?></td>										<td class='text ' data-title='Klikni na kraj dokumenta:'><a href="krediti.php#kraj">Kraj</a></td>				</tr>				<tr class=''>					<td class='text ' data-title='DETALJNI PRIKAZ:'>OTPLATNI PLAN</td>									</tr>		<?php		$sumaglavnica=0;		$sumakamata=0;		$ostalomjeseci=0;		$pokrivenomjeseci=0;		$ustedakmata=0;		$ostalokamatavratiti=0;		for($period=1;$period<=$brojmjeseci;$period++){			$kamataiznos=($iznos*$mjesecnikamatnjak)/100;			$sumakamata+=$kamataiznos;			$glavnicaiznos=$rata-$kamataiznos;			$sumaglavnica+=$glavnicaiznos;			if($sumaglavnica<=$iznosrekapitulacija && $iznosrekapitulacija>0){				$ostalomjeseci=$brojmjeseci-$period;				$pokrivenomjeseci=$period;				$ustedakmata=$sumakamata;				$ostalokamatavratiti=$ukupnokamate-$ustedakmata;			}						if($brmjesecikracaotplata>0 && $brmjesecikracaotplata==$period){				$iznosrekapitulacija=$sumaglavnica;				$ostalomjeseci=$brojmjeseci-$period;				$pokrivenomjeseci=$period;				$ustedakmata=$sumakamata;				$ostalokamatavratiti=$ukupnokamate-$ustedakmata;			}						?>			<tr class=''>					<td class='number ' data-title='Iznos:'><?php echo number_format($iznos,2,",",".")." kn"; ?></td>					<td class='number ' data-title='Rata:'><?php echo number_format($rata,2,",",".")." kn"; ?></td>										<td class='number ' data-title='Glavnica:'><?php echo number_format($glavnicaiznos,2,",",".")." kn"; ?></td>										<td class='number ' data-title='Kamata:'><?php echo number_format($kamataiznos,2,",",".")." kn"; ?></td>					<td class='number ' data-title='Broj mjeseca:'><?php echo $period; ?></td>					<td class='text ' data-title='Datum dospjeća:'><?php echo $datumpr; ?></td>									</tr>						<?php			$iznos=$iznos-$glavnicaiznos;			$datumpr=date("d.m.Y",strtotime("+1 month",strtotime($datumpr)));		}		?>		</tbody>	</table>	<?phpif($iznosrekapitulacija>0 || $brmjesecikracaotplata>0){?>	<div class='rg-source' id="kraj">		<span class='naslov'>Izračun nakon rekapitulacije:</span>				<?php		if($iznosrekapitulacija>0 && $brmjesecikracaotplata==0){		?>				<br><span class='pre-colon'>Uloženi iznos u rekapitulaciju</span>: 				<?php		}		else		{		?>		<br><span class='pre-colon'>Potreban iznos za rekapitulaciju</span>: 			<?php		}		?>		<span class='post-colon'><?php echo number_format($iznosrekapitulacija,2,",",".")." kn"; ?></span>			<br><span class='pre-colon'>Pokriveno mjeseci rekapitulacijom (bez kamata)</span>: <span class='post-colon'><?php echo $pokrivenomjeseci; ?></span>		<br><span class='pre-colon'>Ostalo mjeseci za otplatu</span>: <span class='post-colon'><?php echo $ostalomjeseci; ?></span>		<br><span class='pre-colon'>Početni iznos kamata</span>: <span class='post-colon'><?php echo number_format($ukupnokamate,2,",",".")." kn"; ?></span>		<br><span class='pre-colon'>Ušteda na kamatama</span>: <span class='post-colon'><?php echo number_format($ustedakmata,2,",",".")." kn"; ?></span>				<br><span class='pre-colon'>Ostalo kamata za vratiti</span>: <span class='post-colon'><?php echo number_format($ostalokamatavratiti,2,",",".")." kn"; ?></span>		<br><hr>		<br><span class='pre-colon'>Povratak na početak izračuna</span>: <span class='post-colon'><a href="krediti.php#pocetak">Početak</a></span>	</div><?php}?></div><?php  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

   
    if($_SERVER["QUERY_STRING"] == ""){   
        ?>
<div id="contact-form">
	<div>
		<h1>Proračun kredita</h1> 
		<h4>Unesite podatke o kreditu</h4> 
	</div>
		<p id="failure">Unos mjesečnih zarada.</p>  
		<p id="success">Your message was sent successfully. Thank you!</p>

		   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div>
		      <label for="datum">
		      	<span class="required">Datum početka otplate: *</span> 
		      	<input type="date" id="Datum" name="Datum" value="" placeholder="" tabindex="1" autofocus="autofocus" value=""  oninvalid="this.setCustomValidity('Unesite datum')"/>
		      </label> 
			</div>
			<div>
		      <label for="iznos">
		      	<span class="required">Iznos: *</span>
		      	<input type="text" id="Iznos" name="Iznos" value="" placeholder="30.000,00 kn" tabindex="2"  oninvalid="this.setCustomValidity('Unesite iznos')"/>
		      </label>  
			</div>
			<div>		      <label for="kamata">		      	<span class="required">Kamata: *</span>		      	<input type="text" id="Kamata" name="Kamata" value="" placeholder="7,35" tabindex="2" oninvalid="this.setCustomValidity('Unesite kamatu')"/>		      </label>  			</div>
   			<div>		      <label for="br_mjeseci">		      	<span class="required">Broj mjeseci: *</span>		      	<input type="text" id="BrojMjeseci" name="BrojMjeseci" value="" placeholder="60" tabindex="2" oninvalid="this.setCustomValidity('Unesite broj mjeseci')"/>		      </label>  			</div>                       			<div>		      <label for="iznos_rekapitulacija">		      	<span class="required">Iznos za rekapitulaciju: </span>		      	<input type="text" id="IznosRekapitulacija" name="IznosRekapitulacija" value="" placeholder="40.000,00 kn" tabindex="2" onkeyup="ProvjeriUnosRekapitulacija()"/>		      </label>  			</div>				<span>ili<span>   			<div>		      <label for="mjeseci_prijevremeno">		      	<span class="required">Broj mjeseci za kraću otplatu: </span>		      	<input type="text" id="BrMjeseciKracaOtplata" name="BrMjeseciKracaOtplata" value="" placeholder="24" tabindex="2" onkeyup="ProvjeriUnosBrojMjeseci()"/>		      </label>  			</div>
			<div>		           
		      <button name="submit" type="submit" id="submit" >Napravi izračun</button> 
			</div>
		   </form>
	</div>
<?php
    }
include("footer.php");
?>

