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
                <h5 class="box-title"> Ingresar Usuarios</h5>
            </div>
            <?php echo form_open('usuario')?>
             <?php echo validation_errors('<li class="error">','</li>'); ?>     
            <?php echo form_hidden('id')?>
            <div class="box-body">
                <div class="form-group">
                    <?php echo form_label('Login')?>
                    <?php echo form_input(['id'=>'usulogin','name'=>'login','maxlength'=>'90','class'=>'form-control','required'=>true])?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Nombre')?>
                    <?php echo form_input(['id'=>'usunombrelogin','name'=>'nombre','maxlength'=>'35','class'=>'form-control','required'=>true])?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Apellido')?>
                    <?php echo form_input(['id'=>'usuapellido','name'=>'apellido','maxlength'=>'35','class'=>'form-control','required'=>true])?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Cédula')?>
                    <?php echo form_input(['id'=>'uuscedula','name'=>'cedula','maxlength'=>'8','class'=>'form-control','required'=>true,'type'=>'number','min'=>'100000','max'=>'50000000'])?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Email')?>                
                    <?php echo form_input(['id'=>'usuemail','name'=>'email','maxlength'=>'125','class'=>'form-control','required'=>true,'type'=>'email'])?>
                </div>
                 <div class="form-group">
                   <?php echo form_label('Bloqueado')?>
                    <?php echo form_checkbox(['name'=>'bloqueado','value'=>true,'class'=>'flat-red'])?>
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
                    Lista de Usuarios
                </h5>
            </div>
            <div class="box_body">
                <table class="table table-bordered table-hover" id="listaUsuarios">
                    <thead>
                        <tr>
                            <th class="text-center">Login</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Apellido</th>
                            <th class="text-center">Cédula</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Bloqueado</th>
                            <th class="text-center">Password</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach($lista as $ky){
                                    echo '<tr><td>'.$ky->login.'</td>
                                    <td>'.$ky->nombre.'</td>
                                    <td>'.$ky->apellido.'</td>
                                    <td>'.$ky->cedula.'</td>
                                    <td>'.$ky->email.'</td>
                                    <td  class="text-center">'.form_checkbox(['name'=>'bloqueado','checked'=>$ky->bloqueado,'value'=>$ky->id,'class'=>'flat-red','disabled'=>true]).'</td>
                                    <td class="text-center">'.  form_button(['name'=>'Reset',
                                                         'class'=>'btn btn-info Resetear',
                                                         'login' =>$ky->nombre.' '.$ky->apellido,
                                                         'value'=>$ky->id,
                                                         'title'=>'Resetear Contraseña'
                                                        ],'<i class="fa fa-key"></i>').'</td>
                                    <td class="text-center">'.  form_button(['name'=>'Modificar',
                                                         'class'=>'btn btn-info Modificar',
                                                        'login' =>$ky->nombre.' '.$ky->apellido,
                                                         'value'=>$ky->id,
                                                         'title'=>'Modificar usuario'
                                                        ],'<i class="fa fa-pencil"></i>').' '.
                                            form_button(['name'=>'Eliminar',
                                                       'class'=>'btn btn-danger Eliminar',
                                                        'login' =>$ky->nombre.' '.$ky->apellido,
                                                        'value'=>$ky->id,
                                                        'title'=>'Eliminar usuario'
                                                       ],'<i class="fa fa-trash-o"></i>').'</td></tr>';
                        }?>  
                    </tbody>                  
                </table>
            </div>
        </div>
    </div>
</div>