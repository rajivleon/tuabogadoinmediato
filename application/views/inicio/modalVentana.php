<div class="modal fade" id="mdlsolicitudes" tabindex="-1" role="dialog" aria-labelledby="mdlsolicitudeslabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form name="correo" method="post" action="inicio/email">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" arial-label="Cerrar"><span aria-hidden="true">X</span></button>
                    <h3 class="modal-title" id="tituloSolicitud">Solicitud</h3>
                    <input type="hidden" name="titulo" id="nombretitulo" value="">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="nombre" type="text" placeholder="Nombre y Apellido" required="true" class="form-control">
                            </div>
                             <div class="form-group">
                                <input name="residencia" type="text" placeholder="Lugar de Residencia" required="true" class="form-control">
                            </div>
                            <div class="form-group">
                                <input name="from" type="email" placeholder="Tu direción de correo" required="true" class="form-control">
                            </div>
                            <div class="form-group">
                                 <input name="fecnaci" type="date" placeholder="Día de Nacimiento" required="true" class="form-control">
                            </div>
                            <div class="form-group">
                                <input name="telefono" type="number" placeholder="Número Telefónico" class="form-control">
                            </div>
                            <div class="form-group" style="margin-top:10px">
                                <textarea name="mensaje" placeholder="Escriba detallamente su solicitud y/o requerimiento" class="form-control" required="true"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="bg-blue" id="condicionesTitulo">Términos y Condiciones</h4>
                            <p class="JustifyFull texto-solitario" id="condicionesText">Tuabogadoinmediato.com, mantiene su sitio web como un servicio para 
                                y sus clientes, es un enlace on-line, que asesora al usuario a fin de que tenga mejores conocimientos sus visitantes de la 
                                encuentre atravesando y de la cual solicite asesoría, de ninguna situación particular por la que se manera las soluciones 
                                planteadas a través de los enlaces correspondientes a tuabogadoinmediato.com, serán consideradas como la o las únicas 
                                posibilidades para que el usuario satisfaga su requerimiento. Ésta página es solo un medio electrónico, el cual cumple 
                                únicamente como asesoría en línea que no necesariamente resolverá su problema o percance legal, es un medio de información 
                                legal inmediata, que asesora y guía a la persona para tener un mejor conocimiento de su situación legal. Para solucionar 
                                conflictos legales correspondientes, debe contratar un abogado particular o un defensor público. Tuabogadoinmediato.com y 
                                su creador, no se hacen responsables de acciones realizadas por los usuarios, los resultados obtenidos por éstos, o las 
                                consecuencias obtenidas. Así como tampoco por el desconocimiento del tema y/o por falsas expectativas creadas por el propio 
                                usuario. Al aceptar los términos y condiciones, se compromete usted a no realizar ninguna acción legal en contra de 
                                tuabogadoinmediato.com, ni en contra de su creador. Con la mayor disponibilidad posible y con la intención de siempre ayudarle 
                                trabajaremos para usted. Al utilizar este sitio web o contratar cualquiera de nuestros servicios, usted acepta atenerse a los 
                                Términos y Condiciones.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                           <div class="checkbox">
                              <label>
                                  <input type="checkbox" name="acepta" required="true">Acepto los términos y condiciones de Tuabogadoinmediato.com
                              </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="Enviar" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
</div>