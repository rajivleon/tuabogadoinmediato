$(function(){
    
    //Modificar Usuario
    $('.Modificar').click(function(){
        if(confirm('¿Desea modificar la información al usuario '+$(this).attr('login')+'?')){
            $.post('usuario/datosUsuario',{id:$(this).val()},function(e){
                var l = $.parseJSON(e);
               $.map(l[0],function(v,k){
                   $('input[name='+k+']').val(v);
                })
            });
        }
    });
    
    //Resetear Usuario
    $('.Resetear').click(function(){
        if(confirm('¿Desea resetear el password al usuario '+$(this).attr('login')+'?')){
            $.post('usuario/resetarPassword',{id:$(this).val()});
        }
    });
    
    //Eliminar Usuario
    $('.Eliminar').click(function(){
        if(confirm('¿Desea eliminar al usuario'+$(this).attr('login')+'?')){
            $.post('usuario/eliminar',{id:$(this).val()},function(){
                location.reload();
            });
        }         
    });   
        
    $('input[type="checkbox"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green'
    });
            
    $("#listaUsuarios").DataTable({
         "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth":true
    });
 })


