<?php
include("../../cnf.php");
$output = '';
$o=0;

if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "
	SELECT * FROM almacen_salidas WHERE producto LIKE '%".$search."%'
	OR numero_nota LIKE '%".$search."%'
	OR recibio LIKE '%".$search."%'";
}
else
{
	$query = "
	SELECT * FROM almacen_salidas ORDER BY id DESC LIMIT 5";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<table id="editable_table" class="table table-bordered table-striped">
						<tr>
							<!--<th>No</th>-->
						    <th>Nota</th>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Fecha</th>
							<th>Distribuido</th>
							<th>Entregó:</th>
							<th>Recibió:</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		
		$o++;
		$output .= '
			<tr>
				<td data-label="id:" style="display:none;">'.$row["id"].' <input type="hidden" name="'.$row["id"].'" value="'.$row["id"].'" id="valor_obtenido"></td>
				<td data-label="numero_nota">'.$row["numero_nota"].' <input type="hidden" name="'.$row["numero_nota"].'" value="'.$row["numero_nota"].'" id="nombre_obtenido-'.$row["id"].'"></td>
				<td data-label="producto">'.strtoupper($row["producto"]).'</td>
				<td data-label="cantidad">'.$row["cantidad"].'</td>
				<td data-label="fecha_salida">'.$row["fecha_salida"].'</td>
				<td data-label="fecha">'.$row["fecha"].'</td>
				<td data-label="entrego">'.strtoupper($row["entrego"]).'</td>
				<td data-label="recibio">'.strtoupper($row["recibio"]).'</td>
			</tr>
		';
	}
	$output.="</table><br> <!--<button type='submit' id='export_data' name='export_data' value='Exportar Inventario' class='btn btn-info'>Exportar Inventario</button>-->";
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
     $('#editable_table').Tabledit({
      url:'includes/php/ajax/almacen/edit_table_salidas.php',
      columns:{
       identifier:[0, "id"],
       editable:[ [5, 'fecha']]
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