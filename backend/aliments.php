<?php
/*$conn = new mysqli("localhost", "root", "", "imangermieux");
if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}
$response = array();
$res =  mysqli_query($conn,"select * from aliment");

//echo "Connexion succeed\n";

$req =  mysqli_query($conn,"select * from aliment LIMIT 4 ");

if(mysqli_num_rows($req) >  0){
	
	$tmp=array();
	$response["aliment"]=array();
	while($cur=mysqli_fetch_array($req))
	{
        $tmp["id_aliment"] = $cur["id_aliment"];
        $tmp["nom_aliment"] = $cur["nom_aliment"];
        $tmp["id_type_aliment"] = $cur["id_type_aliment"];
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
	
}*/

 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'aliment';
 
// Table's primary key
$primaryKey = 'id_aliment';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id_aliment', 'dt' => 0 ),
    array( 'db' => 'nom_aliment',  'dt' => 1 ),
    array( 'db' => 'id_type_aliment',   'dt' => 2 ),
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'imangermieux',
    'host' => 'localhost'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);


?>