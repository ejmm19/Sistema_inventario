$(document).ready(function(){
        var consulta;
        //hacemos focus al campo de búsqueda
        $("#busqueda").focus();
                                                                                                     
        //comprobamos si se pulsa una tecla
        $("#busqueda").keyup(function(e){
                                      
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#busqueda").val();
              //hace la búsqueda                                                                                  
              $.ajax({
                    type: "POST",
                    url: "php/functions.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                    //imagen de carga
                    $("#resultado").html("<p align='center'><img src='img/loading1.gif' width='10%'></p>");
                    },
                    error: function(){
                    alert("error petición ajax");
                    },
                    success: function(data){                                                    
                    $("#resultado").empty();
                    $("#resultado").append(data);                                                             
                    }
              });                                                                          
        }); 
        
        

        $("#busca").focus();
                                                                                                     
        //comprobamos si se pulsa una tecla
        $("#busca").keyup(function(e){
                                      
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#busca").val();
              //hace la búsqueda                                                                                  
              $.ajax({
                    type: "POST",
                    url: "php/functions.php",
                    data: "busca="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                    //imagen de carga
                    $("#products").html("<p align='center'><img src='img/loading1.gif' width='10%'></p>");
                    },
                    error: function(){
                    alert("error petición ajax");
                    },
                    success: function(data){                                                    
                    $("#products").empty();
                    $("#products").append(data);                                                             
                    }
              });                                                                          
        });
         
        $.ajax({
                    type: "POST",
                    url: "php/functions.php",
                    data: "verpr",
                    dataType: "html",
                    beforeSend: function(){
                    //imagen de carga
                    },
                    error: function(){
                    alert("error petición ajax");
                    },
                    success: function(data){                                                    
                    $("#products").empty();
                    $("#products").append(data);                                                             
                    }
              });    
            $("#agregar").click(function(e){
                $("#agregar").css("display","none");
            });

            $("#entrar").click(function(){
            if ($("#usuario").val()=== "" && $("#password").val() === "") {
                $("#msjvacio").html("Los Campo de Usuario y Contraseña están Vacio");
                $("#msjvacio").css("display","block");
                $('#msjvacio').fadeOut(4000);
            }else if ($("#usuario").val() ==="") {
                $("#msjvacio").html("El Campo de Usuario está Vacio");
                $("#msjvacio").css("display","block");
                $('#msjvacio').fadeOut(4000);
            }else if ($("#password").val()==="") {
                $("#msjvacio").html("El Campo de laContraseña está Vacio");
                $("#msjvacio").css("display","block");
                $('#msjvacio').fadeOut(4000);
            }else{
                
                $.ajax({
                    type: "POST",
                    url: "php/functions.php",
                    data: $("#acceso").serialize(),
                    beforeSend: function(){
                    //imagen de carga
                    $("#cargando").html("<p align='center'><img src='img/loading1.gif' width='10%'><br>Cargando...</p>");
                    },
                    error: function(){
                    alert("error petición ajax");
                    },
                    success: function(data){ 
                    $("#cargando").css("display","none")
                    $("#msjvacio").css("display","block");                                                   
                    $("#msjvacio").html(data);   
                                                                              
                    }
              });

                 return false;
            }

        });
        $(".enviar").submit(function(){
                
                $.ajax({
                    type: "POST",
                    url: "php/functions.php",
                    data: $(".enviar").serialize(),
                    beforeSend: function(){
                    //imagen de carga
                    //$("#cargando").html("<p align='center'><img src='img/loading1.gif' width='10%'><br>Cargando...</p>");
                    },
                    error: function(){
                    alert("error petición ajax");
                    },
                    success: function(data){ 
                    $("#car").html(data);   
                                                                              
                    }
              });

                 return false;
            

        });
        $("#limit").click(function(){
                
                $.ajax({
                    type: "POST",
                    url: "php/functions.php",
                    data: $("#limitar").serialize(),
                    beforeSend: function(){
                    //imagen de carga
                    //$("#cargando").html("<p align='center'><img src='img/loading1.gif' width='10%'><br>Cargando...</p>");
                    },
                    error: function(){
                    alert("error petición ajax");
                    },
                    success: function(data){ 
                    window.location='./inicio.php?op=3';
                    //$("#car").html(data);   
                                                                              
                    }
              });

                 return false;
            

        });
        
        $("#confirmar").click(function(){
            $("#actualizar").css("display","block");
        });
        function agregar(){
            console.log('agregado al carrito');
        }

        

        $("#neim").keyup(function () {
        var value = $(this).val();
        $("#code").val(value);
    });
        
        
    $('#ingres').click(function(){
       console.log('hola mundo');

    });



        



});          