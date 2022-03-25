

<div id="example0" class="box"></div>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id de l'aliment</th>
                <th>Nom de l'aliment </th>
            </tr>
        </thead>
        <tbody>
            <tr>
             
            </tr>

        </tbody>


<script> 

$(document).ready(function() {
    $('#example').DataTable( {
        ajax: '../backend/aliments.php',
        "pagingType": "scrolling"
        processing: true,
        search: {
            return: true
        },
        serverSide: true
    } );


} );</script>