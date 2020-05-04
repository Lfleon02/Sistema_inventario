{include file="header.tpl"}
<div class="container">
  <br />
<p>
  <center><h1>Captura de medida</h1></center>
  <br>
  <center><h4>{$fecha_completa}</h4></center>
</p>

  <br/><br/>

<div>
      <label for="inputState">Seleccionar Pozo:</label>
           <SELECT NAME="Pozos" onChange="pagoOnChange(this)" class="form-control ">
              <OPTION VALUE="seleccionar">Seleccionar...</OPTION>
              <OPTION VALUE="Pozo1">Pozo Zanagess 1</OPTION>
              <OPTION VALUE="PozoNuevo">Pozo Zanagess Nuevo</OPTION> 
           </SELECT>
      </div>

<br><br>

<div class="row" id="Pozo1" style="display:none;">
             <div class="col">
                <label for="Hoy">Medida de Hoy</label>
             <input type="number" class="form-control" id="Hoy" name="Hoy" placeholder="Hoy" >
            
            <input type="hidden" value="1" id="tot"><br>
            <button class="btn btn-primary"  onclick="guardar();">Guardar</button> 
            <br><br><br>
            <div class="col">
  <form id="form1" enctype="multipart/form-data" method="post" action="lecturas.php">
    <label>Agregar Imagen<br>
        <input id="campofotografia" name="imagen" type="file" class="control-form" required/>
        <input type="hidden" name="tot" value="1">
    </label>
    <input id="enviar" name="enviar_uno" type="submit" value="Enviar" />
</form>
</div>
             </div>   
</div>


<div class="row" id="PozoNuevo" style="display:none;">
            <div class="col">
              <label for="Hoy1">Medida de Hoy</label>
              <input type="number" class="form-control" id="Hoy1" name="Hoy1" placeholder="Hoy" >
           
            <input type="hidden" value="2" id="tot1">
            <button class="btn btn-primary"  onclick="guardar1();">Guardar</button>
            <br><br><br>
             <div class="col">
  <form id="form1" enctype="multipart/form-data" method="post" action="lecturas.php">
    <label>Agregar Imagen<br>
        <input id="campofotografia" name="imagen" type="file" class="control-form" required/>
        <input type="hidden" name="tot1" value="2">
    </label>
    <input id="enviar" name="enviar_dos" type="submit" value="Enviar" />
</form>
</div>
          </div>
</div>



<div id="resultados"></div>
<br>

</div>



{literal}


<script type="text/javascript">

function pagoOnChange(sel) {
if(sel.value=="seleccionar"){

           divn = document.getElementById("Pozo1");
           divn.style.display = "none";
           
           divs = document.getElementById("PozoNuevo");
           divs.style.display = "none";

      }
      if(sel.value=="Pozo1"){

           divm = document.getElementById("Pozo1");
           divm.style.display = "";
           
           divs = document.getElementById("PozoNuevo");
           divs.style.display = "none";

      }if(sel.value=="PozoNuevo"){

           divs = document.getElementById("PozoNuevo");
           divs.style.display = "";
           
           divm = document.getElementById("Pozo1");
           divm.style.display = "none";

      }
}
</script>

<script>
function guardar() {

         var Medida = $("input#Hoy").val(); 
         var tot = $("input#tot").val(); 
 
            $.post("includes/php/ajax/campo/guardar_medidas.php", {Medida:Medida,tot:tot}, function(mensaje) {
                $("#resultados").html(mensaje);
             });     
};

function guardar1() {

         var Medida = $("input#Hoy1").val();
         var tot = $("input#tot1").val(); 
 
    $.post("includes/php/ajax/campo/guardar_medidas.php", {Medida:Medida, tot:tot}, function(mensaje) {
                $("#resultados").html(mensaje);
             }); 
           
};
</script>
{/literal}

{include file="footer.tpl"}
