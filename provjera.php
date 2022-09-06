<?php

session_start();


if(!isset($_SESSION["prvi"])){
    $_SESSION["prvi"]=date("d.m.Y H:i:s");
    echo "<br>Prvi pristup: ".$_SESSION["prvi"];
}
 else {
    
    echo "<br>Prvi pristup: ".$_SESSION["prvi"];
    
    ProvjeriDrugi();
    
}



function ProvjeriDrugi(){
    $_SESSION["drugi"]=date("d.m.Y H:i:s");
    echo "<br>Drugi pristup: ".$_SESSION["drugi"];
    if((strtotime($_SESSION["drugi"])-strtotime($_SESSION["prvi"]))>30){
        session_destroy();
        $razlika = strtotime($_SESSION["drugi"])-strtotime($_SESSION["prvi"]);
        echo "<br>Razlika: ".$razlika;
        //header("Location: provjera.php");               
    }
    else
    {
       $_SESSION["prvi"]= $_SESSION["drugi"];
       
    }
    
    
}

?>