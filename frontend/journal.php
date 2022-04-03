<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js">
    </script>
</head>
<body>
    <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
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
                                    <form class="">
                                        <div class="form-group">
                                            <strong for="date" class="col-sm-2 control-label">Date du repas</strong>
                                            <div class="col-sm-12">
                                            <input type="Date" autocomplete="off" class="form-control" id="date" name ="date" required="">
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
                                            <strong for="nomaliment" class="col-sm-2 control-label">Quantité ou portion</strong>
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" autocomplete="off" id="nomaliment" name="nomaliment" placeholder="Entrer le nom de l'aliment" value="" maxlength="50" required="">
                                            </div>
                                        </div>
                                       
                                        <a href="#" class="btn btn-primary  btn-block">
                                            Ajouter un repas
                                        </a>
                                        
                    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
<script>
    $(document).ready(function() {
    });


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
</script>

</body>