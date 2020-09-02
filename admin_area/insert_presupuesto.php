<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insertar Presupuesto </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            <nav class="navbar navbar-inverse embed-responsive">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php?dashboard">Tablero</a>
                    <a class="navbar-brand" href="index.php?view_presupuestos"> Ver presupuestos </a>
                 </div>
                <p class="navbar-text pull-right"><i class="fa fa-pencil fa-1x"></i>  Insertar Presupuesto</p>
            </nav>
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Nombre Proveedor </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="proveedor_nombre" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Nombre Producto </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                    
                            <input name="product_nombre" type="text" class="form-control" required>          
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Cantidad Producto </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                     
                             <input name="cant_producto" type="number" class="form-control" required>          
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Observaciones </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                     
                            <textarea name="observaciones" cols="19" rows="6" class="form-control"></textarea>          
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                   
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="submit" value="Insertar Presupuesto" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php 

if(isset($_POST['submit'])){
    
    $proveedor_nombre = $_POST['proveedor_nombre'];
    $product_nombre = $_POST['product_nombre'];
    $cant_producto = $_POST['cant_producto'];
    $observaciones = $_POST['observaciones'];
    
    $insert_presupuesto = "insert into presupuestos 
    (proveedor_nombre,product_nombre,fecha_presupuesto,cant_producto,observaciones,estado) values 
    ('$proveedor_nombre','$product_nombre',NOW(),'$cant_producto','$observaciones','0');";
    
    $run_presupuesto = mysqli_query($con,$insert_presupuesto);
    
    if($run_presupuesto){
        
        echo "<script>alert('Tu presupuesto fue agregado correctamente!')</script>";
        echo "<script>window.open('index.php?insert_presupuesto','_self')</script>";
        
    }
    
}

?>


<?php } ?>