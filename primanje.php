<?php
include("header.php");

if(!isset($_SESSION["aktivni_korisnik"])){
    echo "<label for='poruka' class='poruka'>Neovlašten pristup!</label>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
   $id = test_input($_POST["IdPrim"]);
  $datum = test_input($_POST["Datum"]);
  $iznos = test_input($_POST["Iznos"]);
  
  $datumazur=date("Y-m-d H:i:s");
  
  if($id==0){
      
     $sql = "insert into primanja (Iznos,DatumPrimanja) values ('$iznos','$datum')"; 
  }
 else {
  $sql = "update primanja set DatumPrimanja='$datum',Iznos='$iznos' where IdPrimanja=".$id;    
  }
  
$ex = SpojiNaBazu($sql);

header("Location: primanjamjeseci.php");
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

   
    if(isset($_GET["update"]) || isset($_GET["nova"])){
        
        
        if(isset($_GET["update"])){
            $sql = "select * from primanja where IdPrimanja = ".$_GET["update"];

            $ex = SpojiNaBazu($sql);
            
            list($id,$iznos,$datum)= mysqli_fetch_array($ex);
            $datum = date("Y-m-d", strtotime($datum));
        }
        else
        {
            $id=0;
            $datum="";
            $iznos=0;
        }
        ?>

<div id="contact-form">
	<div>
		<h1>Unos mjesečnih primanja</h1> 
		<h4>U ovom dijelu aplikacije unosite mjesečna primanja</h4> 
	</div>
		<p id="failure">Unos mjesečnih zarada.</p>  
		<p id="success">Your message was sent successfully. Thank you!</p>

		   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                       <input type="hidden" name="IdPrim" id="IdPrim" value="<?php echo $id; ?>">
			<div>
		      <label for="datum">
		      	<span class="required">Datum: *</span> 
		      	<input type="date" id="Datum" name="Datum" value="<?php echo $datum; ?>" placeholder="" required="required" tabindex="1" autofocus="autofocus" value="<?php echo $datum; ?>"  oninvalid="this.setCustomValidity('Unesite datum')"/>
		      </label> 
			</div>
			<div>
		      <label for="iznos">
		      	<span class="required">Iznos primanja: *</span>
		      	<input type="text" id="Iznos" name="Iznos" value="<?php echo $iznos; ?>" placeholder="300,00 kn" tabindex="2" required="required" oninvalid="this.setCustomValidity('Unesite iznos')"/>
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
            $sql = "delete from primanja where IdPrimanja = ".$_GET["DeleteId"];
            $_SESSION["poruka"]="Zapis primanja br. ".$_GET["DeleteId"]." uspješno izbrisan!";
            Header("Location: primanjamjeseci.php");
        }
        else
        {      
            $sql = "select
		pr.IdPrimanja,
		pr.Iznos,
		pr.DatumPrimanja
		from 
		primanja pr where pr.IdPrimanja = ".$_GET["delete"];
            }
            $ex = SpojiNaBazu($sql);
            
            list($id,$iznos,$datum)= mysqli_fetch_array($ex);
            $datum = date("d.m.Y", strtotime($datum));
            
            ?>
                <div class='rg-container'>
                    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <h4>Da li ste sigurni da želite obrisati sljedeći podatak?</h4> 
                    <input type="hidden" name="DeleteId" id="DeleteId" value="<?php echo $id; ?>">
                    <div><label for="id"><span class="required"><strong>Id primanja:</strong> <?php echo $id; ?></span></label></div>
                    <div><label for="iznos"><span class="required"><strong>Iznos:</strong> <?php echo number_format($iznos,2,",",".")." kn"; ?></span></label></div>
                    <div><label for="datum"><span class="required"><strong>Datum:</strong> <?php echo $datum; ?></span></label></div>
                    <br>
                    <button name="delete" type="submit" id="submit" >Potvrdi brisanje</button> 
                    <input type="button" value="Povratak" onclick="window.location.href='primanjamjeseci.php'" />
                    </form>
                </div>
            <?php
    }
?>


<?php
include("footer.php");
?>

