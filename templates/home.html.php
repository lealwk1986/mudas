
<!-- Navbar (sit on top) -->
<div class="w3-top">
<!--  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide" ><img src="multimedia/imagenes/SISMAED_LOGO2.PNG" width="350" height="140" alt=""/></a>-->
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
		<a href="#home" class="w3-bar-item w3-button"><i class="fa fa-home"></i> INICIO</a>
      <a href="#about" class="w3-bar-item w3-button">¿QUE ES?</a>
		<a href="#team" class="w3-bar-item w3-button">FUNCIONALIDADES</a>
      <a href="#work" class="w3-bar-item w3-button"><i class="fa fa-mobile"></i> APP</a>
      <a href="#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTACTO</a>
		
    </div>
	
	
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
<!--</div>-->

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ACERCA DE SISMAED</a>
  <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button">FUNCIONALIDADES</a>
	<a href="#work" onclick="w3_close()" class="w3-bar-item w3-button">CARACTERISTICAS</a>
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACTO</a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-left w3-text-white" style="padding:48px">
    <span class="w3-jumbo w3-hide-small">Optimiza el mantenimiento de tu edificio</span><br>
    <span class="w3-large2"> Disminuye costos y agiliza tiempos </span>
    <p><a href="#about" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Conocer más y comenzar</a></p>
  </div> 
  <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
	
<?php if (isset($error)):?>
	<div class="errors"><?=$error;?></div>
<?php endif; ?>
	
<form method="post" action="/login" style="border:1px solid #ccc">
<div class="container2">
    <i class="fa fa-users" ><h4> INGRESO USUARIOS </h4></i>

    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" autocomplete="off" >

    <label for="password"><b>Contraseña</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="myInput" autocomplete="off">
	<label>
	<input type="checkbox" onclick="myFunction()" id="myInput">  Ver contraseña
	</label>
	
	
<!--    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    -->
   
    <div class="clearfix">
    
      <button type="submit" class="signupbtn">INGRESAR</button>
		
    </div>
	<br></br>

    <img src="multimedia/imagenes/iconasistance.png" width="50" height="50" style="float: left; padding: 8px"  >
		<div>
	<b>ASISTENCIA TÉCNICA</b><br>
			<h8>sismaed@gmail.com/ 11-33676969</h8></br>
		</div>
	</div>

	
	</form>	
</header>

<!-- About Section -->
<div class="slideshow-container" id="about">

<div class="mySlides fade">
  <!--<div class="numbertext">1 / 3</div>-->
  <img src="multimedia/imagenes/aboutsismaed.png" style="width:100%">
  <!--<div class="text">Caption Text</div>-->
</div>

<div class="mySlides fade">
  <!--<div class="numbertext">2 / 3</div>-->
  <img src="multimedia/imagenes/aboutsismaed2.png" style="width:100%">
 <!-- <div class="text">Caption Two</div>-->
</div>

<div class="mySlides fade">
 <!-- <div class="numbertext">3 / 3</div>-->
  <img src="multimedia/imagenes/aboutsismaed3.png" style="width:100%">
  <!--<div class="text">Caption Three</div>-->
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<div class="w3-container" style="padding-bottom: 80px; padding-left: 16px; padding-right: 16px; padding-top: 80px;" id="about">
  <h3 class="w3-center">ACERCA DE SISMAED</h3>
  <p class="w3-center w3-large3" >SISMAED es un sistema para la gestion del mantenimiento en edificios</p>
	<p class="w3-center">Ampliamente versátil, que le permite administrar y gestionar de una manera eficiente todas las actividades asociadas al mantenimiento de edificios</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i class="fa fa-desktop w3-margin-bottom w3-jumbo"> <img src="/multimedia/imagenes/bucket_building_cleaning_.png" width="250px" height="210"  alt=""/></i>
      <p class="w3-large4">Mantenimientos Preventivos/Predictivos</p>
      <p class="textodesc">Administra y gestiona de manera eficaz los mantenimientos preventivos del edificio</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-heart w3-margin-bottom w3-jumbo"> <img src="multimedia/imagenes/rutinario.png" width="250" height="210"  alt=""/></i>
      <p class="w3-large4">Mantenimientos correctivos y Trabajos Rutinarios</p>
      <p class="textodesc">Controla y gestiona los trabajos rutinarios,crea reportes diarios y genera historicos de actividades</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-diamond w3-margin-bottom w3-jumbo"> <img src="multimedia/imagenes/externos.png" width="250" height="210" alt=""/></i>
      <p class="w3-large4">Proveedores-Servicios externos</p>
      <p class="textodesc">Controla, gestiona y optimiza los servicios, productos y consumibles de proveedores externos</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-cog w3-margin-bottom w3-jumbo"> <img src="multimedia/imagenes/infoedificios.png" width="250" height="210" alt=""/></i>
      <p class="w3-large4">Unidades</p>
      <p class="textodesc">Accede a toda la información técnica y administrativa asociada a las distintas unidades/pisos/departamentos de tu edificio</p>
    </div>
  </div>
