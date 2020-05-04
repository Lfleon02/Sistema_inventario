<?php
include("../../cnf.php");
$output = '';
$o=0;

if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "
	SELECT * FROM almacen_inventario WHERE nombre LIKE '%".$search."%'
	OR sku LIKE '%".$search."%' 
	OR categoria LIKE '%".$search."%' 
	OR inserto LIKE '%".$search."%'
	OR almacenes LIKE '%".$search."%'
	 ORDER BY nombre ASC LIMIT 16";
}
else
{
	$query = "
	SELECT * FROM almacen_inventario ORDER BY nombre ASC LIMIT 16";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<table id="editable_table_" class="table table-bordered table-striped">
						<tr>
							<th>No</th>
						    <th>Sku</th>
							<th>Nombre</th>
							<th>Ubicaci&oacute;n</th>
							<th>Categoria</th>
							<th>Existencia</th>
							<th>Precio existencia</th>
							<th>Precio unitario</th>
							<th>Punto reordenamiento</th>
							<th>Fecha alta</th>
							<th>Unidad de medida</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		
		$o++;
		$output .= '
			<tr>
				<td data-label="id:">'.$row["id"].' <input type="hidden" name="'.$row["id"].'" value="'.$row["id"].'" id="valor_obtenido"></td>
				<td data-label="sku">'.htmlentities($row["sku"]).' <input type="hidden" name="'.htmlentities($row["sku"]).'" value="'.htmlentities($row["sku"]).'" id="nombre_obtenido"></td>
				<td data-label="nombre">'.$row["nombre"].'</td>
				<td data-label="almacenes">'.$row["almacenes"].'</td>
				<td data-label="categoria">'.$row["categoria"].'</td>
				<td data-label="categoria">'.$row["existencias"].'</td>
				<td data-label="precio">'.number_format($row["precio"],2).'</td>
				<td data-label="precio_unitario">'.number_format($row["precio_unitario"],2).'</td>
				<td data-label="punto_reordenamiento">'.$row["punto_reordenamiento"].'</td>
				<td data-label="fecha_alta">'.$row["fecha_alta"].'</td>
				<td data-label="unidad_medida">'.$row["unidad_medida"].'</td>
			</tr>
		';
	}
	$output.="</table><br> <button type='submit' id='export_data' name='export_data' value='Exportar Inventario' class='btn btn-info'>Exportar Inventario</button>";
	echo $output;
}
else
{
	echo 'Sin registros para "'.$search.'" ';
}
 
?>
<!--
<script type="text/javascript">
	$(document).ready(function(){  
     $('#editable_table').Tabledit({
      url:'includes/php/ajax/almacen/edit_table_prod.php',
      columns:{
       identifier:[0, "id"],
       editable:[[1, 'sku'], [2, 'nombre'], [3, 'almacenes'], [4, 'categoria'], [5, 'existencias'], [6, 'precio'], [7, 'precio_unitario'], 
       [8, 'punto_reordenamiento'],[9, 'fecha_alta'],[10, 'unidad_medida']]
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
</script>-->