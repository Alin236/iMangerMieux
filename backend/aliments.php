



<?php
$conn = new mysqli("localhost", "root", "", "imangermieux");
if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}
$response = array();
$res =  mysqli_query($conn,"select * from aliment");

//echo "Connexion succeed\n";

$req =  mysqli_query($conn,"select * from aliment ");

if(mysqli_num_rows($req) >  0){
	
	$tmp=array();
	$response["aliment"]=array();
	
	while($cur=mysqli_fetch_array($req))
	{
        $tmp["id_aliment"]= $cur["id_aliment"];
        $tmp["nom_aliment"]=$cur["nom_aliment"];
        $tmp["id_type_aliment"]=$cur["id_type_aliment"];
		array_push($response["aliment"],$tmp);
        //echo json_encode($tmp);
	}
	$response["success"]=1;
	echo json_encode(($response["aliment"]));
		
}
else
{
	$response["success"]=0;
	$response["message"]="no data found";
	echo json_encode($response);
	
}


?>