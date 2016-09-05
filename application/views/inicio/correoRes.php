<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .titulo{
                background-color: #72b9d0;
                text-align: center;
                border-width: 1px;
                border-style: solid;
                border-color:#62a5b0;
                border-radius: 10px;
            }
            .texto{
                text-align: justify;
                font-size: 14px;
                color: #000;
            }
            
            .bgtext{
                text-align: center;
                vertical-align: text-center;
                font-size: 18px;
                background-color: #fefbe2;
                border-width: 1px;
                border-style: solid;
                border-color:#dbcb52;
                border-radius: 10px;
                height: 50px;            
                width:  100%;
                margin-bottom: 20px;
            }
                   
            
            .cdsInfor {
                text-align: center;
                border-width: 3px;
                border-style: solid;
                border-color:#72b9d0;
                border-radius: 10px;
                text-align: justify;
            }
            
            .cdsInfor ul{
                list-style: none;
                text-align: left;
            }
            
            .cdsInfor p{
                text-indent: 40px;
            }
        </style>
    </head>
    <body>        
        <table align="center" width="800px">
            <tr>
                <td class="bgtext">
                    <p>Muchas gracias por confiar en nosotros, apartir de ahora trabajaremos en su solicitud</p>
                </td>
            </tr>
            <tr>
                <td class="titulo">
                    <h4>Realizó una <?php echo $titulo?></h4>
                </td>                
            </tr>
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td class="cdsInfor">
                                <blockquote>
                                    <span>
                                        <ul>
                                           <li>El siguiente mensaje fue enviado por usted <?php echo $nombre?>.</li>
                                            <li>Lugar de Residencia <?php echo $residencia?>.</li>
                                            <li>Correo Electrónio <?php echo $email?>.</li>
                                            <li>Fecha de Nacimiento <?php echo $fecnac?>.</li>
                                            <?php if(!empty($telefono)){ 
                                                   echo '<li>Número de Telefóno'. $telefono.'.</li>';
                                            }?>
                                        </ul>                                         
                                    </span>
                                    <br/>
                                    <p><?php echo $mensaje?></p>
                                </blockquote>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
