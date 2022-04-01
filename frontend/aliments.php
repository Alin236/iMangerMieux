<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- DataTables CSS librairie -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- DataTables JS librairie -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <style type="text/css">
        .bs-example{
            margin: 20px;
        }
    </style>
</head>

<body>
    <div class="bs-example">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="float-left">Liste des aliments</h2>
                        <a href="javascript:void(0)" class="btn btn-primary float-right add-model"> Ajouter un aliment </a>
                    </div>
                     
                   <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id de l'aliment</th>
                            <th>Nom de l'aliment </th>
                            <th>Type aliment </th>
                            <th>Action </th>

                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id de l'aliment</th>
                            <th>Nom de l'aliment </th>
                            <th>Type aliment </th>
                            <th>Action </th>
                        </tr>

                    </tfoot>
                </table>
            </div>
            </div>        
        </div>
    </div>
</body>



<div class="modal fade" id="edit-modal" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="userCrudModal"></h4>
          </div>
          <div class="modal-body">
              <form id="update-form" name="update-form" class="form-horizontal">
                 <input type="hidden" name="id" id="id">
                  <input type="hidden" class="form-control" id="mode" name="mode" value="update">

                  <div class="form-group">
                      <label for="nom" class="col-sm-2 control-label">Nom de l'aliment</label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer nom de l'aliment" value="" maxlength="50" required="">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Type d'aliment</label>
                      <div class="col-sm-12">
                          <input type="type" class="form-control" id="type" name="type" placeholder="Entrer le type d'aliment" value="" required="">
                      </div>
                  </div>
                  <div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
                   </button>
                  </div>
              </form>
          </div>
          <div class="modal-footer">
             
          </div>
      </div>
  </div>
</div>

<div class="modal fade" id="add-modal" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="userCrudModal"></h4>
          </div>
          <div class="modal-body">
              <form id="add-form" name="add-form" class="form-horizontal">
                 <input type="hidden" class="form-control" id="mode" name="mode" value="add">
                 <div class="form-group">
                      <label for="id" class="col-sm-2 control-label">ID liment</label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" id="id" name="id" placeholder="Entrer l'Id de l'aliment" value="" maxlength="50" required="">
                      </div>
                  </div>

                 <div class="form-group">
                      <label for="nom" class="col-sm-2 control-label">Nom de l'aliment</label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer le nom de l'aliment" value="" maxlength="50" required="">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Type d'aliment</label>
                      <div class="col-sm-12">
                          <input type="type" class="form-control" id="type" name="type" placeholder="Entrer le type d'aliment" value="" required="">
                      </div>
                  </div>
                  <div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
                   </button>
                  </div>
              </form>
          </div>
          <div class="modal-footer">
             
          </div>
      </div>
  </div>
</div>






<script> 



$(document).ready(function() {
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": "../backend/aliments.php",

        
    } );


});



/*  add user model */
$('.add-model').click(function () {
    $('#add-modal').modal('show');
});

// add form submit
$('#add-form').submit(function(e){

    e.preventDefault();

    // ajax
    $.ajax({
        url:"../backend/add-edit-delete.php",
        type: "POST",
        data: $(this).serialize(), // get all form field value in serialize form
        success: function(){
            var oTable = $('#example').dataTable(); 
            oTable.fnDraw(false);
            $('#add-modal').modal('hide');
            $('#add-form').trigger("reset");
        }
    });
});  

/* edit user function */
$('body').on('click', '.btn-edit', function () {
    var id = $(this).data('id');
     $.ajax({
        url:"../backend/add-edit-delete.php",
        type: "POST",
        data: {
            id: id,
            mode: 'edit' 
        },
        dataType : 'json',
        success: function(result){
          $('#id').val(result.id_aliment);
          $('#nom').val(result.nom_aliment);
          $('#type').val(result.id_type_aliment);
          $('#edit-modal').modal('show');
        }
    });
});

// add form submit
$('#update-form').submit(function(e){

    e.preventDefault();
       
    // ajax
    $.ajax({
        url:"../backend/add-edit-delete.php",
        type: "POST",
        data: $(this).serialize(), // get all form field value in serialize form
        success: function(){
            var oTable = $('#example').dataTable(); 
            oTable.fnDraw(false);
            $('#edit-modal').modal('hide');
            $('#update-form').trigger("reset");
        }
    });
});  

/* DELETE FUNCTION */
$('body').on('click', '.btn-delete', function () {
    var id = $(this).data('id');
    if (confirm("Are You sure want to delete !")) {
     $.ajax({
        url:"../backend/add-edit-delete.php",
        type: "POST",
        data: {
            id: id,
            mode: 'delete' 
        },
        dataType : 'json',
        success: function(result){
            var oTable = $('#example').dataTable(); 
            oTable.fnDraw(false);
        }
     });
    } 
    return false;
});


</script>

</html>