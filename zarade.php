<?php
include("header.php");

if(!isset($_SESSION["aktivni_korisnik"])){
    echo "<label for='poruka' class='poruka'>Neovlašten pristup!</label>";
    exit();
}
?>
<div id="contact-form">
	<div>
		<h1>Ispis svih detalja o zaradama</h1> 
	</div>
	
	<?php
	
        $velstr=10;
        
	$sql = "select
		ins.IdInstrukcija,
		ins.DatumInstrukcije,
		ins.Iznos,
                ins.DatumAzur,
		usl.Naziv
		from 
		instrukcije ins join usluga usl
		on ins.IdUsluga = usl.IdUsluga";
	$ex = SpojiNaBazu($sql);
        
        $ukupnopod = mysqli_num_rows($ex);
        $stranica = ceil($ukupnopod/$velstr);
        
        $sql.="  order by ins.DatumInstrukcije desc, ins.DatumAzur desc limit ".$velstr;
        
        if(isset($_GET["str"])){
            $sql.=" offset ".($_GET["str"]-1)*$velstr;
            $aktivna=$_GET["str"];
        }
 else {
     $aktivna=1;
 }
        
        
        $ex = SpojiNaBazu($sql);
	?>
	
	<div class='rg-container'>
	<table class='rg-table' summary='Hed'>
		<caption class='rg-header'>
			<span class='rg-hed'>Zarade</span>
			<span class='rg-dek'>Ispis svih detalja o zaradama</span>
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
				<th class='text '>Usluga</th>
				<th class='text '>Datum održavanja</th>
				<th class='text '>Dan</th>
				<th class='number '>Iznos</th>
				<th class='text '>Datum ažuriranja</th>
				<th class='text '>Mogućnosti</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$suma=0;
		while(list($id,$datum,$iznos,$datumazur,$usluga)=mysqli_fetch_array($ex)){
                    $upd = "<a href='zarada.php?update=$id'>Ažuriraj</a>";
                    $del = "<a href='zarada.php?delete=$id'>Briši</a>";
			$datum=date("d.m.Y",strtotime($datum));
                        if($datumazur != null && $datumazur!=""){
                          $datumazur=date("d.m.Y H:i:s",strtotime($datumazur));  
                        }
			
			$suma+=$iznos;
		?>
				<tr class=''>
					<td class='number ' data-title='ID'><?php echo $id; ?></td>
					<td class='text ' data-title='Usluga'><?php echo $usluga; ?></td>
					<td class='text ' data-title='Datum održavanja'><?php echo $datum; ?></td>
					<td class='text ' data-title='Dan'><?php echo VratiDan($datum); ?></td>
					<td class='number ' data-title='Iznos'><?php echo number_format($iznos,2,",",".")." kn"; ?></td>
					<td class='number ' data-title='Datum ažuriranja'><?php echo $datumazur; ?></td>
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
                                    echo "<a href=\"zarade.php?str=" .$prethodna . "\">&lt;</a>";	
                                    }
                                    
                                    for($a=1;$a<=$stranica;$a++){
                                        $tmp=$a;
                                        if($a%11==1 && $a!=1){
                                            echo "<br>";
                                        }

                                        echo " <a href='zarade.php?str=$a'>";

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
                                    echo "<a href=\"zarade.php?str=" .$sljedeca . "\">&gt;</a>";	
                                    }
                                    
                                    ?>
                                    
                                    
                                    </td>
				</tr>
<!--
				<tr class=''>
					<td class='text ' data-title='Name'>Tasty Treat</td>
					<td class='text ' data-title='City'>Ashland</td>
					<td class='number ' data-title='Price'>$5.00</td>
					<td class='number ' data-title='Rating'>2.0</td>
				</tr>
	-->		
		</tbody>
	</table>
	
	<div class='rg-source'>
		<span class='pre-colon'>UKUPNO</span>: <span class='post-colon'></span>
	</div>
</div>
	
	
<?php
include("footer.php");
?>

