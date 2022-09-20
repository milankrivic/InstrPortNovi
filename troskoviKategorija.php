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
tr.IdTrosak,	
tr.Naziv,
month(tn.DatumTrosak) as 'Mjesec',
year(tn.DatumTrosak) as 'Godina',
sum(tn.Iznos)
from trosak tr inner join trosaknastanak tn
on tr.IdTrosak = tn.IdTrosak";
if(isset($_GET["godina"]) && isset($_GET["mjesec"])){
$sql.=" where month(tn.DatumTrosak) = ".$_GET["mjesec"]." and year(tn.DatumTrosak)=".$_GET["godina"];	
}
else
{
$sql.=" where month(tn.DatumTrosak) = month(now()) and year(tn.DatumTrosak)=year(now())";	
}
$sql.=" group by tr.Naziv, year(tn.DatumTrosak), month(tn.DatumTrosak)
order by tr.Naziv desc";
	$ex = SpojiNaBazu($sql);
       
	?>
	
	<div class='rg-container'>
	<table class='rg-table' summary='Hed'>
		<caption class='rg-header'>
			<span class='rg-hed'>Troškovi</span>
			<span class='rg-dek'>Ispis troškova kategoriji</span>
			<span class='rg-dek'>
			
			<form action="troskoviKategorija.php" method="GET">
			Godina: <select name="godina" id="godina">
			<?php
			for($god=2021;$god<=date("Y");$god++){
				echo "<option value='$god'";				if($god==date("Y")){					echo " selected";				}				echo ">$god</option>";
			}
			?>
			</select>
			<br>Mjesec: <select name="mjesec" id="mjesec">
			<?php
			for($mj=1;$mj<=12;$mj++){
				echo "<option value='$mj'";
				if($mj==date("m")){
					echo " selected";
				}
				echo ">$mj</option>";
			}
			?>
			</select>
			<button type="submit" name="submit" id="submit">Prikaži</button>
			<p align="center" class="obicni"><a href="troskoviKategorija.php">Reset</a></p>
			</form>
				
			</span>
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
				<th class='number '>Mjesec</th>
				<th class='number '>Iznos</th>
				<th class='text '>Akcija</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$suma=0;
		while(list($idkattrosak,$naziv,$mjesec,$godina,$iznos)=mysqli_fetch_array($ex)){		
			$suma+=$iznos;
			$pogled="<a href='troskoviDetalji.php?kategorija=$idkattrosak&mjesec=$mjesec&godina=$godina'>Detalji</a>";
			if($iznos<=70){
				$info="<strong>OK</strong>";
				$boja="#4CAF50";
			}
			else
			{
				$info="<strong>Prekoračen dnevni limit</strong>";
				$boja="#FF0000";
			}
		?>
				<tr class=''>

					<td class='text ' data-title='Kategorija'><?php echo $naziv; ?></td>
					<td class='number ' data-title='Godina'><?php echo $godina; ?></td>
					<td class='number ' data-title='Mjesec'><?php echo $mjesec; ?></td>
					<td class='number ' data-title='Iznos'><?php echo number_format($iznos,2,",",".")." kn"; ?></td>
					<td class='text ' data-title='Pogled'><?php echo $pogled; ?></td>
				</tr>
		<?php
		}
		$sirina = " <script>document.write(screen.width); </script>";
		?>
		
				<tr class=''>
                    <td colspan="3" class='text ' 
					<?php
					if($sirina>600){
					echo "data-title='Ukupno:'";
					}
					?>
					
					>
						Ukupno potrošeno:						
                    </td>
					<td class='number ' 
					<?php
					if($sirina>600){
					echo "data-title='Ukupno potrošeno:'";
					}
					?>
					
					><?php echo number_format($suma,2,",",".")." kn"; ?></td>
					<td class='text ' data-title=''>				
                    </td>
				</tr>
				<tr class=''>
                    <td colspan="3" class='text ' 
					
					<?php
					if($sirina>600){
					echo "data-title='Ostalo:'";
					}
					?>
					
					>
						Ostalo za trošiti:						
                    </td>
					<td class='number ' 
					
					
					<?php
					if($sirina>600){
					echo "data-title='Ostalo za trošiti:'";
					}
					?>
					
					
					>
					<?php
					
					$ostalo = 4000-$suma;

					echo number_format($ostalo,2,",",".")." kn"; 
					?></td>
					<td class='text ' data-title=''>				
                    </td>
				</tr>				
		</tbody>
	</table>
	
</div>
	
	
<?php
include("footer.php");
?>

