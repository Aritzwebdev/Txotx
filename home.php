<!DOCTYPE html>
<html>
  <head>
   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css"/>

    <!-- Include FontAwesome CSS if you want to use feedback icons provided by FontAwesome -->
    <link rel="stylesheet" href="assets/font-awesome/font-awesome-4.2.0/css/font-awesome.min.css" />

    <!-- BootstrapValidator CSS -->
    <link rel="stylesheet" href="assets/bootstrapvalidator/dist/css/bootstrapValidator.min.css"/>

    <!-- jQuery and Bootstrap JS -->
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- BootstrapValidator JS -->
    <script type="text/javascript" src="assets/bootstrapvalidator/dist/js/bootstrapValidator.min.js"></script>
	
	<!-- Mi Css -->
	<link rel="stylesheet" href="main.css"/>
</head>
  <body>
  	<div class="container">
	  	<div class="row" id="header">
	  		<nav class="navbar navbar-inverse" role="navigation">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			    </div>
			
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">  
			      <ul id="hizkuntzak" class="nav navbar-nav">
			        <li class="active"><a href="#">eu</a></li>
			        <li><a href="#">es</a></li>
			      </ul>
			      <ul id="top_header" class="nav navbar-nav navbar-right">
				      <li class="dropdown" id="menuRegistro">
			            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="regis">Kontua sortu</a>
			            <div class="dropdown-menu" id="Registro" style="padding:17px;">
			              <form class="form" id="formRegistro" action="registro.php" method="post">
			              	<input type="text" name="izena" id="izena" placeholder="Izena" class="form-control"> 
			              	<input type="text" name="abizena" id="abizena" placeholder="Abizena" class="form-control">
			              	<input type="text" name="email" id="email" placeholder="Email-a" class="form-control"> 
			              	<input type="text" name="user" id="user" placeholder="Erabiltzailea" class="form-control">
			              	<input type="password" name="pass" id="pass" placeholder="Pasahitza" class="form-control"><br>
			                <button type="button" id="btnRegistro" class="btn btn-success btn-block">Kontua Sortu</button>
			              </form>
			            </div>
			          </li>
			          <li class="dropdown" id="menuLogin">
			            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="sartu">Saioa hasi</a>
			            <div class="dropdown-menu" id="Login" style="padding:17px;">
			              <form class="form" id="formLogin" role="form" action="pruebalogin.php" method="post"> 
			              	<input type="text" name="user" id="user" placeholder="Erabiltzailea" class="form-control">
			              	<input type="password" name="pass" id="pass" placeholder="Pasahitza" class="form-control"><br>
			                <button type="button" id="btnLogin" class="btn btn-success btn-block">Login</button>
			              </form>
			            </div>
			          </li>
					<li><a href="">Sagardotegiak</a></li>
					<li><a href="index.html">Hasiera</a></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
	  	</div>
	  	<div class="row" id="main">
	  		<h1 id="titulo">SagardoteGida</h1>
	  		<form id="bilatu" class="form-vertical col-sm-8" role="form" action="bilatu.php" method="get">
			    <div class="form-group">
					<div class="col-sm-offset-6 col-sm-6">
				    	<input id="bilaketa" type="text" name="herria" placeholder="Herria" class="form-control">
				    	<input id="bilaketa_botoia" type="submit" class="btn btn-default" name="bilaketa_botoia" value="Bilatu"/>
				    </div>
				</div>
			</form><!--end formulario-->
		</div><!--row del formulario+logo-->
		<footer id="footer">
				Copyleft Aritz Etxegia 2014
		</footer>
	</div>

    <!--añadir mi javascript-->
 	 <script src="app.js"></script>
  </body>
</html>