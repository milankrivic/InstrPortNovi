<?php


$dbc = null;
$db = null;

function SpojiNaBazu($sql) {
	
	$BP_server = 'localhost';
	$BP_bazaPodataka = 'milanpor_instrukcije';
	$BP_korisnik = 'milanpor_inst';
	$BP_lozinka = 'ni9?mxE!5ew0';
	global $dbc;
	global $db;

	$dbc = mysqli_connect($BP_server, $BP_korisnik, $BP_lozinka,$BP_bazaPodataka);
	if(mysqli_connect_errno()){
		die("Greška kod spajanja na bazu ".$BP_bazaPodataka.":".mysqli_connect_error());
	}

	mysqli_set_charset($dbc,"utf8");
	
	$rs = mysqli_query($dbc,$sql);
	if(!$rs) {
		die("Greška kod izvršavanja mysql upita: ".mysqli_error($dbc));
	}
	
	if(is_resource($dbc)){
	mysqli_close($dbc);
	}
	
	return $rs;
	
}

function VratiDan($datum){
	
	$dan=date("l",strtotime($datum));
	
switch($dan){
	
	case "Monday":
	$dansw="Ponedjeljak";
	break;
	case "Tuesday":
	$dansw="Utorak";
	break;
	case "Wednesday":
	$dansw="Srijeda";
	break;
	case "Thursday":
	$dansw="Četvrtak";
	break;
	case "Friday":
	$dansw="Petak";
	break;
	case "Saturday":
	$dansw="Subota";
	break;
	case "Sunday":
	$dansw="Nedjelja";
	break;
}

return $dansw;
}


function VratiMjesec($mj){
    
    switch($mj){
        
        case 1:
            $mjesec = "Siječanj";
            break;
                case 2:
            $mjesec = "Veljača";
            break;
                case 3:
            $mjesec = "Ožujak";
            break;
                case 4:
            $mjesec = "Travanj";
            break;
                case 5:
            $mjesec = "Svibanj";
            break;
                case 6:
            $mjesec = "Lipanj";
            break;
                case 7:
            $mjesec = "Srpanj";
            break;
                case 8:
            $mjesec = "Kolovoz";
            break;
                case 9:
            $mjesec = "Rujan";
            break;
                case 10:
            $mjesec = "Listopad";
            break;
                case 11:
            $mjesec = "Studeni";
            break;
                case 12:
            $mjesec = "Prosinac";
            break;        
    }
    
    return $mjesec;
}

function PrijavaIstekla(){
    
     $_SESSION["drugi"]=date("d.m.Y H:i:s");
    //echo "<br>Prvi pristup: ".$_SESSION["prvi"];
    //echo "<br>Drugi pristup: ".$_SESSION["drugi"];
    if((strtotime($_SESSION["drugi"])-strtotime($_SESSION["prvi"]))>1800){
        session_destroy();
        $razlika = strtotime($_SESSION["drugi"])-strtotime($_SESSION["prvi"]);
        //echo "<br>Razlika: ".$razlika;
        session_start();
        $_SESSION["poruka"]="Vrijeme neaktivnosti od 30 minuta je isteklo!";
        header("Location: index.php");               
    }
    else
    {
       $_SESSION["prvi"]= $_SESSION["drugi"];
       
    }
    
    
}
?>