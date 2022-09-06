function DodavanjeUsluge(){
	
	var uslugaOdbId = document.getElementById("Usluga");
	
	if (uslugaOdbId.value=="NovaUsl")
	{
	UslugaNova.style.display = '';
        //required="required" oninvalid="this.setCustomValidity('Unesite iznos')"
        //document.getElementById("NovaUsluga").required = "required";
        //document.getElementById("NovaUsluga").addEventListener("invalid", Upis);
	}
	else {
		UslugaNova.style.display = 'none';
	}
	
}


function DodavanjeTroska(){
	
	var trosakOdbId = document.getElementById("Trosak");
	
	if (trosakOdbId.value=="NoviTros")
	{
	TrosakNovi.style.display = '';
        //required="required" oninvalid="this.setCustomValidity('Unesite iznos')"
        //document.getElementById("NovaUsluga").required = "required";
        //document.getElementById("NovaUsluga").addEventListener("invalid", Upis);
	}
	else {
		TrosakNovi.style.display = 'none';
	}
	
}

function Upis(){
    
    this.setCustomValidity('Unesite naziv usluge')
}function ProvjeriUnosRekapitulacija(){		var IznosRekapitulacija=document.getElementById("IznosRekapitulacija").value;	if(IznosRekapitulacija!="" && parseFloat(IznosRekapitulacija)>0){		document.getElementById("BrMjeseciKracaOtplata").readOnly=true;	}	else	{		document.getElementById("BrMjeseciKracaOtplata").readOnly=false;	}	}function ProvjeriUnosBrojMjeseci(){		var BrMjeseciKracaOtplata=document.getElementById("BrMjeseciKracaOtplata").value;	if(BrMjeseciKracaOtplata!="" && parseInt(BrMjeseciKracaOtplata)>0){		document.getElementById("IznosRekapitulacija").readOnly=true;	}	else	{		document.getElementById("IznosRekapitulacija").readOnly=false;	}	}