
function verificar(event) {
    var x = event.which || event.keyCode;
   if(x == 13){paso_cero();}
            }

function paso_cero(){
      //remover los cp que estan en el div carac
        $("#carac").empty();
  //verificar si se inserta o se actualiza.
      var valor = "verificar";
      var modelo = document.getElementById('modelo').value;

      $.ajax({
      data: {"parametro5":valor, "parametro1": modelo},
      url: "includes/insertar.php",
      method:"POST",
      dataType:"json",
      success:function(data) {
      if(data[0] == null){
      alert("No existe, llena los campos para agregarlo.");
      $( "#1" ).show();
      }else {

data[0].trio1 =  data[0].trio1.slice(3, -4);
data[0].trio2 =  data[0].trio2.slice(3, -4);
data[0].trio3 =  data[0].trio3.slice(3, -4);

      document.getElementById('linea').value = data[0].linea;
      document.getElementById('modelo').value = data[0].modelo;
      document.getElementById('titulo').value = data[0].titulo;
      document.getElementById('slogan').value = data[0].slogan;
      document.getElementById('precio').value = data[0].precios;
      document.getElementById('central').value = data[0].central;
      document.getElementById('trio1').value = data[0].trio1;
      document.getElementById('trio2').value = data[0].trio2;
      document.getElementById('trio3').value = data[0].trio3;
      document.getElementById('foot').value = data[0].foot;
      document.getElementById('version').value = data[0].versiones;

      for(var i=0; i<data[0].versiones; i++)
      {
      n=i+1;

      html_data = '<div id ="i'+data[i].numero+'"><div><label id="l'+i+'">'+data[i].numero+'</label></div>';
      html_data += '<div><textarea id="'+data[i].numero+'" required>'+data[i].descripcion+'</textarea><img src="images/menos2.png" width="30" height="30" style="cursor: pointer;" onclick="menos('+data[i].numero+');"></div></div>';
      $('#carac').append(html_data);
      }
      $( "#2" ).show();
       $( "#mas" ).show();
      }
      }
      });

}

function paso_uno(){
//insertar el modelo en tabla modelos nuevo modelo
      var valor = "Paso1";
      var tipo = ""; // titulo de performance.
      var linea = document.getElementById('linea').value;
      var modelo = document.getElementById('modelo').value;
      var titulo = document.getElementById('titulo').value;
      var slogan = document.getElementById('slogan').value;
      var precio = document.getElementById('precio').value;
      var central = document.getElementById('central').value;
      var trio1 = "<p>"+document.getElementById('trio1').value+" </p>";
      var trio2 = "<p>"+document.getElementById('trio2').value+" </p>";
      var trio3 = "<p>"+document.getElementById('trio3').value+" </p>";
      var foot = document.getElementById('foot').value;
      var canti = document.getElementById('version').value;
      
      if(modelo!=''&&canti!=''){
      $.ajax({
      data: {"parametro1":modelo, "parametro2":trio1, "parametro3":trio2, "parametro4":trio3, "parametro5":valor, "parametro6":titulo, "parametro7":slogan, "parametro8":precio, "parametro9":central, "parametro10":tipo, "parametro11":linea, "parametro15":canti, "parametro16":foot},
      url: "includes/insertar.php",
      method:"POST",
      dataType:"json",
      success:function(data) {

      } 
      });

      $( "#primero" ).hide();
      $( "#segundo" ).show();

//definir cuantas versiones seran del modelo previamente insertado.
      var cant = document.getElementById('version').value;

      for(var i=0; i<cant; i++)
      {
      n=i+1;
      html_data = '<div><label id="c'+n+'"  value="cp'+n+'">cp'+n+'</label>  </div>';
      html_data += '<div><textarea id="cp'+n+'" required></textarea></div>'; 
      $('#dversion').append(html_data);
      }
      }
      else{
      alert("Campos Obligatorios");
      document.getElementById("modelo").style.border="1px solid red";
      document.getElementById("version").style.border="1px solid red";
      }

}



function paso_dos(){
//insertar las caracteristicas de las versiones
      var valor ="Paso2";
      var cant = document.getElementById('version').value;
      for(var i=0; i<cant; i++){
      n=i+1;
      var modelo = document.getElementById('modelo').value;
      var numero = document.getElementById('c'+n+'').innerHTML;
      var caracteristicas = document.getElementById('cp'+n+'').value;
      

      $.ajax({
      data: {"parametro14": modelo, "parametro12":numero, "parametro13":caracteristicas,"parametro5":valor},
      url: "includes/insertar.php",
      method:"POST",
      dataType:"json",
      success:function(data) {

      } 
      });
      }

      $( "#segundo" ).hide();
      $( "#tercero" ).show();
      setTimeout(function() {
      location.reload();
      }, 1000);

}

