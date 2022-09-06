<?php
include("header.php");

if(!isset($_SESSION["aktivni_korisnik"])){
    echo "<label for='poruka' class='poruka'>Neovlašten pristup!</label>";
    exit();
}
?>
<div id="contact-form">
	<div>
		<h1>Ispis statistike o troškovima</h1> 
	</div>
	
	<?php
	
        $velstr=10;
        
	$sql = "select
ins.IdInstrukcija,
usl.Naziv,
year(ins.DatumInstrukcije) as 'Godina',
sum(ins.Iznos)
from 
instrukcije ins join usluga usl
on ins.IdUsluga = usl.IdUsluga
group by usl.Naziv, year(ins.DatumInstrukcije) 
order by year(ins.DatumInstrukcije) desc, month(ins.DatumInstrukcije) asc, usl.Naziv asc";
	$ex = SpojiNaBazu($sql);
       
	?>
	
	<div class='rg-container'>
	<table class='rg-table' summary='Hed'>
		<caption class='rg-header'>
			<span class='rg-hed'>Zarade</span>
			<span class='rg-dek'>Ispis zarada po kategoriji</span>
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
				<th class='text '>Kategorija</th>
				<th class='number '>Godina</th>
				<th class='number '>Iznos</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$suma=0;
		while(list($id,$naziv,$godina,$iznos)=mysqli_fetch_array($ex)){		
			$suma+=$iznos;

		?>
				<tr class=''>

					<td class='text ' data-title='Kategorija'><?php echo $naziv; ?></td>
					<td class='number ' data-title='Godina'><?php echo $godina; ?></td>
					<td class='number ' data-title='Iznos'><?php echo number_format($iznos,2,",",".")." kn"; ?></td>
				</tr>
		<?php
		}
		$sirina = " <script>document.write(screen.width); </script>";
		?>
		
				<tr class=''>
                    <td colspan="2" class='text ' 
					<?php
					if($sirina>600){
					echo "data-title='Ukupno:'";
					}
					?>
					
					>
						Ukupno zarađeno:						
                    </td>
					<td class='number ' 
					<?php
					if($sirina>600){
					echo "data-title='Ukupno zarađeno:'";
					}
					?>
					
					><?php echo number_format($suma,2,",",".")." kn"; ?></td>
					<td class='text ' data-title=''>				
                    </td>
				</tr>			
		</tbody>
	</table>
	
</div>
	
	
<?php
include("footer.php");
?>

