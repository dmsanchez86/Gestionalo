<!DOCTYPE html>
<html>

    <head>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
        <script type="text/javascript">
            var webServiceURL = "../../Controlador/Controlador_01h.php";
            
            $(document).ready(function(){
                
                $(".input_task").submit(function(e){
                    e.preventDefault();
                    
                    var $nombre = $(this).find("#name").val();
                    var $descripcion = $(this).find("#description").val();
                    
                    
                        $.ajax({
                			type: 'POST',
                			url: webServiceURL,
                			data: {
                			    accion: "0",
                			    nombre: $nombre,
                			    descripcion: $descripcion,
                			},
                			success: function(msj){				
                				console.log(msj);
                			}
                		});
		
                    
                });
                
            });
            
        </script>
        
    </head>
    
    <body>
            <div class="container">
            	<div class="row">
                    <div class="col-sm-12">
                        <legend>Agregar Tarea</legend>
                    </div>
                    <!-- panel preview -->
                    <div class="col-sm-5">
                        <h4>Titulo:</h4>
                        
                        <form class="input_task" action="">
                            
                            <div class="panel panel-default">
                            <div class="panel-body form-horizontal payment-form">
                                <div class="form-group">
                                    <label for="concept" class="col-sm-3 control-label">Titulo</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="concept">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-sm-3 control-label">Fecha de Inicio</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="description" name="description"></textarea>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-default preview-add-button">
                                            <span class="glyphicon glyphicon-plus"></span> Agregar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        
                        </form>
                                   
                    </div> <!-- / panel preview -->
                    <div class="col-sm-7">
                        <h4>Preview:</h4>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table preview-table">
                                        <thead>
                                            <tr>
                                                <th>Concept</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody> <!-- preview content goes here-->
                                    </table>
                                </div>                            
                            </div>
                        </div>
                        <div class="row text-right">
                            <div class="col-xs-12">
                                <h4>Total: <strong><span class="preview-total"></span></strong></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <hr style="border:1px dashed #dddddd;">
                                <button type="button" class="btn btn-primary btn-block">Submit all and finish</button>
                            </div>                
                        </div>
                    </div>
            	</div>
            </div>
    </body>
</html>