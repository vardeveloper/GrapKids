{literal}
  var JS = {
    start: function(){
      
     $("pri").addEvent('change', function(e) {
        //primero voy a parar el evento para que no se envie como lo haria normalmente
        e.stop();
        valor=$('pri').value;
       
        svcUrl="{/literal}{$smarty.const.WEB_ROOT}{literal}/admin/usuarios/svc/ajx-get-combo/" + valor;
        var req = new Request.HTML({url:svcUrl, 

         onSuccess: function(html) {
          //Clear the text currently inside the results div.
          
          $('privilegios').set('text', '');
          //Inject the new DOM elements into the results div.
       
          $('privilegios').adopt(html);
          
         }
         });
    
      req.send();

      });
    }
  }
  window.addEvent('load', JS.start);
{/literal}