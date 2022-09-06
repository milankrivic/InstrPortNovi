<?php
include("header.php");

if(!isset($_SESSION["aktivni_korisnik"])){
    echo "<label for='poruka' class='poruka'>Neovlašten pristup!</label>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
   $id= test_input($_POST["IdInstrukcija"]);
   $Instrukcija = test_input($_POST["Instrukcija"]);
   $UslugaId = test_input($_POST["Usluga"]);   $DatumInstrukcije = test_input($_POST["DatumInstrukcije"]);   $VrijemeInstrukcije = test_input($_POST["VrijemeInstrukcije"]);   $NazivKlijent = test_input($_POST["NazivKlijent"]);   $EmailKlijent = test_input($_POST["EmailKlijent"]);   $TelefonKlijent = test_input($_POST["TelefonKlijent"]);   $Zavrseno = test_input($_POST["Zavrseno"]);   $DatumZavrsetka = test_input($_POST["DatumZavrsetka"]);      $DatumVrijeme = date("Y-m-d H:i:s",strtotime($DatumInstrukcije." ".$VrijemeInstrukcije));      if(empty($DatumZavrsetka) || !isset($DatumZavrsetka)){	   $DatumZavrsetka=date("Y-m-d");   }
  if($UslugaId=="NovaUsl"){
      $novausluga=$_POST["NovaUsluga"];
      $unos = "insert into usluga(Naziv) values ('$novausluga')";
      $sql = SpojiNaBazu($unos);
      $usluga = mysqli_insert_id($dbc);
  }  
 
  if($id==0){
     $sql = "insert into potencijalneinstrukcije (NazivInstrukcija,UslugaId,DatumInstrukcije,NazivKlijent,EmailKlijent,TelefonKlijent,Zavrseno) values ('$Instrukcija','$UslugaId','$DatumVrijeme','$NazivKlijent','$EmailKlijent','$TelefonKlijent','$Zavrseno')"; 
  }
 else {
  $sql = "update potencijalneinstrukcije set NazivInstrukcija='$Instrukcija',UslugaId='$UslugaId',DatumInstrukcije='$DatumInstrukcije',NazivKlijent='$NazivKlijent',EmailKlijent='$EmailKlijent',TelefonKlijent='$TelefonKlijent',Zavrseno='$Zavrseno',DatumZavrsetka='$DatumZavrsetka' where IdInstrukcija=".$id;    
  } 
$ex = SpojiNaBazu($sql);
header("Location: potencijalneinstrukcije.php");
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

   
    if(isset($_GET["update"]) || isset($_GET["nova"])){           
        if(isset($_GET["update"])){
            $sql = "select * from potencijalneinstrukcije where IdInstrukcija = ".$_GET["update"];
            $ex = SpojiNaBazu($sql);         
            list($id,$naziv,$usluga,$datumvrijeme,$nazivklijent,$emailklijent,$telefonklijent,$zavrseno,$datumazavrsetka)= mysqli_fetch_array($ex);			$datuminstrukcije=date("Y-m-d",strtotime($datumvrijeme));			$vrijemeinstrukcije=date("H:i:s",strtotime($datumvrijeme));
        }
        else
        {
            $id=0;
            $naziv="";
            $usluga=0;            $datuminstrukcije="";            $vrijemeinstrukcije="";            $nazivklijent="";            $emailklijent="";            $telefonklijent="";            $zavrseno="";            $datumazavrsetka="";
        }
        ?>

<div id="contact-form">
	<div>
		<h1>Unos novih potencijalnih instrukcija</h1> 
		<h4>Aplikacija za praćenje primanja i dodatnih zarada tijekom mjeseci</h4> 
	</div>
		<p id="failure">Unos novih potencijalnih instrukcija.</p>  
		<p id="success">Your message was sent successfully. Thank you!</p>

		   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <input type="hidden" name="IdInstrukcija" id="IdInstrukcija" value="<?php echo $id; ?>">			<div>		      <label for="nazivprojekt">		      	<span class="required">Instrukcija: *</span>		      	<input type="text" id="Instrukcija" name="Instrukcija" value="<?php echo $naziv; ?>" placeholder="Naziv instrukcije" tabindex="2" required="required" oninvalid="this.setCustomValidity('Unesite projekt')"/>		      </label>  			</div>			<div>		          		      <label for="usluga">		      <span class="required">Usluga: </span>                    <select id="Usluga" name="Usluga" tabindex="4" onchange="DodavanjeUsluge()">					<?php					$upit="select * from usluga";					$rs = SpojiNaBazu($upit);					while(list($idus,$naziv)=mysqli_fetch_array($rs)){						echo "<option value=\"$idus\"";						if($idus==$usluga){							echo " selected";						}						echo ">$naziv</option>";					}					?>                      <option value="NovaUsl">Dodaj novu...</option>			      </select>		      </label>			</div>
			<div>
		      <label for="datum">
		      	<span class="required">Datum instrukcije: *</span> 
		      	<input type="date" id="DatumInstrukcije" name="DatumInstrukcije" value="<?php echo $datuminstrukcije; ?>" placeholder="" required="required" tabindex="1" autofocus="autofocus"  oninvalid="this.setCustomValidity('Unesite datum instrukcije')"/>
		      </label> 
			</div>			<div>		      <label for="vrijeme">		      	<span class="required">Vrijeme instrukcije: *</span> 		      	<input type="time" id="VrijemeInstrukcije" name="VrijemeInstrukcije" value="<?php echo $vrijemeinstrukcije; ?>" placeholder="" required="required" tabindex="1" autofocus="autofocus"  oninvalid="this.setCustomValidity('Unesite vrijeme instrukcije')"/>		      </label> 			</div>
			<div>
		      <label for="nazivklijent">
		      	<span class="required">Naziv klijenta: *</span>
		      	<input type="text" id="NazivKlijent" name="NazivKlijent" value="<?php echo $nazivklijent; ?>" placeholder="Pero Perić" tabindex="2" required="required" oninvalid="this.setCustomValidity('Unesite naziv klijenta')"/>
		      </label>  
			</div>			<div>		      <label for="emailklijent">		      	<span class="required">E-mail klijenta: *</span>		      	<input type="email" id="EmailKlijent" name="EmailKlijent" value="<?php echo $emailklijent; ?>" placeholder="pero.peric@gmail.com" tabindex="2" required="required" oninvalid="this.setCustomValidity('Unesite email klijenta')"/>		      </label>  			</div>			<div>		      <label for="telefonklijent">		      	<span class="required">Kontakt klijenta: *</span>		      	<input type="text" id="TelefonKlijent" name="TelefonKlijent" value="<?php echo $telefonklijent; ?>" placeholder="098/1234-567" tabindex="2" required="required" oninvalid="this.setCustomValidity('Unesite mobitel klijenta')"/>		      </label>  			</div>
             <div>		          		      <label for="zavrseno">		      <span class="required">Završeno: </span>                    <select id="Zavrseno" name="Zavrseno" tabindex="4">					                      <option value="da" <?php if($zavrseno=="da") echo " selected";?>>Da</option>                      <option value="ne" <?php if($zavrseno=="ne") echo " selected";?>>Ne</option>			      </select>		      </label>			</div>			<div>		      <label for="datumzavrsetka">		      	<span class="required">Datum završetka:</span> 		      	<input type="date" id="DatumZavrsetka" name="DatumZavrsetka" value="<?php echo $datumzavrsetka; ?>" placeholder="" tabindex="1" autofocus="autofocus" value="<?php echo $RokIsporuke; ?>"/>		      </label> 			</div>                            
            <div id="UslugaNova" style="display: none;">
		      <label for="novausluga">
		      	<span>Nova usluga: </span>
		      	<input type="text" id="NovaUsluga" name="NovaUsluga" value="" placeholder="Nova usluga" tabindex="2"/>
		      </label>  
			</div>                    
			<div>		           
		      <button name="submit" type="submit" id="submit" >Spremi unos</button> 
			</div>
		   </form>
	</div>
<?php
        
    }
    
    if(isset($_GET["delete"])){
        
        if(isset($_GET["DeleteId"])){
            $sql = "delete from potencijalneinstrukcije where IdInstrukcija = ".$_GET["DeleteId"];
            $_SESSION["poruka"]="Zapis instrukcije br. ".$_GET["DeleteId"]." uspješno izbrisan!";
            Header("Location: potencijalneinstrukcije.php");
        }
        else
        {      
            $sql = "select		potinst.IdInstrukcija,		potinst.NazivInstrukcija,		potinst.DatumInstrukcije,        potinst.NazivKlijent,        potinst.EmailKlijent,        potinst.TelefonKlijent,        potinst.Zavrseno,        potinst.DatumZavrsetka,		usl.Naziv		from 		potencijalneinstrukcije potinst join usluga usl		on potinst.UslugaId = usl.IdUsluga where potinst.IdInstrukcija = ".$_GET["delete"];
            }
            $ex = SpojiNaBazu($sql);
            
            list($id,$naziv,$datumpocetka,$nazivklijent,$emailklijent,$kontakt,$zavrseno,$datumazavrsetka,$usluga)= mysqli_fetch_array($ex);
            $datumpocetka = date("d.m.Y", strtotime($datumpocetka));
            
            ?>
                <div class='rg-container'>
                    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <h4>Da li ste sigurni da želite obrisati sljedeći podatak?</h4> 
                    <input type="hidden" name="DeleteId" id="DeleteId" value="<?php echo $id; ?>">
                    <div><label for="id"><span class="required"><strong>Id instrukcija:</strong> <?php echo $id; ?></span></label></div>
                    <div><label for="naziv"><span class="required"><strong>Naziv:</strong> <?php echo $naziv; ?></span></label></div>					                    <div><label for="klijent"><span class="required"><strong>Klijent:</strong> <?php echo $nazivklijent; ?></span></label></div>
                    <div><label for="datum"><span class="required"><strong>Datum početka:</strong> <?php echo $datumpocetka; ?></span></label></div>
                    <div><label for="usluga"><span class="required"><strong>Usluga:</strong> <?php echo $usluga; ?></span></label></div>
                    <br>
                    <button name="delete" type="submit" id="submit" >Potvrdi brisanje</button> 
                    <input type="button" value="Povratak" onclick="window.location.href='potencijalneinstrukcije.php'" />
                    </form>
                </div>
            <?php
    }
?>


<?php
include("footer.php");
?>