</div>

<!-- Promo Section - "We know design" -->
<!--<div class="w3-container w3-light-grey" style="padding:128px 16px">
  <div class="w3-row-padding">
    <div class="w3-col m6">
      <h3>SISMAED APP</h3>
      <p>Envía solicitudes de mantenimiento a SISMAED desde tu celular<br>SISMAED-SOL es la app que permite enviar solicitudes de mantenimiento en forma instantánea al administrador de SISMAED desde cualquiera de tus dispositivos móviles</p>
      <p><a href="#work" class="w3-button w3-black"><i class="fa fa-th"> </i> Ver demo</a></p>
    </div>
    <div class="w3-col m6">
      <img class="w3-image w3-round-large" src="multimedia/imagenes/sismaedapp.png" width="700" height="394">
    </div>
  </div>
</div>-->

<!-- Team Section -->
	
	  <h2 class="w3-center" id="team">FUNCIONALIDADES</h2>
  <!--<p class="w3-center w3-large1">The ones who runs this company</p>-->
	
	<div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
<div class="flip-box" style="padding-bottom: 0px; padding-left: 16px; padding-right: 16px;">
  <div class="flip-box-inner">
	   
    <div class="flip-box-front">
        <img src="multimedia/imagenes/rentabilidad.png" alt="John" style="width:100% ">
	  </div>
	  <div class="w3-container">
        <div class="flip-box-back">
          <h2>Aumento de la rentabilidad</h2>
          <p class="textodesc">A través de una adecuada planificación de los equipos de trabajo y acciones de mantenimiento, y una eficiente gestión de los recursos </p>
			<p class="textodesc">Optimizar las tareas de mantenimiento, minimizando las tareas no necesarias y aumentando las tareas y los sistemas que nos permitan detectar el momento adecuado de intervención. </p>
		  </div>
        </div>
      </div>
    </div>
		</div>
		</div>
		
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
		  <div class="flip-box" style="padding-bottom: 0px; padding-left: 16px; padding-right: 16px;">
  			<div class="flip-box-inner">
    			<div class="flip-box-front">
        <img src="multimedia/imagenes/jerarquizar.png" alt="Jane" style="width:100%">
				</div>
        <div class="w3-container">
			<div class="flip-box-back">
				<h3>Jerarquizacion de activos</h3>
          
				<p class="textodesc">El escenario actual de los edificios y/o instalaciones con alta dotación de activos indica que las necesidades de mantenimiento han ido aumentando durante los últimos años, por lo cual se estima conveniente que la evaluación de estrategias de mantenimiento, la selección de tareas y por ende la gestión global del mantenimiento en la organización se deba manejar de manera formal y responsable, dejando de lado la improvisación y aleatoriedades.</p>
          <p class="textodesc"> Sismaed le permitirá tener una adecuada distribución de los recursos hacia las areas según su impacto en el negocio</p>
        </div>
      </div>
   			 </div>	  
		 </div>
      </div>
    </div>
	
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
		   <div class="flip-box" style="padding-bottom: 0px; padding-left: 16px; padding-right: 16px;">
  			<div class="flip-box-inner">
    			<div class="flip-box-front">
        <img src="multimedia/imagenes/tiempo-real.png" alt="Mike" style="width:100%">
					</div>
        <div class="w3-container">
			<div class="flip-box-back">
          <h3>Informacion en tiempo real</h3>
         
          <p class="textodesc">La disposición de la información es clave en la gestion de mantenimiento, de esta manera permite visualizar constantemente el estado real de los negocios. Poder ver todos los movimientos, conocer el saldo a proveedores, el stock, el estado de resultados, el balance general, entre otra información, resulta de gran utilidad para los gestores del negocio.  </p>
           
        </div>
      </div>
    </div>
			   
	  </div>
      </div>
    </div>		   
			   
			   
			   
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
		  <div class="flip-box" style="padding-left: 16px; padding-right: 16px; padding-top: 0px;" >
  			<div class="flip-box-inner" >
    			<div class="flip-box-front">
        <img src="multimedia/imagenes/decisiones.png" alt="Dan" style="width:100%">
				</div>
        <div class="w3-container">
			<div class="flip-box-back">
          <h3>Facilitar la toma de decisiones</h3>
          <p class="textodesc">Los sistemas de información constituyen una de las herramientas para la toma de decisiones más confiables y que garantizan los mejores resultados.

