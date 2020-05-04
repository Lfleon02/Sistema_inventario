{include file="header.tpl"}
<div class="container">
    <br />
       <p>
        <center><h3>Movimientos</h3></center>
      </p><br />
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#salidas" role="tab" aria-controls="salidas" aria-selected="true">Salidas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#entregas" role="tab" aria-controls="entregas" aria-selected="false">Entregas</a>
  </li>
</ul>
     
<br /><br />
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
              <input type="date" class="form-control" id="fecha" name="fecha" placeholder="MM/DD/YYY" required>
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
          <div class="form-row">
            <div class="form-group col-md-3">
            <label for="precio_pza">Precio unitario</label>
             <input type="number" class="form-control" id="precio_pza" name="precio_pza" placeholder="Precio por pieza" required>
          </div>
          <div class="form-group col-md-3">
           <label for="noreq">No. REQ</label>
             <input type="text" class="form-control" id="noreq" name="noreq" placeholder="N&uacute;mero de requisici&oacute;n" required>
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
        <br><br>
        <input type="text" name="search_text_entrega" id="search_text_entrega" placeholder="Buscar Entregas" class="form-control" value="" onclick="ver_entrega();" />
          <input type="hidden" id="coll_entrega" value="" name="id_del_nombre_entrega"><br>
        <div class="table-responsive">
        <form action="almacen_entregas.php" method="post">
         <div id="resul"></div>
       </form>
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
        $.post("includes/php/ajax/almacen/buscar_producto.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
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
        $.post("includes/php/ajax/almacen/buscar_producto.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
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
 
            $.post("includes/php/ajax/almacen/guardar_salida.php", {nota: nota, catValue: catValue, cantidad: cantidad, recibe: recibe, fecha: fecha}, function(mensaje) {
                $("#resultados").html(mensaje);
             }); 
            
          
};
function guardar_entrega() {
         var prod = document.getElementById('resultadoBusqueda1').value;
         var cantidad = $("input#cantidad1").val();
         var recibe1 = $("input#recibe1").val();
         var precio_pza = $("input#precio_pza").val(); 
         var noreq = $("input#noreq").val();
         var precioxcant = precio_pza * cantidad;
 
            $.post("includes/php/ajax/almacen/guardar_entrega.php", {prod: prod, cantidad: cantidad, recibe1: recibe1, precio_pza: precio_pza, noreq: noreq, precioxcant: precioxcant }, function(mensaje) {
                $("#resultados1").html(mensaje);
             }); 
            
          
};

function ver(){
  document.getElementById("resulta").style.display = '';
}
function ver_entrega(){
  document.getElementById("resul").style.display = '';
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
            document.getElementById("precio_pza").value = "";
            document.getElementById("noreq").value = "";
            document.getElementById("resul").style.display = 'none';

}

$(document).ready(function(){
  load_data();
  function load_data(query)
  {
    document.getElementById("resulta").style.display = '';
    $.ajax({
      url:"includes/php/ajax/almacen/ver_salidas.php",
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

$(document).ready(function(){
  load_data1();
  function load_data1(query)
  {
    document.getElementById("resul").style.display = '';
    $.ajax({
      url:"includes/php/ajax/almacen/ver_entregas.php",
      method:"post",
      data:{query:query},
      success:function(data)
      {
        $('#resul').html(data);
        var inputval = document.getElementById("valor_obtenido_entrega").value;
        document.getElementById("coll_entrega").value = inputval;

        
      }
    });
  }
  $('#search_text_entrega').keyup(function(){
    var searchn = $(this).val();
    if(searchn != '')
    {
      load_data1(searchn);
      //alert(search);
    }
    else
    {
      load_data1();      
    }
  });
  });
</script>

{/literal}

{include file="footer.tpl"}
