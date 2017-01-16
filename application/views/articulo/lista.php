  <?php  if($listaArticulos){
            foreach($listaArticulos as $ky){
           if($ky->publicar){?>
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <div class="box">          
                        <div class="box_body">
                            <table class="table table-bordered table-hover" id="listaUsuarios">
                                <tbody>
                                    <tr><td><b><?php echo $ky->articulo?></b></td></tr>
                                    <tr><td><blockquote class="text-justify"><?php echo $ky->texto?></blockquote></td></tr>                    
                                </tbody>                  
                            </table>
                        </div>
                    </div>
                </div>
            </div>
  <?php }}} ?>