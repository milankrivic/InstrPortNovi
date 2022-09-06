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
year(ins.DatumInstrukcije) as Godina,
month(ins.DatumInstrukcije) as Mjesec,
sum(ins.Iznos) as ZaradaInstrukcije,
prm.Iznos as Placa,
(sum(ins.Iznos)+prm.Iznos) as UkupnoSve
from 
instrukcije ins join primanja prm
on month(ins.DatumInstrukcije) = month(prm.DatumPrimanja) 
and
year(ins.DatumInstrukcije) = year(prm.DatumPrimanja)
group by year(ins.DatumInstrukcije), month(ins.DatumInstrukcije) 
order by year(ins.DatumInstrukcije) desc, month(ins.DatumInstrukcije) desc";
	$ex = SpojiNaBazu($sql);
	?>
	
	<div class='rg-container'>
	<table class='rg-table' summary='Hed'>
		<caption class='rg-header'>
			<span class='rg-hed'>Primanja i instrukcije</span>
			<span class='rg-dek'>Primanja i instrukcije po mjesecima</span>
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
				<th class='number '>Instrukcije</th>
				<th class='number '>Primanje</th>
				<th class='number '>Ukupno sve</th>
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
                $instrukcijesve=0;
                $primanjesve=0;
		while(list($godina,$mjesec,$instrukcije,$primanje,$ukupnosve)=mysqli_fetch_array($ex)){
                    $brojac++;
                    
			if($godinar!=$godina && $sumagodina>0){
                            
                           ?>
                                <tr class=''>
                                    <td colspan="5" class='number ' data-title='Ukupno'>
                                        <strong>Suma ukupno sve <?php echo $godinar; ?>:</strong> <?php echo number_format($sumagodina,2,",",".")." kn"; ?><br>
                                        <strong>Prosjek <?php echo $godinar; ?>:</strong> <?php echo number_format($sumagodina/$pogodini,2,",",".")." kn"; $pogodini=0;?><br>
                                        <strong>Instrukcije sve <?php echo $godinar; ?>:</strong> <?php echo number_format($instrukcijesve,2,",",".")." kn"; ?><br>
                                        <strong>Primanje sve <?php echo $godinar; ?>:</strong> <?php echo number_format($primanjesve,2,",",".")." kn"; ?><br>
                                    </td>
				</tr>
                    <?php
                            
                        $postoji = true;
                        $sumagodina=0;
                        $instrukcijesve=0;
                        $primanjesve=0;
                        }
			$suma+=$ukupnosve;
			$instrukcijesve+=$instrukcije;
			$primanjesve+=$primanje;
		?>
				<tr class=''>
					<td class='text ' data-title='Godina'><?php echo $godina; ?></td>
					<td class='text ' data-title='Mjesec'><?php echo VratiMjesec($mjesec); ?></td>
					<td class='number ' data-title='Instrukcije'><?php echo number_format($instrukcije,2,",",".")." kn "; ?></td>
					<td class='number ' data-title='Primanje'><?php echo number_format($primanje,2,",",".")." kn "; ?></td>
					<td class='number ' data-title='Ukupno sve'><?php echo number_format($ukupnosve,2,",",".")." kn "; ?></td>
				</tr>
		<?php
                $sumagodina+=$ukupnosve;
                $godinar=$godina;
                $pogodini++;
		}
                
                if($brojac == mysqli_num_rows($ex) ){
                
		?>
		
				<tr class=''>
                                    <td colspan="5" class='number ' data-title='Ukupno'>
                                        <strong>Suma ukupno sve <?php echo $godinar; ?>:</strong> <?php echo number_format($sumagodina,2,",",".")." kn"; ?><br>
                                        <strong>Prosjek <?php echo $godinar; ?>:</strong> <?php echo number_format($sumagodina/$pogodini,2,",",".")." kn"; $pogodini=0;?><br>
                                        <strong>Instrukcije sve <?php echo $godinar; ?>:</strong> <?php echo number_format($instrukcijesve,2,",",".")." kn"; ?><br>
                                        <strong>Primanje sve <?php echo $godinar; ?>:</strong> <?php echo number_format($primanjesve,2,",",".")." kn"; ?><br>
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

