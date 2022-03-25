

<div id="example" class="box"></div>
    <table id="table" class="display" style="width:100%">
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

</div>
<script> 
$(document).ready(function() {
    $('#example').DataTable( {
        ajax: '',
        "pagingType": "scrolling"
        processing: true,
        search: {
            return: true
        },
        serverSide: true
    } );


} );</script>