Cuando una empresa integra todos los datos obtenidos de sus procesos en una misma plataforma, logra validar y almacenar cada fuente para tenerlo como referencia en el futuro.

Esto favorece en gran medida la aplicación y ajuste de nuevas estrategias de producción, gestión o de negocios.

Además, tener toda esta información disponible bajo una misma plataforma, le da la posibilidad a cualquier directivo o gerente de la empresa de utilizar estos datos como una pieza habitual de confirmación de las acciones</p>
  
        </div>
      </div>
    </div>
  </div>
</div>

 </div>

	
<!-- Promo Section "Statistics" -->
<!--<div class="w3-container w3-row w3-center w3-dark-grey w3-padding-64">
  <div class="w3-quarter">
    <span class="w3-xxlarge">14+</span>
    <br>Partners
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">55+</span>
    <br>Projects Done
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">89+</span>
    <br>Happy Clients
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">150+</span>
    <br>Meetings
  </div>

	
</div>
-->
 
<div class="w3-container" style="padding: 128px 16px; margin-top: 350px;" id="work">

      <img src="multimedia/imagenes/sismaedapp.png" style="width:100%" >
   
</div>


<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close Modal Image">×</span>
  <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
    <img id="img01" class="w3-image">
    <p id="caption" class="w3-opacity w3-large"></p>
  </div>
</div>

<!-- Skills Section -->
<!--<div class="w3-container w3-light-grey w3-padding-64">
  <div class="w3-row-padding">
    <div class="w3-col m6">
      <h3>Our Skills.</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br>
      tempor incididunt ut labore et dolore.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br>
      tempor incididunt ut labore et dolore.</p>
    </div>
    <div class="w3-col m6">
      <p class="w3-wide"><i class="fa fa-camera w3-margin-right"></i>Photography</p>
      <div class="w3-grey">
        <div class="w3-container w3-dark-grey w3-center" style="width:90%">90%</div>
      </div>
      <p class="w3-wide"><i class="fa fa-desktop w3-margin-right"></i>Web Design</p>
      <div class="w3-grey">
        <div class="w3-container w3-dark-grey w3-center" style="width:85%">85%</div>
      </div>
      <p class="w3-wide"><i class="fa fa-photo w3-margin-right"></i>Photoshop</p>
      <div class="w3-grey">
        <div class="w3-container w3-dark-grey w3-center" style="width:75%">75%</div>
      </div>
    </div>
  </div>
</div>-->

<!-- Pricing Section -->
<!--<div class="w3-container w3-center w3-dark-grey" style="padding:128px 16px" id="pricing">
  <h3>OVERVIEW</h3>
  <p class="w3-large">Choose a pricing plan that fits your needs.</p>
  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">MANTENIMIENTOS</li>
        <li class="w3-padding-16"><b>10GB</b> Storage</li>
        <li class="w3-padding-16"><b>10</b> Emails</li>
        <li class="w3-padding-16"><b>10</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide">$ 10</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
         
        </li>
      </ul>
    </div>
    <div class="w3-third">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-red w3-xlarge w3-padding-48">REPORTES</li>
        <li class="w3-padding-16"><b>25GB</b> Storage</li>
        <li class="w3-padding-16"><b>25</b> Emails</li>
        <li class="w3-padding-16"><b>25</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide">$ 25</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
       
        </li>
      </ul>
    </div>
    <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">GESTION</li>
        <li class="w3-padding-16"><b>50GB</b> Storage</li>
        <li class="w3-padding-16"><b>50</b> Emails</li>
        <li class="w3-padding-16"><b>50</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide">$ 50</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
     
        </li>
      </ul>
    </div>
  </div>
</div>-->

<!-- Contact Section -->
<div class="w3-container w3-light-grey" style="padding:128px 16px" id="contact">
  <h3 class="w3-center">CONTACTANOS</h3>
  <p class="w3-center w3-large1">Envianos tu consulta:</p>
  <div style="margin-top:48px">
    <p><i class="fa fa-map-marker w3-margin-right"></i> Buenos Aires, ARGENTINA</p>
    <p><i class="fa fa-phone-square w3-margin-right "></i> Phone: +54 1133676969/1127689852</p>
    <p><i class="fa fa-envelope w3-margin-right"> </i> Email: SISMAED@gmail.com</p>
    <br>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Subject" required name="Subject"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Message" required name="Message"></p>
      <p>
        <button class="w3-button w3-black" type="submit">
          <i class="fa fa-paper-plane"></i> ENVIAR CONSULTA
        </button>
      </p>
    </form>
    
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
	
	<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
// Mostrar la clave	
	function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}	
/*about seccion*/		
	
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

		
		
</script>
