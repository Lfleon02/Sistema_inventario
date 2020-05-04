{include file="header.tpl"}
<br><br><br><br><center>
<div class="container">
<div class="row">  
  <div class="col-md-7">  
    <div class="col-md-5">  </div> 
    <div class="col-md-5" > 
      <select id="periodos" class="form-control"> 
        {foreach from=$data item=item key=key} 
        {assign var=fecha value=" "|explode:$item.fecha_alta}
        <option value="{$i++}">{$fecha[0]}</option>
        {/foreach}
      </select>
    </div> 
  </div>
</div><div id="Area_chart" style="height: 250px;"></div>

</div></center>
{literal}
<script type="text/javascript">
 $(function() {
   //  ##########################
    var Area_chart = Morris.Area({
      element: 'Area_chart',  
      behaveLikeLine: true,
      parseTime : false, 
      data: [ ],
      xkey: 'y',
      ykeys: ['m', 'd'],
      labels: ['Salidas', 'Entregas'],
      pointFillColors: ['#707f9b'],
      pointStrokeColors: ['#ffaaab'],
      lineColors: ['#f26c4f', '#00a651', '#00bff3'],
      redraw: true      
    });

    $("#periodos").on("change", function(){
     var selectedID = $(this).val(); 
     $.ajax({
            type: "POST",
            url: "includes/php/ajax/almacen/almacen_reportes.php?Area_chart="+selectedID,
            data: 0,
            dataType: 'json',
            success: function(data){
              console.log(data);
              Area_chart.setData(data);
            }
          });
  });
  });
   $(document).ready(function(e){
      $("#periodos").trigger("change");
  });
</script>
{/literal}
{include file="footer.tpl"}
