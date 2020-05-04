  {include file="header.tpl"}

  <div class="container-fluid">
      <h3 align="center">Inventario Total - Almacen</h3><br />  

      <div class="form-group col md-3">
          <div class="input-group">
            <span class="input-group-addon"></span>
           <!-- <form method="post">-->
            <input type="text" name="search_text" id="search_text" placeholder="Buscar" class="form-control" value=""/>
            <input type="hidden" id="coll" value="" name="id_del_nombre">
              <!--</form>--> 
          </div>
        </div>
        <br />
       
        <div class="table-responsive">
          <form action="almacen_inventario.php" method="post">
           <div id="result"></div>
          </form>
        </div>

        <br>


  </div>




  {literal}
  <script>

   


  $(document).ready(function(){
    load_data();
    function load_data(query)
    {
      $.ajax({
        url:"includes/php/ajax/almacen/search_vista.php",
        method:"post",
        data:{query:query},
        success:function(data)
        {
          $('#result').html(data);
          var inputval = document.getElementById("valor_obtenido").value;
          document.getElementById("coll").value = inputval;

          
        }
      });
    }
    
    $('#search_text').keyup(function(){
      var search = $(this).val();
      if(search != '')
      {
        load_data(search);
        //alert(search);
      }
      else
      {
        load_data();      
      }
    });
  });


  </script> 

  {/literal}


  {include file="footer.tpl"}
