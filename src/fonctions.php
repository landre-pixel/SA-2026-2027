
<?php
function connecter ($host=NULL,$user=NULL,$pass=NULL){
    if(func_num_args()==0){
        $connexion = @mysqli_connect();
    } else{
        $connexion = @mysqli_connect($host,$user,$pass);
    }

    if ($connexion) {
        mysqli_select_db($connexion, "sae26");
    }

    return $connexion;
}

function deconnecter ($connexion){
    if ($connexion) {
        @mysqli_close($connexion);
    }
}
?>
