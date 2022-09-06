<?php
include("header.php");

if(!isset($_SESSION["aktivni_korisnik"])){
    echo "<label for='poruka' class='poruka'>Neovlašten pristup!</label>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["NoviProjekt"])){
   $id= test_input($_POST["IdProjekt"]);
   $Projekt = test_input($_POST["Projekt"]);   $Cijena = test_input($_POST["Cijena"]);
   $UslugaId = test_input($_POST["Usluga"]);   $RokIsporuke = test_input($_POST["RokIsporuke"]);   $NazivKlijent = test_input($_POST["NazivKlijent"]);   $EmailKlijent = test_input($_POST["EmailKlijent"]);   $Zavrseno = test_input($_POST["Zavrseno"]);   $DatumZavrsetka = test_input($_POST["DatumZavrsetka"]);
  if($UslugaId=="NovaUsl"){
      $novausluga=$_POST["NovaUsluga"];
      $unos = "insert into usluga(Naziv) values ('$novausluga')";
      $sql = SpojiNaBazu($unos);
      $usluga = mysqli_insert_id($dbc);
  }  
 
  if($id==0){
     $sql = "insert into projekti (Naziv,UslugaId,RokIsporuke,NazivKlijent,EmailKlijent,Zavrseno,Cijena) values ('$Projekt','$UslugaId','$RokIsporuke','$NazivKlijent','$EmailKlijent','','$Cijena')"; 
  }
 else {
  $sql = "update projekti set Naziv='$Projekt',UslugaId='$UslugaId',RokIsporuke='$RokIsporuke',NazivKlijent='$NazivKlijent',EmailKlijent='$EmailKlijent',Zavrseno='$Zavrseno',DatumZavrsetka='$DatumZavrsetka',Cijena='$Cijena' where ProjektId=".$id;    
  } 
$ex = SpojiNaBazu($sql);
header("Location: projekti.php");}			if(isset($_POST["UplataDio"])){		   $IdProjekt = test_input($_POST["IdProjekt"]);		   $Iznos = test_input($_POST["Iznos"]);		   $DatumUplate = test_input($_POST["DatumUplate"]);		   		   $sql="insert into projektinaplata (ProjektId,UplacenIznos,DatumUplate) values ('$IdProjekt','$Iznos','$DatumUplate')";		   $ex = SpojiNaBazu($sql);		 header("Location: projekti.php");	}	
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

   
    if(isset($_GET["update"]) || isset($_GET["nova"])){
        if(isset($_GET["update"])){
            $sql = "select * from projekti where ProjektId = ".$_GET["update"];
            $ex = SpojiNaBazu($sql);          
            list($id,$naziv,$usluga,$rokisporuke,$nazivklijent,$emailklijent,$zavrseno,$datumazavrsetka,$cijena)= mysqli_fetch_array($ex);
        }
        else
        {
            $id=0;
            $naziv="";
            $usluga=0;            $rokisporuke="";            $nazivklijent="";            $emailklijent="";            $zavrseno="";            $datumazavrsetka="";            $cijena=0;
        }
        ?>

<div id="contact-form">
	<div>
		<h1>Unos novih projekata</h1> 
		<h4>Aplikacija za praćenje primanja i dodatnih zarada tijekom mjeseci</h4> 
	</div>
		<p id="failure">Unos novih projekata.</p>  
		<p id="success">Your message was sent successfully. Thank you!</p>

		   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <input type="hidden" name="IdProjekt" id="IdProjekt" value="<?php echo $id; ?>">			<div>		      <label for="nazivprojekt">		      	<span class="required">Projekt: *</span>		      	<input type="text" id="Projekt" name="Projekt" value="<?php echo $naziv; ?>" placeholder="Povijesni događaji" tabindex="2" required="required" oninvalid="this.setCustomValidity('Unesite projekt')"/>		      </label>  			</div>			<div>		          		      <label for="usluga">		      <span class="required">Usluga: </span>                    <select id="Usluga" name="Usluga" tabindex="4" onchange="DodavanjeUsluge()">					<?php					$upit="select * from usluga";					$rs = SpojiNaBazu($upit);					while(list($idus,$naziv)=mysqli_fetch_array($rs)){						echo "<option value=\"$idus\"";						if($idus==$usluga){							echo " selected";						}						echo ">$naziv</option>";					}					?>                      <option value="NovaUsl">Dodaj novu...</option>			      </select>		      </label>			</div>
			<div>
		      <label for="datum">
		      	<span class="required">Rok isporuke: *</span> 
		      	<input type="date" id="RokIsporuke" name="RokIsporuke" value="<?php echo $rokisporuke; ?>" placeholder="" required="required" tabindex="1" autofocus="autofocus" value="<?php echo $RokIsporuke; ?>"  oninvalid="this.setCustomValidity('Unesite rok isporuke')"/>
		      </label> 
			</div>
			<div>
		      <label for="nazivklijent">
		      	<span class="required">Naziv klijenta: *</span>
		      	<input type="text" id="NazivKlijent" name="NazivKlijent" value="<?php echo $nazivklijent; ?>" placeholder="Pero Perić" tabindex="2" required="required" oninvalid="this.setCustomValidity('Unesite naziv klijenta')"/>
		      </label>  
			</div>			<div>		      <label for="cijena">		      	<span class="required">Cijena: *</span>		      	<input type="text" id="Cijena" name="Cijena" value="<?php echo $cijena; ?>" placeholder="650.00" tabindex="2" required="required" oninvalid="this.setCustomValidity('Unesite cijenu projekta')"/>		      </label>  			</div>			<div>		      <label for="emailklijent">		      	<span class="required">E-mail klijenta: *</span>		      	<input type="email" id="EmailKlijent" name="EmailKlijent" value="<?php echo $emailklijent; ?>" placeholder="pero.peric@gmail.com" tabindex="2" required="required" oninvalid="this.setCustomValidity('Unesite email klijenta')"/>		      </label>  			</div>
             <div>		          		      <label for="zavrseno">		      <span class="required">Završeno: </span>                    <select id="Zavrseno" name="Zavrseno" tabindex="4">					                      <option value="da" <?php if($zavrseno=="da") echo " selected";?>>Da</option>                      <option value="ne" <?php if($zavrseno=="ne") echo " selected";?>>Ne</option>			      </select>		      </label>			</div>			<div>		      <label for="datumzavrsetka">		      	<span class="required">Datum završetka:</span> 		      	<input type="date" id="DatumZavrsetka" name="DatumZavrsetka" value="<?php echo $datumzavrsetka; ?>" placeholder="" tabindex="1" autofocus="autofocus" value="<?php echo $RokIsporuke; ?>"/>		      </label> 			</div>                            
            <div id="UslugaNova" style="display: none;">
		      <label for="novausluga">
		      	<span>Nova usluga: </span>
		      	<input type="text" id="NovaUsluga" name="NovaUsluga" value="" placeholder="Nova usluga" tabindex="2"/>
		      </label>  
			</div>                    
			<div>		           
		      <button name="NoviProjekt" type="submit" id="submit" >Spremi unos</button> 
			</div>
		   </form>
	</div>
<?php
        
    }
    
    if(isset($_GET["delete"])){
        
        if(isset($_GET["DeleteId"])){
            $sql = "delete from projekti where ProjektId = ".$_GET["DeleteId"];
            $_SESSION["poruka"]="Zapis projekta br. ".$_GET["DeleteId"]." uspješno izbrisan!";
            Header("Location: projekti.php");
        }
        else
        {      
            $sql = "select * from projekti where ProjektId = ".$_GET["delete"];
            }
            $ex = SpojiNaBazu($sql);
            
            list($id,$naziv,$usluga,$rokisporuke,$nazivklijent,$emailklijent,$zavrseno,$datumazavrsetka,$cijena)= mysqli_fetch_array($ex);
            $datum = date("d.m.Y", strtotime($datum));
            
            ?>
                <div class='rg-container'>
                    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <h4>Da li ste sigurni da želite obrisati sljedeći podatak?</h4> 
                    <input type="hidden" name="DeleteId" id="DeleteId" value="<?php echo $id; ?>">
                    <div><label for="id"><span class="required"><strong>Id projekt:</strong> <?php echo $id; ?></span></label></div>
                    <div><label for="naziv"><span class="required"><strong>Naziv:</strong> <?php echo $naziv; ?></span></label></div>
                    <div><label for="klijent"><span class="required"><strong>Klijent:</strong> <?php echo $nazivklijent; ?></span></label></div>					                    <div><label for="emailklijent"><span class="required"><strong>Email Klijent:</strong> <?php echo $emailklijent; ?></span></label></div>
                    <div><label for="cijena"><span class="required"><strong>Cijena:</strong> <?php echo $cijena; ?></span></label></div>
                    <br>
                    <button name="delete" type="submit" id="submit" >Potvrdi brisanje</button> 
                    <input type="button" value="Povratak" onclick="window.location.href='projekti.php'" />
                    </form>
                </div>
            <?php
    }		if(isset($_GET["uplata"])){				$idprojket=$_GET["uplata"];		$naziv=$_GET["naziv"];		?>				<div id="contact-form">			<div>				<h1>Unos dijela uplate</h1> 				<h4>Praćenje dijelova uplate za projekte</h4> 			</div>				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">              <input type="hidden" name="IdProjekt" id="IdProjekt" value="<?php echo $idprojket; ?>">			<div>		      <label for="nazivprojekt">		      	<span class="required">Projekt: *</span>		      	<input type="text" id="Projekt" name="Projekt" value="<?php echo $naziv; ?>" readonly="readonly"/>		      </label>  			</div>				<div>		      <label for="cijena">		      	<span class="required">Iznos: *</span>		      	<input type="text" id="Iznos" name="Iznos" value="" placeholder="650.00" tabindex="2" required="required" oninvalid="this.setCustomValidity('Unesite iznos uplate')"/>		      </label>  			</div>			<div>		      <label for="datum">		      	<span class="required">Datum uplate: *</span> 		      	<input type="date" id="DatumUplate" name="DatumUplate" value="" placeholder="" required="required" tabindex="1" autofocus="autofocus"  oninvalid="this.setCustomValidity('Unesite datum uplate')"/>		      </label> 			</div>						<div>		           		      <button name="UplataDio" type="submit" id="submit" >Spremi unos</button> 			</div>		   </form></div><?php			}
?>


<?php
include("footer.php");
?>

