<?php
include("header.php");

if(!isset($_SESSION["aktivni_korisnik"])){
    echo "<label for='poruka' class='poruka'>Neovlašten pristup!</label>";
    exit();
}
?>
<div id="contact-form">
	<div>
		<h1>Ispis svih detalja o projektima</h1> 
	</div>
	
	<?php
	
        $velstr=10;
        
	$sql = "select
		proj.ProjektId,
		proj.Naziv,
		proj.RokIsporuke,
        proj.NazivKlijent,        proj.EmailKlijent,        proj.Zavrseno,        proj.DatumZavrsetka,		proj.Cijena,
		usl.Naziv
		from 
		projekti proj join usluga usl
		on proj.UslugaId = usl.IdUsluga";				if(isset($_GET["Zavrseno"])){			$zav=$_GET["Zavrseno"];			$sql.=" where proj.Zavrseno='$zav'";		}
	    $ex = SpojiNaBazu($sql);
        $ukupnopod = mysqli_num_rows($ex);
        $stranica = ceil($ukupnopod/$velstr);
        
        $sql.="  order by proj.ProjektId desc limit ".$velstr;
        
        if(isset($_GET["str"])){
            $sql.=" offset ".($_GET["str"]-1)*$velstr;
            $aktivna=$_GET["str"];
        }
 else {
     $aktivna=1;
 }
        $ex = SpojiNaBazu($sql);
	?>
		<div>		<h2>Filter završenih/nezavršenih projekata</h2> 	</div>		<p id="failure">Filter završenih/nezavršenih projekata</p>  		 
	<div class='rg-container'>			<form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">                        <div>		          		      <label for="zavrseno">		      <span class="zavrseno">Završeno: </span>                    <select id="Zavrseno" name="Zavrseno" tabindex="4">					                      <option value="da">Da</option>                      <option value="ne">Ne</option>			      </select>		      </label>			</div>			                			<div>		           		     <input name="submit" type="submit" id="submit" value="Prikaz" > 			</div>		   </form>
	<table class='rg-table' summary='Hed'>
		<caption class='rg-header'>
			<span class='rg-hed'>Projekti</span>
			<span class='rg-dek'>Ispis svih detalja o projektima</span>
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
				<th class='text '>Projekt</th>								<th class='text '>Cijena</th>
				<th class='text '>Usluga</th>
				<th class='text '>Rok isporuke</th>				<th class='text '>Klijent</th>				<th class='text '>Email</th>
				<th class='text '>Završeno</th>				<th class='text '>Datum završetka</th>
				<th class='text '>Mogućnosti</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$suma=0;		$neizvrsenouplata=0;
		while(list($id,$naziv,$rokisporuke,$nazivklijent,$emailklijent,$zavrseno,$datumazavrsetka,$cijena,$usluga)=mysqli_fetch_array($ex)){
                    $upd = "<a href='projekt.php?update=$id'>Ažuriraj</a>";
                    $del = "<a href='projekt.php?delete=$id'>Briši</a>";                    $upl = "<a href='projekt.php?uplata=$id&naziv=$naziv'>Uplata</a>";

                    if($rokisporuke != null && $rokisporuke!=""){
                       $rokisporuke=date("d.m.Y",strtotime($rokisporuke));  
                    }					                    if($datumazavrsetka != "0000-00-00" && $datumazavrsetka != null){                       $datumazavrsetka=date("d.m.Y",strtotime($datumazavrsetka));                      }					else					{						$datumazavrsetka="Nepoznato";					}
		?>
				<tr class=''>
					<td class='number ' data-title='ID'><?php echo $id; ?></td>										<td class='text ' data-title='Naziv'><?php echo $naziv; ?></td>										<td class='text ' data-title='Cijena'><?php echo number_format($cijena,2,".",","). " kn"; ?></td>
					<td class='text ' data-title='Usluga'><?php echo $usluga; ?></td>
					<td class='text ' data-title='Rok isporuke'><?php echo $rokisporuke; ?></td>										<td class='text ' data-title='Klijent'><?php echo $nazivklijent; ?></td>										<td class='text ' data-title='E-mail'><?php echo $emailklijent; ?></td>										<td class='text ' data-title='Završeno'><?php echo $zavrseno; ?></td>
					<td class='number ' data-title='Datum završetka'><?php echo $datumazavrsetka; ?></td>										<?php										$upit = "SELECT SUM(UplacenIznos) FROM projektinaplata WHERE ProjektId = ".$id;					$ex1 = SpojiNaBazu($upit);					list($dosaduplaceno)=mysqli_fetch_row($ex1);					$ostatakuplate=$cijena-$dosaduplaceno;					$neizvrsenouplata+=$ostatakuplate;					?>										<td class='text ' data-title='Unaprijed uplaćeno'><?php echo number_format($dosaduplaceno,2,".",","). " kn"; ?></td>										<td class='text ' data-title='Ostalo za uplatiti'><?php echo number_format($ostatakuplate,2,".",","). " kn"; ?></td>
					<td class='text ' data-title='Akcija'><?php echo $upl." | ".$upd." | ".$del; ?></td>
				</tr>
		<?php
		}
		?>
		
				<tr class=''>
                                    <td colspan="7" class='text ' data-title='Stranice:'><br>
                                    
                                    <?php
                                    
                                    if ($aktivna != 1) { 
                                    $prethodna = $aktivna - 1;
                                    echo "<a href=\"projekti.php?str=" .$prethodna . "\">&lt;</a>";	
                                    }
                                    
                                    for($a=1;$a<=$stranica;$a++){
                                        $tmp=$a;
                                        if($a%11==1 && $a!=1){
                                            echo "<br>";
                                        }

                                        echo " <a href='projekti.php?str=$a'>";

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
                                    echo "<a href=\"projekti.php?str=" .$sljedeca . "\">&gt;</a>";	
                                    }
                                    
                                    ?>
                                    
                                    
                                    </td>
				</tr>
		</tbody>
	</table>			<div class='rg-source' id="kraj">		<span class='naslov'>RAZLIKA UPLATA/ISPLATA:</span>				<br><span class='pre-colon'>Sveukupno za uplatiti:</span>: <span class='post-colon'><?php echo number_format($neizvrsenouplata,2,",",".")." kn"; ?></span>				</div>
</div>
	
	
<?php
include("footer.php");
?>

