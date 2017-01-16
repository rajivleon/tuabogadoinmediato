<div class="row" style="margin-top: 70px;  margin-bottom: 10px;">
    <div class="col-md-3 col-md-offset-5">
        <span class="text-yellow"><b>Usuario:</b> <?php echo $_SESSION['login'];?></span>
        <p><button class="btn btn-default btn-xs"  data-toggle="modal" data-target="#cambiarpassword">Cambiar Contraseña</button></p>
        <div class="modal fade" id="cambiarpassword" tabindex="-1" role="dialog" aria-labelledby="cambiarpasswordlabel" aria-hidden="true">
            <div class="modal-dialog modal-xs" role="document">
                <div class="modal-content">
                    <?php echo form_open('usuario')?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h3 class="modal-title" id="tituloSolicitud">Cambiar Contraseña</h3>
                    </div>
                    <div class="modal-body">
                        <?php echo form_password(['id'=>'password','name'=>'password','maxlength'=>'140','class'=>'form-control','placeholder'=>'Contraseña','required'=>true])?>
                        <?php echo form_password(['id'=>'passwordv','name'=>'passwordv','maxlength'=>'140','class'=>'form-control verifcapasss','placeholder'=>'Verifica Contraseña','required'=>true])?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" disabled="true" id="cambiarpass">Cambiar</button>
                    </div>
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">  
    <div class="col-md-3 col-md-offset-5 ">
        <div class="box box-default centered">
            <div class="box-header with-border text-center">
                <h5 class="box-title"> Ingresar Artículos</h5>
            </div>
            <?php echo form_open('articulo')?>
             <?php echo validation_errors('<li class="error">','</li>'); ?>     
            <?php echo form_hidden('id')?>
            <div class="box-body">
                <div class="form-group">
                    <?php echo form_label('Titulo')?>
                    <?php echo form_input(['id'=>'arttitulo','name'=>'titulo','maxlength'=>'140','class'=>'form-control','required'=>true])?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Artículo')?>
                    <?php echo form_input(['id'=>'artarticulo','name'=>'articulo','maxlength'=>'140','class'=>'form-control','required'=>true])?>
                </div>                
                <div class="form-group">
                    <?php echo form_label('Texto')?>
                    <?php echo form_textarea(['id'=>'arttextoa','name'=>'texto','class'=>'form-control'])?>
                </div>
                <div class="form-group">
                   <?php echo form_label('Publicar')?>
                    <?php echo form_checkbox(['name'=>'publicar','value'=>true,'class'=>'flat-red'])?>
                </div>
            </div>
            <div class="box-footer">
                <?php echo form_submit(['name'=>'registrar','value'=>'Registrar','class'=>'btn btn-success btn-sx'])?>
            </div>
            <?php echo form_close()?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-7 col-md-offset-3">
        <div class="box">
            <div class="box-header with-border text-center">
                <h5 class="box-title ">
                    Lista de Artículos
                </h5>
            </div>
            <div class="box_body">
                <table class="table table-bordered table-hover" id="listaUsuarios">
                    <thead>
                        <tr>
                            <th class="text-center">Título</th>
                            <th class="text-center">Artículo</th>
                            <th class="text-center">Texto</th>
                            <th class="text-center">fecha</th>
                            <th class="text-center">Publicado</th>
                            <th class="text-center">Publicado por</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($lista){
                                foreach($lista as $ky){
                                 echo '<tr><td>'.$ky->titulo.'</td>
                                    <td>'.$ky->articulo.'</td>
                                    <td>'.$ky->texto.'</td>
                                    <td>'.$ky->fechahora.'</td>
                                    <td  class="text-center">'.form_checkbox(['name'=>'bloqueado','checked'=>$ky->publicar,'value'=>$ky->id,'class'=>'flat-red','disabled'=>true]).'</td>
                                    <td>'.$ky->login.'</td>                                        
                                    <td class="text-center">'.  form_button(['name'=>'Modificar',
                                                         'class'=>'btn btn-info ModificarArt',
                                                        'login' =>$ky->titulo,
                                                         'value'=>$ky->id,
                                                         'title'=>'Modificar artículo'
                                                        ],'<i class="fa fa-pencil"></i>').' '.
                                            form_button(['name'=>'EliminarArt',
                                                       'class'=>'btn btn-danger EliminarArt',
                                                        'login' =>$ky->titulo,
                                                        'value'=>$ky->id,
                                                        'title'=>'Eliminar artículo'
                                                       ],'<i class="fa fa-trash-o"></i>').'</td></tr>';
                        }}?>  
                    </tbody>                  
                </table>
            </div>
        </div>
    </div>
</div>