<?php
include("header.php");

if(!isset($_SESSION["aktivni_korisnik"])){
    echo "<label for='poruka' class='poruka'>Neovlašten pristup!</label>";
    exit();
}
?>
<div id="contact-form">
	<div>
		<h1>Ispis svih detalja o potencijalnim instrukcijama</h1> 
	</div>
	
	<?php
	
        $velstr=10;
        
	$sql = "select
		potinst.IdInstrukcija,
		potinst.NazivInstrukcija,
		potinst.DatumInstrukcije,
        potinst.NazivKlijent,        potinst.EmailKlijent,        potinst.TelefonKlijent,        potinst.Zavrseno,        potinst.DatumZavrsetka,
		usl.Naziv
		from 
		potencijalneinstrukcije potinst join usluga usl
		on potinst.UslugaId = usl.IdUsluga";				if(isset($_GET["Zavrseno"])){			$zav=$_GET["Zavrseno"];			$sql.=" where potinst.Zavrseno='$zav'";		}
	    $ex = SpojiNaBazu($sql);
        $ukupnopod = mysqli_num_rows($ex);
        $stranica = ceil($ukupnopod/$velstr);
        
        $sql.="  order by potinst.IdInstrukcija desc limit ".$velstr;
        
        if(isset($_GET["str"])){
            $sql.=" offset ".($_GET["str"]-1)*$velstr;
            $aktivna=$_GET["str"];
        }
 else {
     $aktivna=1;
 }
        $ex = SpojiNaBazu($sql);
	?>
		<div>		<h2>Filter završenih/nezavršenih instrukcija</h2> 	</div>		<p id="failure">Filter završenih/nezavršenih instrukcija</p>  		 
	<div class='rg-container'>			<form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">                        <div>		          		      <label for="zavrseno">		      <span class="zavrseno">Završeno: </span>                    <select id="Zavrseno" name="Zavrseno" tabindex="4">					                      <option value="da">Da</option>                      <option value="ne">Ne</option>			      </select>		      </label>			</div>			                			<div>		           		     <input name="submit" type="submit" id="submit" value="Prikaz" > 			</div>		   </form>
	<table class='rg-table' summary='Hed'>
		<caption class='rg-header'>
			<span class='rg-hed'>Potencijalne instrukcije</span>
			<span class='rg-dek'>Ispis svih detalja o potencijalnim instrukcijama</span>
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
				<th class='text '>Opis instrukcije</th>
				<th class='text '>Usluga</th>
				<th class='text '>Datum početka</th>				<th class='text '>Klijent</th>				<th class='text '>Email</th>				<th class='text '>Kontakt</th>
				<th class='text '>Završeno</th>				<th class='text '>Datum završetka</th>
				<th class='text '>Mogućnosti</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$suma=0;
		while(list($id,$naziv,$datumpocetka,$nazivklijent,$emailklijent,$kontakt,$zavrseno,$datumazavrsetka,$usluga)=mysqli_fetch_array($ex)){
                    $upd = "<a href='potencijalnainstrukcija.php?update=$id'>Ažuriraj</a>";
                    $del = "<a href='potencijalnainstrukcija.php?delete=$id'>Briši</a>";

                    if($datumpocetka != null && $datumpocetka!=""){
                       $datumpocetka=date("d.m.Y H:i:s",strtotime($datumpocetka));  
                    }					                    if($datumazavrsetka != null && $datumazavrsetka!=""){                       $datumazavrsetka=date("d.m.Y",strtotime($datumazavrsetka));                      }
		?>
				<tr class=''>
					<td class='number ' data-title='ID'><?php echo $id; ?></td>										<td class='text ' data-title='Naziv'><?php echo $naziv; ?></td>
					<td class='text ' data-title='Usluga'><?php echo $usluga; ?></td>
					<td class='text ' data-title='Datum početka'><?php echo $datumpocetka; ?></td>										<td class='text ' data-title='Klijent'><?php echo $nazivklijent; ?></td>										<td class='text ' data-title='E-mail'><?php echo $emailklijent; ?></td>										<td class='text ' data-title='Kontakt'><?php echo $kontakt; ?></td>										<td class='text ' data-title='Završeno'><?php echo $zavrseno; ?></td>
					<td class='number ' data-title='Datum završetka'><?php echo $datumazavrsetka; ?></td>
					<td class='text ' data-title='Akcija'><?php echo $upd." | ".$del; ?></td>
				</tr>
		<?php
		}
		?>
		
				<tr class=''>
                                    <td colspan="7" class='text ' data-title='Stranice:'><br>
                                    
                                    <?php
                                    
                                    if ($aktivna != 1) { 
                                    $prethodna = $aktivna - 1;
                                    echo "<a href=\"potencijalneinstrukcije.php?str=" .$prethodna . "\">&lt;</a>";	
                                    }
                                    
                                    for($a=1;$a<=$stranica;$a++){
                                        $tmp=$a;
                                        if($a%11==1 && $a!=1){
                                            echo "<br>";
                                        }

                                        echo " <a href='potencijalneinstrukcije.php?str=$a'>";

                                        if($a<=9){
                                           $a= "0".$a; 
                                        }
                                        $istakni=$a;
                                        if(isset($_GET["str"])){

                                            if($_GET["str"]==$tmp){
                                                $istakni="<mark>$a</strong>";
                                            }
                                        }
                                        
                                        echo "$istakni</a>&nbsp;";
                                        
                                    }
                                    
                                    
                                    if ($aktivna < $stranica) {
                                    $sljedeca = $aktivna + 1;
                                    echo "<a href=\"potencijalneinstrukcije.php?str=" .$sljedeca . "\">&gt;</a>";	
                                    }
                                    
                                    ?>
                                    
                                    
                                    </td>
				</tr>
		</tbody>
	</table>
</div>
	
	
<?php
include("footer.php");
?>

