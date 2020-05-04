{include file="header.tpl"}
<br><br><center>
<div class="container-fluid">
<div class="row">
	{foreach from=$datan item=item key=key}
  <div class="col md-3">
  	
  	<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">Inventario total</div>
  <div class="card-body">
    <h5 class="card-title">Hay {$item.total} productos en el sistema</h5>
    {foreach from=$data2 item=item key=key}
    Utimo registro agregado <br>el dia {$item.fecha_alta} agregado por:<br> {$item.inserto}
    {/foreach}
  </div>
</div>
  </div>
  {/foreach}
  <div class="col md-3">
  	
  <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
  <div class="card-header">Presupuesto total de inventario</div>
  <div class="card-body">
  	<br><br>
  	{foreach from=$data3 item=item key=key}
    <h5 class="card-title">$ {number_format($item.total, 2)}</h5>
    {/foreach}<br><br><br>
  </div>
</div>
  </div>

  <div class="col md-3">
  	
  <!--	<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Success card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>-->

  </div>
  <div class="col md-3">
  	
  <!--	<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Danger card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>-->

  </div>
</div>

</div></center>
{include file="footer.tpl"}
