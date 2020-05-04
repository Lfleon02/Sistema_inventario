{include file="header.tpl"}
{if $tipo eq "almacen" || $tipo eq "campo" || $tipo eq "nominas"}
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {if $tipo eq "almacen" || $tipo eq "campo"}
            <h1 class="m-0 text-dark">Tablero</h1>
            {/if}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">{$Name}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          {if $tipo eq "almacen"}
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                {foreach from=$datan item=item key=key}
                <h3>{$item.total}</h3>
                {/foreach}
                <p>Productos en sistema.</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="almacen_inventario.php" class="small-box-footer">Ver <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          {/if}
          {if $tipo eq "campo"}
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                {foreach from=$dataa item=item key=key}
                <h3>{$item.total}</h3>
                {/foreach}
                <p>Productos en sistema.</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="campo_inventario.php" class="small-box-footer">Ver <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          {/if}
          <!-- ./col -->
          {if $tipo eq "almacen"}
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                {foreach from=$data2 item=item key=key}
                <h5>Último registro</h5>
                <p> agregado el dia {$item.fecha_alta} <br> Por: {$item.inserto}</p>
                {/foreach}
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            <!--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--><br>
            </div>
          </div>
          {/if}
          {if $tipo eq "campo"}
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                {if empty($datab)}
                {else}
                {foreach from=$datab item=item key=key}
                <h5>Último registro</h5>
                <p> agregado el dia {$item.fecha_alta} <br> Por: {$item.inserto}</p>
                {/foreach}
                {/if}
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            <!--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--><br>
            </div>
          </div>
          {/if}
          <!-- ./col -->
          {if $tipo eq "almacen"}
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                {foreach from=$data3 item=item key=key}
                <h3>{$item.total}</h3>

                <p>Salidas registradas</p>
                {/foreach}
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--><br>
            </div>
          </div>
          {/if}
          {if $tipo eq "campo"}
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                {foreach from=$datac item=item key=key}
                <h3>{$item.total}</h3>

                <p>Salidas registradas</p>
                {/foreach}
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--><br>
            </div>
          </div>
          {/if}
          <!-- ./col -->
          {if $tipo eq "almacen"}
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                {foreach from=$data4 item=item key=key}
                <h3>{$item.total}</h3>

                <p>Productos recibidos</p>
                {/foreach}
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
             <br>
            </div>
          </div>
          {/if}
          {if $tipo eq "campo"}
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                {foreach from=$datad item=item key=key}
                <h3>{$item.total}</h3>

                <p>Productos recibidos</p>
                {/foreach}
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
             <br>
            </div>
          </div>
          {/if}
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
        
          
              </div>

{if $tipo eq "nominas"}





{/if}


            </div>
        </div>
{else}

          <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <h1 class="m-0 text-dark">Este m&oacute;dulo no esta disponible para este tipo de usuario..</h1>
        </div>
      </div>
    </div>
  </div>

{/if}

{include file="footer.tpl"}
