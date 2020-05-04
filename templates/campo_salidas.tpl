{include file="header.tpl"}
<div class="container">
    <br />
      
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#salidas" role="tab" aria-controls="salidas" aria-selected="true">Salidas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#entregas" role="tab" aria-controls="entregas" aria-selected="false">Entregas</a>
  </li>
</ul>
      <p>
        <center><h3>Campo - Salidas</h3></center>
      </p><br />

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="salidas" role="tabpanel" aria-labelledby="home-tab">
    
        <form method="post" id="salidas">
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="Nombre">No de nota</label>
              <input type="number" class="form-control" id="nota" name="nota" placeholder="N&uacute;mero de nota" required>
            </div>
            <div class="form-group col-md-3">
              <label for="Almacen">Producto</label>
              <input type="text" class="form-control" id="busqueda" name="busqueda" onKeyUp="buscar();" placeholder="Producto" autocomplete="off">
              <div><select id="resultadoBusqueda" name="producto" style="display: none" multiple required></select></div>
            </div>
            <div class="form-group col-md-3">
            <label for="Descripcion">Cantidad</label>
             <input type="number" class="form-control" id="cantidad" name="cantidad" required>
          </div>
          <div class="form-group col-md-3">
           <label for="recibe">Recibe</label>
             <input type="text" class="form-control" id="recibe" name="recibe" placeholder="Persona que recibe el producto" required>
          </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="Nombre">Fecha</label>
              <input type="date" class="form-control" id="fecha" name="nota" placeholder="MM/DD/YYY" required>
            </div>
          </div>
         
          <!--<input type="submit" class="btn btn-primary" id="guardar" name="guardar" value="Guardar">-->
            
        </form>
        <br />
        <button class="btn btn-primary"  onclick="guardar_salida();">Registrar Salida</button>
        <br><br>
        <button class="btn btn-info"  onclick="limpiar();">limpiar campos</button>
        <br>
        <div id="resultados"></div>
        <br><br>
        <input type="text" name="search_text" id="search_text" placeholder="Buscar salidas" class="form-control" value="" onclick="ver();" />
          <input type="hidden" id="coll" value="" name="id_del_nombre"><br>
        <div class="table-responsive">
        <form action="almacen_salidas.php" method="post">
         <div id="resulta"></div>
        </form>
      </div>

  </div>
  <div class="tab-pane fade" id="entregas" role="tabpanel" aria-labelledby="profile-tab">
    
    <form method="post" id="entregas">
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="Almacen">Producto</label>
              <input type="text" class="form-control" id="busqueda1" name="busqueda" onKeyUp="buscar1();" placeholder="Producto" autocomplete="off">
              <div><select id="resultadoBusqueda1" name="producto1" style="display: none" multiple required></select></div>
            </div>
            <div class="form-group col-md-3">
            <label for="Descripcion">Cantidad</label>
             <input type="number" class="form-control" id="cantidad1" name="cantidad1" required>
          </div>
          <div class="form-group col-md-3">
           <label for="recibe">Recibe</label>
             <input type="text" class="form-control" id="recibe1" name="recibe1" placeholder="Persona que recibe el producto" required>
          </div>
          </div>
         
          <!--<input type="submit" class="btn btn-primary" id="guardar" name="guardar" value="Guardar">-->
            
        </form>
        <br />
        <button class="btn btn-primary"  onclick="guardar_entrega();">Registrar Entrega</button>
        <br><br>
        <button class="btn btn-info"  onclick="limpiar1();">limpiar campos</button>
        <br>
        <div id="resultados1"></div>

  </div>
</div>

</div>

{literal}

<script>
$(document).ready(function() {
    $("#resultadoBusqueda").html('<p> VACIO</p>');
});
function getin(){
  var prod =document.getElementById('resultadoBusqueda').value;
  document.getElementById('busqueda').value = prod;
}

function buscar() {
    var textoBusqueda = $("input#busqueda").val();
  document.getElementById( 'resultadoBusqueda' ).style.display = '';
     if (textoBusqueda != "") {
        $.post("includes/php/ajax/campo/buscar_producto.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusqueda").html(mensaje);
         }); 
     } else { 
        $("#resultadoBusqueda").html('<p>Sin registro</p>');
        };
};
</script>

<script>
$(document).ready(function() {
    $("#resultadoBusqueda1").html('<p> VACIO</p>');
});
function getin1(){
  var prod =document.getElementById('resultadoBusqueda1').value;
  document.getElementById('busqueda1').value = prod;
}

function buscar1() {
    var textoBusqueda = $("input#busqueda1").val();
  document.getElementById( 'resultadoBusqueda1' ).style.display = '';
     if (textoBusqueda != "") {
        $.post("includes/php/ajax/campo/buscar_producto.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusqueda1").html(mensaje);
         }); 
     } else { 
        $("#resultadoBusqueda1").html('<p>Sin registro</p>');
        };
};
</script>

<script>
function guardar_salida() {
         var nota = $("input#nota").val();
         var catValue = document.getElementById('resultadoBusqueda').value;
         var cantidad = $("input#cantidad").val();
         var recibe = $("input#recibe").val(); 
         var fecha = $("input#fecha").val(); 
 
            $.post("includes/php/ajax/campo/guardar_salida.php", {nota: nota, catValue: catValue, cantidad: cantidad, recibe: recibe, fecha: fecha}, function(mensaje) {
                $("#resultados").html(mensaje);
             }); 
            
          
};
function guardar_entrega() {
         var prod = document.getElementById('resultadoBusqueda1').value;
         var cantidad = $("input#cantidad1").val();
         var recibe = $("input#recibe1").val(); 
 
            $.post("includes/php/ajax/campo/guardar_entrega.php", {prod: prod, cantidad: cantidad, recibe: recibe}, function(mensaje) {
                $("#resultados1").html(mensaje);
             }); 
            
          
};

function ver(){
  document.getElementById("resulta").style.display = '';
}

function limpiar(){

document.getElementById("nota").value = "";
            document.getElementById("resultadoBusqueda").value = "";
            document.getElementById("cantidad").value = "";
            document.getElementById("recibe").value = "";
            document.getElementById( 'resultadoBusqueda' ).style.display = 'none';
            document.getElementById("busqueda").value = "";
            document.getElementById("search_text").value = "";
            document.getElementById("resulta").style.display = 'none';

}
function limpiar1(){

            document.getElementById("resultadoBusqueda1").value = "";
            document.getElementById("cantidad1").value = "";
            document.getElementById("recibe1").value = "";
            document.getElementById( 'resultadoBusqueda1' ).style.display = 'none';
            document.getElementById("busqueda1").value = "";

}

$(document).ready(function(){
  load_data();
  function load_data(query)
  {
    document.getElementById("resulta").style.display = '';
    $.ajax({
      url:"includes/php/ajax/campo/ver_salidas.php",
      method:"post",
      data:{query:query},
      success:function(data)
      {
        $('#resulta').html(data);
        var inputval = document.getElementById("valor_obtenido").value;
        document.getElementById("coll").value = inputval;

        
      }
    });
  }
  $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
      load_data(search);
      //alert(search);
    }
    else
    {
      load_data();      
    }
  });
  });
  
</script>

{/literal}

{include file="footer.tpl"}
