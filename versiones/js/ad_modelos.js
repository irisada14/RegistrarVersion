
function registrar(){
      var valor1 = ($('input:text[name=modelo]').val());
      var valor2 = ($('input:text[name=titulo]').val());
      var valor3 = ($('input:text[name=slogan]').val());
      var valor4 = ($('input:text[name=precios]').val());
      var valor5 = ($('input:text[name=central]').val());
     $.ajax({
        data: {"parametro1" : valor1, "parametro2" : valor2, "parametro3" : valor3, "parametro4" : valor4, "parametro5" : valor5},
        url:"includes/register_modelo.php",
        method:"POST",
        dataType:"json",
        success:function(data) {

        }
        });
}



function limpiar(){
  location.reload();
}