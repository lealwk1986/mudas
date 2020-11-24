	  <style>
	ul, #myUL {
	  list-style-type: none;
	}
	.active{
			margin: 0px 18px ;
			padding: 0;
		}

	#myUL {
	  margin: 0;
	  padding: 0;
	}

	.caret {
	  cursor: context-menu;
	  -webkit-user-select: none; /* Safari 3.1+ */
	  -moz-user-select: none; /* Firefox 2+ */
	  -ms-user-select: none; /* IE 10+ */
	  user-select: none;
		background-color: blue;
        
        
	}

	.caret::before {
	  content: "\25B6";
	  color: black;
	  display: inline-block;
	  margin-right: 6px;
		background-color: red;
	}

	.caret-down::before {
	  -ms-transform: rotate(90deg); /* IE 9 */
	  -webkit-transform: rotate(90deg); /* Safari */'
	  transform: rotate(90deg); 
		
		background-color:chartreuse;
	}

	.nested {
	  display: none;
		background-color: darkgoldenrod;
	}

.accordion {
  background-color:#B7B7B7 ;
  color: #444;
  cursor: pointer;
  padding: 10px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
    display: block;

}

.active, .accordion:hover {
  background-color: #555555; 
    color: white;
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
    overflow: hidden;
          
          }
          
      .aa {
  display: block;
  text-align: center;
  padding: 2px;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
  width: 50%;
  float: left;
  
}
          
.icon-bar {
  display: block;
  text-align: center;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
  height: 60px;
	float: top;
  width: 70%;
  background-color: #555;
  margin-left: auto;
  margin-right: auto;
	 }	
.icon-bar .aa:hover {
  background-color: #000;
    cursor:pointer;
	}
          

.titulounidad {
    text-align: left;
    font-weight: bolder;
    font-size: x-large;
    margin-left: 30px;
    color: #250506;	
	    
		  }		
		  

		  
.contenido {
    font-size: medium;
    text-align: left;
	
	font-style: oblique;
	margin-right: 20px;
	
	
	
	

	}	
		  
		  .list1{
			 
			 list-style-position: outside;
			  background-color:lightgrey;
			  margin: 30px;
			  padding: 10px;

			  
			 }
		  
		  
		  .content_ajax {
			  
			  overflow-y: scroll;
			  height: 800px;
		  }
		  

/* Slideshow container */
.slideshow-container {
	float: left;
    margin-left: 20px;	


}





.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
		  
		    	  		 	  		 		         

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
} 

/* Style the search box */
#mySearch {
  width: 100%;
  font-size: 18px;
  padding: 11px;
  border: 1px solid #ddd;
}

/* Style the navigation menu inside the left column */
#myMenu {
  list-style-type: none;
  padding: 0;

  margin: 0;
}

#myMenu li a {
  padding: 12px;
  text-decoration: none;
  color: black;
  display: block;
    margin-bottom: 12px;
}

#myMenu li a:hover {
  background-color: #eee;
}          
          
     .ocultaBoton {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}	         
          
</style>  

<style>
    .icon-bar{
        display:none;
    }

</style>

<div class="row" id="row" style="height: 100%;  width: 0;  position: fixed;  z-index: 1;  top: 0;  left: 0;">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="side" id="side" style="height: 100%; " >

        </div>  
    </div>
    <div class="icon-bar">
  <a class="aa" href="#" onClick="nuevo()"><i class="fa fa-file-o"></i></a> 
  <a class="aa" href="#" onClick=""><i class="fa fa-question "></i></a>
    
    
  <p id="id_item" style="visibility: hidden;">0</p>
  <p id_dep="id_dep" style="visibility: hidden;">""</p>
</div><div class="clear"></div>
<div class="main" id="main">
    
    
   <div class="content_ajax">
  <p class=titulounidad >BIENVENIDO A LA SECCION DE NOTIFICACIONES</p>

	<div class="slideshow-container">

<div class="mySlides fade">
  
  <img src="/doc?archivo=cajachica1.png&ruta=/pagina/doc/imag" style="padding: 10px;" width=620px alt=""  >
  
</div>

<div class="mySlides fade">
  
  <img src="/doc?archivo=cajachica2.png&ruta=/pagina/doc/imag" style="padding: 10px;" width=620px alt="" >
  
</div>

