<?php
include("header.php");

if(!isset($_SESSION["aktivni_korisnik"])){
    echo "<label for='poruka' class='poruka'>Neovlašten pristup!</label>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
   $id= test_input($_POST["IdTrosNast"]);
  $datum = test_input($_POST["Datum"]);
  $iznos = test_input($_POST["Iznos"]);
  $trosak = test_input($_POST["Trosak"]);
  if($trosak=="NoviTros"){
      $NoviTrosak=$_POST["NoviTrosak"];
      $unos = "insert into trosak (Naziv) values ('$NoviTrosak')";
      $sql = SpojiNaBazu($unos);
      $trosak = mysqli_insert_id($dbc);
  }
  $opis = test_input($_POST["Opis"]);
  
  $datumazur=date("Y-m-d H:i:s");
  
  if($id==0){
      
     $sql = "insert into trosaknastanak (DatumTrosak,Iznos,IdTrosak,Opis,DatumAzur) values ('$datum','$iznos','$trosak','$opis','$datumazur')"; 
  }
 else {
  $sql = "update trosaknastanak set DatumTrosak='$datum',Iznos='$iznos',IdTrosak='$trosak',Opis='$opis',DatumAzur='$datumazur' where IdTrosNast=".$id;    
  }
  
$ex = SpojiNaBazu($sql);

header("Location: troskovi.php");
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

   
    if(isset($_GET["update"]) || isset($_GET["nova"])){
        
        
        if(isset($_GET["update"])){
            $sql = "select * from trosaknastanak where IdTrosNast = ".$_GET["update"];

            $ex = SpojiNaBazu($sql);
            
            list($id,$datum,$iznos,$trosak,$opis,$datumazur)= mysqli_fetch_array($ex);
            $datum = date("Y-m-d", strtotime($datum));
        }
        else
        {
            $id=0;
            $datum="";
            $iznos=0;
            $trosak=0;
            $opis="";
        }
        ?>

<div id="contact-form">
	<div>
		<h1>Unos mjesečnih troškova</h1> 
		<h4>Aplikacija za praćenje primanja i dodatnih zarada tijekom mjeseci</h4> 
	</div>
		<p id="failure">Unos mjesečnih troškova.</p>  
		<p id="success">Your message was sent successfully. Thank you!</p>

		   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                       <input type="hidden" name="IdTrosNast" id="IdTrosNast" value="<?php echo $id; ?>">
			<div>
		      <label for="datum">
		      	<span class="required">Datum: *</span> 
		      	<input type="date" id="Datum" name="Datum" value="<?php echo $datum; ?>" placeholder="" required="required" tabindex="1" autofocus="autofocus" value="<?php echo $datum; ?>"  oninvalid="this.setCustomValidity('Unesite datum')"/>
		      </label> 
			</div>
			<div>
		      <label for="iznos">
		      	<span class="required">Iznos: *</span>
		      	<input type="text" id="Iznos" name="Iznos" value="<?php echo $iznos; ?>" placeholder="300.00 kn" tabindex="2" required="required" oninvalid="this.setCustomValidity('Unesite iznos')"/>
		      </label>  
			</div>
			<div>		          
		      <label for="usluga">
		      <span class="required">Vrsta troška: </span>
                      <select id="Trosak" name="Trosak" tabindex="4" onchange="DodavanjeTroska()">
					<?php
					$upit="select * from trosak";
					$rs = SpojiNaBazu($upit);
					while(list($idtr,$naziv)=mysqli_fetch_array($rs)){
						echo "<option value=\"$idtr\"";
                                                if($idtr==$trosak){
                                                    echo " selected";
                                                }
                                                echo ">$naziv</option>";
					}
					?>
                                  <option value="NoviTros">Dodaj novi...</option>
			      </select>
		      </label>
			</div>
                       
                       
              <div id="TrosakNovi" style="display: none;">
		      <label for="novitrosak">
		      	<span>Novi trošak: </span>
		      	<input type="text" id="NoviTrosak" name="NoviTrosak" value="" placeholder="Novi trošak" tabindex="2"/>
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
            $sql = "delete from trosaknastanak where IdTrosNast = ".$_GET["DeleteId"];
            $_SESSION["poruka"]="Zapis nastanka troška br. ".$_GET["DeleteId"]." uspješno izbrisan!";
            Header("Location: troskovi.php");
        }
        else
        {      
            $sql = "select
tn.IdTrosNast,
date(tn.DatumTrosak),
tn.Iznos,
tr.Naziv
from trosak tr inner join trosaknastanak tn
on tr.IdTrosak = tn.IdTrosak where tn.IdTrosNast = ".$_GET["delete"];
            }
            $ex = SpojiNaBazu($sql);
            
            list($id,$datum,$iznos,$trosak)= mysqli_fetch_array($ex);
            $datum = date("d.m.Y", strtotime($datum));
            
            ?>
                <div class='rg-container'>
                    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <h4>Da li ste sigurni da želite obrisati sljedeći podatak?</h4> 
                    <input type="hidden" name="DeleteId" id="DeleteId" value="<?php echo $id; ?>">
                    <div><label for="id"><span class="required"><strong>Id instrukcija:</strong> <?php echo $id; ?></span></label></div>
                    <div><label for="iznos"><span class="required"><strong>Iznos:</strong> <?php echo $iznos; ?></span></label></div>
                    <div><label for="datum"><span class="required"><strong>Datum:</strong> <?php echo $datum; ?></span></label></div>
                    <div><label for="trosak"><span class="required"><strong>Trošak:</strong> <?php echo $trosak; ?></span></label></div>
                    <br>
                    <button name="delete" type="submit" id="submit" >Potvrdi brisanje</button> 
                    <input type="button" value="Povratak" onclick="window.location.href='troskovi.php'" />
                    </form>
                </div>
            <?php
    }
?>


<?php
include("footer.php");
?>

