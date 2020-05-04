<?php
include("../../cnf.php");
$output = '';
$o=0;

if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);

	$query = "
	SELECT * FROM personal WHERE nombre LIKE '%".$search."%'
	OR cod LIKE '%".$search."%' 
	OR puesto LIKE '%".$search."%' 
	OR departamento LIKE '%".$search."%'
	OR area LIKE '%".$search."%'
	OR curp LIKE '%".$search."%'
	OR rfc LIKE '%".$search."%'
	OR sueldo_base LIKE '%".$search."%' AND activo = '1'
	 ORDER BY nombre ASC";

	if ($search=="grande") {
		
		$query = "SELECT * FROM personal WHERE nom_grande='1' AND activo = '1' ORDER BY nombre ASC";
	}
	if ($search=="chica") {
		$query = "SELECT * FROM personal WHERE nom_chica='1' AND activo = '1' ORDER BY nombre ASC";
	}

	
}
else
{
	$query = "
	SELECT * FROM personal ORDER BY nombre ASC";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<table id="editable_table" class="table table-bordered table-striped">
						<tr>
							<th>No</th>
							<th>Clave</th>
						    <th>Nombre</th>
							<th>Puesto</th>
							<th>Departamento</th>
							<th>Curp</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		
		$o++;
		$output .= '
			<tr>
				<td data-label="id:">'.$o.' <input type="hidden" name="'.$row["id"].'" value="'.$row["id"].'" id="valor_obtenido"></td>
				<td data-label="cod">'.htmlentities($row["cod"]).' <input type="hidden" name="'.htmlentities($row["cod"]).'" value="'.htmlentities($row["cod"]).'" id="nombre_obtenido"></td>
				<td data-label="nombre">'.$row["nombre"].'</td>
				<td data-label="puesto">'.$row["puesto"].'</td>
				<td data-label="departamento">'.$row["departamento"].'</td>
				<td data-label="curp">'.$row["curp"].'</td>
			</tr>
		';
	}
	$output.="</table><br><button type='submit' id='export_data' name='export_data' value='Exportar Inventario' class='btn btn-info'>Exportar Inventario</button>";
	echo $output;
}
else
{
	echo 'Sin registros para "'.$search.'" ';
}
 
?>
<script type="text/javascript">
	$(document).ready(function(){  
     $('#editable_table').Tabledit({
      url:'includes/php/ajax/nominas/edit_table_prod.php',
      columns:{
       identifier:[0, "id"],
       editable:[[1, 'cod'], [2, 'nombre'], [3, 'puesto'], [4, 'departamento'], [5, 'curp']	]
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