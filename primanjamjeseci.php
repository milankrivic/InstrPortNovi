<?php
include("header.php");

if(!isset($_SESSION["aktivni_korisnik"])){
    echo "<label for='poruka' class='poruka'>Neovlašten pristup!</label>";
    exit();
}
?>
<div id="contact-form">
	<div>
		<h1>Ispis svih detalja o primanjima</h1> 
	</div>
	
	<?php
	
	$sql = "select
pr.IdPrimanja,
year(pr.DatumPrimanja) as 'Godina',
month(pr.DatumPrimanja) as 'Mjesec',
pr.Iznos
from primanja pr order by year(pr.DatumPrimanja) desc, month(pr.DatumPrimanja) desc";
	$ex = SpojiNaBazu($sql);
	?>
	
	<div class='rg-container'>
	<table class='rg-table' summary='Hed'>
		<caption class='rg-header'>
			<span class='rg-hed'>Primanja</span>
			<span class='rg-dek'>Primanja po mjesecima</span>
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
				<th class='Godina '>Godina</th>
				<th class='text '>Mjesec</th>
				<th class='number '>Primanje</th>
                                <th class='text '>Mogućnosti</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$suma=0;
                $sumagodina=0;
                $godinar=0;
                $postoji = false;
                $brojac=0;
                $pogodini=0;
		while(list($idprim,$godina,$mjesec,$ukupno)=mysqli_fetch_array($ex)){
                    $upd = "<a href='primanje.php?update=$idprim'>Ažuriraj</a>";
                    $del = "<a href='primanje.php?delete=$idprim'>Briši</a>";
                    $brojac++;
                    
			if($godinar!=$godina && $sumagodina>0){
                            
                           ?>
                                <tr class=''>
                                    <td colspan="3" class='number ' data-title='Ukupno'>
                                        <strong>Suma <?php echo $godinar; ?>:</strong> <?php echo number_format($sumagodina,2,",",".")." kn"; ?><br>
                                        <strong>Prosjek <?php echo $godinar; ?>:</strong> <?php echo number_format($sumagodina/$pogodini,2,",",".")." kn"; $pogodini=0;?>
                                    </td>
				</tr>
                    <?php
                            
                        $postoji = true;
                        $sumagodina=0;
                        }
			$suma+=$ukupno;
		?>
				<tr class=''>
					<td class='text ' data-title='Godina'><?php echo $godina; ?></td>
					<td class='text ' data-title='Mjesec'><?php echo VratiMjesec($mjesec); ?></td>
					<td class='number ' data-title='Iznos'><?php echo number_format($ukupno,2,",",".")." kn "; ?></td>
                                        <td class='text ' data-title='Akcija'><?php echo $upd." | ".$del; ?></td>
				</tr>
		<?php
                $sumagodina+=$ukupno;
                $godinar=$godina;
                $pogodini++;
		}
                
                if($brojac == mysqli_num_rows($ex) ){
                
		?>
		
				<tr class=''>
                                    <td colspan="3" class='number ' data-title='Ukupno'>
                                        <strong>Suma <?php echo $godinar; ?>:</strong> <?php echo number_format($sumagodina,2,",",".")." kn"; ?><br>
                                        <strong>Prosjek <?php echo $godinar; ?>:</strong> <?php echo number_format($sumagodina/$pogodini,2,",",".")." kn"; $pogodini=0;?>
                                    </td>
				</tr>
		<?php
                        }
                        ?>
		</tbody>
	</table>
	
	<div class='rg-source'>
		<span class='pre-colon'>UKUPNO</span>: <span class='post-colon'><?php echo number_format($suma,2,",",".")." kn"; ?></span>
	</div>
</div>
	
	
<?php
include("footer.php");
?>

