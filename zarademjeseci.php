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
	
	$sql = "select
year(ins.DatumInstrukcije) as Godina,
month(ins.DatumInstrukcije) as Mjesec,
sum(ins.Iznos) as Ukupno
from 
instrukcije ins join usluga usl
on ins.IdUsluga = usl.IdUsluga 
group by 
year(ins.DatumInstrukcije),
month(ins.DatumInstrukcije) 
order by year(ins.DatumInstrukcije) desc,
month(ins.DatumInstrukcije) desc";
	$ex = SpojiNaBazu($sql);
	?>
	
	<div class='rg-container'>
	<table class='rg-table' summary='Hed'>
		<caption class='rg-header'>
			<span class='rg-hed'>Zarade</span>
			<span class='rg-dek'>Zarade po mjesecima</span>
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
				<th class='number '>Ukupno</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$suma=0;
                $sumagodina=0;
                $godinar=0;
                $postoji = false;
                $brojac=0;
		while(list($godina,$mjesec,$ukupno)=mysqli_fetch_array($ex)){
                    $brojac++;                                            
			if($godinar!=$godina && $sumagodina>0){
                            
                           ?>
                    <tr class=''>
                                    <td colspan="3" class='number ' data-title='Ukupno'><strong>Suma <?php echo $godinar; ?>:</strong> <?php echo number_format($sumagodina,2,",",".")." kn"; ?></td>
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
				</tr>
		<?php
                $sumagodina+=$ukupno;
                $godinar=$godina;
		}
                
                if($brojac == mysqli_num_rows($ex) ){
                
		?>
		
				<tr class=''>
                                    <td colspan="3" class='number ' data-title='Ukupno'><strong>Suma <?php echo $godinar; ?>:</strong> <?php echo number_format($sumagodina,2,",",".")." kn"; ?></td>
				</tr>
<!--
				<tr class=''>
					<td class='text ' data-title='Name'>Tasty Treat</td>
					<td class='text ' data-title='City'>Ashland</td>
					<td class='number ' data-title='Price'>$5.00</td>
					<td class='number ' data-title='Rating'>2.0</td>
				</tr>
	-->		<?php
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

