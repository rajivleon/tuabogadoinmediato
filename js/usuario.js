$(function(){
    
    //Modificar Usuario
    $('.Modificar').click(function(){
        if(confirm('¿Desea modificar la información al usuario '+$(this).attr('login')+'?')){
            $.post('usuario/datosUsuario',{id:$(this).val()},function(e){
                var l = $.parseJSON(e);
               $.map(l[0],function(v,k){
                   if(!((k=='bloqueado')&&(v==0))){
                        $('input[name='+k+']').val(v);
                    }
                })
            });
        }
    });
    
    //Resetear Password
    $('.Resetear').click(function(){
        if(confirm('¿Desea resetear el password al usuario '+$(this).attr('login')+'?')){
            $.post('usuario/resetarPassword',{id:$(this).val()});
        }
    });
    
    //Eliminar Usuario
    $('.Eliminar').click(function(){
        if(confirm('¿Desea eliminar al usuario '+$(this).attr('login')+'?')){
            $.post('usuario/eliminar',{id:$(this).val()},function(e){
                location.reload();
            });
        }         
    });   
    
   //Modificar Articulo
   $('.ModificarArt').click(function(){
       if(confirm('¿Desea eliminar al articulo '+$(this).attr('login')+'?')){
         $.post('articulo/datosArticulo',{id:$(this).val()},function(e){
                var l = $.parseJSON(e);               
                $.map(l[0],function(v,k){
                   if(!((k=='publicar')&&(v==0))){
                        $('input[name='+k+']').val(v);
                        if(k==='texto'){
                         $('textarea').text(v);   
                        }                       
                    }
                })
            });
       }
   });
   
   //Eliminar Artículo
    $('.EliminarArt').click(function(){
        if(confirm('¿Desea eliminar el artículo '+$(this).attr('login')+'?')){
            $.post('articulo/eliminar',{id:$(this).val()},function(e){
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
   
   $('.verifcapasss').keyup(function(){
       if($('#password').val().length === $('#passwordv').val().length){
           if($('#password').val()== $('#passwordv').val()){
               $('#cambiarpass').attr('disabled',false);
           }
       }
   });
   
  $('#cambiarpass').click(function(){
    $.post('usuario/cambioPass',{password:$('#password').val()},function(){
     location.reload();
     });
  });
   
 })


