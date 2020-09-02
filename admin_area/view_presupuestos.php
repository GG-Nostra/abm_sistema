<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <nav class="navbar navbar-inverse embed-responsive">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php?dashboard">Tablero</a>
                    <a class="navbar-brand" href="index.php?insert_product"> Insertar Producto </a>
                 </div>
                <p class="navbar-text pull-right"><i class="fa fa-pencil fa-1x"></i>  Ver Productos</p>
            </nav>
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> ID Presupuesto: </th>
                                <th> Nombre Proveedor: </th>
                                <th> Nombre Producto: </th>
                                <th> Fecha Producto: </th>
                                <th> Cantidad Producto: </th>
                                <th> Observaciones: </th>
                                <th> Estado Presupuesto: </th>
                                <th> Editar Estado: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_pro = "select * from presupuestos";
                                
                                $run_pro = mysqli_query($con,$get_pro);
          
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    
                                    $presupuesto_id = $row_pro['presupuesto_id'];
                                    
                                    $nombre_proveedor = $row_pro['proveedor_nombre'];
                                    
                                    $nombre_producto = $row_pro['product_nombre'];
                                    
                                    $cant_producto = $row_pro['cant_producto'];
                                    
                                    $observaciones = $row_pro['observaciones'];
                                    
                                    $pro_date = $row_pro['fecha_presupuesto'];

                                    $estado = $row_pro['estado'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $presupuesto_id; ?> </td>
                                <td> <?php echo $nombre_proveedor; ?> </td>
                                <td> <?php echo $nombre_producto; ?></td>
                                <td> <?php echo $pro_date ?> </td>
                                <td> <?php echo $cant_producto; ?> </td>
                                <td> <?php echo $observaciones; ?> </td>
                                <td><?php echo $estado; ?></td>
                                <td>      
                                <!-- Trigger the modal with a button -->
                                    <button type="button" class="btn btn-info btn-sx" data-toggle="modal" data-target="#myModal">Editar</button>
                                    
                                    <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Modificar el estado del presupuesto</h4>
                                            </div>
                                        <div class="modal-body">
                                            <form method="post" class="form-horizontal">    
                                                <form class="form-group">
                                                    <select name="estado_presupuesto" class="form-control">    
                                                                    <option disabled value="Select Category">Seleccionar Estado</option>
                                                                    <option value="0"> Ingresado</option>
                                                                    <option value="1"> Rechazado </option>
                                                                    <option value="2"> Aceptado </option>
                                                                    <option value="3"> Respondido </option>    
                                                    </select>  
                                                    <div class="modal-footer"></div>
                                                    <input name="update_presupuesto" value="Actualizar presupuesto" type="submit" class="btn btn-primary form-control">
                                                    </div>                                               
                                                </form>   
                                                    </div>
                                
                                        </form>
                                    </div>

                                </div>
                            </div>
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
<script type="text/javascript">
    function ConfirmDelete()
    {
        var respuesta = confirm("Estas seguro que deseas eliminar este Producto?");

        if (respuesta == true )
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
    function ConfirmUpdate()
    {
        var respuesta = confirm("Estas seguro que quieres agregar este estado al producto?");

        if (respuesta == true )
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
</script>
<?php 

if(isset($_POST['update_presupuesto'])){

        $presupuesto_estado =$_POST['estado_presupuesto'];

        $update_presupuesto = "update presupuestos set estado='$presupuesto_estado' 
        where presupuesto_id='$presupuesto_id'";
        
        $run_product = mysqli_query($con,$update_presupuesto);
        
        if($run_product){
            
        echo "<script>alert('Tu estado de presupuesto fue actualizado correctamente)</script>"; 
            
        echo "<script>window.open('index.php?view_presupuestos','_self')</script>"; 
            
        }
        
    }else{

        echo "<script>alert('Tu estado no fue actualizado correctamente') </script>";

    }?>
<?php } ?>
