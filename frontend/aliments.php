

<div id="example0" class="box"></div>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id de l'aliment</th>
                <th>Nom de l'aliment </th>
                <th>ID type aliment </th>
            </tr>
        </thead>
        <tbody>
           

        </tbody>
    </table>


<script> 



$(document).ready(function() {
    $('#example').DataTable( {
        ajax: {
        url: '../backend/aliments.php',
        /*dataFilter: function(data){
            //var json = jQuery.parseJSON( data );
            return data["data"];
 
            //return JSON.stringify( json ); // return JSON string
        }*/
    },
        
        processing: true,
        search: {
            return: true
        },
        serverSide: true
    } );


});
</script>