<?php
ob_start();
include("baza.php");
if(session_id()==""){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/stil.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.login{
  overflow: hidden;
  background-color: #000;
  color: red;
  font-weight: bold;
  margin-bottom: 10px;
  margin-left: 10px;
}

.poruka{
  background-color: #000;
  color: red;
  font-weight: bold;
  margin-top: 10px;
  margin-bottom: 10px;
  margin-left: 10px;
}
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: white !important;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
.topnav .active {
  background-color: #77df31;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
<script type="text/javascript" src="js/func.js"></script>
</head>
<body>

<h2>Financijski planer</h2>
<p>Unesite svoje dodatne zarade, primanja, ostalo, a mi ćemo vam napraviti potrebne izračune.</p>
<div class="login">
    <?php
if(isset($_SESSION["aktivni_korisnik"])){
    echo "<img src=\"images\user_online.jpg\" width=\"16px\" height=\"16px\" title=\"Prijavljeni ste\"> ".$_SESSION["aktivni_korisnik"];
}
else
{
    echo "Niste prijavljeni";
}
?>
</div>
<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Home</a>
<?php
if(isset($_SESSION["aktivni_korisnik"])){
    PrijavaIstekla();
?>
  <a href="krediti.php">Proračun kredita</a>    <a href="zarada.php?nova=1">Nova instrukcija</a>    <a href="potencijalnainstrukcija.php?nova=1">Nova potencijalna instrukcija</a>    <a href="potencijalneinstrukcije.php">Popis potencijalnih instrukcija</a>
  <a href="primanje.php?nova=1">Novo primanje</a>
  <a href="projekt.php?nova=1">Novi projekt</a>
  <a href="projekti.php">Projekti</a>
  <a href="trosak.php?nova=1">Novi trošak</a>
  <a href="troskoviStatistika.php">Troškovi po danu</a>
  <a href="troskoviKategorija.php">Troškovi kategorija</a>
  <a href="koverta.php?nova=1">Nova evidencija - koverta</a>
  <a href="koverta.php?stanje=1">Koverta - stanje</a>
  <a href="zaradeKategorija.php">Zarade po kategoriji</a>
  <a href="zarade.php">Popis instrukcija - sve</a>
  <a href="zarademjeseci.php">Popis instrukcija - po mjesecima</a>
  <a href="zaradegodine.php">Popis instrukcija - po godinama</a>
  <a href="primanjamjeseci.php">Primanja - po godinama</a>
  <a href="primanjainstrukcijemjeseci.php">Primanja i instrukcije - po godinama</a>
  <a href="zaradegodine.php">Zarade po godinama</a>
  <a href="odjava.php">Odjava</a>
  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
<?php
}
?>
  <script>
  
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
	
	
}
</script>
</div>


    
    <?php
if(!isset($_SESSION["aktivni_korisnik"])){
?>
<div id="contact-form">
       
	<div>
		<h1>Prijavite se u aplikaciju</h1> 
	</div>
		<p id="failure">Pogrešni podaci za prijavu</p>  
		<p id="success">Your message was sent successfully. Thank you!</p>

		   <form method="post" action="prijava.php">
			<div>
		      <label for="korisnik">
		      	<span class="required">Korisničko ime: *</span> 
		      	<input type="text" id="KorIme" name="KorIme" value="" placeholder="korisničko ime" required="required" tabindex="1" autofocus="autofocus"  oninvalid="this.setCustomValidity("Unesite korisničko ime')"/>
		      </label> 
			</div>
			<div>
		      <label for="lozinka">
		      	<span class="required">Šifra: *</span>
		      	<input type="password" id="Lozinka" name="Lozinka" value="" placeholder="šifra" tabindex="2" required="required" oninvalid="this.setCustomValidity('Unesite šifru')"/>
		      </label>  
			</div>
                       	<div>
		      <label for="poruka">
		      	<?php
                        if(isset($_SESSION["poruka"])){
                            echo $_SESSION["poruka"];
                            unset($_SESSION["poruka"]);
                        }
                        ?>
		      </label>  
			</div>
			<div>		           
		      <button name="submit" name="prijava" type="submit" id="submit" >Prijavi se</button> 
			</div>
		   </form>
               </div>
             <?php
}
else
{
    
    if(basename($_SERVER["SCRIPT_NAME"])=="index.php"){       
    echo "<div id=\"contact-form\">";
    echo "<img src=\"images/financije.jpg\" width=\"100%\">";
    echo "</div>";
    }
}
?>
                
	 
