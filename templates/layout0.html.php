<!doctype html>
<html>
<head>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?></title>
    <link href="/css/principal.css" rel="stylesheet" type="text/css">
	 <link href="/css/Home4.css" rel="stylesheet" type="text/css">

	<link href="/css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
  <header>
<img src="/multimedia/imagenes/sismaed_logo3.png" alt="" width="280" height="130" id="LOGO" >


</header>
<?php if ($loggedIn): ?>
<div class="navbar">
          <div class="dropdown">
			<button class="dropbtn"><i class="fa fa-building" aria-hidden="true"></i> Unidad
		    <i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
			  <a href="/unidad/ver">Unidades</a>
			  <a href="/grupounidad/ver">Grupos de Unidades</a>
			</div>
		  </div>
	      <div class="dropdown">
			<button class="dropbtn"><i class="fa fa-address-card-o" aria-hidden="true"></i>  PEOG
		    <i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
			  <a href="/peog/ver">PEOGS</a>
              <a href="/grupopeog/ver">Grupos de PEOGS</a>
			</div>
		  </div>
		  
		  <?php if($user->hasGrupo(\Sismaed\Entity\Usuario::GRUPO_1)): ?>
		  
		  <div class="dropdown">
			<button class="dropbtn"><i class="fa fa-cogs" aria-hidden="true"></i> Mantenimiento
		    <i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
                  <div class="dropdown2">
                      <button class="dropbtn"><i class="fa fa-building" aria-hidden="true"></i> ODEON
                      <i class="fa fa-caret-down"></i>
                      </button>
                      <div class="dropdown-content2">
                          <a href="/mantto/ver?grupo=0">Mantenimientos/Servicios</a>
                          <a href="/mantto/crearrapido">Mantenimiento Rapido</a>
                          <a href="/reporte/ver?grupo=0">Reporte de Turno</a>
                          <a href="/acceso/ver?grupo=0">Control de Acceso</a>
                      </div>
                  </div>
                  
                  <div class="dropdown2">
                      <button class="dropbtn"><i class="fa fa-building" aria-hidden="true"></i> ASTROS
                      <i class="fa fa-caret-down"></i>
                      </button>
                      <div class="dropdown-content2">
                          <a href="/mantto/ver?grupo=4">Mantenimientos/Servicios</a>
                          <a href="/mantto/crearrapido">Mantenimiento Rapido</a>
                          <a href="/reporte/ver?grupo=4">Reporte de Turno</a>
                          <a href="/acceso/ver?grupo=4">Control de Acceso</a>
                      </div>
                  </div>
                  
                  <div class="dropdown2">
                      <button class="dropbtn"><i class="fa fa-building" aria-hidden="true"></i> Bellini
                      <i class="fa fa-caret-down"></i>
                      </button>
                      <div class="dropdown-content2">
                          <a href="/mantto/ver?grupo=5">Mantenimientos/Servicios</a>
                          <a href="/mantto/crearrapido">Mantenimiento Rapido</a>
                          <a href="/reporte/ver?grupo=5">Reporte de Turno</a>
                          <a href="/acceso/ver?grupo=5">Control de Acceso</a>
                      </div>
                  </div>
			</div>
		  </div>
          
          <?php endif;?> 
          
          <?php if($user->hasGrupo(\Sismaed\Entity\Usuario::GRUPO_2)): ?>

          <div class="dropdown">
          
			<button class="dropbtn"><i class="fa fa-cogs" aria-hidden="true"></i> Garage
		    <i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
              <div class="dropdown2">
                <button class="dropbtn"><i class="fa fa-cogs" aria-hidden="true"></i> ODEON
                <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content2">
                  <a href="/mantto/ver?grupo=1">Mantenimientos/Servicios</a>
                  <a href="/reporte/ver?grupo=1">Reporte de Turno</a>
                  <a href="/acceso/ver?grupo=0">Control de Acceso</a>
                </div>
              </div>
          
              <div class="dropdown2">
                <button class="dropbtn"><i class="fa fa-cogs" aria-hidden="true"></i> ASTROS
                <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content2">
                  <a href="/mantto/ver?grupo=6">Mantenimientos/Servicios</a>
                  <a href="/reporte/ver?grupo=6">Reporte de Turno</a>
                  <a href="/acceso/ver?grupo=6">Control de Acceso</a>
                </div>
              </div>
              
              <div class="dropdown2">
                <button class="dropbtn"><i class="fa fa-cogs" aria-hidden="true"></i> Bellini
                <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content2">
                  <a href="/mantto/ver?grupo=7">Mantenimientos/Servicios</a>
                  <a href="/reporte/ver?grupo=7">Reporte de Turno</a>
                  <a href="/acceso/ver?grupo=7">Control de Acceso</a>
                </div>
              </div>
              
			</div>
		  </div>
             <?php endif;?>
             
             <?php if($user->hasGrupo(\Sismaed\Entity\Usuario::GRUPO_3)): ?>
              <div class="dropdown">
			<button class="dropbtn"><i class="fa fa-cogs" aria-hidden="true"></i> Maestranza
		    <i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
			  <a href="/reporte/ver?grupo=2">Reporte de Turno</a>
              <a href="/acceso/ver?grupo=0">Control de Acceso</a>
			</div>
		  </div>
             <?php endif;?>
             
             
             <?php if($user->hasGrupo(\Sismaed\Entity\Usuario::GRUPO_4)): ?>
              <div class="dropdown">
			<button class="dropbtn"><i class="fa fa-cogs" aria-hidden="true"></i> Seguridad
		    <i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
			  <a href="/reporte/ver?grupo=3">Reporte de Turno</a>
              <a href="/acceso/ver?grupo=0">Control de Acceso</a>
			</div>
		  </div>
		  <?php endif;?>

            <?php if($user->hasGrupo(\Sismaed\Entity\Usuario::GRUPO_5)): ?>
            <div class="dropdown">
                <button class="dropbtn"><i class="fa fa-book" aria-hidden="true"></i> Administración
                <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="/cajachica/ver">CajaChica</a>
                    <a href="/inventario/ver">Inventario</a>
                    <a href="/libroacta/ver">Libro de Actas</a>
                    <a href="#">Calendario</a>
                    <a href="/plantilla/ver">Plantilla</a>
                    <a href="/lista/ver">Lista</a>
                    <a href="/ingreso/ver">Control Ingreso</a>
                    <a href="/notifica/ver">Notificaciones</a>
                    <a href="/expensa/ver">Distribucion Gasto</a>
                    <a href="/mensaje/ver">Mensajería Interna</a>
			    </div>
		  </div>
          <?php endif;?>
          
           <?php if($user->hasGrupo(\Sismaed\Entity\Usuario::GRUPO_6)): ?>
           
            <div class="dropdown">
                <button class="dropbtn"><i class="fa fa-sitemap" aria-hidden="true"></i> Sistema
                <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="/usuario/lista">Usuarios</a>

			    </div>
		  </div>
         <?php endif;?>
         
          <a id="Logout" style="float:right; background-color:#C60104"  href="/logout"><?=$user->name?> <i class="fa fa-sign-out" aria-hidden="true"></i>  </a>
</div>

 <?php endif; ?>

</div>

    <div class="main2">
	  <?=$output?>
    </div>
</div>





<div class="footer">
  <h5> @Todos los derechos reservados.SISMAED 2020</h5>
</div>



</body>
</html>
