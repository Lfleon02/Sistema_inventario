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
        <center><h3>Salidas</h3></center>
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
         
          <!--<input type="submit" class="btn btn-primary" id="guardar" name="guardar" value="Guardar">-->
            
        </form>
        <br />
        <button class="btn btn-primary"  onclick="guardar_salida();">Registrar Salida</button>
        <br><br>
        <button class="btn btn-info"  onclick="limpiar();">limpiar campos</button>
        <br>
        <div id="resultados"></div>

  </div>
  <div class="tab-pane fade" id="entregas" role="tabpanel" aria-labelledby="profile-tab">...</div>
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
function guardar_salida() {
         var nota = $("input#nota").val();
         var catValue = document.getElementById('resultadoBusqueda').value;
         var cantidad = $("input#cantidad").val();
         var recibe = $("input#recibe").val(); 
 
            $.post("includes/php/ajax/almacen/guardar_salida.php", {nota: nota, catValue: catValue, cantidad: cantidad, recibe: recibe}, function(mensaje) {
                $("#resultados").html(mensaje);
             }); 
            
          
};

function limpiar(){

document.getElementById("nota").value = "";
            document.getElementById("resultadoBusqueda").value = "";
            document.getElementById("cantidad").value = "";
            document.getElementById("recibe").value = "";
            document.getElementById( 'resultadoBusqueda' ).style.display = 'none';
            document.getElementById("busqueda").value = "";

}
  
</script>

{/literal}

{include file="footer.tpl"}
