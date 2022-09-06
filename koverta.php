<?php
include("header.php");

if(!isset($_SESSION["aktivni_korisnik"])){
    echo "<label for='poruka' class='poruka'>Neovlašten pristup!</label>";
    exit();
}


if(isset($_GET["stanje"])){
	?>
	<div id="contact-form">
	<div>
		<h1>Ispis svih detalja o trošku</h1> 
	</div>
	
	<?php
	
	$sql = "select * from koverta order by IdUnos desc";
	$ex = SpojiNaBazu($sql);
     
	$max = "select max(IdUnos) from koverta";
	$exmax = SpojiNaBazu($max);
	$data = mysqli_fetch_array($exmax);
	$najveci=$data[0];
	?>
	
	<div class='rg-container'>
	<table class='rg-table' summary='Hed'>
		<caption class='rg-header'>
			<span class='rg-hed'>Koverta</span>
			<span class='rg-dek'>Ispis svih detalja o uplatama/isplatama u koverti</span>
                        <?php
                        if(isset($_SESSION["poruka"]))
                        {
                        ?>
			<span class='rg-success'><?php echo $_SESSION["poruka"]; ?></span>
                        <?php
                        unset($_SESSION["poruka"]);
                        }
                        ?>
		</caption>
		<thead>
			<tr>
				<th class='number '>ID</th>
				<th class='text '>Stanje</th>
				<th class='text '>Datum promjene</th>
				<th class='text '>Dan</th>
				<th class='number '>Iznos</th>
				<th class='text '>Tip promjene</th>
				<th class='text '>Opis</th>
				<th class='text '>Akcija</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$suma=0;
		
		while(list($id,$stanje,$datum,$iznos,$tippromjene,$opis)=mysqli_fetch_array($ex)){
			        $upd = "<a href='koverta.php?update=$id'>Ažuriraj</a>";
                    $del = "<a href='koverta.php?delete=$id'>Briši</a>";
		if($tippromjene=="Uplata"){
			$boja="#4CAF50";
		}
		elseif($tippromjene=="Isplata")
		{
			$boja="#FF0000";
		}
		else{
			$tippromjene="Početno stanje";
			$boja="";
		}
$datum=date("d.m.Y",strtotime($datum));		
			$suma+=$iznos;
		?>
				<tr class=''>
					<td class='number ' data-title='ID'><?php echo $id; ?></td>
					<td class='text ' data-title='Stanje'><?php echo $stanje; ?></td>
					<td class='text ' data-title='Datum troška'><?php echo $datum; ?></td>
					<td class='text ' data-title='Dan'><?php echo VratiDan($datum); ?></td>
					<td class='number ' data-title='Iznos'><?php echo number_format($iznos,2,",",".")." kn"; ?></td>
					<td class='text ' data-title='Tip promjene'><font color="<?php echo $boja; ?>"><strong><?php echo $tippromjene; ?></strong></font></td>
					<td class='text ' data-title='Opis'><?php echo $opis; ?></td>
					<td class='text ' data-title='Akcija'><?php if($id==$najveci){echo $del;} ?></td>
				</tr>
		<?php
		}
		
		$statistika = "select
kv.TipPromjene,
sum(kv.Iznos) as 'Iznos'
from koverta kv
where kv.TipPromjene is not null
group by kv.TipPromjene";
$ex = SpojiNaBazu($statistika);
		while(list($tippromjene,$iznos)=mysqli_fetch_array($ex)){
		?>
		
				<tr class=''>
                    <td colspan="4" class='text ' data-title='Ukupno:'>
						Ukupno	<?php echo $tippromjene; ?>:					
                    </td>
					<td class='number ' data-title='Ukupno'><?php echo number_format($iznos,2,",",".")." kn"; ?></td>
					<td colspan="2" class='text ' data-title=''>				
                    </td>
				</tr>	
				<?php	
}
?>
		</tbody>
	</table>
	<a href="javascript:history.back(-1)">Natrag</a>
</div>
<?php	
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  $id= test_input($_POST["IdTrosNast"]);
  $datum = test_input($_POST["Datum"]);
  $iznos = test_input($_POST["Iznos"]);
  $tippromjene = test_input($_POST["TipPromjene"]);
  $opis = test_input($_POST["Opis"]);
  
  $trenutnostanje="select Stanje from koverta order by IdUnos desc limit 1";
  $ex = SpojiNaBazu($trenutnostanje);
  
  $podaci = mysqli_fetch_array($ex);
  $stanje=$podaci[0];
  
  if($tippromjene=="Uplata"){
	  $stanje+=$iznos;
  }
  else
  {
	  $stanje-=$iznos;
  }
  
  if($id==0){
      
     $sql = "insert into koverta (Stanje,DatumPromjena,Iznos,TipPromjene,Opis) values ('$stanje','$datum','$iznos','$tippromjene','$opis')"; 
  }
  
$ex = SpojiNaBazu($sql);

header("Location: koverta.php?stanje=1");
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

   
    if(isset($_GET["update"]) || isset($_GET["nova"])){
        
        
        if(isset($_GET["update"])){
            $sql = "select * from koverta where IdUnos = ".$_GET["update"];

            $ex = SpojiNaBazu($sql);
            
            list($id,$stanje,$datum,$iznos,$tippromjene,$opis)= mysqli_fetch_array($ex);
            $datum = date("Y-m-d", strtotime($datum));
			
        }
        else
        {
            $id=0;
            $datum="";
            $iznos=0;
            $tippromjene="";
            $opis="";
        }
        ?>

<div id="contact-form">
	<div>
		<h1>Unos sredstava u kovertu</h1> 
		<h4>Aplikacija za praćenje primanja i dodatnih zarada tijekom mjeseci</h4> 
	</div>
		<p id="failure">Unos sredstava u kovertu</p>  
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
		      <label for="tippromjene">
		      <span class="required">Tip promjene: </span>
                      <select id="TipPromjene" name="TipPromjene" tabindex="4">
                            <option value="Uplata" <?php if($tippromjene=="Uplata"){echo " selected";} ?>>Uplata</option>
                            <option value="Isplata" <?php if($tippromjene=="Isplata"){echo " selected";} ?>>Isplata</option>
			      </select>
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
			
			
			  $trenutnostanje="select Stanje,TipPromjene,Iznos from koverta where IdUnos = ".$_GET["DeleteId"];
			  $exst = SpojiNaBazu($trenutnostanje);
			  
			  list($stanje,$tippromjene,$iznos)=mysqli_fetch_array($exst);

			  if($tippromjene=="Uplata"){
				  $stanje-=$iznos;
			  }
			  else
			  {
				  $stanje+=$iznos;
			  }
			
			
            $sql = "delete from koverta where IdUnos = ".$_GET["DeleteId"];
			$ex = SpojiNaBazu($sql);
            $_SESSION["poruka"]="Zapis evidencije koverte br. ".$_GET["DeleteId"]." uspješno izbrisan!";
			
			$max = "select max(IdUnos) from koverta";
			$exmax = SpojiNaBazu($max);
			$data = mysqli_fetch_array($exmax);
			$najveci=$data[0];
			
			$azur="update koverta set Stanje = '$stanje' where IdUnos = ".$najveci;
			$exazur = SpojiNaBazu($azur);
            Header("Location: koverta.php?stanje=1");
        }
        else
        {    


			
            $sql = "select * from koverta where IdUnos = ".$_GET["delete"];
				$ex = SpojiNaBazu($sql);		
            }
            
            
            list($id,$stanje,$datum,$iznos,$tippromjene,$opis)= mysqli_fetch_array($ex);
            $datum = date("d.m.Y", strtotime($datum));
            
            ?>
                <div class='rg-container'>
                    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <h4>Da li ste sigurni da želite obrisati sljedeći podatak?</h4> 
                    <input type="hidden" name="DeleteId" id="DeleteId" value="<?php echo $id; ?>">
                    <div><label for="id"><span class="required"><strong>Id unos:</strong> <?php echo $id; ?></span></label></div>
                    <div><label for="iznos"><span class="required"><strong>Iznos:</strong> <?php echo $iznos; ?></span></label></div>
                    <div><label for="datum"><span class="required"><strong>Datum:</strong> <?php echo $datum; ?></span></label></div>
                    <div><label for="trosak"><span class="required"><strong>Tip promjene:</strong> <?php echo $tippromjene; ?></span></label></div>
                    <br>
                    <button name="delete" type="submit" id="submit" >Potvrdi brisanje</button> 
                    <input type="button" value="Povratak" onclick="window.location.href='koverta.php?stanje=1'" />
                    </form>
                </div>
            <?php
    }
include("footer.php");
?>

