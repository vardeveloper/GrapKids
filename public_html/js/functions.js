$(document).ready(function(){
    $('#body').bgscroll({scrollSpeed:100 , direction:'h', heading: 'l'});
    $('#sliderBanner').bxSlider({
        mode: 'fade',
        captions: true,
        auto: true,
        controls: false,
        pause: 5000
    });
    $('#sliderPro').bxSlider({
        displaySlideQty: 3,
        moveSlideQty: 3,
        speed: 1500
    });
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
        $.post("http://www.grapkids.com/svc/boletin", {
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