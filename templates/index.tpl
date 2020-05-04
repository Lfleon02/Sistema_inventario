{include file="header.tpl" title=foo}
<div class="container-fluid">
    <br />
    <center><img src="includes/img/logo/logo.png"></center>
     <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Acceso</h5>
            <form class="form-signin" method="post" action="index.php">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="username" required autofocus autocomplete="true">
                <label for="inputEmail">Correo</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                <label for="inputPassword">Contrase&ntilde;a</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="acceso" >Entrar</button>
              <input type="hidden" name="tot" value="1">
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
{include file="footer.tpl"}