function paso_tres(){
//Actualizar el modelo      
      var valor = "Paso3";
      var tipo = ""; // titulo de performance
      var linea = document.getElementById('linea').value;
      var modelo = document.getElementById('modelo').value;
      var titulo = document.getElementById('titulo').value;
      var slogan = document.getElementById('slogan').value;
      var precio = document.getElementById('precio').value;
      var central = document.getElementById('central').value;
      var foot = document.getElementById('foot').value;
      var trio1 = "<p>"+document.getElementById('trio1').value+" </p>";
      var trio2 = "<p>"+document.getElementById('trio2').value+" </p>";
      var trio3 = "<p>"+document.getElementById('trio3').value+" </p>";
      var canti = parseInt(document.getElementById('version').value);

//extraer etiquetas parrafos

      for(var i=0; i<canti; i++){

            var n = "";
            
      n=i+1;
      var numero = document.getElementById('cp'+n+'').id;
      var caracteristicas = document.getElementById('cp'+n+'').value;

      $.ajax({
      data: {"parametro1":modelo, "parametro2":trio1, "parametro3":trio2, "parametro4":trio3, "parametro5":valor, "parametro6":titulo, "parametro7":slogan, "parametro8":precio, "parametro9":central, "parametro10":tipo, "parametro11":linea, "parametro15":canti, "parametro12":numero, "parametro13":caracteristicas, "parametro16":foot},
      url: "includes/insertar.php",
      method:"POST",
      dataType:"json",
      success:function(data) {

      }             
      });
      }


// agregar puedo usar el paso2,
//al dar click en agregar


$( "#primero" ).hide(); 
$( "#segundo" ).hide();
      $( "#tercero" ).show();
      setTimeout(function() {
      location.reload();
      }, 1000);
}

function mas(){
      //agregar version a un modelo previamente dado de alta.
                  var from = parseInt(document.getElementById('version').value);
                  var versi = parseInt(document.getElementById('version').value);
                  versi =versi+1;
                  document.getElementById('version').value=versi;
                  var valor ="Paso2";
                  for(var i=from; i<versi; i++)
                  {
                  n=i+1;

                  html_data = '<div id ="icp'+n+'"><div><label id="l'+n+'"  value="cp'+n+'">cp'+n+'</label> </div>';
                  html_data += '<div><textarea id="cp'+n+'" >Escribe las caracteristicas</textarea><img src="images/menos2.png" width="30" height="30" style="cursor: pointer;" onclick="menos(cp'+n+');" ></div></div>'; 
                  $('#carac').append(html_data);

                  var modelo = document.getElementById('modelo').value;
                  var numero = document.getElementById('l'+n+'').innerHTML;
                  var caracteristicas = document.getElementById('cp'+n+'').value;

                  $.ajax({
                  data: {"parametro14": modelo, "parametro12":numero, "parametro13":caracteristicas,"parametro5":valor},
                  url: "includes/insertar.php",
                  method:"POST",
                  dataType:"json",
                  success:function(data) {

                  } 
                  });

                  }
      }

      function menos(id){

      var c = parseInt( document.getElementById('version').value);
      c= c-1;
      document.getElementById('version').value = c;
      var cpx = id.id; //cp seleccionado.
      var modelo = document.getElementById('modelo').value;
      var valor ="selectcarac";
      $.ajax({
      data: {"parametro1":modelo,  "parametro5":valor, "parametro15":c},
      url: "includes/insertar.php",
      method:"POST",
      dataType:"json",
      success:function(data) {

      q=c+1;
      for(var i=0; i<q; i++){
      if(data[i].numero==cpx){
      //cambiar id de textarea
      $("#i"+data[i].numero+"").attr("id","eliminando");
      $("#"+data[i].numero+"").attr("id","eliminando");
  
      for(var x=i; x<q; x++){
      $("#i"+data[x].numero+"").attr("id",'icp'+x);
      $("#"+data[x].numero+"").attr("id",'cp'+x);
      document.getElementById("l"+x+"").innerHTML ='cp'+x;
      }

      }

      }
    var element = document.getElementById('eliminando');
    element.parentNode.removeChild(element);
    $( "#eliminando" ).remove();
  
      }             
      });                  

      }
