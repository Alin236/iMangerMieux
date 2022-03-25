

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
        ajax: '../backend/aliments.php',
        
        processing: true,
        search: {
            return: true
        },
        serverSide: true
    } );


});
</script>