     $(function(){
         $('#mdlsolicitudes').on('show.bs.modal',function(ev){
         var button = $(ev.relatedTarget);
         var titulo = button.data('titulo');
         var modal = $(this);
         modal.find('.modal-title').text(titulo);
         modal.find('#nombretitulo').val(titulo);
        })
     })
