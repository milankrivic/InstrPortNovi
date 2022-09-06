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
date(tn.DatumTrosak),
sum(tn.Iznos)
from trosak tr inner join trosaknastanak tn
on tr.IdTrosak = tn.IdTrosak
group by date(tn.DatumTrosak)
order by date(tn.DatumTrosak) desc";
	$ex = SpojiNaBazu($sql);
       
	?>
	
	<div class='rg-container'>
	<table class='rg-table' summary='Hed'>
		<caption class='rg-header'>
			<span class='rg-hed'>Troškovi</span>
			<span class='rg-dek'>Ispis troškova po danima</span>
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
				<th class='text '>Datum troška</th>
				<th class='text '>Dan</th>
				<th class='number '>Iznos</th>
				<th class='text '>Info</th>
				<th class='text '>Akcija</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$suma=0;
		while(list($datum,$iznos)=mysqli_fetch_array($ex)){
			$datum=date("d.m.Y",strtotime($datum));			
			$suma+=$iznos;
			$pogled="<a href='troskoviDetalji.php?pogledaj=$datum'>Detalji</a>";
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

					<td class='text ' data-title='Datum troška'><?php echo $datum; ?></td>
					<td class='text ' data-title='Dan'><?php echo VratiDan($datum); ?></td>
					<td class='number ' data-title='Iznos'><?php echo number_format($iznos,2,",",".")." kn"; ?></td>
					<td class='text ' data-title='Info'><font color="<?php echo $boja; ?>"><?php echo $info; ?></font></td>
					<td class='text ' data-title='Pogled'><?php echo $pogled; ?></td>
				</tr>
		<?php
		}
		?>
		
				<tr class=''>
                    <td colspan="2" class='text ' data-title='Ukupno:'>
						Ukupno:						
                    </td>
					<td class='number ' data-title='Ukupno'><?php echo number_format($suma,2,",",".")." kn"; ?></td>
					<td class='text ' data-title=''>				
                    </td>
				</tr>	
		</tbody>
	</table>
	
</div>
	
	
<?php
include("footer.php");
?>

