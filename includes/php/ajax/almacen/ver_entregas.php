<?php
include("../../cnf.php");
$output = '';
$o=0;

if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "
	SELECT * FROM almacen_entregas WHERE producto LIKE '%".$search."%'
	OR no_req LIKE '%".$search."%'
	OR fecha_entrega LIKE '%".$search."%'";
}
else
{
	$query = "
	SELECT * FROM almacen_entregas ORDER BY id DESC LIMIT 5";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<table id="editable_table1" class="table table-bordered table-striped">
						<tr>
							<!--<th>No</th>-->
						    <th>No. Requisici&oacute;n</th>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Fecha</th>
							<th>Entregado a:</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		
		$o++;
		$output .= '
			<tr>
				<td data-label="id:" style="display:none;">'.$row["id"].' <input type="hidden" name="'.$row["id"].'" value="'.$row["id"].'" id="valor_obtenido_entrega"></td>
				<td data-label="no_requ">'.$row["no_requ"].' <input type="hidden" name="'.$row["no_requ"].'" value="'.$row["no_requ"].'" id="nombre_obtenido-'.$row["id"].'"></td>
				<td data-label="producto">'.strtoupper($row["producto"]).'</td>
				<td data-label="cantidad">'.$row["cantidad"].'</td>
				<td data-label="fecha_entrega">'.$row["fecha_entrega"].'</td>
				<td data-label="recibe">'.strtoupper($row["recibe"]).'</td>
			</tr>
		';
	}
	$output.="</table><br> <!--<button type='submit' id='export_data_entr' name='export_data_entr' value='Exportar Inventario' class='btn btn-info'>Exportar Inventario</button>-->";
	echo $output;
}
else
{
	echo 'Sin registros para "'.$search.'" ';
}
 
?>
<script type="text/javascript">
/*	$(document).ready(function(){  
     $('#editable_table').Tabledit({
      url:'includes/php/ajax/almacen/edit_table_salidas.php',
      columns:{
       identifier:[0, "id"],
       editable:[[1, 'numero_nota'], [2, 'producto'], [3, 'cantidad'], [4, 'fecha_salida'], [5, 'fecha'], [6, 'entrego']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id).remove();	
       }
      }
     });
});  */

	$(document).ready(function(){  
     $('#editable_table1').Tabledit({
      url:'includes/php/ajax/almacen/edit_table_entregas.php',
      columns:{
       identifier:[0, "id"]/*,
       editable:[ [5, 'fecha']]*/
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id).remove();	
       }
      }
     });
       });
</script>