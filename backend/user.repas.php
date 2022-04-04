<?php
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




$table = "(SELECT repas.id_repas,repas.date, type_repas.libelle_repas, aliment.nom_aliment, composer.quantite_aliment 
FROM utilisateur, repas, type_repas, composer, aliment 
WHERE utilisateur.id_utilisateur = '".$_POST['id']."' 
AND repas.id_type_repas = type_repas.id_type_repas 
AND utilisateur.id_utilisateur = repas.id_utilisateur 
AND repas.id_repas = composer.id_repas 
AND composer.id_aliment = aliment.id_aliment) as temp";
 
// Table's primary key
$primaryKey = 'id_repas';



 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'date', 'dt' => 0 ),
    array( 'db' => 'libelle_repas',  'dt' => 1 ),
    array( 'db' => 'nom_aliment',   'dt' => 2 ),
    array( 
        'db'        => 'id_repas',
        'dt'        => 3, 
        'formatter' => function( $d, $row ) { 
            return '<a href="javascript:void(0)" class="btn btn-danger btn-delete ml-2" data-id="'.$row['id_repas'].'"> Delete </a>'; 
        } 
    ) 
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
    SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
);




?>