<div class="mySlides fade">
 
  <img src="/doc?archivo=cajachica3.png&ruta=/pagina/doc/imag" style="padding: 10px;" width=620px alt="">
  
</div>



<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>

	</div>
	
</div>
	
	<div class="contenido">
	<p> PEOG Son las Personas, Empresas o Grupos que forman parte del ecosistema de SISMAED. </p>	
 	 <p> Ejemplo: Edificio(s), Piso(s), Sala(s) Tecnica(s), Sistema(s), Equipo(s) </p>	
	<p> Las mismas son organizadas en un arreglo dependiente, con un orden asociado a la estructura física del edificio. </p>
		<p>Las unidades se clasifican bajo una estructura en árbol con un número ilimitado de niveles, que puede variar con el tiempo.</p>
		<p>La gestión de unidades que realiza SISMAED  permite obtener una visión global de todos los activos gracias
			a una auténtica descripción funcional, geográfica y contable de las instalaciones.</p>
			</div>	
		<div class="clear"></div>
		<ul class="list1">
<p><li> <img src="/doc?archivo=vineta1.png&ruta=/pagina/doc/imag" width="30" alt=""/> Asocie toda la información contable y técnica a cada unidad </li></p>
			
			
<p><li> <img src="/doc?archivo=vineta1.png&ruta=/pagina/doc/imag" width="30" alt=""/> Acceda directamente a la lista de piezas, a las intervenciones, a los planes preventivos de las unidades</li></p>
			
<p><li> <img src="/doc?archivo=vineta1.png&ruta=/pagina/doc/imag" width="30" alt=""/> Localice sus equipos con facilidad y acceda rápidamente a sus piezas y contratos</li></p>
			
<p><li>  <img src="/doc?archivo=vineta1.png&ruta=/pagina/doc/imag" width="30" alt=""/> Consulte el registro histórico de los desplazamientos y de las anteriores asignaciones de los equipos en el árbol</li></p>
		</ul>
		

	
</div>
</div>



<script>
	
function Nav_02(arch,id_tag){	
var xmlhttp2 = new XMLHttpRequest();
xmlhttp2.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
	  txt_mp='<input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category"> <ul id="myMenu">';
      myObj.forEach(
			function myFunction(value, index, array) {
             txt_mp = txt_mp + '<li><a href="#" class="accordion" onclick="verI('+value[0]+')">'+value[1] +'</a><a class="oculto"  style="display: none" href="#">'+ value[1]+'</a></li>';
			}
		);

      txt_mp = txt_mp + '</ul>';
      
      document.getElementById(id_tag).innerHTML = txt_mp;
  }else { document.getElementById(id_tag).innerHTML = 'NO';
        }
};
xmlhttp2.open("GET", arch, true);
xmlhttp2.send();
};	

function ver(v1) {
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/notifica/veri?id="+v1, true); 
 xmlhttp2.send();   

}
 
var myVar;    
    
function verI(v1) { 
    ver(v1);
    clearInterval(myVar);
    myVar=setInterval("ver("+v1+")",60000);  } 
    
function editar() {
    var id=document.getElementById("id_item").innerHTML;    

  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/notifica/editari?id="+id, true); 
 xmlhttp2.send();   
    
} 
    
function editar2(v1) {
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/unidad/editari?id="+v1, true); 
 xmlhttp2.send();   
    
}     

function getVariable(variable) {
   var query = window.location.search.substring(1);
   var vars = query.split("&");
   for (var i=0; i < vars.length; i++) {
       var pair = vars[i].split("=");
       if(pair[0] == variable) {
           return pair[1];
       }
   }
   return false;
}
    
function nuevo(){
    var id=document.getElementById("id_item").innerHTML;
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/unidad/nuevo?id_dep="+id, true); 
 xmlhttp2.send();  
}
    
function borrar(){
  var id=document.getElementById("id_item").innerHTML;
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/unidad/borrar?id_dep="+id, true); 
 xmlhttp2.send();  
}    
    
 
/*Nav_02("/js/arbol.js.php","side", true);*/
Nav_02("/navegador/notifica","side", true);
    
var id=getVariable('id'); 
var ide=getVariable('ide');

if(id){
    
    ver(id);
}
if(ide){ editar2(ide);}
    
</script>



<script>


var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}


</script>


<script>
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>

