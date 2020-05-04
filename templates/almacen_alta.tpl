{include file="header.tpl"}
<div class="container">
  <br />
<p>
  <center><h3>Alta de productos</h3></center>
</p>
  <br />
  <form method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Nombre">Nombre</label>
      <input type="text" class="form-control" id="Nombre" name="nombre" placeholder="Nombre del producto" required>
    </div>
    <div class="form-group col-md-6">
      <label for="Almacen">Almac&eacute;n</label>
      <input type="text" class="form-control" id="Almacen" name="almacen" placeholder="Ubicaci&oacute;n">
    </div>
  </div>
  <div class="form-row">
  <!--<div class="form-group col-md-4">
    <label for="Precio">Precio</label>
    <input type="text" class="form-control" id="Precio" name="precio" placeholder="Costo del producto" required>
  </div>-->
  <div class="form-group col-md-6">
    <label for="precio_uni">Precio unitario</label>
    <input type="text" class="form-control" id="Precio_uni" name="precio_uni" placeholder="Costo del producto" required>
  </div>
   <div class="form-group col-md-6">
      <label for="Categoria">Categoria del producto</label>
      <select id="Categoria" class="form-control" name="categoria" required>
        <option selected>Elegir...</option>
        {foreach from=$data item=item key=key} 
        <option>{$item.nombre}</option>
        {/foreach}
      </select>
    </div>
  </div>  
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="Existencias">Existencias</label>
      <input type="number" class="form-control" id="Existencias" name="existencia" required>
    </div>
    <div class="form-group col-md-4">
      <label for="reordenamiento">Punto de reordenamiento</label>
      <input type="text" class="form-control" id="reordenamiento" name="reordenamiento" required>
    </div>
    <div class="form-group col-md-4">
      <label for="unidad">Unidad de medida</label>
      <select id="unidad" class="form-control" name="unidad_medida" required>
        <option selected>Elegir...</option>
        <option>KG</option>
        <option>L</option>
        <option>PZA</option>
        <option>M</option>
        <option>PQ</option>
        <option>PAR</option>
        <option>ML</option>
        <option>CM</option>
        <option>GR</option>
        <option>GAL</option>
      </select>
    </div>
  </div>
  <!--<input type="submit" class="btn btn-primary" id="guardar" name="guardar" value="Guardar">-->
    
</form>
<button class="btn btn-primary"  onclick="guardar();">Guardar</button>
<div id="resultados"></div>
</div>

{literal}
<script>
function guardar() {

         var nombre = $("input#Nombre").val();
         var almacen = $("input#Almacen").val();
        // var precio = $("input#Precio").val();
         var precio_uni = $("input#Precio_uni").val();
         var cat = document.getElementById('Categoria');
         catValue = cat.value;
         var exist = $("input#Existencias").val();
         var reord = $("input#reordenamiento").val();  
         var unidad = document.getElementById('unidad');    
         unidadValue = unidad.value;   
 
            $.post("includes/php/ajax/almacen/guardar_producto.php", {nombre: nombre, almacen: almacen,  precio_uni:precio_uni, cat: catValue, exist: exist, reord: reord, unidad: unidadValue}, function(mensaje) {
                $("#resultados").html(mensaje);
             }); 
           
};
</script>
{/literal}

{include file="footer.tpl"}
