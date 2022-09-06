<?php
include("header.php");

if(!isset($_SESSION["aktivni_korisnik"])){
    echo "<label for='poruka' class='poruka'>Neovlašten pristup!</label>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
   $id= test_input($_POST["IdInst"]);
  $datum = test_input($_POST["Datum"]);
  $iznos = test_input($_POST["Iznos"]);
  $usluga = test_input($_POST["Usluga"]);
  if($usluga=="NovaUsl"){
      $novausluga=$_POST["NovaUsluga"];
      $unos = "insert into usluga(Naziv) values ('$novausluga')";
      $sql = SpojiNaBazu($unos);
      $usluga = mysqli_insert_id($dbc);
  }
  $opis = test_input($_POST["Opis"]);
  
  $datumazur=date("Y-m-d H:i:s");
  
  if($id==0){
      
     $sql = "insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga,Opis,DatumAzur) values ('$datum','$iznos','$usluga','$opis','$datumazur')"; 
  }
 else {
  $sql = "update instrukcije set DatumInstrukcije='$datum',Iznos='$iznos',IdUsluga='$usluga',Opis='$opis',DatumAzur='$datumazur' where IdInstrukcija=".$id;    
  }
  
$ex = SpojiNaBazu($sql);

header("Location: zarade.php");
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

   
    if(isset($_GET["update"]) || isset($_GET["nova"])){
        
        
        if(isset($_GET["update"])){
            $sql = "select * from instrukcije where IdInstrukcija = ".$_GET["update"];

            $ex = SpojiNaBazu($sql);
            
            list($id,$datum,$iznos,$usluga,$opis,$datumazur)= mysqli_fetch_array($ex);
            $datum = date("Y-m-d", strtotime($datum));
        }
        else
        {
            $id=0;
            $datum="";
            $iznos=0;
            $usluga=0;
            $opis="";
        }
        ?>

<div id="contact-form">
	<div>
		<h1>Unos mjesečnih zarada</h1> 
		<h4>Aplikacija za praćenje primanja i dodatnih zarada tijekom mjeseci</h4> 
	</div>
		<p id="failure">Unos mjesečnih zarada.</p>  
		<p id="success">Your message was sent successfully. Thank you!</p>

		   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                       <input type="hidden" name="IdInst" id="IdInst" value="<?php echo $id; ?>">
			<div>
		      <label for="datum">
		      	<span class="required">Datum: *</span> 
		      	<input type="date" id="Datum" name="Datum" value="<?php echo $datum; ?>" placeholder="" required="required" tabindex="1" autofocus="autofocus" value="<?php echo $datum; ?>"  oninvalid="this.setCustomValidity('Unesite datum')"/>
		      </label> 
			</div>
			<div>
		      <label for="iznos">
		      	<span class="required">Iznos: *</span>
		      	<input type="text" id="Iznos" name="Iznos" value="<?php echo $iznos; ?>" placeholder="300,00 kn" tabindex="2" required="required" oninvalid="this.setCustomValidity('Unesite iznos')"/>
		      </label>  
			</div>
			<div>		          
		      <label for="usluga">
		      <span class="required">Usluga: </span>
                      <select id="Usluga" name="Usluga" tabindex="4" onchange="DodavanjeUsluge()">
					<?php
					$upit="select * from usluga";
					$rs = SpojiNaBazu($upit);
					while(list($idus,$naziv)=mysqli_fetch_array($rs)){
						echo "<option value=\"$idus\"";
                                                if($idus==$usluga){
                                                    echo " selected";
                                                }
                                                echo ">$naziv</option>";
					}
					?>
                                  <option value="NovaUsl">Dodaj novu...</option>
			      </select>
		      </label>
			</div>
                       
                       
                       <div id="UslugaNova" style="display: none;">
		      <label for="novausluga">
		      	<span>Nova usluga: </span>
		      	<input type="text" id="NovaUsluga" name="NovaUsluga" value="" placeholder="Nova usluga" tabindex="2"/>
		      </label>  
			</div>
                       
			<div>	                            
		      <label for="opis">
		      	<span class="required">Opis: *</span> 
		      	<textarea id="Opis" name="Opis" placeholder="Unesite kratak opis..." tabindex="5" required="required" oninvalid="this.setCustomValidity('Unesite opis')"><?php echo $opis; ?></textarea> 
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
            $sql = "delete from instrukcije where IdInstrukcija = ".$_GET["DeleteId"];
            $_SESSION["poruka"]="Zapis instrukcije br. ".$_GET["DeleteId"]." uspješno izbrisan!";
            Header("Location: zarade.php");
        }
        else
        {      
            $sql = "select
		ins.IdInstrukcija,
		ins.DatumInstrukcije,
		ins.Iznos,
		usl.Naziv
		from 
		instrukcije ins join usluga usl
		on ins.IdUsluga = usl.IdUsluga where ins.IdInstrukcija = ".$_GET["delete"];
            }
            $ex = SpojiNaBazu($sql);
            
            list($id,$datum,$iznos,$usluga)= mysqli_fetch_array($ex);
            $datum = date("d.m.Y", strtotime($datum));
            
            ?>
                <div class='rg-container'>
                    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <h4>Da li ste sigurni da želite obrisati sljedeći podatak?</h4> 
                    <input type="hidden" name="DeleteId" id="DeleteId" value="<?php echo $id; ?>">
                    <div><label for="id"><span class="required"><strong>Id instrukcija:</strong> <?php echo $id; ?></span></label></div>
                    <div><label for="iznos"><span class="required"><strong>Iznos:</strong> <?php echo $iznos; ?></span></label></div>
                    <div><label for="datum"><span class="required"><strong>Datum:</strong> <?php echo $datum; ?></span></label></div>
                    <div><label for="usluga"><span class="required"><strong>Usluga:</strong> <?php echo $usluga; ?></span></label></div>
                    <br>
                    <button name="delete" type="submit" id="submit" >Potvrdi brisanje</button> 
                    <input type="button" value="Povratak" onclick="window.location.href='zarade.php'" />
                    </form>
                </div>
            <?php
    }
?>


<?php
include("footer.php");
?>

