<?php
include("header.php");

if(!isset($_SESSION["aktivni_korisnik"])){
    echo "<label for='poruka' class='poruka'>Neovlašten pristup!</label>";
    exit();
}
?>
<div id="contact-form">
	<div>
		<h1>Ispis svih detalja o trošku</h1> 
	</div>
	
	<?php
	


	$sql = "select
tn.IdTrosNast,
tr.Naziv,
date(tn.DatumTrosak),
tn.Iznos,
tn.Opis
from trosak tr inner join trosaknastanak tn
on tr.IdTrosak = tn.IdTrosak";

if(isset($_GET["pogledaj"])){
  $datumpretraga=$_GET["pogledaj"];      
  $datumpretraga=date("Y-m-d",strtotime($datumpretraga));

$sql .= " where date(tn.DatumTrosak) = '$datumpretraga'";
}

if(isset($_GET["kategorija"])){
  $kategorija=$_GET["kategorija"];        $mjesec=$_GET["mjesec"];  $godina=$_GET["godina"];
$sql .= " where tr.IdTrosak = '$kategorija' and month(tn.DatumTrosak) = '$mjesec' and year(tn.DatumTrosak) = '$godina'";
}

	$ex = SpojiNaBazu($sql);
     
	?>
	
	<div class='rg-container'>
	<table class='rg-table' summary='Hed'>
		<caption class='rg-header'>
			<span class='rg-hed'>Troškovi</span>
			<span class='rg-dek'>Ispis svih detalja o troškovima</span>
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
				<th class='text '>Vrsta troška</th>
				<th class='text '>Datum troška</th>
				<th class='text '>Dan</th>
				<th class='number '>Iznos</th>
				<th class='text '>Opis</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$suma=0;
		while(list($id,$naziv,$datum,$iznos,$opis)=mysqli_fetch_array($ex)){	
$datum=date("d.m.Y",strtotime($datum));		
			$suma+=$iznos;
		?>
				<tr class=''>
					<td class='number ' data-title='ID'><?php echo $id; ?></td>
					<td class='text ' data-title='Vrsta troška'><?php echo $naziv; ?></td>
					<td class='text ' data-title='Datum troška'><?php echo $datum; ?></td>
					<td class='text ' data-title='Dan'><?php echo VratiDan($datum); ?></td>
					<td class='number ' data-title='Iznos'><?php echo number_format($iznos,2,",",".")." kn"; ?></td>
					<td class='text ' data-title='Opis'><?php echo $opis; ?></td>
				</tr>
		<?php
		}
		?>
		
				<tr class=''>
                    <td colspan="4" class='text ' data-title='Ukupno:'>
						Ukupno:						
                    </td>
					<td class='number ' data-title='Ukupno'><?php echo number_format($suma,2,",",".")." kn"; ?></td>
					<td class='text ' data-title=''>				
                    </td>
				</tr>	
		</tbody>
	</table>
	<a href="javascript:history.back(-1)">Natrag</a>
</div>
	
	
<?php
include("footer.php");
?>

