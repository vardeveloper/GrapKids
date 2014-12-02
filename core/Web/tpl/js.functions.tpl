{literal}
<!--script type="text/javascript"-->
    $(document).ready(function(){
    
        $('input#btnBoletin').click(function(){
            var boletin = $('input#txtBoletin').val();
            if(boletin == ''){
                alert('Ingrese su email');
                $("input#txtBoletin").focus();
                return false;
            }
            if (!validarEmail(boletin)) {
                alert('La dirección de email es incorrecta.');
                $("input#txtBoletin").focus();
                return false;
            }
            $.post("{/literal}{$smarty.const.WEB_ROOT}{literal}/svc/boletin", {
                boletin: boletin
            },
            function(){
                alert('Muchas gracias por suscribirte.');
                $('input#txtBoletin').val('');
            });
        });
        
    });

    function validarEmail(valor) {
        re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/
        if(!re.exec(valor))    {
            return false;
        }else{
            return true;
        }
    }
    
    function winOpenMsn() {
        window.open("{/literal}{$smarty.const.BASE_WEB_ROOT}/msn{literal}" , "ventana1" , "width=320,height=520,scrollbars=0,resizable=0,location=0,status=0,titlebar=0");
    }
    
    function winOpenGtalk() {
        window.open("{/literal}http://www.google.com/talk/service/badge/Start?tk=z01q6amlqn7rt1sj3bg326tl53imdobf3v13hromhpfq9hj2ppm0heeg2sik6jn4ij74arhdclvuv4a8tghj7r7fc79c93p81tqjjogqft2tiktnmr2udekabuli7h9trnmhfg1surmhsabuaciues62hfg18u43p82r1e5hm{literal}" , "ventana1" , "width=320,height=520,scrollbars=0,resizable=0,location=0,status=0,titlebar=0");
    }
<!--/script-->
{/literal}