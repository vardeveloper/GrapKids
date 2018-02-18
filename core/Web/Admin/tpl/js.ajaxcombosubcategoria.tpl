{literal}
  var JS = {
    start: function(){
      
     $("pro_uni_id").addEvent('change', function(e) {
        //primero voy a parar el evento para que no se envíe como lo haría normalmente
        e.stop();
        valor=$('pro_uni_id').value;
        svcUrl="{/literal}{$smarty.const.WEB_ROOT}{literal}/admin/svc/ajx-get-combo-sub-categoria/" + valor;
        var req = new Request({url:svcUrl, 

         onSuccess: function(html) {
          //Clear the text currently inside the results div.						
            $('combo_subcategoria').set('text', '');
            //Inject the new DOM elements into the results div.         
            $('combo_subcategoria').set('html',html);
            //$('ciudad').style.display="inline";
           }
         });				
				req.send();
			});
    }
  }
  window.addEvent('domready', JS.start);
{/literal}