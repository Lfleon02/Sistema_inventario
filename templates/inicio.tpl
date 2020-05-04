{include file="header.tpl"}
	<div class="container centrado">
		<div class="row"> 
	     {foreach from=$data1 item=item key=key} 
	          <div class="col areas"><a href="{$item.area_txt}.php">{$item.area}</a></div>
	     {/foreach} 
   		</div>		

   		<div class="row"> 
	     {foreach from=$data2 item=item key=key} 
	          <div class="col areas"><a href="{$item.area_txt}.php">{$item.area}</a></div>
	     {/foreach} 
   		</div>	

   		<div class="row"> 
	     {foreach from=$data3 item=item key=key} 
	          <div class="col areas"><a href="{$item.area_txt}.php">{$item.area}</a></div>
	     {/foreach} 
   		</div>	
	</div>
{include file="footer.tpl"}
