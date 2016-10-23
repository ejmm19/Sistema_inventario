var altura = $('#carrito').offset().top;
        var anchura = $(window).width();

            
            if (anchura>800) {
                $(window).on('scroll', function(){
                if ($(window).scrollTop()>altura) {
                    $('#carrito').addClass('menu-fixed');
                    
                }else{
                    $('#carrito').removeClass('menu-fixed');
                    
                }
            });
            }