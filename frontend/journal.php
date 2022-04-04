<!-- DataTables CSS librairie -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js">
    </script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- DataTables JS librairie -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <table id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Date du repas</th>
                                                <th>Type de repas </th>
                                                <th>nom de l'aliment </th>
                                                <th>Action </th>  
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Ajouter un repas</h1>
                                    </div>
                                    <form class="" id = "ajouterForm">
                                        <div class="form-group">
                                            <strong for="date" class="col-sm-2 control-label">Date du repas</strong>
                                            <div class="col-sm-12">
                                            <input type="date" autocomplete="off" class="form-control" id="date" name ="date" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <strong for="typerepas" class="col-sm-2 control-label">Type de répas</strong>
                                            <div class="col-sm-12">
                                            <input type="text" autocomplete="off" class="form-control" id="typerepas" name ="typerepas" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <strong for="nomaliment" class="col-sm-2 control-label">Nom de l'aliment</strong>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" autocomplete="off" id="nomaliment" name="nomaliment" placeholder="Entrer le nom de l'aliment" value="" maxlength="50" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <strong for="quantité" class="col-sm-2 control-label">Quantité ou portion</strong>
                                            <div class="col-sm-12">
                                            <input type="number" class="form-control" autocomplete="off" id="quantite" name="quantite" placeholder="Entrer le nom de l'aliment"  value="" maxlength="50" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-offset-2 col-sm-10">
                                             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Ajouter un repas
                                             </button>
                                         </div>
                                        
                    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>



<script>
  


     /** Suggestions d'aliments dans le champs Type d'aliment du form add */
 
 $('#typerepas').typeahead({
  
  source: function(query, result)
  {
   $.ajax({
    url:"../backend/searchtyperepas.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
        result(data);

    }
   })
  },
  showHintOnFocus:10
 });

 /** Suggestions d'aliments dans le champs Type d'aliment du form update */

 $('#nomaliment').typeahead({
  
  source: function(query, result)
  {
   $.ajax({
    url:"../backend/searchnomaliment.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
        result(data);

    }
   })
  },
  showHintOnFocus:10
 });



let id_utilisateur = <?php echo $_SESSION["id_utilisateur"];?>;

 $(document).ready(function() {
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax" : {
            "url" : "/backend/user.repas.php",
            "type" : "POST",
            "data" : {id : id_utilisateur}
                }      
    });
});

$("#ajouterForm").submit(function(e){
    e.preventDefault();
    $.ajax({
        url:"/backend/add-delete.user.php",
        type: "POST",
        data: {
            id: id_utilisateur,
            date:$("#date").val(),
            type: $("#typerepas").val(),
            nomaliment : $("#nomaliment").val(),
            quantite : $("#quantite").val(),
            mode : "add"
        },
        success: function(result){
            var oTable = $('#example').dataTable(); 
            oTable.fnDraw(false);
            $("#date").val()="";
            $("#typerepas").val()="";
            $("#quantite").val()="";
        }
    });
});



/* DELETE FUNCTION */
$('body').on('click', '.btn-delete', function () {
    var id = $(this).data('id');
    if (confirm("Are You sure want to delete !")) {
     $.ajax({
        url:"/backend/add-delete.user.php",
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
