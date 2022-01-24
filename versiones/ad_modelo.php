<?php
include_once 'includes/ps_config.php';
include_once 'includes/db_connect.php';
include_once 'includes/conectar.php';
include_once 'includes/conexion.php';
//include_once 'includes/functions.php';
//sec_session_start();
?>     
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta charset="UTF-8">
        <title>Subir Modelo</title>
         <link href="css/bootstrap-editable.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-2.0.3.min.js"></script>
        <script src="js/jquery-2.1.1.js"></script> 
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-editable.js"></script>
        <script src="js/ad_modelo.js?v=<?php echo(rand()); ?>"></script> 
        <link href="css/formulario.css" rel="stylesheet" type="text/css"/>
    </head>
 <body>

  <span class="header">
    <center>
    <h2>Subir Modelo a la WEB</h2></center>
  </span>


  <div id="primero">
    <center><label class="circulo">1</label><h4>Registra el modelo</h4></center>

<center>
<div><label>Modelo :<input id="modelo" type="text" name="modelo" placeholder="Modelo"  onkeypress="verificar(event)"></label></div>
<div><label>Linea  :<select id="linea" required>
  <option>Auto</option>
  <option>Suv</option>
  <option>Camión</option>
  <option>Performance</option>
</select></div>
<div><label>Precio :<input type='text' name='precios' id='precio' placeholder="Rango de Precios" required/></label></div></center>
<div><label>Titulo :</label></div><div><textarea  type='text' name='titulo' id='titulo' required></textarea></div>
<div><label>Eslogan :</label></div><div><textarea type='text' name='slogan' id='slogan' required></textarea></div>
<div><label>central :</label></div><div><textarea type='text' name='central' id='central' required></textarea></div>
<div><label>Trio 1 :</label></div><div><textarea id="trio1" type='text'  name="trio1"></textarea></div>
<div><label>Trio 2 :</label></div><div><textarea id="trio2" type='text'  name="trio2"></textarea></div>
<div><label>Trio 3 :</label></div><div><textarea id="trio3" type='text' name="trio3"></textarea></div>
<div><label>Footer :</label></div><div><textarea id="foot" type='text' name="foot"></textarea></div>
<div><label>Version :</label></div>
    <div><input id="version" type="number" name="version" placeholder="Cantidad de Versiones" required><img hidden id="mas" src="images/mas.png" width="30" height="30" onClick="mas();" style="cursor: pointer;"></div>
    <div id="carac"></div>
 <br>
    <button  id="1" type="submit" value="Siguiente"  onclick="paso_uno();">Siguiente</button>
    <button hidden id="2" type="submit" value="Actualizar"  onclick="paso_tres();">Actualizar</button>
</div>
</div>

 <div hidden id="segundo">
  <center><label class="circulo">2</label><h4>Registra las caracteristicas de las versiones </h4></center>
    <div></div>
    <div id="dversion"></div>
    <div id="newversion"></div>

    
<div><br><button type="submit" value="Terminar" class="btn-form" onclick="paso_dos();">Terminar</button></div>
</div>
<div hidden  id="tercero">
  <center><label class="circulo">3</label></center>
  <center><h1>Guardado!!</h1></center>
</div>

</body>
</html>
